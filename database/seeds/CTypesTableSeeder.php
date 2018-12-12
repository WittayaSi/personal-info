<?php

use Illuminate\Database\Seeder;
use App\Ctype;

class CTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $types = [
        '01'=>'ข้าราชการ',
        '02'=>'ลูกจ้างประจำ',
        '03'=>'พนักงานราชการ'
    ];
    public function run()
    {
        DB::table('ctypes')->delete();

        foreach ($this->types as $key=>$value) {
            Ctype::create(['type_id' => $key, 'type_name'=>$value]);
        }
        
    }
}

