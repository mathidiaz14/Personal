<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\People;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $peoples = People::where('name', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('description', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('phone', 'LIKE', '%'.$request->search.'%')
                        ->orWhere('email', 'LIKE', '%'.$request->search.'%')
                        ->get();
        
        return view('search', compact('peoples'));
    }
}
