<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::latest()->get();

        return view("admin.blogs.index",compact("blogs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::latest()->get();
        return view("admin.blogs.create",compact("categories"));
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
            "category"=>"required",
            "name"=>"required",
            "text"=>"required",
        ]);


        Blog::create([
            "category_id"=>$request->category,
            "name"=>$request->name,
            "text"=>$request->text,
            "slug"=>\Str::slug($request->name),
        ]);

        return redirect()->route("admin.blogs.index")->withToastSuccess('Successfully Added!');
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
        $blog=Blog::findorfail($id);
        $categories=Category::latest()->get();

        return view("admin.blogs.edit",compact("blog","categories"));

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
        $blog=Blog::findorfail($id);

        $request->validate([
            "name"=>"required",
            "category"=>"required",
            "text"=>"required"
        ]);

        $blog->name=$request->name;
        $blog->category_id=$request->category;
        $blog->text=$request->text;
        $blog->slug=\Str::slug($request->name);
        $blog->update();

        return redirect()->route("admin.blogs.index")->withToastSuccess('Successfully Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog=Blog::findorfail($id);

        $blog->delete();

        return redirect()->route("admin.blogs.index")->withToastSuccess('Successfully Deleted!');


    }

    public function comments($id)
    {
        $blog=Blog::findorfail($id);
        

        $blogComments=$blog->comments()->latest()->get();

        return view("admin.blogs.comments",compact("blog","blogComments"));
    }


    public function destroyComment($id){

        $comment=BlogComment::findorfail($id);

        $comment->delete();

        return redirect()->back()->withToastSuccess('Successfully Deleted!');

    }
}
