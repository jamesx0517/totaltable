<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{

  protected $table ='departments';
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


}
