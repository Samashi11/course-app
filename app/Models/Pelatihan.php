<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\User;


class Pelatihan extends Model
{
    use HasFactory;

    protected $table = 'pelatihan';

    protected $fillable = [
        'nama',
        'email',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kursus()
    {
        return $this->belongsTo(Course::class, 'kursus_id');
    }
}