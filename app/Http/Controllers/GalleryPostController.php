<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\GalleryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Image;

class GalleryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleryPosts = GalleryPost::latest()->get();
        return view('gallery_posts.index',compact('galleryPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $galleries = Gallery::all();
        return view('gallery_posts.create',compact('galleries'));
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
            'title' => 'sometimes | max:255',
            'image' => 'required',
            'gallery_id' => 'required',
            'publication_status' => 'required'

        ]);


        $galleryPost = new GalleryPost();
        $galleryPost->title = $request->title;
        $galleryPost->gallery_id = $request->gallery_id;

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $file_name = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('gallery_images/' . $file_name);
            Image::make($image)->save($location);
            $galleryPost->image = $file_name;
        }


        $galleryPost->publication_status = $request->publication_status;
        $galleryPost->save();


        Session::flash('message', 'Data insert successfully');
        return redirect()->route('gposts.create');
    }

    public function publish_galleryPost($id)
    {
        $galleryPost = GalleryPost::where('id', $id)->update(['publication_status' => 1]);
        Session::flash('message', 'Gallery Image Published successfully');
        return redirect()->route('gposts.index',compact('galleryPost'));
    }

    public function unpublish_galleryPost($id)
    {
        $galleryPost = GalleryPost::where('id', $id)->update(['publication_status' => 0]);
        Session::flash('message', 'Gallery Image Un Published successfully');
        return redirect()->route('gposts.index',compact('galleryPost'));
    }


    public function show(GalleryPost $galleryPost)
    {
        //
    }


    public function edit($id)
    {
       $galleryPost = GalleryPost::find($id);
        $galleries = Gallery::all();
        return view('gallery_posts.edit',compact('galleryPost','galleries'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'sometimes | max:255',
            'image' => 'sometimes',
            'gallery_id' => 'required',
            'publication_status' => 'required'

        ]);
        $galleryPost = GalleryPost::findOrFail($id);
        $galleryPost->title = $request->title;
        $galleryPost->gallery_id = $request->gallery_id;
        if ($request->hasFile('image')) {
            //add the new image
            $image = $request->file('image');
            $file_name = time() . "." . $image->getClientOriginalExtension();
            $file_location = public_path('gallery_images/' . $file_name);
            Image::make($image)->save($file_location, 90);
            //get old file
            $oldFilename = $galleryPost->image;
            //update database
            $galleryPost->image = $file_name;
            //delete old file
            unlink('gallery_images/'.$oldFilename);
        }
        $galleryPost->publication_status = $request->publication_status;

        $galleryPost->update();

        Session::flash('message', 'Gallery Image Update Successfully');
        return redirect()->route('gposts.index');
    }


    public function destroy(GalleryPost $galleryPost)
    {

        $galleryPost->delete();
        if($galleryPost->image){
            unlink('gallery_images/'.$galleryPost->image);
        }

        Session::flash('message', 'Gallery Image Delete Successfully');
        return redirect()->route('gposts.index');

    }
}
