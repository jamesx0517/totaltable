<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
  protected $table ='projects';
 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
     'name',

 ];

 /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
 protected $hidden = [

 ];
 public function PcrepairToProject(){

   return $this->belongsTo('App\Pcrepair','project','id');
                             //外來鍵 ,表內欄位
 }
}
