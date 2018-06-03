<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function IndexProject(){
        $category = Category::all();
//        dd($category);
        return view('project')->with('category', $category);
    }

    public function store_project(Request $request){
        $category = new Category();
        $category->nama = $request->input('name');
        $category->project = $request->input('project');
        $category->tgl_target = $request->input('tgl_target');
        $result = $category->save();
        if ($result){
            alert()->success('Project Baru Berhasil di Tambahkan', 'Selamat')->persistent('Tutup');
            return redirect('/new/project');
        }else{
            alert()->success('Project Baru Gagal di Tambahkan', 'Gagal')->persistent('Tutup');
            return redirect('/new/project');
        }
    }

    public function store_category(Request $request){
        $subcategory = new SubCategory();
        $subcategory->category_id = $request->input('category_id');
        $subcategory->sub_category = $request->input('sub_category');
        $subcategory->target = $request->input('target');
        $result = $subcategory->save();
        if ($result){
            alert()->success('Sub Project Baru Berhasil di Tambahkan', 'Selamat')->persistent('Tutup');
            return redirect('/new/project');
        }else{
            alert()->success('Sub Project Baru Gagal di Tambahkan', 'Gagal')->persistent('Tutup');
            return redirect('/new/project');
        }
    }
}
