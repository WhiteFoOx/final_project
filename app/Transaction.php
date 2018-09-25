<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Transaction extends Model
{
    public function addTransaction(Request $request)
    {
        $this->sender_id = $request->input('sender');
        $this->transfer_amount = $request->input('money');
        $this->transfer_date = $request->input('date');
        $this->getter_id = $request->input('getter');
        $this->status = 'opened';

        $this->save();
    }

    public function closeTransaction()
    {
        $this->status = 'closed';
        $this->save();
    }
}
