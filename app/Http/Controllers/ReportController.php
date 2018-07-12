<?php

namespace App\Http\Controllers;

use App\Category;
use App\Report;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ReportController extends Controller
{
    public function progress(){
        $category = Category::all();
//        $subcategory = subcategory::all();
        return view('progress')->with(['category'=>$category]);
    }

    public function show(){
        $cat_id = Input::get('cat_id');
//        dd($cat_id);
        $cat = Subcategory::where('category_id', "=", $cat_id)->get();
        return response()->json($cat);
    }

    public function store_report(Request $request){
        $a = $request->input('sub_categories');
        $rp = Report::select('progress')->where('sub_category_id', '=',$a)->latest('progress')->first();
//        $c = $rp->progress;
//        dd($c);
//        dd($c);
        $report = new Report();
        $report->name = $request->input('name');
        $report->tgl = $request->input('tgl_target');
        $report->category_id = $request->input('category_id');
        $report->sub_category_id = $request->input('sub_categories');
        if ($rp == null ) {
            $report->progress = $request->input('target');
        }else{
            $report->progress = $rp->progress + $request->input('target');
        }
        $report->note = $request->input('note');
        $result = $report->save();
        if ($result){
            alert()->success('Progress Harian Berhasil di Tambahkan', 'Selamat')->persistent('Tutup');
            return redirect('/progress');
        }else{
            alert()->success('Progress Harian Gagal di Tambahkan', 'Gagal')->persistent('Tutup');
            return redirect('/progress');
        }
    }
}
