<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    protected $fillable = ['firstName', 'user_id', 'email', 'sex', 'note'];
    protected $date = ['delete_at'];
    public  function user_id(){
        return $this->hasOne('App\user','id','user_id');
    }
}
