<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Transaction;
use App\User;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function submit(Request $request)
    {

        $this->validate($request, [
            'sender' => 'required',
            'money' => 'required',
            'date' => 'required',
            'getter' => 'required'
        ]);
        $dateFromForm = explode('T',$request->input('date'));
        $date = (new Carbon($dateFromForm[0]))->addHours(substr($dateFromForm[1],0,2));
        if ($request->input('sender') == $request->input('getter')) {
            return redirect('/')->with('failed', "can't send money to hui");
        }
        $transaction = new Transaction();
        $user = User::find($request->input('sender'));
        $user->balance -= $request->input('money');
        $user->save();
        $transaction->sender_id = $request->input('sender');
        $transaction->transfer_amount = $request->input('money');
        $transaction->transfer_date = $date;
        $transaction->getter_id = $request->input('getter');

        $transaction->save();

        return redirect('/')->with('success', 'Money sent');
    }

    public function getUsers()
    {
        $users = User::all();
        return view('users')->with('users', $users);
    }

    public function addUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'balance' => 'required',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->balance = $request->input('balance');
        $user->save();

        return redirect('/')->with('success', 'User added');
    }

    public function getBalance($id)
    {
        $response = DB::table('users')
            ->select('balance')
            ->where('users.id', '=', $id)
            ->first();

        return $response;
    }

    public function setBalance($id, $balance)
    {
        DB::table('users')
            ->where('users.id', '=', $id)
            ->update(['users.balance' => $balance]);
    }
}
