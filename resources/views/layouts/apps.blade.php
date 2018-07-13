<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Insyl Apps - Admin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{asset('images/apple-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">

    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{asset('scss/style.css')}}">
    <link href="{{asset('css/lib/vector-map/jqvmap.min.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    {{--SWEETALERT--}}
    <script src="{{asset('css/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/sweetalert2/dist/sweetalert2.min.css')}}">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    {{--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>


<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="{{asset('images/MRT_Jakarta.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{asset('images/mrt.jpeg')}}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                <li class="active">
                    <a href="/progress"> <i class="menu-icon fa fa-list-alt"></i>Management Progress</a>
                </li>

                <li class="active">
                    <a href="/new/project"> <i class="menu-icon fa fa-plus-square-o"></i>Management Project</a>
                </li>

                <li class="active">
                    <a href="/new/data"> <i class="menu-icon fa fa-plus-square-o"></i>Management Data</a>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

<!-- Left Panel -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="col-sm-7">
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                <div class="header-left">
                    <button class="search-trigger"><i class="fa fa-search"></i></button>
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..."
                                   aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->

    @yield('content')
</div>
<!--  Scripts-->
@include('sweet::alert')
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="{{asset('js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="{{asset('js/plugins.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>


<script src="{{asset('js/lib/data-table/datatables.min.js')}}"></script>
{{--<script src="{{asset('js/chartjs-plugin-datalabels.js')}}"></script>--}}
{{--<script src="{{asset('js/chartjs-plugin-datalabels.min.js')}}"></script>--}}
<script src="{{asset('js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/pdfmake.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{asset('js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{asset('js/lib/data-table/datatables-init.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.2/js/mdb.min.js"></script>
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>--}}
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>--}}
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>--}}
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>--}}
{{--<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/4.5.1/1/WebForms.js"></script>--}}
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"></script>--}}
{{--<script type='text/javascript' src='webforms/ExperianEmailJsScripts/jquery/js/jquery.jsonp-2.4.0.js'></script>--}}

</body>
</html>