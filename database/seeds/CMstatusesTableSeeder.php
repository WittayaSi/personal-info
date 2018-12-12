<?php

use Illuminate\Database\Seeder;
use App\Cmstatus;

class CMstatusesTableSeeder extends Seeder
{
    private $mstatuses = [
    	'01' => 'สมรส',
    	'02' => 'หย่า / หม้าย',
    	'03' => 'โสด',
    ];
    public function run()
    {
        DB::table('cmstatuses')->delete();
        foreach ($this->mstatuses as $key => $value) {
            Cmstatus::create(['mstatus_id' => $key, 'mstatus_name' => $value]);
        }
    }
}
