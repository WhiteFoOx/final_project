<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Transaction;
use App\User;

class MainController extends Controller
{
    /**
     *  Добавляет отложенную транзакцию в БД
     *
     * @param Request $request
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function addTransaction(Request $request)
    {
        $this->validate(
            $request,
            [
            'sender' => 'required|integer',
            'money' => 'required|integer',
            'date' => 'required',
            'getter' => 'required|integer',
            ]
        );
        $sender_id = $request->input('sender');
        $getter_id = $request->input('getter');
        $transaction_date = $request->input('date');
        $transaction_amount = $request->input('money');

        $sender = User::find($sender_id);
        if (!$sender) {
            return redirect('/')->with('failed', "Отправитель не существует");
        }

        $getter = User::find($getter_id);
        if (!$getter) {
            return redirect('/')->with('failed', "Получатель не существует");
        }

        $validationSenderMessage = $sender->validateUser($getter_id, $transaction_amount);

        if ($validationSenderMessage) {
            return redirect('/')->with('failed', $validationSenderMessage);
        }

        $transaction = new Transaction();
        $transaction->addTransaction($sender_id, $getter_id, $transaction_date, $transaction_amount);
        $sender->setBalance($transaction_amount);

        return redirect('/')->with('success', 'Перевод запланирован');
    }

    /**
     * Возвращает view со всеми пользователями
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getUsers()
    {
        $users = User::all();
        return view('users')->with('users', $users);
    }

    /**
     *  Добавляет пользователя
     *
     * @param Request $request
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function addUser(Request $request)
    {
        $this->validate(
            $request,
            [
            'name' => 'required|string',
            'balance' => 'required|integer',
            ]
        );
        $user = new User();
        $user->name = $request->input('name');
        $user->balance = $request->input('balance');
        $user->save();

        return redirect('/')->with('success', 'Пользователь добавлен');
    }

    /**
     *  Совершает отложенные транзакции
     *
     * @return void
     */
    static function makeTransactions()
    {
        $transactions = Transaction::all();
        $nowDate = Carbon::now()->format('Y-m-d H:00:00');
        foreach ($transactions as $transaction) {
            if ($transaction->status == 'opened' && $transaction->transfer_date <= $nowDate) {
                $user = User::find($transaction->getter_id);
                $user->balance += $transaction->transfer_amount;
                $user->save();
                $transaction->closeTransaction();
            }
        }
    }
}
