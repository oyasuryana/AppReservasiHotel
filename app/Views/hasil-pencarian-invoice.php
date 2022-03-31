<?=$this->extend('beranda');?>
<?=$this->section('konten');?>
<table class="table table-hover table-sm">
<thead class="bg-light">
    <tr>
        <th>#</th>
        <th>Nama Pemesan</th>
        <th>Nama Tamu</th>
        <th>Tgl Cek In</th>
        <th>Tgl Cek Out</th>
        <th>Invoice</th>
    </tr>
</thead>
<tbody>
<?php
    if(isset($listHasilCari)){
        foreach($listHasilCari as $row){
        echo '
        <tr>
            <td></td>
            <td>'.$row['nama_pemesan'].'</td>
            <td>'.$row['nama_tamu'].'</td>
            <td>'.$row['tgl_cek_in'].'</td>
            <td>'.$row['tgl_cek_out'].'</td>
            <td>
                <a href="'.site_url('/cetak-invoice/'.$row['id_reservasi']).'" class="badge badge-primary">Download</a>
            </td>
        </tr>
        ';
        }
    }
//    print_r($listHasilCari);
?>
</tbody>
</table>


<?=$this->endSection();?>