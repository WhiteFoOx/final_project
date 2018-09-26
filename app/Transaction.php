<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * Добавляет транзакцию в БД
     *
     * @param int    $sender_id
     * @param int    $getter_id
     * @param string $transaction_date
     * @param int    $transaction_amount
     *
     * @return void
     */
    public function addTransaction($sender_id, $getter_id, $transaction_date, $transaction_amount)
    {
        $this->sender_id = $sender_id;
        $this->transfer_amount = $transaction_amount;
        $this->transfer_date = $transaction_date;
        $this->getter_id = $getter_id;
        $this->status = 'opened';

        $this->save();
    }

    /**
     * Меняет статус транзакции на closed
     *
     * @return void
     */
    public function closeTransaction()
    {
        $this->status = 'closed';
        $this->save();
    }
}
