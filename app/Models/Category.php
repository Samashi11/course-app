<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'nama_kategori',
    ];

    public $timestamps = false;

    public function course()
    {
        // bisa dimiliki oleh banyak
        return $this->hasMany(Course::class, 'kategori_id', 'id');
    }
}
