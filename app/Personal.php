<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $guarded = [];

    public function storeImg($img,$personal)
    {
    	//dd($img, $personal);
    	$img_name = $img->getClientOriginalName();
    	$new_img_name = 'img-personal-'. time() . '.' . $img->getClientOriginalExtension();
    	$destinationPath = public_path('/storage/personalImages/');
    	$img->move($destinationPath,$new_img_name);

    	PersonalImg::create([
    		'personal_id' => $personal->id,
    		'original_name' => $img_name,
    		'new_name' => $new_img_name
    	]);
    	return true;
    }
}
