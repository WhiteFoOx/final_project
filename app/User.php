<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    public function getBalance($id)
    {
        $response = DB::table('users')
            ->select('planning_balance')
            ->where('users.id', '=', $id)
            ->first();

        return $this->planning_balance;
    }

    public function getId()
    {
        return $this->getId();
    }

    public function changeInfo()
    {

    }

}

