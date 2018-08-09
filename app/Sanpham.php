<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    //
    protected $table = "sanpham";
    public $timestamps = false;

    public function loaisanpham(){
    	return $this->belongsTo('App\LoaiSanPham','id_loaisanpham','id');
    	//The rule is (<Name of Table>,<Foreign key>,<Primary key>)
    }

}
