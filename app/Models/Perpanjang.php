<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Perpanjang extends Authenticatable
{
    use HasFactory;

    protected $table = 'perpanjangan';

    //    protected $fillable = [
    //       'username',
    //         'email',
    //         'password',
    //         'nama',
    //     ];

    protected $guarded = ['id'];
}
