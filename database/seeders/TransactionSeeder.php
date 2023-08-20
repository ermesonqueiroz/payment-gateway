<?php

namespace Database\Seeders;

use App\Enums\TransactionStatusEnum;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $transaction = new Transaction([
            'sender_id' => 11, // Test User
            'receiver_id' => 12, // Receiver User
            'value' => 11.50,
            'status' => TransactionStatusEnum::SUCCEEDED,
        ]);

        $transaction->save();
    }
}
