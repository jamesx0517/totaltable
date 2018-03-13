<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pcrepair extends Model
{

   protected $table ='pcrepairs';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'date',
      'uid',
      'pid',
      'category',
      'project',
      'nature',
      'note',
      'enddate',
      'status',
      'it',
      'title',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [

  ];

  public function uid(){

    return $this->hasone('App\User','id','uid');

  }

  public function category(){

    return $this->hasone('App\category','id','category');

  }
}
