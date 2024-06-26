<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Pelatihan;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'course_name',
        'course_trainer',
        'course_description',
        'cost',
        'kategori_id',
    ];

    public $timestamps = true;


    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function pelatihan()
    {
        return $this->hasMany(Pelatihan::class, 'kursus_id');
    }
}
