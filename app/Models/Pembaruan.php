<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pembaruan extends Authenticatable
{
    use HasFactory;

    protected $table = 'pembaruan';

    //    protected $fillable = [
    //       'username',
    //         'email',
    //         'password',
    //         'nama',
    //     ];

    protected $guarded = ['id'];
}
