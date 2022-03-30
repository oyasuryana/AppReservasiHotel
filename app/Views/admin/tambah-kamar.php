<?=$this->extend('admin/dashboard');?>
<?=$this->section('konten');?>
<h2><?=$JudulHalaman;?></h2>
<p><?=$introText;?>

<form method="POST" action="<?=site_url('/tambah-kamar');?>" enctype="multipart/form-data">

<div class="form-group">
    <label class="font-weight-bold">Tipe Kamar</label>
    <select class="form-control" name="txtTipeKamar"  autofocus>
     <option value="standar">Standar</option>
     <option value="single">Single</option>
     <option value="deluxe">Deluxe</option>
     <option value="suite">Suite</option>
    </select>
</div>
<div class="form-group">
    <label class="font-weight-bold">Harga Kamar Per Malam</label>
    <input class="form-control" type="text" name="txtHargaKamar" autocomplete="off"/>
</div>

<div class="form-group">
    <label class="font-weight-bold">Jumlah Kamar</label>
    <input class="form-control" type="text" name="txtJumlahKamar" autocomplete="off"/>
</div>

<div class="form-group">
    <label class="font-weight-bold">Fasilitas Kamar</label>
    
    <?php
    if(isset($listFasilitasKamar)){
        $a=null;
        foreach($listFasilitasKamar as $row) {
            $a++;
            echo '
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck-'.$a.'" name="txtIdFasilitasKamar[]" value="'.$row['id_fasilitas_kamar'].'">
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

    <button type="submit" class="btn btn-primary btn-sm font-weight-bold">Simpan</button>
</div>

</form>
<?=$this->endSection();?>