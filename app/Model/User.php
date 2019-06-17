<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table="user";
    protected $primarykey="id";
    protected $fillable=['name','phone','email','updated_at','deleted_at'];
}
