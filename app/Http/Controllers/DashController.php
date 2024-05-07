<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;

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
        $pelatihan = Pelatihan::all();
        $user = User::all();

        return view('dashboard',  compact('kategori', 'pelatihan', 'kursus', 'user'));
    }

    public function user() {

        $kategori = Category::all();
        $course = Course::all();
        $pelatihan = Pelatihan::all();

        return view('welcome', compact('kategori', 'pelatihan', 'course'));
    }


    public function form($id)
    {

        $kategori = Category::all();
        $user = User::all();
        $course = Course::findOrFail($id);

        return view('regist', compact('kategori', 'course', 'user'));
    }
    public function regist(Request $request)
    {

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'namas' => 'required|min:3|max:30',
            'email' => 'required|email|min:3|max:30',
            'user_id' => 'required|integer',
            'kursus_id' => 'required|integer',
            'tgl_beli' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin')
                        ->withErrors($validator)
                        ->withInput();
        }


        // Mencari user berdasarkan nama
        // $user = User::where('name', $request->namas)->first();
        // Jika user tidak ditemukan, dapatkan ID user dari model User yang baru
        // $user_id = $user ? $user->id : null;

        // Mencari kursus berdasarkan nama kursus
        // $kursus = Course::where('course_name', $request->kursus)->first();
        // Jika kursus tidak ditemukan, dapatkan ID kursus dari model Course yang baru
        // $kursus_id = $kursus ? $kursus->id : null;

        // $pelatihan = new Pelatihan();
        // $pelatihan->nama = $request->namas;
        // $pelatihan->email = $request->email;
        // $pelatihan->user_id = $request->user_id;
        // $pelatihan->kursus_id = $request->kursus_id;
        // $pelatihan->tgl_beli = $request->tgl_beli;

        $regist = Pelatihan::create([
            'nama' => $request->namas,
            'email' => $request->email,
            'user_id' => $request->user_id,
            'kursus_id' => $request->kursus_id,
            'tgl_beli' => $request->tgl_beli,
        ]);

        // $regist->save();

        return redirect()->route('users');
    }
}