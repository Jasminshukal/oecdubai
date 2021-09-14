<?php

namespace App\Http\Controllers;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use App\Models\Event;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries=Gallery::all();
        $page_name="Gallery";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='gallery';

        return view('gallery.index',compact('galleries','page_name','has_scrollspy','scrollspy_offset','category_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events=Gallery::all();
        $page_name="Gallery";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='gallery';
        return view('gallery.add',compact('events','page_name','has_scrollspy','scrollspy_offset','category_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $fileName = time().'.'.$request->image_file->getClientOriginalExtension();
        $request->image_file->move(public_path('images/gallery'), $fileName);
        $request->request->set('image', "images/gallery/".$fileName);
        $event=Gallery::create($request->all());
        \Session::flash('message', __('gallery.success'));
        return redirect(route('gallery.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        delete_file(public_path($gallery->image));
        $gallery->delete();
        \Session::flash('message', __('gallery.delete'));
        return response()->json([
            'status' => '1',
            'massage' => __('gallery.delete'),
        ]);
    }
}
