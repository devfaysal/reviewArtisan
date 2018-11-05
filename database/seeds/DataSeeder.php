<?php

use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $divisions = array("Dhaka", "Chittagong", "Rajshahi", "Sylhet");
        $districts = array("Dhaka", "Kishoregonj", "Comilla", "Gazipur");
        $thanas = array("Bazitpur", "Bhairob", "Savar");

        foreach($divisions as $name){
            $division = new \App\Division;
            $division->name = $name;
            $division->save();
        }
        foreach($districts as $name){
            $district = new \App\District;
            $district->name = $name;
            $district->division_id = 1;
            $district->save();
        }
        foreach($thanas as $name){
            $thana = new \App\Thana;
            $thana->name = $name;
            $thana->district_id = 1;
            $thana->save();
        }
    }
}
