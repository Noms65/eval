<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seance</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->

    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <script defer>
        function getNomService(nom) {
            document.getElementById("nomSetvice").value = nom;
        }

        function getService(idservice, nom, numero) {
            const service_id = document.getElementById("idservice");
            const service_nom = document.getElementById("nomService");
            const service_numero = document.getElementById("numeroService");
            service_id.value = idservice;
            service_numero.value = numero;
            service_nom.value = nom;

        }
    </script>

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Dream</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">28% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar"
                                            aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                                            <span class="sr-only">28% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">85% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar"
                                            aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                            <span class="sr-only">85% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="{{ route('accueille') }}"><i class="fa fa-dashboard"></i>
                            Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('uielements') }}"><i class="fa fa-desktop"></i> UI Elements</a>
                    </li>
                    <li>
                        <a href="{{ route('statistique') }}"><i class="fa fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="{{ route('stat') }}"><i class="fa fa-bar-chart-o"></i> Graph</a>
                    </li>
                    <li>
                        <a href="{{ route('tabpanel') }}"><i class="fa fa-qrcode"></i> Tabs & Panels</a>
                    </li>

                    <li>
                        <a href="{{ route('tableau') }}"><i class="fa fa-table"></i> Achat Billet</a>
                    </li>
                    <li>
                        <a href="{{ route('form') }}"><i class="fa fa-edit"></i> Forms </a>
                    </li>
                    <li>
                        <a href="{{ route('Importcsv') }}"><i class="fa fa-fw fa-file"></i> import csv </a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Voir Seance<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('liste_seance') }}"><i class="fa fa-edit"></i> Liste Seance </a>
                            </li>
                            <li>
                                <a href="{{ route('update_seance') }}"><i class="fa fa-edit"></i> Setting </a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('empty') }}"><i class="fa fa-fw fa-file"></i> Empty Page</a>
                    </li>
                </ul>

            </div>

        </nav>

        <!--  Modals UPDATE SERVICE    -->
        <div class="panel panel-default">
            <div class="panel-body">

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Edit service</h4>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <form action="{{ route('update_ok') }}" role="form">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Nom service</label>
                                                    <input type="hidden" id="idservice" name="idservice">
                                                    <input id="nomService" name="nomService" required
                                                        class="form-control" placeholder="nom service">
                                                </div>
                                                <div class="form-group">
                                                    <label>Num service</label>
                                                    <input id="numeroService" name="numeroService" required
                                                        class="form-control" placeholder="numero service">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                                {{-- <button type="reset" class="btn btn-default">Reset Button</button> --}}
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                            </div>
                            {{-- footer avec boutton --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modals-->

        {{-- ajout service --}}


        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                {{-- rechercher --}}
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <form action="#">
                            @csrf
                            <i class="fa fa-fw fa-search"></i>
                            <input type="text" class="form-control" id="inputMobileSearch"
                                placeholder="Search ...">
                        </form>
                        <div class="input-group-text">
                            <button type="submit" class="btn btn-primary">search</button>
                        </div>
                    </div>
                </div>
                {{-- Filtre  --}}
                <style>
                    #filtre_seance {
                        margin-left: 93%;
                        margin-top: -3%;
                    }
                </style>

                <div class="btn-group" id="filtre_seance">
                    <button data-toggle="dropdown" class="btn btn-info dropdown-toggle">Categories <span
                            class="caret"></span></button>
                    <ul class="dropdown-menu">
                        @foreach ($liste_categorie as $filtre)
                            <li><a
                                    href="{{ route('filtre_Liste_Seance', ['categorie' => $filtre->categorie]) }}">{{ $filtre->categorie }}</a>
                            </li>
                            <li class="divider"></li>
                        @endforeach
                    </ul>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Liste Seances</h4>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                        id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Num seance</th>
                                                <th>Nom_salle</th>
                                                <th>Nom_film</th>
                                                <th>Categorie</th>
                                                <th>Dates</th>
                                                <th>Heure</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list_seance as $data)
                                                <tr>
                                                    <td>{{ $data->numseance }}</td>
                                                    <td>{{ $data->nom_salle }}</td>
                                                    <td>{{ $data->nom_film }}</td>
                                                    <td>{{ $data->categorie_film }}</td>
                                                    <td>{{ $data->dates }}</td>
                                                    <td>{{ $data->heure }}</td>

                                                    {{-- <button onclick="getid1('{{ $service->idservice }}')" --}}
                                                    {{-- {{ route('update_service', ['idservice' => $service->idservice, 'nom' => $service->nom, ('numero')->$service->numero]) }} --}}
                                                    {{-- class="btn btn-primary"><i
                                                                        class="fa fa-edit "></i>
                                                                    Edit</button> --}}
                                                    {{-- <button class="btn btn-primary"><i
                                                                        class="fa fa-pencil"></i>
                                                                    <a
                                                                        href="{{ route('choisir_diffusion', ['idSeance'=>$list_films->idseance,'idType_billet'=>$idType_billet,'idBillet'=>$idBillet]) }}"> Choisir </a></button> --}}

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <!--End Advanced Tables -->
                    </div>
                </div>
                <!-- /. ROW  -->

                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-6">
                        <!--   Kitchen Sink -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{-- seance selon categorie <strong>{{ $list_film->categorie_film}}</strong> --}}
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        @if (!empty($list_seance))
                                            <thead>
                                                <tr>
                                                    <th>Num seance</th>
                                                    <th>Nom_salle</th>
                                                    <th>Nom_film</th>
                                                    <th>Categorie</th>
                                                    <th>Dates</th>
                                                    <th>Heure</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($list_seance as $data)
                                                    <tr>
                                                        <td>{{ $data->numseance }}</td>
                                                        <td>{{ $data->nom_salle }}</td>
                                                        <td>{{ $data->nom_film }}</td>
                                                        <td>{{ $data->categorie_film }}</td>
                                                        <td>{{ $data->dates }}</td>
                                                        <td>{{ $data->heure }}</td>

                                                        {{-- <button onclick="getid1('{{ $service->idservice }}')" --}}
                                                        {{-- {{ route('update_service', ['idservice' => $service->idservice, 'nom' => $service->nom, ('numero')->$service->numero]) }} --}}
                                                        {{-- class="btn btn-primary"><i
                                                                        class="fa fa-edit "></i>
                                                                    Edit</button> --}}
                                                        {{-- <button class="btn btn-primary"><i
                                                                        class="fa fa-pencil"></i>
                                                                    <a
                                                                        href="{{ route('choisir_diffusion', ['idSeance'=>$list_films->idseance,'idType_billet'=>$idType_billet,'idBillet'=>$idBillet]) }}"> Choisir </a></button> --}}

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        @else
                                            <p class="text-center alert-danger">aucune donnees</p>
                                        @endif

                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- End  Kitchen Sink -->
                        @if ($currentPage > 1)
                            <a class="btn btn-primary btn-sm"
                                href="{{ route('liste_seance', ['page' => $currentPage - 1]) }}">Précédent</a>
                        @endif

                        @if ($currentPage < $totalPages)
                            <a class="btn btn-primary btn-sm"
                                href="{{ route('liste_seance', ['page' => $currentPage + 1]) }}">Suivant</a>
                        @endif
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>

            <footer>

            </footer>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>
