<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('units')->count() == 0) {
            DB::table('units')->insert([
                [
                    'name' => 'Bag',
                    'short_name' => 'BAG',
                    'symbol' => '',
                ],[
                    'name' => 'Bags',
                    'short_name' => 'BGS',
                    'symbol' => '',
                ],[
                    'name' => 'Bails',
                    'short_name' => 'BLS',
                    'symbol' => '',
                ],[
                    'name' => 'Bottles',
                    'short_name' => 'BTL',
                    'symbol' => '',
                ],[
                    'name' => 'Bou',
                    'short_name' => 'BOU',
                    'symbol' => '',
                ],[
                    'name' => 'Boxes',
                    'short_name' => 'BOX',
                    'symbol' => '',
                ],[
                    'name' => 'Buckles',
                    'short_name' => 'BKL',
                    'symbol' => '',
                ],[
                    'name' => 'Bulk',
                    'short_name' => 'BLK',
                    'symbol' => '',
                ],[
                    'name' => 'Bunches',
                    'short_name' => 'BUN',
                    'symbol' => '',
                ],[
                    'name' => 'Bundles',
                    'short_name' => 'BDL',
                    'symbol' => '',
                ],[
                    'name' => 'Cans',
                    'short_name' => 'CAN',
                    'symbol' => '',
                ],[
                    'name' => 'Bag',
                    'short_name' => 'BAG',
                    'symbol' => '',
                ],[
                    'name' => 'Carats',
                    'short_name' => 'CTS',
                    'symbol' => '',
                ],[
                    'name' => 'Cartons',
                    'short_name' => 'CTN',
                    'symbol' => '',
                ],[
                    'name' => 'Cases',
                    'short_name' => 'CAS',
                    'symbol' => '',
                ],[
                    'name' => 'Centimeter',
                    'short_name' => 'CMS',
                    'symbol' => '',
                ],[
                    'name' => 'Chauka',
                    'short_name' => 'CHK',
                    'symbol' => '',
                ],[
                    'name' => 'Chest',
                    'short_name' => 'CHI',
                    'symbol' => '',
                ],[
                    'name' => 'Coils',
                    'short_name' => 'CLS',
                    'symbol' => '',
                ],[
                    'name' => 'Collies',
                    'short_name' => 'COL',
                    'symbol' => '',
                ],[
                    'name' => 'Crates',
                    'short_name' => 'CRI',
                    'symbol' => '',
                ],[
                    'name' => 'Cubic Centimeter',
                    'short_name' => 'CCM',
                    'symbol' => '',
                ],[
                    'name' => 'Cubic Feet',
                    'short_name' => 'CBF',
                    'symbol' => '',
                ],[
                    'name' => 'Cubic Inches',
                    'short_name' => 'CIN',
                    'symbol' => '',
                ],[
                    'name' => 'Cubic Meter',
                    'short_name' => 'CBM',
                    'symbol' => '',
                ],[
                    'name' => 'Cubic Meters',
                    'short_name' => 'CQM',
                    'symbol' => '',
                ],[
                    'name' => 'Cylinder',
                    'short_name' => 'CYL',
                    'symbol' => '',
                ],[
                    'name' => 'Days',
                    'short_name' => 'DAY',
                    'symbol' => '',
                ],[
                    'name' => 'Decameter Square',
                    'short_name' => 'SDM',
                    'symbol' => '',
                ],[
                    'name' => 'Dozen',
                    'short_name' => 'DOZ',
                    'symbol' => '',
                ],[
                    'name' => 'Drums',
                    'short_name' => 'DRM',
                    'symbol' => '',
                ],[
                    'name' => 'Feet',
                    'short_name' => 'FTS',
                    'symbol' => '',
                ],[
                    'name' => 'Flasks',
                    'short_name' => 'FLK',
                    'symbol' => '',
                ],[
                    'name' => 'Grams',
                    'short_name' => 'GMS',
                    'symbol' => '',
                ],[
                    'name' => 'Great Gross',
                    'short_name' => 'GGR',
                    'symbol' => '',
                ],[
                    'name' => 'Greate Britain Ton',
                    'short_name' => 'TON',
                    'symbol' => '',
                ],[
                    'name' => 'Gross',
                    'short_name' => 'GRS',
                    'symbol' => '',
                ],[
                    'name' => 'Gross Yards',
                    'short_name' => 'GYS',
                    'symbol' => '',
                ],[
                    'name' => 'Habbuck',
                    'short_name' => 'HBK',
                    'symbol' => '',
                ],[
                    'name' => 'Hanks',
                    'short_name' => 'HKS',
                    'symbol' => '',
                ],[
                    'name' => 'Hours',
                    'short_name' => 'HRS',
                    'symbol' => '',
                ],[
                    'name' => 'Inches',
                    'short_name' => 'INC',
                    'symbol' => '',
                ],[
                    'name' => 'Inch Dia',
                    'short_name' => 'IND',
                    'symbol' => '',
                ],[
                    'name' => 'Inch Meter',
                    'short_name' => 'INM',
                    'symbol' => '',
                ],[
                    'name' => 'Jar',
                    'short_name' => 'JAR',
                    'symbol' => '',
                ],[
                    'name' => 'Job',
                    'short_name' => 'JOB',
                    'symbol' => '',
                ],[
                    'name' => 'Jotta',
                    'short_name' => 'JTA',
                    'symbol' => '',
                ],[
                    'name' => 'Kilograms',
                    'short_name' => 'KGS',
                    'symbol' => '',
                ],[
                    'name' => 'Kiloliter',
                    'short_name' => 'KLR',
                    'symbol' => '',
                ],[
                    'name' => 'Kilometers',
                    'short_name' => 'KMS',
                    'symbol' => '',
                ],[
                    'name' => 'Bag',
                    'short_name' => 'BAG',
                    'symbol' => '',
                ],[
                    'name' => 'Kilowatt',
                    'short_name' => 'KW',
                    'symbol' => '',
                ],[
                    'name' => 'Liters',
                    'short_name' => 'LTR',
                    'symbol' => '',
                ],[
                    'name' => 'Lines',
                    'short_name' => 'LIN',
                    'symbol' => '',
                ],[
                    'name' => 'Load',
                    'short_name' => 'LOAD',
                    'symbol' => '',
                ],[
                    'name' => 'Logs',
                    'short_name' => 'LOG',
                    'symbol' => '',
                ],[
                    'name' => 'Lots',
                    'short_name' => 'LOT',
                    'symbol' => '',
                ],[
                    'name' => 'Lumpsum',
                    'short_name' => 'LS',
                    'symbol' => '',
                ],[
                    'name' => 'Meter',
                    'short_name' => 'MTR',
                    'symbol' => '',
                ],[
                    'name' => 'Metric Ton',
                    'short_name' => 'MTS',
                    'symbol' => '',
                ],[
                    'name' => 'Milli Grams',
                    'short_name' => 'MGS',
                    'symbol' => '',
                ],[
                    'name' => 'Milli Litre',
                    'short_name' => 'MLT',
                    'symbol' => '',
                ],[
                    'name' => 'Milli Meter',
                    'short_name' => 'MMT',
                    'symbol' => '',
                ],[
                    'name' => 'Month',
                    'short_name' => 'MO',
                    'symbol' => '',
                ],[
                    'name' => 'Numbers',
                    'short_name' => 'NOS',
                    'symbol' => '',
                ],[
                    'name' => 'Odds',
                    'short_name' => 'ODD',
                    'symbol' => '',
                ],[
                    'name' => 'Others',
                    'short_name' => 'OTH',
                    'symbol' => '',
                ],[
                    'name' => 'Package',
                    'short_name' => 'PKG',
                    'symbol' => '',
                ],[
                    'name' => 'Packet',
                    'short_name' => 'PKT',
                    'symbol' => '',
                ],[
                    'name' => 'Peck - Dry Measure',
                    'short_name' => 'PKD',
                    'symbol' => '',
                ],[
                    'name' => 'Packs',
                    'short_name' => 'PAC',
                    'symbol' => '',
                ],[
                    'name' => 'Pails',
                    'short_name' => 'PAI',
                    'symbol' => '',
                ],[
                    'name' => 'Pairs',
                    'short_name' => 'PRS',
                    'symbol' => '',
                ],[
                    'name' => 'Pallets',
                    'short_name' => 'PLT',
                    'symbol' => '',
                ],[
                    'name' => 'Pieces',
                    'short_name' => 'PCS',
                    'symbol' => '',
                ],[
                    'name' => 'Pounds',
                    'short_name' => 'LBS',
                    'symbol' => '',
                ],[
                    'name' => 'Quintal',
                    'short_name' => 'QTL',
                    'symbol' => '',
                ],[
                    'name' => 'Reels',
                    'short_name' => 'REL',
                    'symbol' => '',
                ],[
                    'name' => 'RIM',
                    'short_name' => 'RIM',
                    'symbol' => '',
                ],[
                    'name' => 'Rolls',
                    'short_name' => 'ROL',
                    'symbol' => '',
                ],[
                    'name' => 'Running Feet',
                    'short_name' => 'RFT',
                    'symbol' => '',
                ],[
                    'name' => 'Sets',
                    'short_name' => 'SET',
                    'symbol' => '',
                ],[
                    'name' => 'Sheets',
                    'short_name' => 'SHT',
                    'symbol' => '',
                ],[
                    'name' => 'Slabs',
                    'short_name' => 'SLB',
                    'symbol' => '',
                ],[
                    'name' => 'Sqaure Centimeters',
                    'short_name' => 'SQC',
                    'symbol' => '',
                ],[
                    'name' => 'Sqaure Feet',
                    'short_name' => 'SQF',
                    'symbol' => '',
                ],[
                    'name' => 'Square Inches',
                    'short_name' => 'SQI',
                    'symbol' => '',
                ],[
                    'name' => 'Square Meter',
                    'short_name' => 'SQM',
                    'symbol' => '',
                ],[
                    'name' => 'Square Yards',
                    'short_name' => 'SQY',
                    'symbol' => '',
                ],[
                    'name' => 'Steel Blocks',
                    'short_name' => 'BLO',
                    'symbol' => '',
                ],[
                    'name' => 'Strings',
                    'short_name' => 'STR',
                    'symbol' => '',
                ],[
                    'name' => 'Tables',
                    'short_name' => 'TBL',
                    'symbol' => '',
                ],[
                    'name' => 'Tablets',
                    'short_name' => 'TBS',
                    'symbol' => '',
                ],[
                    'name' => 'Ten Gross',
                    'short_name' => 'TGM',
                    'symbol' => '',
                ],[
                    'name' => 'Thousands',
                    'short_name' => 'THD',
                    'symbol' => '',
                ],[
                    'name' => 'Tins',
                    'short_name' => 'TIN',
                    'symbol' => '',
                ],[
                    'name' => 'Tola',
                    'short_name' => 'TOL',
                    'symbol' => '',
                ],[
                    'name' => 'Trunk',
                    'short_name' => 'TRK',
                    'symbol' => '',
                ],[
                    'name' => 'US Gallons',
                    'short_name' => 'UGS',
                    'symbol' => '',
                ],[
                    'name' => 'Units',
                    'short_name' => 'UNT',
                    'symbol' => '',
                ],[
                    'name' => 'Vials',
                    'short_name' => 'VLS',
                    'symbol' => '',
                ],[
                    'name' => 'Wooden Cases',
                    'short_name' => 'CSK',
                    'symbol' => '',
                ],[
                    'name' => 'Yards',
                    'short_name' => 'YDS',
                    'symbol' => '',
                ],[
                    'name' => 'Year',
                    'short_name' => 'YO',
                    'symbol' => '',
                ]
            ]);
        }
    }
}
