<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;

use App\Models\Dinner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dinners = Dinner::all() ;
        return view('admin.dinners.index', compact('dinners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dinners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $image = $request->file('image')->store('/public/dinners');
        Dinner::create([
            'name' => $request->name ,
            'description' => $request->description,
            'image' => $image
        ]);
        return to_route('admin.dinners.index');
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
    public function edit(Dinner $dinner)
    {
        return view('admin.dinners.edit', compact('dinner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dinner $dinner)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $image = $dinner->image;
        if($request->hasFile('image')){
            Storage::delete($dinner->image);
            $image = $request->file('image')->store('/public/dinners');

        }
        $dinner->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);
        return to_route('admin.dinners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dinner $dinner)
    {
        Storage::delete($dinner->image);
        $dinner->delete();
        return to_route('admin.dinners.index');
    }
}
