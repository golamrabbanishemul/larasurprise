<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required | max:255',
            'image' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'publication_status' => 'required'

        ]);


        $post = new Post();
        $post->title = $request->title;

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $file_name = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $file_name);
            Image::make($image)->resize(540,269)->save($location, 50);
            $post->image = $file_name;
        }

        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->publication_status = $request->publication_status;
        $post->save();


        Session::flash('message', 'Data insert successfully');
        return redirect()->route('posts.create');
    }

    public function publish_post($id)
    {
        $post = Post::where('id', $id)->update(['publication_status' => 1]);
        Session::flash('message', 'Post Published successfully');
        return redirect()->route('posts.index')->withPost($post);
    }

    public function unpublish_post($id)
    {
        $post = Post::where('id', $id)->update(['publication_status' => 0]);
        Session::flash('message', 'Post Un Published successfully');
        return redirect()->route('posts.index')->withPost($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required | max:255',
            'image' => 'sometimes',
            'description' => 'required',
            'category_id' => 'required',
            'publication_status' => 'required'

        ]);


        $post->title = $request->title;
        if ($request->hasFile('image')) {
            //add the new image
            $image = $request->file('image');
            $file_name = time() . "." . $image->getClientOriginalExtension();
            $file_location = public_path('images/' . $file_name);
            Image::make($image)->resize(540,269)->save($file_location, 90);
            //get old file
            $oldFilename = $post->image;
            //update database
            $post->image = $file_name;
            //delete old file
            unlink('images/' . $oldFilename);
        }

        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->publication_status = $request->publication_status;
        $post->update();

        Session::flash('message', 'Post Update Successfully');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $post->delete();
        if ($post->image) {
            unlink('images/' . $post->image);
        }
        Session::flash('message', 'Post Delete Successfully');
        return redirect()->route('posts.index');
    }
}
