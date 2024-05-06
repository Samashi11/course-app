<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public $categories;
     public function __construct()
     {
         $this->categories = new Category();
     }
    public function index()
    {
        //
        $kategori = Category::all();

        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $rules = [
        'nama_kategori' => 'required|min:3|max:30|unique:categories'
    ];
    $messages = [
        'required' => ":attribute gak Boleh Kosong Maszeeh",
        'min' => ":attribute minimal harus 3 huruf",
        'max' => ":attribute maximal harus 20 huruf",
        'unique' => ":attribute sudah digunakan, mohon ganti"

    ];

    $this->validate($request, $rules, $messages);

    $this->categories->nama_kategori = $request->nama_kategori;
    $this->categories->save();

    return redirect()->route('kategori.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
    $kategori = Category::findOrFail($id);

    $kategori->delete();

    return redirect()->route('kategori.index');
    }
}