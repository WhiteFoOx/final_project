<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Transaction;
use App\User;

class MainController extends Controller
{
    public function submit(Request $request)
    {
        $this->validate($request, [
            'sender' => 'required|integer',
            'money' => 'required|integer',
            'date' => 'required',
            'getter' => 'required|integer'
        ]);
        $sender = User::find($request->input('sender'));
        if (!$sender) {
            return redirect('/')->with('failed', "Отправитель не существует");
        }

        $getter = User::find($request->input('getter'));
        if (!$getter) {
            return redirect('/')->with('failed', "Получатель не существует");
        }

        $validationSenderMessage = $sender->validateUser($request);

        if ($validationSenderMessage) {
            return redirect('/')->with('failed', $validationSenderMessage);
        }

        $transaction = new Transaction();
        $transaction->addTransaction($request);

        $sender->setBalance($request);
        $sender->setLastTransaction($request);

        return redirect('/')->with('success', 'Перевод запланирован');
    }

    public function getUsers()
    {
        $users = User::all();
        return view('users')->with('users', $users);
    }

    public function addUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'balance' => 'required|integer',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->balance = $request->input('balance');
        $user->save();

        return redirect('/')->with('success', 'Пользователь добавлен');
    }

    static function makeTransactions()
    {
        $transactions = Transaction::all();
        foreach ($transactions as $transaction) {
            if ($transaction->status == 'opened' && $transaction->transfer_date == Carbon::now()->format('Y-m-d H:00:00')) {
                $user = User::find($transaction->getter_id);
                $user->balance += $transaction->transfer_amount;
                $user->save();
                $transaction->closeTransaction();
            }
        }
    }
}
