<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public $course;
     public function __construct()
     {
         $this->course = new Course();
     }

    public function index()
    {
        $kursus = Course::all();
        $kategori = Category::all();

        return view('kursus.index', compact('kursus', 'kategori'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Category::all();

        return view('kursus.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3|max:30',
            'mentor' => 'required|min:3|max:30',
            'desc' => 'required|min:3|max:1000',
            'cost' => 'required|min:2|max:30',
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('kursus.create')
                            ->withErrors($validator)
                            ->withInput();
        }

        $this->course->course_name = $request->nama;
        $this->course->course_trainer = $request->mentor;
        $this->course->course_description = $request->desc;
        $this->course->cost = $request->cost;
        $this->course->kategori_id = $request->kategori;
        $this->course->save();

        return redirect()->route('kursus.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kursus = Course::findOrFail($id);
        $kategori = Category::all();

        return view('kursus.edit', compact('kursus', 'kategori'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $kursus = Course::findOrFail($id);

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3|max:30',
            'mentor' => 'required|min:3|max:30',
            'desc' => 'required|min:3|max:1000',
            'cost' => 'required|min:2|max:30',
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('kursus.create')
                            ->withErrors($validator)
                            ->withInput();
        }

        $kursus->course_name = $request->nama;
        $kursus->course_trainer = $request->mentor;
        $kursus->course_description = $request->desc;
        $kursus->cost = $request->cost;
        $kursus->kategori_id = $request->kategori;

        $kursus->update();

        return redirect()->route('kursus.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $kursus = Course::findOrFail($id);

    $kursus->delete();

    return redirect()->route('kursus.index');
    }
}
