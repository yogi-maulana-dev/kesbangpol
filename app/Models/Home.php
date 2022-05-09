<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table = 'beritas';
    protected $with = ['categori'];

    //    protected $fillable = [
    //       'username',
    //         'email',
    //         'password',
    //         'nama',
    //     ];

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['cari']) ? $filters['cari'] : false) {
            return $query->where('title', 'like', '%' . $filters['cari'] . '%');
        }
    }

    public function categori()
    {
        return $this->belongsTo(Categori::class);
    }
}
