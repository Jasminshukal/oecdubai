<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use Illuminate\Http\Request;
use Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::all();
        $page_name="Event";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='blogs';
        return view('blog.index',compact('blogs','page_name','has_scrollspy','scrollspy_offset','category_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events=Event::all();
        $page_name="Event";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='events';
        return view('blog.add',compact('events','page_name','has_scrollspy','scrollspy_offset','category_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = time().'.'.$request->image_file->getClientOriginalExtension();
        $request->image_file->move(public_path('images/events'), $fileName);
        $request->request->remove('image');
        $request->request->set('image', $fileName);
        $event=Blog::create($request->all());
        Session::flash('message', __('blog.success'));
        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $page_name="Event";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='events';
        return view('blog.edit',compact('blog','page_name','has_scrollspy','scrollspy_offset','category_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->request->remove('_method');
        $request->request->remove('_token');
        if($request->has('image_file'))
        {
            $fileName = time().'.'.$request->image_file->getClientOriginalExtension();
            $request->image_file->move(public_path('images/events'), $fileName);
            $request->request->remove('image');

            $request->request->set('image', $fileName);
        }
        else
        {
            $request->request->set('image', 'default.jpg');

        }
        // $event=Blog::create($request->all());
        $affectedRows = Blog::where("id",$blog->id)->update($request->all());

        Session::flash('message', "Blog Updated Successfully");
        return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
