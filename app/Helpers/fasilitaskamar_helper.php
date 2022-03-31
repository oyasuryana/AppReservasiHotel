<?php

// memanggil modelMdetailkamar 
use App\Models\Mdetailkamar;
use App\Models\MKamar;

// mengambil daftar fasilitas kamar berdasarkan id kamar
function listFasilitasKamar($idKamar){
    $detailKamar=New Mdetailkamar;
    
    $syarat=[
        'id_kamar'=>$idKamar
    ];

    $listDetailKamar =  $detailKamar
                        ->join('tbl_fasilitas_kamar','tbl_fasilitas_kamar.id_fasilitas_kamar=tbl_detail_kamar.id_fasilitas_kamar')
                        ->where($syarat)
                        ->find();

    return $listDetailKamar;
}

// disaat edit kamar
function cekFasilitasDiKamar($idKamar,$idFasilitasKamar){
    $detailKamar=New Mdetailkamar;
    
    $syarat=[
        'id_kamar'=>$idKamar,
        'id_fasilitas_kamar'=>$idFasilitasKamar
    ];

    $listDetailKamar =  $detailKamar
                        ->where($syarat)
                        ->find();

    return count($listDetailKamar);

}

function jmlKamarTerisi($idKamar){
    $kamar= New Mkamar;
    $syarat=[
        'tbl_reservasi.status'=>'in',
        'tbl_reservasi.id_kamar'=>$idKamar
    ];

    $kamarTerisi=$kamar->select('tbl_kamar.tipe_kamar,
                                    sum(tbl_reservasi.jml_kamar_dipesan) as kamar_terisi')
                  ->join('tbl_reservasi','tbl_kamar.id_kamar=tbl_reservasi.id_kamar')
                  ->where($syarat)
                  ->find()[0];
    return $kamarTerisi['kamar_terisi'];                                   
}