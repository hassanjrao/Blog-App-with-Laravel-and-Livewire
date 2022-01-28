<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RightBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RightBarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rightBars = RightBar::latest()->get();

        return view("admin.right-bars.index", compact("rightBars"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.right-bars.create");
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
            "link" => "required",
            "image" => "required",
            "description" => "required"
        ]);


        $rightBar = RightBar::create([
            "link" => $request->link,
            "description" => $request->description
        ]);

        if ($request->hasFile("image")) {
            $path = $request->file("image")->store("right-bars");

            $rightBar->update([
                "image" => basename($path)
            ]);
        }


        return redirect()->route("admin.right-bars.index")->withToastSuccess("Added Succefully");
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
        $rightBar = RightBar::findorfail($id);

        return view("admin.right-bars.edit", compact("rightBar"));
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

        $rightBar = RightBar::findorfail($id);


        $request->validate([
            "link" => "required",
            "description" => "required"
        ]);

        $rightBar->update([
            "link" => $request->link,
            "description" => $request->description
        ]);


        if ($request->hasFile("image")) {

            if ($rightBar->image) {
                Storage::delete("right-bars/" . $rightBar->image);
            }

            $path = $request->file("image")->store("right-bars");

            $rightBar->update([
                "image" => basename($path)
            ]);
        }


        return redirect()->route("admin.right-bars.index")->withToastSuccess("Updated Succefully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rightBar = RightBar::findorfail($id);

        Storage::delete("right-bars/" . $rightBar->image);

        $rightBar->delete();

        return redirect()->route("admin.right-bars.index")->withToastSuccess("Deleted Succefully");
    }
}
