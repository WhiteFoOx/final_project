<?php


use Illuminate\Database\Migrations\Migration;

class InsertDataIntoDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $users = [
            [
                'id'=> 1,
                'name' => 'User 1',
                'balance' => 5000,
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'=> 2,
                'name' => 'User 2',
                'balance' => 4000,
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'=> 3,
                'name' => 'User 3',
                'balance' => 3000,
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'=> 4,
                'name' => 'User 4',
                'balance' => 2000,
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'=> 5,
                'name' => 'User 5', 'balance' => 1000,
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'=> 6,
                'name' => 'User 6',
                'balance' => 6000,
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        \DB::table('users')->insert($users);

        $transactions = [
            [
                'id'=> 1,
                'sender_id' => 1,
                'getter_id' => 2,
                'status' => 'opened',
                'transfer_amount' => 1000,
                'transfer_date' => \Carbon\Carbon::now()->addHour()->format('Y-m-d H:00:00'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'=> 2,
                'sender_id' => 2,
                'getter_id' => 3,
                'status' => 'opened',
                'transfer_amount' => 2000,
                'transfer_date' => \Carbon\Carbon::now()->addDay()->format('Y-m-d H:00:00'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'=> 3,
                'sender_id' => 6,
                'getter_id' => 5,
                'status' => 'opened',
                'transfer_amount' => 100,
                'transfer_date' => \Carbon\Carbon::now()->addDay()->addHour()->format('Y-m-d H:00:00'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id'=> 4,
                'sender_id' => 1,
                'getter_id' => 3,
                'status' => 'opened',
                'transfer_amount' => 500,
                'transfer_date' => \Carbon\Carbon::now()->addHours(2)->format('Y-m-d H:00:00'),
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
                'created_at' => \Carbon\Carbon::now()->format('Y-m-d H:i:s'),
            ]

        ];
        \DB::table('transactions')->insert($transactions);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::table('users')->whereIn('id', [1, 2, 3, 4, 5, 6])->delete();
        \DB::table('transactions')->whereIn('id', [1, 2, 3, 4])->delete();
    }
}
