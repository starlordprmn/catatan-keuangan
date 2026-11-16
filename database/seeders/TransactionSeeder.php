<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create([
            'desc' => 'Gaji',
            'aruskas' => 'income',
            'nominal' => '20000000'
        ]);

        Transaction::create([
            'desc' => 'Service AC',
            'aruskas' => 'outcome',
            'nominal' => '200000'
        ]);
    }
}
