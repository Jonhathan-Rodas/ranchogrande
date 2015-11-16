<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Control de Entradas/Salidas</title>

    <!-- Bootstrap Core CSS -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/public/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="/public/js/jquery/jquery-2.1.4.min.js"></script>
    <script src="/public/js/bootstrap/bootstrap.min.js"></script>

    <style>
        #page-wrapper{
            height: 1000px;
        }

        #guardar-acceso{
            display: none;
        }
    </style>
    </head>

<body>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigationw</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Parque Inmobiliario Rancho Grande</a>

        </div>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a href="/"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
                </li>

                <li class="active">
                    <a href="/usuario/search"><i class="fa fa-fw fa-users "></i> Usuarios</a>
                </li>
                <li class="active">
                    <a href="/condominio"><i class="fa fa-fw fa-university"></i> Condominios</a>
                </li>
                <li class="active">
                    <a href="/vehiculo"><i class="fa fa-fw  fa-car"></i> Vehiculos</a>
                </li>
                <li class="active">
                    <a href="/acceso/new"><i class="fa fa-fw fa-unlock "></i> Control de Accesos</a>
                </li>
                <li class="active">
                    <a href="http://ranchogrande.io/acceso/search"><i class="fa fa-fw  fa-book"></i> Reportes</a>
                </li>
                <li class="active">
                    <a href="/"><i class="fa fa-fw fa-credit-card"></i> Impresión de Carné</a>
                </li>
                <li class="active">
                    <a href="/"><i class="fa fa-fw  fa-gear"></i> Configuración</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
           <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    {{ content() }}
                </div>
            </div>
        </div>
   </div>
</body>
</html>
