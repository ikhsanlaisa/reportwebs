@extends('layouts.apps')
@section('content')
    <center>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 33rem;">
                        <div class="card-header">
                            <h5 class="card-title">TAMBAH PROJECT BARU</h5>
                        </div>
                        <form action="/add_project" id="formEdit" method="post" enctype="multipart/form-data"
                              class="form-horizontal">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text" class=" form-control-label">Pemilik
                                            Project:</label></div>
                                    <div class="col-9 col-md-9"><input type="text" id="name" name="name"
                                                                       placeholder="Masukkan pemilik project" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text" class=" form-control-label">Nama
                                            Project:</label></div>
                                    <div class="col-9 col-md-9"><input type="text" id="project" name="project"
                                                                       placeholder="Masukkan project" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text" class=" form-control-label">Tanggal
                                            Project:</label></div>
                                    <div class="col-9 col-md-9"><input type="date" id="tgl_target"
                                                                       name="tgl_target"
                                                                       placeholder="Tanggal Tanding"
                                                                       class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer">
                                <center>
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 33rem;">
                        <div class="card-header">
                            <h5 class="card-title">TAMBAH SUB PROJECT BARU</h5>
                        </div>
                        <form action="/add_sub_project" id="formEdit" method="post" enctype="multipart/form-data"
                              class="form-horizontal">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text"
                                                                     class=" form-control-label">Project:</label>
                                    </div>
                                    <div class="col-9 col-md-9"><select class="form-control" name="category_id"
                                                                        required>
                                            <option selected disabled>-Choose Project-</option>
                                            @foreach($category as $c)
                                                <option value="{{$c->id}}">{{$c->project}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text" class=" form-control-label">Sub
                                            Project:</label></div>
                                    <div class="col-9 col-md-9"><input type="text" id="sub_category" name="sub_category"
                                                                       placeholder="Masukkan SubProject" class="form-control">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text" class=" form-control-label">Target
                                            SubProject:</label></div>
                                    <div class="col-9 col-md-9"><input type="text" id="target" name="target"
                                                                       placeholder="Masukkan target project" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <center>
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                </center>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </center>

@endsection