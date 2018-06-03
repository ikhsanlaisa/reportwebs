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
                        <form action="/add_progress" id="formEdit" method="post" enctype="multipart/form-data"
                              class="form-horizontal">
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

                                <script>
                                    window.onload = function () {

                                        var chart = new CanvasJS.Chart("chartContainer", {
                                            animationEnabled: true,
                                            theme: "light2",
                                            title: {
                                                text: "Simple Line Chart"
                                            },
                                            axisY: {
                                                includeZero: false
                                            },
                                            data: [{
                                                type: "line",
                                                dataPoints: [
                                                        {{--@forEach()--}}
                                                    {
                                                        y: 450
                                                    },
                                                    {y: 414},
                                                    {
                                                        y: 520,
                                                        indexLabel: "highest",
                                                        markerColor: "red",
                                                        markerType: "triangle"
                                                    },
                                                    {y: 460},
                                                    {y: 450},
                                                    {y: 500},
                                                    {y: 480},
                                                    {y: 480},
                                                    {
                                                        y: 410,
                                                        indexLabel: "lowest",
                                                        markerColor: "DarkSlateGrey",
                                                        markerType: "cross"
                                                    },
                                                    {y: 500},
                                                    {y: 480},
                                                    {y: 510}
                                                    {{--@endforeach--}}
                                                ]
                                            }]
                                        });
                                        chart.render();

                                    }
                                </script>
                                <center>
                                    {{--<div class="row form-group">--}}
                                    <div id="chartContainer" style="height: 300px; width: 70%; alignment: center"></div>
                                    {{--</div>--}}
                                </center>
                                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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

                $('#sub_categories').on('change', function (f) {
                    console.log(e);
                    var sub_cat = f.target.value;
                    $.get('/listreport?sub_cat=' + cat_id, {option: $(this).val()}, function (returnJSON) {
                        console.log(sub_cat);
                    });

                    // $.get('/listreport?sub_cat=' + sub_cat,  {option: $(this).val()}, function (returnJSON) {
                    //
                    // });
                });
            });
        });
    </script>
@endsection