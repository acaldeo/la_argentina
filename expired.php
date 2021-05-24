<?php 
	require_once('include/session.php');
	$expired_menu=1;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de Inventario</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">

    <!-- Custom CSS -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        .btn-group, .btn-group-vertical {
        position: absolute !important;
    }
    table th{
        background-color: #337ab7 !important;
        color:white;
    }
    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("navbar.php");?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
               <div id="all-expired"></div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<script type="text/javascript" src="assets/js/jquery-1.12.3.js"></script>
<script type="text/javascript" src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/DataTables/datatables.min.js"></script>
<script type="text/javascript" src="assets/js/regis.js"></script>
<script type="text/javascript" src="assets/js/DataTables/Buttons-1.7.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="assets/js/DataTables/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="assets/js/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="assets/js/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/js/DataTables/Buttons-1.7.0/js/buttons.html5.min.js"></script>



</body>

</html>
