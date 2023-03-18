<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Breakfast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\BreakLine;

class BreakfastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breakfasts = Breakfast::all();
        return view('admin.breakfasts.index', compact('breakfasts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.breakfasts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $image = $request->file('image')->store('/public/breakfasts');
        Breakfast::create([
            'name' => $request->name ,
            'description' => $request->description,
            'image' => $image
        ]);
        return to_route('admin.breakfasts.index');
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
    public function edit(Breakfast $breakfast)
    {
        return view('admin.breakfasts.edit', compact('breakfast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Breakfast $breakfast)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $image = $breakfast->image;
        if($request->hasFile('image')){
            Storage::delete($breakfast->image);
            $image = $request->file('image')->store('/public/breakfasts');

        }
        $breakfast->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);
        return to_route('admin.breakfasts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Breakfast $breakfast)
    {
        Storage::delete($breakfast->image);
        $breakfast->delete();
        return to_route('admin.breakfasts.index');
    }
}
