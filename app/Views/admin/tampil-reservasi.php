<?=$this->extend('admin/dashboard');?>
<?=$this->section('konten');?>
<h2><?=$JudulHalaman;?></h2>
<p><?=$introText;?></p>
<div class="row">
    <div class="col-md-6">
        <form name="form_filter_tgl" method="POST" action="<?=site_url('tampil-reservasi');?>">
            <div class="form-group">
            <label for="tglOrder" class="font-weight-bold">Tanggal Cek In</label>
                <div class="input-group mb-3">
                <input type="date" class="form-control" name="txtTanggalCekIn">
                    <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Filter Tanggal</button>
                    </div>
                </div> 
            </div>
        </form>
    </div>


    <div class="col-md-6">
        <form name="form_filter_nama" method="POST" action="<?=site_url('/tampil-reservasi');?>">
        <div class="form-group">
        <label for="txtNama" class="font-weight-bold">Nama Pemesan</label>
                <div class="input-group mb-3">
                <input type="text" class="form-control"  placeholder="Nama pemesan"  name="txtNamaPemesan">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Filter Nama</button>
                    </div>
                </div> 
            </div>
        </form>
    </div>

</div>

<div class="table-responsive">
<table class="table table-sm">
    <thead class=" bg-light">
        <tr>    
            <th>#</th>
            <th>Nama Pemesan - Tamu</th>
            <th>Tipe Kamar</th>
            <th>Jml. Kamar</th>            
            <th>Check In</th>
            <th>Check Out</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
    if(isset($listReservasi)){
        $no=null;
        foreach($listReservasi as $row){
        $no++; 
        if($row['status']==null ){
            $tombol=site_url('/set-cek-in/'.$row['id_reservasi']);
            $classTombol='badge-success';
            $labelTombol='Cek In';
        } else if($row['status']=='in' ){
            $tombol=site_url('/set-cek-out/'.$row['id_reservasi']);
            $classTombol='badge-danger';
            $labelTombol='Cek Out';
        }  else {
            $tombol='#';
            $classTombol='badge-dark';
            $labelTombol='Selesai';
        }
        ?>
        <tr>
            <td><?=$no;?></td>
            <td><?=$row['nama_pemesan'].' ('.$row['nama_tamu'].')';?></td>
            <td><?=ucwords($row['tipe_kamar']);?></td>
            <td><?=$row['jml_kamar_dipesan'];?> kamar</td>
            <td><?=$row['tgl_cek_in'];?></td>
            <td><?=$row['tgl_cek_out'];?></td>
            <td>
                <a href="<?=$tombol;?>" class="badge <?=$classTombol;?>"><?=$labelTombol;?></a>            
            </td>
        </tr>
        <?php
        }
    }
    ?>
    </tbody>
</table>
</div>

<?=$this->endSection();?>