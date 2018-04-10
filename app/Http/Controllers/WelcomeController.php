<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
//    private function categories()
//    {
//        $menus= Category::where('parent_category',0)->get();
//        foreach ($menus as $menu){
//            $category= $menu->id;
//        }
//        $subcategories= Category::where('parent_category',$category)->get();
//        foreach ($subcategories as $subcategory){
//            $subcategory= $subcategory->id;
//        }
//
//        $subsubcategories= Category::where('parent_category',$subcategory->id)->get();
//
//    }

    public function index()
    {
//        $menus= Category::with('children')->get();
//dd($menus);
//        $submenu = Category::where('id',children()->parent_category)->get();

        $cat1 = Category::where('position',1)->where('publication_status',1)->first();
        $cat2 = Category::where('position',2)->where('publication_status',1)->first();
        $cat3 = Category::where('position',3)->where('publication_status',1)->first();
        $cat4 = Category::where('position',4)->where('publication_status',1)->first();
        $cat5 = Category::where('position',5)->where('publication_status',1)->first();
        $cat6 = Category::where('position',6)->where('publication_status',1)->first();


       return view('pages.main_content',
           compact('cat1',
               'cat2',
               'cat3','cat4','cat5','cat6'
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
