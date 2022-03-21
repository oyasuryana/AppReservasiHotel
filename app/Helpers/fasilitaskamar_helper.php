<?php

// memanggil modelMdetailkamar 
use App\Models\Mdetailkamar;

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
