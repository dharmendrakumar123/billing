<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('states')->count() == 0) {
            DB::table('states')->insert([
                [
                    'country_id' => '1',
                    'name' => 'Andaman and Nicobar Islands',
                    'state_code' => '35',
                    'alpha_code' => 'AN',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Andhra Pradesh',
                    'state_code' => '37',
                    'alpha_code' => 'AP',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Arunachal Pradesh',
                    'state_code' => '12',
                    'alpha_code' => 'AR',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Assam',
                    'state_code' => '18',
                    'alpha_code' => 'AS',
                    'status' => 'active',
                ],[
                    'country_id' => '1',
                    'name' => 'Bihar',
                    'state_code' => '10',
                    'alpha_code' => 'BR',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Chhattisgarh',
                    'state_code' => '22',
                    'alpha_code' => 'CG',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Chandigarh',
                    'state_code' => '04',
                    'alpha_code' => 'CH',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Daman and Diu',
                    'state_code' => '25',
                    'alpha_code' => 'DD',
                    'status' => 'active',
                ],[
                    'country_id' => '1',
                    'name' => 'Delhi',
                    'state_code' => '07',
                    'alpha_code' => 'DL',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Dadra and Nagar Haveli',
                    'state_code' => '26',
                    'alpha_code' => 'DN',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Goa',
                    'state_code' => '30',
                    'alpha_code' => 'GA',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Gujarat',
                    'state_code' => '24',
                    'alpha_code' => 'GJ',
                    'status' => 'active',
                ],[
                    'country_id' => '1',
                    'name' => 'Himachal Pradesh',
                    'state_code' => '02',
                    'alpha_code' => 'HP',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Haryana',
                    'state_code' => '06',
                    'alpha_code' => 'HR',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Jharkhand',
                    'state_code' => '20',
                    'alpha_code' => 'JH',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Jammu and Kashmir',
                    'state_code' => '01',
                    'alpha_code' => 'JK',
                    'status' => 'active',
                ],
                
                [
                    'country_id' => '1',
                    'name' => 'Karnataka',
                    'state_code' => '29',
                    'alpha_code' => 'KA',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Kerala',
                    'state_code' => '32',
                    'alpha_code' => 'KL',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Ladakh',
                    'state_code' => '38',
                    'alpha_code' => 'LA',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Lakshadweep',
                    'state_code' => '31',
                    'alpha_code' => 'LD',
                    'status' => 'active',
                ],[
                    'country_id' => '1',
                    'name' => 'Maharashtra',
                    'state_code' => '27',
                    'alpha_code' => 'MH',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Meghalaya',
                    'state_code' => '17',
                    'alpha_code' => 'ML',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Manipur',
                    'state_code' => '14',
                    'alpha_code' => 'MN',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Madhya Pradesh',
                    'state_code' => '23',
                    'alpha_code' => 'MP',
                    'status' => 'active',
                ],[
                    'country_id' => '1',
                    'name' => 'Mizoram',
                    'state_code' => '15',
                    'alpha_code' => 'MZ',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Nagaland',
                    'state_code' => '13',
                    'alpha_code' => 'NL',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Odisha',
                    'state_code' => '21',
                    'alpha_code' => 'OR',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Punjab',
                    'state_code' => '03',
                    'alpha_code' => 'PB',
                    'status' => 'active',
                ],[
                    'country_id' => '1',
                    'name' => 'Puducherry',
                    'state_code' => '34',
                    'alpha_code' => 'PY',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Rajasthan',
                    'state_code' => '08',
                    'alpha_code' => 'RJ',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Sikkim',
                    'state_code' => '11',
                    'alpha_code' => 'SK',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Tamil Nadu',
                    'state_code' => '33',
                    'alpha_code' => 'TN',
                    'status' => 'active',
                ],[
                    'country_id' => '1',
                    'name' => 'Tripura',
                    'state_code' => '16',
                    'alpha_code' => 'TR',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Telangana',
                    'state_code' => '36',
                    'alpha_code' => 'TS',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Uttarakhand',
                    'state_code' => '05',
                    'alpha_code' => 'UA',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'Uttar Pradesh',
                    'state_code' => '09',
                    'alpha_code' => 'UP',
                    'status' => 'active',
                ],
                [
                    'country_id' => '1',
                    'name' => 'West Bengal',
                    'state_code' => '19',
                    'alpha_code' => 'WB',
                    'status' => 'active',
                ]
            ]);
        }
    }
}
