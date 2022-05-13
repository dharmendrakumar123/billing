<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('countries')->count() == 0) {
            DB::table('countries')->insert([
                'name' => 'India',
                'country_code' => '91',
                'currency' => 'RUPEE (INR)',
                'currency_code' => '356',
                'currency_symbol' => '₹',
                'calling_code' => '+91',
                'status' => 'active',
            ]);
        }
    }
}
