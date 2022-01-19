<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name="HomePage";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='HomePage';
        $HomePage=HomePage::paginate(10);
        return view('home_page.index',compact('category_name','scrollspy_offset','has_scrollspy','page_name','HomePage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $page_name="HomePage";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='HomePage';
        $universities=new HomePage();

        return view('home_page.add',compact('universities','category_name','scrollspy_offset','has_scrollspy','page_name'));
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
            'name'=>'required|unique:home_pages,entity_name',
        ]);
        $university=new HomePage();
        $university->entity_name=$request->name;
        if($request->has('image'))
        {
            $fileName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/home_page'), $fileName);
            $university->entity_image=$fileName;
        }
        $university->save();
        return redirect()->route('HomePage.index')->withSuccess('Added SuccessFully');
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
        $page_name="Edit Home Page";
        $has_scrollspy=0;
        $scrollspy_offset='';
        $category_name='HomePage';
        $universities=HomePage::find($homePage);
        return view('home_page.edit',compact('universities','category_name','scrollspy_offset','has_scrollspy','page_name'));
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
            'name'=>'required|unique:home_pages,entity_name,'.$homePage.',id',
        ]);
        $university=HomePage::find($homePage);
        $university->entity_name=$request->name;
        if($request->has('image'))
        {
            $fileName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/home_page'), $fileName);
            $university->entity_image=$fileName;
        }
        $university->save();
        return redirect()->route('HomePage.index')->withSuccess('Update SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy($homePage)
    {
        $HomePage=HomePage::find($homePage);
        $HomePage->delete();
        \Session::flash('error', 'University Deleted Successfully!');
        return redirect(route('HomePage.index'));
    }
}
