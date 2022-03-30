<?=$this->extend('admin/dashboard');?>
<?=$this->section('konten');?>
<h2><?=$JudulHalaman;?></h2>
<p><?=$introText;?>
<p>
    <a href="<?=site_url('/tambah-kamar');?>" class="btn btn-primary btn-sm font-weight-bold">Tambah Kamar</a>
</p>

<?=session()->getFlashData('info');?>


<div class="row">
    <?php
    if(isset($listKamar)){
        foreach($listKamar as $row) { 
    ?>
        <div class="col-md-3">
            <div class="card" style="min-height:400px">
            <img src="<?=base_url('uploads/'.$row['foto_kamar']);?>" alt=".." class="card-img-top" style="height:170px">
            <div class="card-body"  style="min-height:150px">
                <h5 class="card-title">Kamar <?=ucwords($row['tipe_kamar']);?></h5>
                    <p class="card-text">Harga : Rp. <?=number_format($row['harga_kamar'],0,',','.');?> / mlm</p>
                    <p>Fasilitas kamar : 
                    <?php
                    $fasiltias=listFasilitasKamar($row['id_kamar']);
                    if(isset($fasiltias)){
                        foreach($fasiltias as $rowFasilitas){
                            echo '<div class="badge badge-success mr-1">
                            '.$rowFasilitas['nama_fasilitas'].'</div>';
                        }
                    }
                    ?>
                    </p>
                    <p>Tersedia : <?=$row['jml_kamar'] >0 ? $row['jml_kamar'].' kamar':'Kamar Penuh';?></p>
                <a href="<?=site_url('/edit-kamar/'.$row['id_kamar']);?>" class="btn btn-primary btn-block btn-sm">Edit</a>
                <a href="<?=site_url('/hapus-kamar/'.$row['id_kamar']);?>" class="btn btn-danger btn-block btn-sm">Hapus</a>
            </div>
            </div>
        </div>
    <?php
        }
    }
    ?>
</div>

<?=$this->endSection();?>