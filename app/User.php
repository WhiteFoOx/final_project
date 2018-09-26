<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * Возвращает баланс пользователя
     *
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Задает баланс пользователя
     *
     * @param int $transaction_amount
     *
     * @return void
     */
    public function setBalance($transaction_amount)
    {
        $this->balance -= $transaction_amount;
        $this->save();
    }

    /**
     * Задает последнюю запланированную
     * транзакцию у пользователя
     *
     * @param string $transaction_date
     *
     * @return string
     */
    public function getLastTransaction()
    {
        return static::select(\DB::raw('*'))
            ->from('transactions')
            ->where('sender_id', '=', $this->id)
            ->orderBy('transfer_date', 'desc')
            ->first();
    }

    /**
     * Проводит валидацию пользователя
     *
     * @param int $getter_id
     * @param int $transaction_amount
     *
     * @return string|null
     */
    public function validateUser($getter_id, $transaction_amount)
    {
        if ($this->id == $getter_id) {
            return "Невозможно сделать перевод самому себе";
        }

        if ($this->getBalance() < 0) {
            return "У пользователя отрицательный баланс";
        }

        if ($this->getBalance() - $transaction_amount < 0) {
            return "У пользователя недостаточно средств для списания";
        }

        return null;
    }
}

