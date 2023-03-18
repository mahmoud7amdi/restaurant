<?php

namespace App\Http\Controllers;

use App\Models\Beverages;
use App\Models\Breakfast;
use App\Models\Dinner;
use App\Models\Lunch;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index ()
    {
        $breakfast = Breakfast::all();
        $lunchs = Lunch::all();
        $beverages = Beverages::all();
        $dinners = Dinner::all();
        return view('show',[
            'breakfast' => $breakfast,
            'lunchs' => $lunchs,
            'dinners' => $dinners,
            'beverages' => $beverages
        ]);
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        return view('create',[

        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }
    
}
