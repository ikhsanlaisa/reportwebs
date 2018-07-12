@extends('layouts.apps')
@section('content')
    <div class="content mt-4">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-inline btn-success btn-sm ladda-button"
                                    title="edit" name="button"
                                    data-toggle="modal" data-target="#modaledit"><span
                                        class="fa fa-edit"></span>Tambah Data</button>
                            {{--<button type="button" class="btn btn-primary">Primary</button>--}}
                        </div>
                        @if(!empty($data))
                            <div class="card-body">
                                <table id="bootstrap-data-table"
                                       class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Ref. RFI No</th>
                                        <th>Date</th>
                                        <th>Area</th>
                                        <th>Status</th>
                                        <th>Remake</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1?>
                                    @foreach($data as $d)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$d->title}}</td>
                                            <td>{{$d->description}}</td>
                                            <td>{{$d->ref_number}}</td>
                                            <td>{{$d->date}}</td>
                                            <td>{{$d->area}}</td>
                                            <td>{{$d->status}}</td>
                                            <td>{{$d->note}}</td>
                                            <td>
                                                <center>
                                                    <form action="/deletedata/{{$d->id}}" method="post" >
                                                        {{csrf_field()}}
                                                        <input type="hidden" name="_method" value="delete">
                                                        <button type="button" class="btn btn-inline btn-success btn-sm ladda-button"
                                                                onclick="showModal({{ $d->id }})" title="edit" name="button"
                                                                data-toggle="modal" data-target="#modaledit1"><span
                                                                    class="fa fa-edit"></span></button>

                                                        <button type="delete" name="delete" id="btnhapus" value="delete" class="btn btn-inline btn-danger btn-sm ladda-button" onclick="return confirm('Are you sure to delete this data');"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <?php ;?>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade"
         id="modaledit"
         tabindex="-1"
         role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            {{--<div class="col-12">--}}
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                </div>
                <form id="formEdit" action="/add_data" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{--<input type="hidden" name="_method" value="put">--}}

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Title:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Item Description:</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="description" id="description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Ref. RFI No:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ref_number" id="ref_number">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text" class=" form-control-label">Date:</label></div>
                            <div class="col-9 col-md-9"><input type="date" id="date"
                                                               name="date"
                                                               placeholder="Tanggal Tanding"
                                                               class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Area :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="area" id="area">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Status:</label>
                            <div class="col-sm-9">
                                <input type="radio" name="status" value="Open">Open</input>
                                <input type="radio" name="status" value="Close">Close</input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Remake:</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="note" id="note"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-rounded btn-primary">Save data</button>
                    </div>
                </form>
            </div>
            {{--</div>--}}
        </div>
    </div>
    <!-- modal -->
    <div class="modal fade"
         id="modaledit1"
         tabindex="-1"
         role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            {{--<div class="col-12">--}}
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                </div>
                <form id="formEdit1" action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="put">

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Title:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="titles" id="titles">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Item Description:</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="descriptions" id="descriptions"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Ref. RFI No:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ref_numbers" id="ref_numbers">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text" class=" form-control-label">Date:</label></div>
                            <div class="col-9 col-md-9"><input type="date" id="dates"
                                                               name="dates"
                                                               placeholder="Tanggal Tanding"
                                                               class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Area :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="areas" id="areas">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text" class=" form-control-label">Status:</label></div>
                            <div class="col-sm-9"><select class="form-control" name="statuss" required>
                                    <option selected disabled>-Pilih Status-</option>
<!--                                    --><?php //foreach ($lomba as $l) : ?>
                                    <option value="Open">Open</option>
                                    <option value="Close">Close</option>
<!--                                    --><?php //endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Remake:</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="notes" id="notes"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-rounded btn-primary">Save data</button>
                    </div>
                </form>
            </div>
            {{--</div>--}}
        </div>
    </div>
    <!-- end modal -->
    <script>
        function showModal(id) {
            document.getElementById('formEdit1').action = "/updatedata/"+ id;
            console.log("diklik " + id);
            title = document.getElementById('titles');
            description = document.getElementById('descriptions');
            ref_number = document.getElementById('ref_numbers');
            date = document.getElementById('dates');
            area = document.getElementById('areas');
            status = document.getElementById('statuss');
            note = document.getElementById('notes');
            $.ajax({
                type: 'GET',
                url: '/detaildata/' + id,
                dataType: 'json',
                success: function (data) {
                    if (data !== null) {
                        console.log('data = ' + data);
                        console.log('datanya 2 = ' + data.id);
                        title.value = data.title;
                        description.value = data.description;
                        ref_number.value = data.ref_number;
                        date.value = data.date;
                        area.value = data.area;
                        status.value = data.status;

                        note.value = data.note;
                    } else {
                        console.log('null')
                        cabang_olahraga.value = "";
                        pj.value = "";
                    }

                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log("error bro");
                    console.log(textStatus);
                    console.log(errorThrown);

                }
            });
        }
    </script>
@endsection