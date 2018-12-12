<?php

use Illuminate\Database\Seeder;

use App\Cblood;

class CBloodsTableSeeder extends Seeder
{
    private $bloods = [
        '01'=> 'A',
        '02'=> 'AB',
        '03'=> 'B',
        '04'=> 'O'
    ];
    public function run()
    {
        DB::table('cbloods')->delete();
        foreach ($this->bloods as $key => $value) {
            Cblood::create(['blood_id' => $key, 'blood_name' => $value]);
        }
    }
}
