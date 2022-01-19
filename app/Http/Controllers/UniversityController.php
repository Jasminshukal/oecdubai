<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUniversity;
use App\Http\Requests\EditUniversity;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name="University";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='university';
        $university=University::paginate(10);
        return view('university.index',compact('category_name','scrollspy_offset','has_scrollspy','page_name','university'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name="University";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='university';
        return view('university.add',compact('category_name','scrollspy_offset','has_scrollspy','page_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUniversity $request)
    {
        University::create($request->all());
        return redirect(route('university.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        $page_name="University";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='university';
        return view('university.view',compact('category_name','scrollspy_offset','has_scrollspy','page_name','university'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {
        $page_name="University";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='university';
        return view('university.edit',compact('category_name','scrollspy_offset','has_scrollspy','page_name','university'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(EditUniversity $request, University $university)
    {
        $affectedRows = University::where("id",$university->id)->update($request->except('_token','_method'));
        $page_name="University";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='university';
        return redirect(route('university.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        $university->delete();
        \Session::flash('error', 'University Deleted Successfully!');
        return redirect(route('university.index'));
    }
}
