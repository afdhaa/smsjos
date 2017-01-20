<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="180">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Home</title>

    <!-- CSS -->
    <link href="<?php echo base_url('assets/css')?>/bootstrap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css')?>/style.css" rel="stylesheet">
    
  </head>

  <body>

    <nav class="navbar  navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url('dashboard')?>"><img class="img-responsive" src="<?php echo base_url('assets/img/logo-emac.png')?>" alt=""></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url('dashboard')?>">Home</a></li>
            <li><a href="<?php echo base_url('dashboard/line')?>">Line Chart</a></li>
            <!-- <li><a href="<?php echo base_url('dashboard/harian')?>">Line Chart Kab/Hari</a></li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><span class="page-header-tanggal">tanggal: <b><?Php  echo date("d M Y");?></b> Jam: <b><span id="demo"></span></b></span></li>
            <?php if($this->session->userdata('role') === "superadmin"){?><li><a href="<?php echo base_url('administrator');?>" class="btn btn-success logout">adm-panel</a></li><?php }?>
            <li><a href="<?php echo base_url('logout');?>" class="btn btn-danger logout">logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
<script>
var myVar = setInterval(myTimer, 1000);

function myTimer() {
    var d = new Date();
    document.getElementById("demo").innerHTML = d.toLocaleTimeString();
}
</script>