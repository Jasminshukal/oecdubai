<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name="testimonial";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='testimonial';
        $testimonial=Testimonial::paginate(10);

        return view('Testimonial.index',compact('category_name','scrollspy_offset','has_scrollspy','page_name','testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name="testimonial";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='testimonial';
        $testimonial=new Testimonial();

        return view('Testimonial.add',compact('testimonial','category_name','scrollspy_offset','has_scrollspy','page_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:testimonials,student_name',
        ]);
        $university=new Testimonial();
        $university->student_name=$request->name;
        $university->university_detail=$request->university_detail;
        $university->description=$request->description;
        if($request->has('image'))
        {
            $fileName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/testimonial'), $fileName);
            $university->student_img=$fileName;
        }
        $university->save();
        return redirect()->route('Testimonial.index')->withSuccess('Added Testimonial SuccessFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function show(HomePage $homePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit($homePage)
    {
        $page_name="Edit Testimonial";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='Testimonial';
        $testimonial=Testimonial::find($homePage);
        return view('Testimonial.edit',compact('testimonial','category_name','scrollspy_offset','has_scrollspy','page_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$homePage)
    {
        $request->validate([
            'name'=>'required|unique:testimonials,student_name,'.$homePage.',id',
            'description'=>'required',
            'university_detail'=>'required',
        ]);
        $university=Testimonial::find($homePage);
        $university->student_name=$request->name;
        $university->university_detail=$request->university_detail;
        $university->description=$request->description;
        if($request->has('image'))
        {
            $fileName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/testimonial'), $fileName);
            $university->student_img=$fileName;
        }

        $university->save();
        return redirect()->route('Testimonial.index')->withSuccess('Update Testimonial SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy($homePage)
    {
        $HomePage=Testimonial::find($homePage);
        $HomePage->delete();
        \Session::flash('error', 'Testimonial Deleted Successfully!');
        return redirect(route('Testimonial.index'));
    }
}
