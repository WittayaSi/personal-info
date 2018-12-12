<?php

use Illuminate\Database\Seeder;
use App\Creligion;

class CReligionTableSeeder extends Seeder
{
    private $religions = [
    	'01' => 'พุทธ',
    	'02' => 'คริสต์',
    	'03' => 'อิสลาม',
    	'04' => 'ฮินดู',
    	'05' => 'พราหมณ์',
    	'88' => 'อื่นๆ',
    	'99' => 'ไม่ระบุ',
    ];
    public function run()
    {
        DB::table('creligions')->delete();
        foreach ($this->religions as $key => $value) {
            Creligion::create(['religion_id' => $key, 'religion_name' => $value]);
        }
    }
}
