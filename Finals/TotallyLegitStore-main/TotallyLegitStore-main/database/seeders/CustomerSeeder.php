<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        // Create exactly 30 customers
        Customer::factory()->count(30)->create();
    }
}