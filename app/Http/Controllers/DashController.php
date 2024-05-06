<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;


class DashController extends Controller
{
    //
    public function index()
    {
        

        $course = Course::all();
        $kategori = Category::all();

        return view('welcome', compact('course','kategori'));
    }

    public function admin() {

        $kategori = Category::all();
        $kursus = Course::all();

        return view('dashboard',  compact('kategori', 'kursus'));
    }

    public function user() {

        $kategori = Category::all();
        $course = Course::all();

        return view('welcome', compact('kategori', 'course'));
    }
}
