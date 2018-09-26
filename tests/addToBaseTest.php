<?php

use Carbon\Carbon;
use App\User;

class addToBaseTest extends TestCase
{
    public function testAddUser()
    {

        $name = 'ValeraTestoviiMalii';
        $balance = 3000;
        $this->post(
            '/add',
            [
                'name' => $name,
                'balance' => $balance,
            ]
        );
        $this->seeInDatabase(
            'users', [
            'name' => 'ValeraTestoviiMalii',
            'balance' => 3000,
            ]
        );

        \DB::table('users')
            ->where('name', '=', 'ValeraTestoviiMalii')
            ->delete();
    }

    public function testAddTransaction()
    {
        $user1 = new User();
        $user1->name = 'ValeraTestoviiMalii';
        $user1->balance = 3000;
        $user1->save();

        $user2 = new User();
        $user2->name = 'EgoBratAndruha';
        $user2->balance = 1000;
        $user2->save();

        $testAmount = 1000;
        $testDate = Carbon::now()->format('Y-m-d H:00:00');
        $this->post(
            '/submit', [
                'sender' => $user1->id,
                'getter' => $user2->id,
                'money' => $testAmount,
                'date'=> $testDate
            ]
        );
        $this->seeInDatabase(
            'users', [
                'name' => 'ValeraTestoviiMalii',
                'balance' => 2000,
            ]
        );
        $this->seeInDatabase(
            'transactions', [
                'sender_id' => $user1->id,
                'getter_id' => $user2->id,
                'transfer_amount' => 1000,
                'status' => 'opened',
            ]
        );
        $this->assertEquals($user1->getLastTransaction()->transfer_date, $testDate);

        \DB::table('users')
            ->whereIn('name', ['ValeraTestoviiMalii', 'EgoBratAndruha'])
            ->delete();

        \DB::table('transactions')
            ->where('sender_id', '=', $user1->id)
            ->delete();
    }
}
