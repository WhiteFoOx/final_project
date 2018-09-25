<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function getBalance()
    {
        return $this->balance;
    }

    public function setBalance(Request $request)
    {
        $this->balance -= $request->input('money');
        $this->save();
    }
    public function setLastTransaction(Request $request)
    {
        $this->last_transaction = $request->input('date');
        $this->save();
    }

    public function validateUser(Request $request)
    {
        if ($this->id == $request->input('getter')) {
            return "Невозможно сделать перевод самому себе";
        }

        if ($this->getBalance() < 0) {
            return "У пользователя отрицательный баланс";
        }

        return null;
    }
}

