<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Starter Template · Bootstrap v4.6</title>


    <!-- Bootstrap core CSS -->
<link href="<?=base_url('/bootstrap461/css/bootstrap.min.css');?>" rel="stylesheet" >


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      body {
  padding-top: 5rem;
}
.starter-template {
  padding: 3rem 1.5rem;
  text-align: center;
}
    </style>

    
    <!-- Custom styles for this template -->
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#">Hotel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?=site_url('/dashboard');?>">Home <span class="sr-only">(current)</span></a>
      </li>

      
    <?php
      if(session()->get('level')=='admin'){
    ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Master Data</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="<?=site_url('/fasilitas-hotel');?>">Fasilitas Hotel</a>
          <a class="dropdown-item" href="<?=site_url('/fasilitas-kamar');?>">Fasilitas Kamar</a>
          <a class="dropdown-item" href="<?=site_url('/tampil-kamar');?>">Kamar</a>
        </div>
      </li>

      <?php } 
      if(session()->get('level')=='petugas') {
      ?>  

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-expanded="false">Reservasi</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="<?=site_url('/tampil-reservasi');?>">Reservasi</a>
          <a class="dropdown-item" href="<?=site_url('/cek-kamar');?>">Cek Kamar</a>
        </div>
      </li>
      
      <?php } ?>

      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('/logout');?>">Logout</a>
      </li>


    </ul>
  </div>
</nav>

<main role="main" class="container">

<?php
if(!isset($JudulHalaman)){ ?>
    
    <div class="starter-template">
      <h1>Selamat Datang</h1>
      <p class="lead">Halaman ini adalah halaman pengelolaan aplikasi reservasi hotel.</p>
    </div>

    
  <?php } else {
    echo $this->renderSection('konten');
  }
  ?>

</main><!-- /.container -->


    <script src="<?=base_url('/bootstrap461/js/jquery-3.6.0.min.js');?>"></script>
    <script src="<?=base_url('/bootstrap461/js/bootstrap.js');?>"></script>

      <script>
      $(document).ready(function() {
          setTimeout(function() {
          $(".alert").fadeOut('slow');
          }, 2000);

      });    
      </script>      
  </body>
</html>
