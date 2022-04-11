<?php

namespace App\Models;

<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Dashboard extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
  protected $table = 'uploads';



//    protected $fillable = [
//       'username',
//         'email',
//         'password',
//         'nama',
//     ];

protected $guarded =['id'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}

 /**
     * Show the form for creating a new resource.
     * Whatapps 6289631031237
     * email : yogimaulana100@gmail.com
     * https://github.com/Ays1234
     * https://serbaotodidak.com/
     */


=======
=======
>>>>>>> 8fbaec3dd646f7da74b4d1adbefdda860d45ac7f
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;
}
<<<<<<< HEAD
>>>>>>> 8fbaec3dd646f7da74b4d1adbefdda860d45ac7f
=======
>>>>>>> 8fbaec3dd646f7da74b4d1adbefdda860d45ac7f
