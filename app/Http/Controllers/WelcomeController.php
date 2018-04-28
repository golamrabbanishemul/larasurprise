<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{


    public function index()
    {
$home= Category::where('name','Home')->where('publication_status',1)->first();
        $cat1 = Category::where('position',1)->where('publication_status',1)->first();
        $cat2 = Category::where('position',2)->where('publication_status',1)->first();
        $cat3 = Category::where('position',3)->where('publication_status',1)->first();
        $cat4 = Category::where('position',4)->where('publication_status',1)->first();
        $cat5 = Category::where('position',5)->where('publication_status',1)->first();
        $cat6 = Category::where('position',6)->where('publication_status',1)->first();

$services= Category::where('parent_category',2)->with('ds')->get();
//dd($service);
       return view('pages.main_content',
           compact('cat1',
               'cat2',
               'cat3','cat4','cat5','cat6','home','services'
           ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
