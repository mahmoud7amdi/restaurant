<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;

use App\Models\Lunch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LunchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lunches = Lunch::all();
        return view('admin.lunches.index' , compact('lunches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lunches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $image = $request->file('image')->store('/public/lunches');
        Lunch::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);
        return to_route('admin.lunches.index');
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
    public function edit(Lunch $lunch)
    {
        return view('admin.lunches.edit' ,compact('lunch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lunch $lunch)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        
        ]);
        $image = $lunch->image ;
        if($request->hasFile('image')){
            Storage::delete($lunch->image);
            $image = $request->file('image')->store('/public/lunches');
        }
        $lunch->update([
            'name'=>$request->name,
            'description' => $request->description,
            'image' => $image
        ]);
        return to_route('admin.lunches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lunch $lunch)
    {
        Storage::delete($lunch->image);
        $lunch->delete();
        return to_route('admin.lunches.index');

    }
}
