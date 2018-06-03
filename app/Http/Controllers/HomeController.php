<?php

namespace App\Http\Controllers;

use App\Category;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('dashboard')->with('category', $category);
    }

    public function shows(){
        $cat_id = Input::get('cat_id');
        $sub_cat_id = Input::get('sub_cat');
        $report = Report::where(['category_id'=>$cat_id])->get();
        dd($report);
//        return response()->json($report);
    }
}
