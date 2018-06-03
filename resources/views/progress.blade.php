@extends('layouts.apps')
@section('content')

    <center>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 40rem;">
                        <div class="card-header">
                            <h5 class="card-title">FORM REKAP DATA HARIAN</h5>
                        </div>
                        <form action="/add_progress" id="formEdit" method="post" enctype="multipart/form-data"
                              class="form-horizontal">
                            {{csrf_field()}}
                            <div class="card-body">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text" class=" form-control-label">Nama Pekerja:</label></div>
                                    <div class="col-9 col-md-9"><input type="text" id="name" name="name"
                                                                       placeholder="Masukkan nama anda" class="form-control">
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

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text"
                                                                     class=" form-control-label">Project:</label>
                                    </div>
                                    <div class="col-9 col-md-9"><select class="form-control" id="category_id" name="category_id"
                                                                        required>
                                            <option selected disabled>-Choose project-</option>
                                            @foreach($category as $c)
                                                <option value="{{$c->id}}">{{$c->project}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text"
                                                                     class=" form-control-label">SubProject:</label>
                                    </div>
                                    <div class="col-9 col-md-9"><select class="form-control" name="sub_categories" id="sub_categories"
                                                                        required>
                                            <option selected="selected" disabled>-Choose SubProject-</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text" class=" form-control-label">Target
                                            Project:</label></div>
                                    <div class="col-9 col-md-9"><input type="text" id="target" name="target"
                                                                       placeholder="Score" class="form-control">
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

    <script>
        jQuery(document).ready(function ($) {
            $('#category_id').on('change', function (e) {
                console.log(e);
                var cat_id = e.target.value;
                $.get('/listcategory?cat_id=' + cat_id, {option: $(this).val()}, function (returnJSON) {
                    console.log(returnJSON);
                    var model = $('#sub_categories');
                    model.empty();
                    $('#sub_categories').append('<option value="0" selected>-Choose SubProject-</option>');
                    $.each(returnJSON, function (index, obj) {
                        model.append('<option value="' + obj.id + '">' + obj.sub_category + '</option>');
                    });
                });
            });
        });
    </script>
@endsection