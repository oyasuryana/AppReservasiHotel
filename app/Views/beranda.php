<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Hotel Sederhana</title>


    

    <!-- Bootstrap core CSS -->
<link href="/bootstrap461/css/bootstrap.min.css" rel="stylesheet">





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
	
	html {
 	 font-size: 14px;
	}
	
	@media (min-width: 768px) {
	html {
		font-size: 16px;
	}
	}

	.container {
	max-width: 960px;
	}

	.pricing-header {
	max-width: 700px;
	}

	.card-deck .card {
	min-width: 220px;
	}

    </style>
  </head>
  <body>
    
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-info border-bottom shadow-lg">
  <h5 class="my-0 mr-md-auto font-weight-normal">Sederhana Motel</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="<?=site_url();?>">Beranda</a>
    <a class="p-2 text-dark" href="<?=site_url('/fasilitashotel');?>">Fasilitas Hotel</a>
    <a class="p-2 text-dark" href="<?=site_url('/fasilitaskamar');?>">Fasilitas Kamar</a>
  </nav>
  <form class="form-inline mt-2 mt-md-0" method="POST" action="<?=site_url('/hasil-cari');?>">
  <div class="input-group">
    <input type="text" name="txtKataKunci" class="form-control" placeholder="Nama" required>
    <div class="input-group-append">
      <button class="input-group-text" type="submit">Cari Invoice</button>
    </div>
  </div>  
  </form>
</div>


  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4"><?=isset($JudulHalaman) ? $JudulHalaman : 'Selamat Datang';?></h1>
    <p class="lead"><?=isset($introText) ? $introText : null;?></p>
  </div>


<div class="container">

	<?php
  if(isset($JudulHalaman)){
    $this->renderSection('konten');
  } else{

    echo '<div class="card-deck mb-3 text-center">';

      if(isset($listKamar)){
        foreach($listKamar as $row) { ?>
	
	<div class="card mb-4 shadow-sm">
      <div class="card-header bg-success">
        <h4 class="my-0 font-weight-normal"><?=ucwords($row['tipe_kamar']);?></h4>
      </div>
      <img src="<?=base_url('/uploads/'.$row['foto_kamar']);?>" class="card-img-top" style="height:250px">

      <div class="card-body">
        <h1 class="card-title pricing-card-title">Rp <?=number_format($row['harga_kamar'],0,',','.');?> <small class="text-muted">/ mlm</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li><?=$row['jml_kamar'];?> Kamar Tersedia</li>
		<li><b>Fasilitas Kamar</b> <br/>	
				<?php
                    $fasiltias=listFasilitasKamar($row['id_kamar']);
                    if(isset($fasiltias)){
                        foreach($fasiltias as $rowFasilitas){
                            echo '<div class="badge badge-info mr-1">
                            '.$rowFasilitas['nama_fasilitas'].'</div>';
                        }
                    }
				?>
				<li>
        </ul>
        <a href="<?=site_url('/order/'.$row['id_kamar']);?>" class="btn btn-sm btn-block btn-outline-danger <?=$row['jml_kamar'] == 0 ? 'disabled' : null;?>">Pesan Sekarang</a>
      </div>
    </div>
    
	<?php 
      }
      
      echo '</div>';

    }
  }
	?>	    

</div>


    
  </body>
</html>

