<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeftBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LeftBarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leftBars=LeftBar::latest()->get();

        return view("admin.left-bars.index",compact("leftBars"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.left-bars.create");
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
            "link"=>"required",
            "image"=>"required",
            "description"=>"required"
        ]);


        $leftBar=LeftBar::create([
            "link"=>$request->link,
            "description"=>$request->description
        ]);

        if($request->hasFile("image")){
            $path=$request->file("image")->store("left-bars");

            $leftBar->update([
                "image"=>basename($path)
            ]);
        }


        return redirect()->route("admin.left-bars.index")->withToastSuccess("Added Succefully");


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
        $leftBar=LeftBar::findorfail($id);

        return view("admin.left-bars.edit",compact("leftBar"));
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

        $leftBar=LeftBar::findorfail($id);


        $request->validate([
            "link"=>"required",
            "description"=>"required"
        ]);

        $leftBar->update([
            "link"=>$request->link,
            "description"=>$request->description
        ]);


        if($request->hasFile("image")){

            if($leftBar->image){
                Storage::delete("left-bars/".$leftBar->image);
            }

            $path=$request->file("image")->store("left-bars");

            $leftBar->update([
                "image"=>basename($path)
            ]);
        }


        return redirect()->route("admin.left-bars.index")->withToastSuccess("Updated Succefully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leftBar=LeftBar::findorfail($id);

        Storage::delete("left-bars/".$leftBar->image);

        $leftBar->delete();

        return redirect()->route("admin.left-bars.index")->withToastSuccess("Deleted Succefully");
    }
}
