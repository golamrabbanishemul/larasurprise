<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Image;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('categories.index', compact('categories'));
    }

    public function parent_category()
    {
        $parent_category = Category::where('parent_category', 0)->get();
        return response()->json($parent_category);
    }

    public function sub_category($id)
    {
        $sub_categories = DB::select(DB::raw("SELECT sc.name as sub_category_name, sc.id as sub_category_id FROM categories sc JOIN categories c ON c.id=sc.parent_category WHERE sc.parent_category = $id"));
        return response()->json($sub_categories);

    }
    public function sub_subcategory($id)
    {

        $sub_subcategories = DB::select(DB::raw("SELECT sc.name as sub_subcategory_name, sc.id as sub_subcategory_id FROM categories sc JOIN categories c ON c.id=sc.parent_category WHERE sc.parent_category = $id"));
        return response()->json($sub_subcategories);

    }


    public function create()
    {
        $parent_categories = Category::where('parent_category', 0)->get();
        return view('categories.create', compact('parent_categories'));
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
            'name' => 'required|max:255',
            'title' => 'sometimes|max:255',
            'description' => 'sometimes',
            'image' => 'sometimes',
            'publication_status' => 'required',
            'position' => 'sometimes'
        ]);
        $category = new Category();
        $category->name = strtolower($request->name);
        $category->title = $request->title;
        $subsub = $request->sub_subcategory;
        $sub = $request->sub_category;
        $parent = $request->parent_category;
        if($subsub){
            $categoryid =$request->sub_subcategory;
        }
        elseif ($sub) {
            $categoryid = $request->sub_category;
        } elseif ($parent) {
            $categoryid = $request->parent_category;
        } else {
            $categoryid = 0;
        }

        $category->parent_category = $categoryid;
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $file_name = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('../images/' . $file_name);
            Image::make($image)->resize(540,269)->save($location, 90);
            $category->image = $file_name;
        }
        $category->description = $request->description;
        $category->position = $request->position;
        $category->publication_status = $request->publication_status;
        $category->save();

        Session::flash('message', 'Category Insert Successfully ');

        return redirect()->route('category.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $allcat = $category::all();
        return view('categories.edit', compact('category', 'allcat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'title' => 'sometimes|max:255',
            'parent_cat' => 'required',
            'description' => 'sometimes',
            'position' => 'sometimes',
            'image' => 'sometimes',
            'publication_status' => 'required'
        ]);


        $category->name = strtolower($request->name);
        $category->title = $request->title;

        $category->parent_category = $request->parent_cat;
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $file_name = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('../images/' . $file_name);
            Image::make($image)->resize(540,269)->save($location, 90);
            $old = $category->image;
            $category->image = $file_name;
            if ($old) {
                unlink('images/' . $old);
            }
        }

        $category->position = $request->position;
        $category->description = $request->description;
        $category->publication_status = $request->publication_status;

        $category->save();

        $request->session()->flash('message', 'Category Update Successfully ');

        return redirect()->route('category.index');

    }

    public function publish_category($id)
    {
        $post = Category::where('id', $id)->update(['publication_status' => 1]);
        Session::flash('success', 'Category Published successfully');
        return redirect()->route('category.index')->withPost($post);
    }

    public function unpublish_category($id)
    {
        $post = Category::where('id', $id)->update(['publication_status' => 0]);
        Session::flash('success', 'Category Un Published successfully');
        return redirect()->route('category.index')->withPost($post);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        if ($category->image) {
            unlink('images/' . $category->image);
        }
        Session::flash('message', 'Category Delete Successfully');
        return redirect()->route('category.index');
    }
}
