<?php

namespace App\Http\Controllers;

use App\data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = data::all();
        return view('data')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new data();
        $data->title = $request->input('title');
        $data->description = $request->input('description');
        $data->ref_number = $request->input('ref_number');
        $data->date = $request->input('date');
        $data->area = $request->input('area');
        $data->status = $request->input('status');
        $data->note = $request->input('note');
        $result = $data->save();
        if ($result){
            alert()->success('Data Baru Berhasil di Tambahkan', 'Selamat')->persistent('Tutup');
            return redirect('/new/data');
        }else{
            alert()->success('Data Baru Gagal di Tambahkan', 'Gagal')->persistent('Tutup');
            return redirect('/new/data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\data  $data
     * @return \Illuminate\Http\Response
     */
//    public function show(data $data)
//    {
//        $data = data::find($data);
//    }

    public function shows($id)
    {
        $data = data::find($id);
        return json_encode($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = data::find($id);
        $data->title = $request->input('titles');
        $data->description = $request->input('descriptions');
        $data->ref_number = $request->input('ref_numbers');
        $data->date = $request->input('dates');
        $data->area = $request->input('areas');
        if ($request->input('statuss')) {
            $data->status = $request->input('statuss');
        }
        $data->note = $request->input('notes');
        $result = $data->save();
        if ($result){
            alert()->success('Update data Berhasil', 'Selamat')->persistent('Tutup');
            return redirect('/new/data');
        }else{
            alert()->success('Update data Gagal', 'Gagal')->persistent('Tutup');
            return redirect('/new/data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = data::find($id);
        $result = $data->delete();
        if ($result){
            alert()->success('Delete data Berhasil', 'Selamat')->persistent('Tutup');
            return redirect('/new/data');
        }else{
            alert()->success('Delete data Gagal', 'Gagal')->persistent('Tutup');
            return redirect('/new/data');
        }
    }
}
