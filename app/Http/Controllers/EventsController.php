<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Event::all();
        $page_name="events";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='events';
        return view('events.index',compact('events','page_name','has_scrollspy','scrollspy_offset','category_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name="Event";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='events';
        return view('events.add',compact('page_name','has_scrollspy','scrollspy_offset','category_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        $fileName = time().'.'.$request->image_file->getClientOriginalExtension();
        $request->image_file->move(public_path('images/events'), $fileName);
        $request->request->remove('image');
        $request->request->set('image', "images/events/".$fileName);
        $event=Event::create($request->all());
        \Session::flash('message', __('gallery.success'));
        return redirect(route('event.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\events  $events
     * @return \Illuminate\Http\Response
     */
    public function show(events $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\events  $events
     * @return \Illuminate\Http\Response
     */
    public function edit($Events)
    {
        $event=Event::find($Events);
        $page_name="Event Edit";
        $has_scrollspy=false;
        $scrollspy_offset = false;
        $category_name = "Start_kit";
        return view('events.edit',compact('page_name','event','has_scrollspy','category_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request,$events)
    {
        $event=Event::find($events);
        $event->fill($request->all())->save();
        \Session::flash('message', __('gallery.update'));
        return redirect(route('gallery.index'));
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\events  $events
     * @return \Illuminate\Http\Response
     */
    public function destroy(events $events)
    {
        //
    }
}
