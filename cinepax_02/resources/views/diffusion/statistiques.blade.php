<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="WIN1252" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Graph</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    {{-- import --}}
    {{-- <link rel="stylesheet" href="{{ asset('asset_csv/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('asset_csv/assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_csv/assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_csv/assets/fonts/fontawesome5-overrides.min.css') }}"> --}}

    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 0 auto;
            max-width: 1200px;
            /* Ajustez la largeur selon vos besoins */
        }

        .chart-container {
            width: calc(33.33% - 20px);
            /* 20px pour la marge */
            margin-bottom: 20px;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
        }
    </style>
</head>

<script src="asset_chart/chart.js"></script>
<script src="asset_pdf/html2pdf.bundle.min.js"></script>
<script>
    function addPdf() {
        var element = document.getElementById('page-inner');
        element.style.padding = '20px';
        element.style.fontSize = "small";
        // element.style.width = '75%';
        html2pdf(element);
    }
</script>

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
                <a class="navbar-brand" href="{{ route('accueille') }}">Dream</a>
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
                        <a href="{{ route('achat_Billet') }}"><i class="fa fa-table"></i> Achat Billet</a>
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
                        <a class="active-menu" href="{{ route('empty') }}"><i class="fa fa-fw fa-file"></i> Empty
                            Page</a>
                    </li>
                </ul>

            </div>

        </nav>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <button onclick="addPdf()" class="btn btn-primary">Pdf</button>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Graph vente<small>stat</small>
                        </h1>
                        <div class="container">
                            {{-- <div class="chart-container">
                                <canvas id="bar-chart"></canvas>
                            </div> --}}
                            <div class="chart-container" style="width: 250px; height: 300px;">
                                <canvas id="pie-chart"></canvas>
                            </div>
                            {{-- <div class="chart-container">
                                <canvas id="line-chart"></canvas>
                            </div> --}}
                            {{-- <div class="chart-container">
                                <canvas id="area-chart"></canvas>
                            </div>
                            <div class="chart-container">
                                <canvas id="bubble-chart"></canvas>
                            </div>
                            <div class="chart-container">
                                <canvas id="radar-chart"></canvas>
                            </div>
                            <div class="chart-container">
                                <canvas id="scatter-chart"></canvas>
                            </div>
                            <div class="chart-container">
                                <canvas id="stacked-bar-chart"></canvas>
                            </div> --}}
                            <div class="chart-container">
                                <canvas id="histogram-chart"></canvas>
                            </div>
                            {{-- <div class="chart-container">
                                <canvas id="donut-chart"></canvas>
                            </div>
                            <div class="chart-container">
                                <canvas id="gauge-chart"></canvas>
                            </div> --}}
                        </div>
                        <script>
                            // Données pour les graphiques (à titre d'exemple)
                            // const dataBar = {
                            //     labels: ['A', 'B', 'C', 'D', 'E'],
                            //     datasets: [{
                            //         label: 'Exemple de graphique en barres',
                            //         data: [12, 19, 3, 5, 2],
                            //         backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            //         borderColor: 'rgba(255, 99, 132, 1)',
                            //         borderWidth: 1
                            //     }]
                            // };

                            const dataPie = {
                                labels: {!! json_encode($labels) !!},
                                datasets: [{
                                    data: {!! json_encode($donnees) !!},
                                    backgroundColor: {!! json_encode($couleurs) !!}
                                }]
                            };

                            const options = {
                                responsive: true,
                                maintainAspectRatio: false // Permet de désactiver le maintien du rapport hauteur/largeur
                            };

                            // const dataLine = {
                            // labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                            // datasets: [{
                            // label: 'Exemple de graphique en ligne',
                            // data: [65, 59, 80, 81, 56, 55, 40],
                            // fill: false,
                            // borderColor: 'rgb(75, 192, 192)',
                            // tension: 0.1
                            // }]
                            // };

                            // const dataArea = {
                            // labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                            // datasets: [{
                            // label: 'Exemple de graphique en aires',
                            // data: [65, 59, 80, 81, 56, 55, 40],
                            // backgroundColor: 'rgba(255, 206, 86, 0.2)',
                            // borderColor: 'rgba(255, 206, 86, 1)',
                            // borderWidth: 1
                            // }]
                            // };

                            // const dataBubble = {
                            // datasets: [{
                            // label: 'Exemple de graphique en bulles',
                            // data: [{
                            // x: 10,
                            // y: 20,
                            // r: 5
                            // },
                            // {
                            // x: 30,
                            // y: 40,
                            // r: 10
                            // },
                            // {
                            // x: 50,
                            // y: 60,
                            // r: 15
                            // },
                            // {
                            // x: 70,
                            // y: 80,
                            // r: 20
                            // },
                            // {
                            // x: 90,
                            // y: 100,
                            // r: 25
                            // }
                            // ],
                            // backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            // borderColor: 'rgba(54, 162, 235, 1)',
                            // borderWidth: 1
                            // }]
                            // };

                            // const dataRadar = {
                            // labels: ['A', 'B', 'C', 'D', 'E'],
                            // datasets: [{
                            // label: 'Exemple de graphique radar',
                            // data: [12, 19, 3, 5, 2],
                            // backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            // borderColor: 'rgba(255, 99, 132, 1)',
                            // borderWidth: 1
                            // }]
                            // };

                            // const dataScatter = {
                            // datasets: [{
                            // label: 'Exemple de nuage de points',
                            // data: [{
                            // x: 10,
                            // y: 20
                            // },
                            // {
                            // x: 30,
                            // y: 40
                            // },
                            // {
                            // x: 50,
                            // y: 60
                            // },
                            // {
                            // x: 70,
                            // y: 80
                            // },
                            // {
                            // x: 90,
                            // y: 100
                            // }
                            // ],
                            // backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            // borderColor: 'rgba(75, 192, 192, 1)',
                            // borderWidth: 1
                            // }]
                            // };

                            // const dataStackedBar = {
                            // labels: ['A', 'B', 'C', 'D', 'E'],
                            // datasets: [{
                            // label: 'Série 1',
                            // data: [12, 19, 3, 5, 2],
                            // backgroundColor: 'rgba(255, 99, 132, 0.2)'
                            // }, {
                            // label: 'Série 2',
                            // data: [2, 3, 20, 5, 10],
                            // backgroundColor: 'rgba(54, 162, 235, 0.2)'
                            // }]
                            // };

                            const dataHistogram = {
                                labels: ['0-10', '11-20', '21-30', '31-40', '41-50'],
                                datasets: [{
                                    label: 'Exemple d\'histogramme',
                                    data: [10, 15, 7, 5, 3],
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            };

                            // const dataDonut = {
                            // labels: ['A', 'B', 'C', 'D', 'E'],
                            // datasets: [{
                            // data: [12, 19, 3, 5, 2],
                            // backgroundColor: ['red', 'blue', 'green', 'orange', 'purple']
                            // }]
                            // };

                            // const dataGauge = {
                            // labels: ['Red', 'Yellow', 'Green'],
                            // datasets: [{
                            // data: [300, 50, 100],
                            // backgroundColor: ['rgba(255, 99, 132, 0.5)', 'rgba(255, 206, 86, 0.5)',
                            // 'rgba(54, 162, 235, 0.5)'
                            // ]
                            // }]
                            // };

                            // Création des graphiques
                            // new Chart(document.getElementById('bar-chart'), {
                            // type: 'bar',
                            // data: dataBar
                            // });

                            new Chart(document.getElementById('pie-chart'), {
                                type: 'pie',
                                data: dataPie,
                                options: options
                            });

                            // new Chart(document.getElementById('line-chart'), {
                            // type: 'line',
                            // data: dataLine
                            // });

                            // new Chart(document.getElementById('area-chart'), {
                            // type: 'line',
                            // data: dataArea,
                            // options: {
                            // fill: true
                            // }
                            // });

                            // new Chart(document.getElementById('bubble-chart'), {
                            // type: 'bubble',
                            // data: dataBubble
                            // });

                            // new Chart(document.getElementById('radar-chart'), {
                            // type: 'radar',
                            // data: dataRadar
                            // });

                            // new Chart(document.getElementById('scatter-chart'), {
                            // type: 'scatter',
                            // data: dataScatter
                            // });

                            // new Chart(document.getElementById('stacked-bar-chart'), {
                            // type: 'bar',
                            // data: dataStackedBar,
                            // options: {
                            // scales: {
                            // x: {
                            // stacked: true
                            // },
                            // y: {
                            // stacked: true
                            // }
                            // }
                            // }
                            // });

                            new Chart(document.getElementById('histogram-chart'), {
                                type: 'bar',
                                data: dataHistogram,
                                options: {
                                    indexAxis: 'x'
                                }
                            });

                            // new Chart(document.getElementById('donut-chart'), {
                            // type: 'doughnut',
                            // data: dataDonut
                            // });

                            // new Chart(document.getElementById('gauge-chart'), {
                            // type: 'doughnut',
                            // data: dataGauge,
                            // options: {
                            // cutout: '75%',
                            // rotation: 1 * Math.PI,
                            // circumference: 1 * Math.PI
                            // }
                            // });
                        </script>
                    </div>
                </div>
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Vente Billet</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Type Billet</th>
                                        <th>Film</th>
                                        <th>Categorie Film</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vente as $data)
                                        <tr>
                                            <td>{{ $data->type_billet }}</td>
                                            <td>{{ $data->film }}</td>
                                            <td>{{ $data->categorie_film }}</td>

                                            {{-- <td>
                                                <button
                                                    onclick="getSeance('{{ $data->idseance }}','{{ $data->numseance }}','{{ $data->nom_salle }}','{{ $data->nom_film }}','{{ $data->dates }}','{{ $data->heure }}')"
                                                    data-toggle="modal" data-target="#myModal"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-edit "></i>
                                                    Edit</button>
                                            </td>
                                            <td> --}}
                                            {{-- <button
                                                    onclick="deleteSeance('{{ $data->idseance }}','{{ $data->numseance }}','{{ $data->nom_salle }}','{{ $data->nom_film }}','{{ $data->dates }}','{{ $data->heure }}')"
                                                    data-toggle="modal" data-target="#myModal_delete_seance"
                                                    class="btn btn-danger btn-sm">Delete 1

                                                </button> --}}
                                            {{-- <a href="{{ route('delete_Valid_seance',['idseance'=>$data->idseance]) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                            {{-- <button
                                                    onclick="deleteSeance('{{ $data->idseance }}','{{ $data->numseance }}','{{ $data->nom_salle }}','{{ $data->nom_film }}','{{ $data->dates }}','{{ $data->heure }}')"
                                                    data-toggle="modal" data-target="#myModal_delete_seance"
                                                    class="btn btn-danger btn-sm">Delete 1

                                                </button> --}}
                                            {{-- </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
                <!-- /. ROW  -->
                <footer>
                    <p></p>
                </footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>
