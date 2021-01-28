<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tata Ruang Laboratorium</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('Gambar/icon.ico')?>">

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>vendors/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>vendors/font-awesome/css/font-awesome.css" rel="stylesheet">
   
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assetsDatatables/media/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assetsDatatables/media/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assetsDatatables/datatables.min.css"/>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php $this->load->view('mahasiswa/navbar'); ?>

        <!-- top navigation -->
       <?php $this->load->view('mahasiswa/top'); ?>
        <!-- /top navigation -->

        <!-- page content -->
        <?php include $page;?>
        <!-- /page content -->

        <!-- footer content -->
         <footer>
            <div class="pull-right">
                Tata Ruang Laboratorium
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url();?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/media/js/jquery2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assetsDatatables/assets_ajax/js/jquery.dataTables.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url();?>build/js/custom.min.js"></script>


  </body>
</html>