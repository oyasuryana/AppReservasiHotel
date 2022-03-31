<?=$this->extend('admin/dashboard');?>
<?=$this->section('konten');?>

<h2><?=$JudulHalaman;?></h2>
<p><?=$introText;?></p>

<div class="row">
    <?php
    if(isset($listKamar)){
        foreach($listKamar as $row) { 
    ?>
        <div class="col-md-3">
            <div class="card" style="min-height:300px">
            <img src="<?=base_url('uploads/'.$row['foto_kamar']);?>" alt=".." class="card-img-top" style="height:170px">
            <div class="card-body">
                <h5 class="card-title">Kamar <?=ucwords($row['tipe_kamar']);?></h5>
                    <p> 
                    <?php
                        for($kamar=1;$kamar<=$row['jml_kamar'];$kamar++){
                            echo $kamar <= jmlKamarTerisi($row['id_kamar']) ?
                            '<div class="btn btn-danger btn-sm mr-2 mb-2">
                            Kamar '.$kamar.'</div>' : '<div class="btn btn-success btn-sm mr-2 mb-2">
                            Kamar '.$kamar.'</div>';
                        }
                    ?>
                    </p>

            </div>
            </div>
        </div>
    <?php
        }
    }
    ?>
</div>

<div class="row">
    <div class="col-md-12">
        <p class="font-weight-bold">Keterangan</p> 
        <span class="btn btn-danger btn-sm">Kamar Terisi</span>
        <span class="btn btn-success btn-sm">Kamar Kosong</span>
    
    </div>
</div>

<?=$this->endSection();?>