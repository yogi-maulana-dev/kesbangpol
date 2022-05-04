<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    //    protected $fillable = [
    //       'username',
    //         'email',
    //         'password',
    //         'nama',
    //     ];

    protected $guarded = ['id'];

    public function categori()
    {
        return $this->belongsTo(Categori::class);
    }
}
