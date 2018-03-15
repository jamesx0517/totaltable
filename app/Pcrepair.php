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


  public function project(){

    return $this->hasone('App\project','id','project');

  }

  public function department(){

    return $this->hasone('App\department','id','pid');

  }

  public function it(){

    return $this->hasone('App\it','id','it');
                              //外來鍵 ,表內欄位
  }

  public function status(){

    return $this->hasone('App\status','id','status');
                              //外來鍵 ,表內欄位
  }
}
