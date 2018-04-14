<?php

namespace App\Http\Controllers;


use App\Gallery;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Session;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('galleries.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required | max:255',
            'publication_status' => 'required'

        ]);


        $gallery = new Gallery();
        $gallery->title = $request->title;

//        if ($request->hasFile('image')) {
//
//            $image = $request->file('image');
//            $file_name = time() . '.' . $image->getClientOriginalExtension();
//            $location = public_path('gallery_images/' . $file_name);
//            Image::make($image)->save($location, 30);
//            $gallery->image = $file_name;
//        }


        $gallery->publication_status = $request->publication_status;
        $gallery->save();


        Session::flash('message', 'Data insert successfully');
        return redirect()->route('galleries.create');
    }

    public function publish_gallery($id)
    {
        $gallery = Gallery::where('id', $id)->update(['publication_status' => 1]);
        Session::flash('message', 'Gallery Image Published successfully');
        return redirect()->route('galleries.index',compact('gallery'));
    }

    public function unpublish_gallery($id)
    {
        $gallery = Gallery::where('id', $id)->update(['publication_status' => 0]);
        Session::flash('message', 'Gallery Image Un Published successfully');
        return redirect()->route('galleries.index',compact('gallery'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
//        $gallery = Gallery::all();
//        dd($gallery);
        return view('galleries.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $this->validate($request, [
            'title' => 'required | max:255',

            'publication_status' => 'required'

        ]);



        $gallery->title = $request->title;
//        if ($request->hasFile('image')) {
//            //add the new image
//            $image = $request->file('image');
//            $file_name = time() . "." . $image->getClientOriginalExtension();
//            $file_location = public_path('gallery_images/' . $file_name);
//            Image::make($image)->save($file_location, 90);
//            //get old file
//            $oldFilename = $gallery->image;
//            //update database
//            $gallery->image = $file_name;
//            //delete old file
//            unlink('gallery_images/'.$oldFilename);
//        }
        $gallery->publication_status = $request->publication_status;

        $gallery->update();

        Session::flash('message', 'Gallery Update Successfully');
        return redirect()->route('galleries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $gallery
     * @return \Illuminate\Http\Response
     */


    public function destroy(Gallery $gallery)
    {
        
        $gallery->delete();
//        if($gallery->image){
//            unlink('gallery_images/'.$gallery->image);
//        }

        Session::flash('message', 'Gallery Delete Successfully');
        return redirect()->route('galleries.index');
    }
}
