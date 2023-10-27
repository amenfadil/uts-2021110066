<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $types = ['income', 'expense'];
        $categories = [
            'income' => ['wage', 'bonus', 'gift'],
            'expense' => ['food & drinks', 'shopping', 'charity', 'housing', 'insurance', 'taxes', 'transportation']
        ];
    
        for ($i = 0; $i < 100; $i++) {
            $type = $types[rand(0, 1)];
            $category = $categories[$type][rand(0, count($categories[$type]) - 1)];
    
            Transaction::create([
                'amount' => rand(1000, 100000),
                'type' => $type,
                'category' => $category,
                'notes' => $this->faker->text,
            ]);
        }
    }
}