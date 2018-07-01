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
        $report  = Report::with('category', 'subcategory')->get();
//        dd($report);
        return view('dashboard')->with(['category'=> $category, 'report'=>$report]);
    }

    public function shows(Request $request){
        $cat_id = $request->input('cat_id');
//        $cat_id = $request->input('category_id');
        $sub_cat_id = Input::get('sub_cat');
        $report = Report::with('subcategory')->where('sub_category_id', $sub_cat_id)->get();
        return response()->json($report);
    }
}
