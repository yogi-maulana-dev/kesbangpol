<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
        protected $table = 'users';
    use HasFactory;



    // protected $fillable = [
    //     'username',
    //     'email',
    //     'password',
    //     'nama',
    // ];

    protected $guarded =['id'];
}
