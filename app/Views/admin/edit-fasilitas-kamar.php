<!-- memanggil isi file dashboard.php di folder view/admin -->
<?=$this->extend('admin/dashboard');?>
<!-- area putih halaman dashboard-->
<?=$this->section('konten');?>

<h2><?=$JudulHalaman;?></h2>
<?=$introText;?>

<form method="POST" action="<?=site_url('/edit-fasilitas-kamar');?>" enctype="multipart/form-data">

<div class="form-group">
    <label class="font-weight-bold">Nama Fasilitas</label>
    <input type="text" name="txtNamaFasilitas" class="form-control" value="<?=$detailFasilitasKamar['nama_fasilitas'];?>"/>

    <input type="hidden" name="txtIdFasilitasKamar" class="form-control" value="<?=$detailFasilitasKamar['id_fasilitas_kamar'];?>"/>

    <input type="hidden" name="txtFotoFasilitas" class="form-control" value="<?=$detailFasilitasKamar['foto_fasilitas'];?>"/>
</div>

<div class="form-group">
    <label class="font-weight-bold">Deskripsi Fasilitas</label>
    <textarea class="form-control" name="txtDeskrkipsiFasilitas" rows="5"><?=$detailFasilitasKamar['deskripsi_fasilitas'];?></textarea>
</div>

<div class="form-group">
    <label class="font-weight-bold">Foto Fasilitas</label>
    <input type="file" name="txtFotoFasilitas" class="form-control"/>
</div> 

<div class="form-group">
    <button class="btn btn-warning btn-sm" OnClick="javascipt:history.back()">Batal</button>
    <button class="btn btn-primary btn-sm">Update Data</button>

</div>

</form>

<?=$this->endSection();?>