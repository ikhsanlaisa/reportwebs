@extends('layouts.apps')
@section('content')

    <center>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 60rem;">
                        <div class="card-header">
                            <h5 class="card-title">DATA PROGRESS HARIAN</h5>
                        </div>
                        {{csrf_field()}}
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="text"
                                                                 class=" form-control-label">Project:</label>
                                </div>
                                <div class="col-6 col-md-6"><select class="form-control" id="category_id"
                                                                    name="category_id"
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
                                <div class="col-6 col-md-6"><select class="form-control" name="sub_categories"
                                                                    id="sub_categories"
                                                                    required>
                                        <option selected="selected" disabled>-Choose SubProject-</option>
                                    </select>
                                </div>
                            </div>

                            <center>
                                <canvas id="lineChart"></canvas>
                            </center>
                            {{--<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>--}}

                            <div class="content mt-4">
                                <div class="animated fadeIn">
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="card">

                                                @if(!empty($report))
                                                    <div class="card-body">
                                                        <table id="bootstrap-data-table"
                                                               class="table table-striped table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Target Pengerjaan</th>
                                                                <th>Tgl Kerja</th>
                                                                <th>Project</th>
                                                                <th>Sub Project</th>
                                                                <th>Nilai Target</th>
                                                                <th>Progress</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $i = 1?>
                                                            @foreach($report as $r)
                                                                <tr>
                                                                    <td>{{$i++}}</td>
                                                                    <td>{{$r->category->tgl_target}}</td>
                                                                    <td>{{$r->tgl}}</td>
                                                                    <td>{{$r->category->project}}</td>
                                                                    <td>{{$r->subcategory->sub_category}}</td>
                                                                    <td>{{$r->subcategory->target}}</td>
                                                                    <td>{{$r->progress}}</td>
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

                        </div>
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

        jQuery(document).ready(function ($) {
            $('#sub_categories').on('change', function (f) {
                console.log(f);
                var sub_cat = f.target.value;
                nama = document.getElementById('name');
                $.get('/listreport?sub_cat=' + sub_cat, {option: $(this).val()}, function (returnJSON) {
                    console.log(sub_cat);
                    console.log(returnJSON);


                    var ctxL = document.getElementById("lineChart").getContext('2d');
                    // var a = returnJSON;
                    // $.each(returnJSON, function (index, obj) {
                    var a = [];
                    var b = [];
                    var c = [];
                    $.each(returnJSON, function (index, obj) {
                        // c = {
                        //     data:
                                // a.push(
                               a.push(obj['tgl'])
                                // )
                        // }

                    });
                    $.each(returnJSON, function (index, obj) {
                        b.push((obj['progress'] / obj['subcategory']['target']) * 100)
                    });
                    console.log(a);
                    // console.log(b);
                    console.log(c);
                    for (var i = 0; i < returnJSON.length; i++) {
                    //     a[i] = returnJSON[i]['tgl'];
                    //     b[i] = (returnJSON[i]['progress'] / returnJSON[i]['subcategory']['target']) * 100;
                    //     console.log(returnJSON[i].tgl);
                    //     console.log(b);
                    // }
                        var myLineChart = new Chart(ctxL, {
                            type: 'line',
                            data: {
                                labels: [
                                    // c
                                    returnJSON[0].tgl, returnJSON[1].tgl,
                                    returnJSON[2].tgl, returnJSON[3].tgl,
                                    // returnJSON[4].tgl
                                ]
                                ,
                                datasets: [
                                    {
                                        label: "Progress Pengerjaan Project",
                                        fillColor: "rgba(151,187,205,0.2)",
                                        strokeColor: "rgba(151,187,205,1)",
                                        pointColor: "rgba(151,187,205,1)",
                                        pointStrokeColor: "#fff",
                                        pointHighlightFill: "#fff",
                                        pointHighlightStroke: "rgba(151,187,205,1)",
                                        // data: [(obj.progress / 1000) * 100, (returnJSON[1].progress / 1000) * 100]
                                        data: [
                                            // b
                                            // (returnJSON[i]['progress'] / returnJSON[i]['subcategory']['target']) * 100,
                                            (returnJSON[0].progress / returnJSON[0].subcategory.target) * 100, (returnJSON[1].progress / returnJSON[1].subcategory.target) * 100,
                                            (returnJSON[2].progress / returnJSON[2].subcategory.target) * 100, (returnJSON[3].progress / returnJSON[3].subcategory.target) * 100,
                                            // (returnJSON[4].progress / returnJSON[4].subcategory.target) * 100
                                        ]
                                    }
                                ]
                            },
                            options: {
                                responsive: true
                            }
                        });
                    }

                });
            });
        });

    </script>
    <script>
        {{--jQuery(document).ready(function ($) {--}}
            {{--$('#sub_categories').on('change', function (f) {--}}
                {{--console.log(f);--}}
                {{--var sub_cat = f.target.value;--}}
                {{--nama = document.getElementById('name');--}}
                {{--$.get('/listreport?sub_cat=' + sub_cat, {option: $(this).val()}, function (returnJSON) {--}}
                    {{--// console.log(sub_cat);--}}
                    {{--// console.log(returnJSON);--}}


                    {{--var ctxL = document.getElementById("lineChart").getContext('2d');--}}
                    {{--// var a = returnJSON;--}}
                    {{--var a =[];--}}
                    {{--// $.each(returnJSON, function (index, obj) {--}}
                    {{--//     a.push(obj.tgl)--}}
                    {{--// });--}}
                    {{--// console.log(a);--}}

                    {{--for (var i = 0; i < returnJSON.length; i++) {--}}
                        {{--a[i] = returnJSON[i].tgl;--}}
                        {{--// console.log(a.push(returnJSON[i].tgl));--}}
                        {{--var myLineChart = new Chart(ctxL, {--}}
                            {{--type: 'line',--}}
                            {{--data: {--}}
                                {{--labels: [ a--}}
                                {{--]--}}
                                {{--,--}}
                                {{--datasets: [--}}
                                    {{--{--}}
                                        {{--label: "Progress Pengerjaan Project",--}}
                                        {{--fillColor: "rgba(151,187,205,0.2)",--}}
                                        {{--strokeColor: "rgba(151,187,205,1)",--}}
                                        {{--pointColor: "rgba(151,187,205,1)",--}}
                                        {{--pointStrokeColor: "#fff",--}}
                                        {{--pointHighlightFill: "#fff",--}}
                                        {{--pointHighlightStroke: "rgba(151,187,205,1)",--}}
                                        {{--// data: [(obj.progress / 1000) * 100, (returnJSON[1].progress / 1000) * 100]--}}
                                        {{--data: [--}}
                                            {{--// (returnJSON[i].progress / returnJSON[i].subcategory.target) * 100,--}}
                                            {{--// (returnJSON[0].progress / returnJSON[0].subcategory.target) * 100, (returnJSON[1].progress / returnJSON[1].subcategory.target) * 100,--}}
                                            {{--// (returnJSON[2].progress / returnJSON[2].subcategory.target) * 100, (returnJSON[3].progress / returnJSON[3].subcategory.target) * 100,--}}
                                            {{--// (returnJSON[4].progress / returnJSON[4].subcategory.target) * 100--}}
                                        {{--]--}}
                                    {{--}--}}
                                {{--]--}}
                            {{--},--}}
                            {{--options: {--}}
                                {{--responsive: true--}}
                            {{--}--}}
                        {{--});--}}
                    {{--}--}}

                {{--});--}}
            {{--});--}}
        {{--});--}}
    </script>
@endsection