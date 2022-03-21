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
                <h5 class="card-title">Kamar <?=$row['no_kamar'];?></h5>
                <p class="card-text">Tipe : <?=ucwords($row['tipe_kamar']);?></p>

                <p>Fasilitas kamar : 
                <?php

                $fasiltias=listFasilitasKamar($row['id_kamar']);
                if(isset($fasiltias)){
                    foreach($fasiltias as $row){
                        echo '<div class="badge badge-success mr-1">
                        '.$row['nama_fasilitas'].'
                        [ <a href="'.site_url('/hapus-item-fasilitas-kamar/'.$row['id_detail_kamar']).'" class="text-danger">x</a> ]
                        </div>';
                    }
                }
                ?>
                </p>
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