<?php

use Illuminate\Database\Seeder;

class GstrateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('gst_rate')->count() == 0) {
            DB::table('gst_rate')->insert([
                [
                    'value' => 'nill',
                    'name' => 'Nill-Rated',
                ],
                [
                    'value' => 'zero',
                    'name' => 'Zero-Rated',
                ],
                [
                    'value' => '0',
                    'name' => '0%',
                ],
                [
                    'value' => '0.1',
                    'name' => '0.1%',
                ],
                [
                    'value' => '0.25',
                    'name' => '0.25%',
                ],
                [
                    'value' => '1',
                    'name' => '1.5%',
                ],
                [
                    'value' => '3',
                    'name' => '3%',
                ],
                [
                    'value' => '5',
                    'name' => '5%',
                ],
                [
                    'value' => '7',
                    'name' => '7.5%',
                ],
                [
                    'value' => '12',
                    'name' => '12%',
                ],
                [
                    'value' => '18',
                    'name' => '18%',
                ],
                [
                    'value' => '28',
                    'name' => '28%',
                ]

            ]);
        }
    }
}
