<?php

use Illuminate\Database\Seeder;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['county_title' => 'Kiambu'],
            ['county_title' => 'Mombasa'],
            ['county_title' => 'Kilifi'],
            ['county_title' => 'Nairobi'],
        ];
        DB::table('tbl_counties')->insertOrIgnore($data);        
    }
}
