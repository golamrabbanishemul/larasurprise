<?php

namespace App\Http\Controllers;

use App\Category;
use App\Gallery;
use App\GalleryPost;
use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
       $category = Category::where('id',$id)->first();
       $sub_categories = Category::where('parent_category',$id)->with('ds')->get();
//       dd($category);
//       $posts = Post::where('category_id',$id)->where('publication_status',1)->get();
       $galleries= Gallery::with('gallery_posts')->where('publication_status',1)->get();

       if(strtolower($category->name) == 'image gallery'){
           return view('pages.gallery_page',compact('category','galleries'));
       }
       return view('pages.category_page',compact('category','sub_categories','posts'));
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
