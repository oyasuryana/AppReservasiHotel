<?=$this->extend('admin/dashboard');?>
<?=$this->section('konten');?>
<h2><?=$JudulHalaman;?></h2>
<p><?=$introText;?>

<form method="POST" action="<?=site_url('/edit-kamar');?>" enctype="multipart/form-data">

<div class="form-group">
    <label class="font-weight-bold">Tipe Kamar</label>
    <select class="form-control" name="txtTipeKamar" autofocus>
     <option <?=$Kamar['tipe_kamar']=='standar'? 'selected':null;?> value="standar" >Standar</option>
     <option <?=$Kamar['tipe_kamar']=='single'? 'selected':null;?> value="single">Single</option>
     <option <?=$Kamar['tipe_kamar']=='deluxe'? 'selected':null;?> value="deluxe">Deluxe</option>
     <option <?=$Kamar['tipe_kamar']=='suite'? 'selected':null;?> value="suite">Suite</option>
    </select>

    <input class="form-control" type="hidden" name="txtIdKamar" value="<?=$Kamar['id_kamar'];?>"/>
    <input class="form-control" type="hidden" name="txtFotoKamar" value="<?=$Kamar['foto_kamar'];?>"/>

</div>

<div class="form-group">
    <label class="font-weight-bold">Harga Kamar Per Malam</label>
    <input class="form-control" type="text" name="txtHargaKamar" value="<?=$Kamar['harga_kamar'];?>"/>
</div>

<div class="form-group">
    <label class="font-weight-bold">Jumlah Kamar</label>
    <input class="form-control" type="text" name="txtJumlahKamar" value="<?=$Kamar['jml_kamar'];?>" autocomplete="off"/>
</div>


<div class="form-group">
    <label class="font-weight-bold">Fasilitas Kamar</label>
    
    <?php
    if(isset($listFasilitasKamar)){
        $a=null;
        foreach($listFasilitasKamar as $row) {
            $a++;
            cekFasilitasDiKamar($idKamar,$row['id_fasilitas_kamar'])==1 ? $pilih='checked' : $pilih=null;
            echo '
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck-'.$a.'" name="txtIdFasilitasKamar[]" '.$pilih.' value="'.$row['id_fasilitas_kamar'].'">
                <label class="custom-control-label" for="customCheck-'.$a.'">'.$row['nama_fasilitas'].'</label>            
            </div>
            ';

        }
    }
    ?>
    
</div>

<div class="form-group">
    <label class="font-weight-bold">Fasilitas Kamar</label>
    <input class="form-control" type="file" name="txtFotoKamar"/>
</div>

<div class="form-group">
    <a href="javascript:history.back()" class="btn btn-warning btn-sm font-weight-bold">Batal</a>

    <button type="submit" class="btn btn-primary btn-sm font-weight-bold">Update</button>
</div>

</form>
<?=$this->endSection();?>