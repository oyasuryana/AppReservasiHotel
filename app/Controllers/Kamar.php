<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kamar extends BaseController
{
    public function index()
    {
     $data['JudulHalaman']='Data Kamar';
     $data['introText']='<p>Berikut ini adalah daftar kamar, silahkan lakukan pengelolaan  data kamar </p>';   
     
     $data['listKamar']=$this->kamar->find();

     return view('admin/tampil-kamar',$data);   
    }

    public function tambah(){
        // 1. Set judul halaman
        $data['JudulHalaman']='Data Kamar';

        // 2. Set intro halaman
        $data['introText']='<p>Berikut ini adalah daftar kamar, silahkan lakukan pengelolaan  data kamar </p>';  
      
        // 3. kirim data fasilitas kamar untuk checkbox
        $data['listFasilitasKamar']=$this->fasilitaskamar->find(); 

        // 4. load form helper
        helper(['form']);
        $aturanForm=[
            'txtNomorKamar'=>'required'
        ];

        // 5. cek apakah txtNomorKamar diisi saat tombol simpan ditekan
        if($this->validate($aturanForm)){
            // 6. siapkan data kamar dalam array
            $dataKamar=[
                'no_kamar'=>$this->request->getPost('txtNomorKamar'),
                'tipe_kamar'=>$this->request->getPost('txtTipeKamar'),
                'foto_kamar'=>'-'
            ];
            // 7. simppan ke tbl_kamar
            $this->kamar->save($dataKamar);
            
            
            // 8. kumpulkan fasiltias kamar yang di ceklist dalam array
            $txtIdFasilitasKamar=$this->request->getPost('txtIdFasilitasKamar');
            for($a=0;$a<count($txtIdFasilitasKamar);$a++){
                $dataFasilitasKamar[]=[
                    //9. id_kamar berasal dari id_kamar terakhir yang disimpan
                    'id_kamar'=>$this->kamar->getInsertID(), 
                    'id_fasilitas_kamar'=>$txtIdFasilitasKamar[$a]    
                ];
            }
            // 10. simpan fasilitas kamar ke tbl_detail_kamar
            $this->detailkamar->insertBatch($dataFasilitasKamar);

            // 11. arahkan ke tampil kamar
            return redirect()->to(site_url('/tampil-kamar'))->with('info','<div class="alert alert-success">Data berhasil disimpan</div>');

        };
            // 12. load view admin/tambah-kamar.php        
        return view('admin/tambah-kamar',$data);      
    }

    public function hapus($idKamar){
        $syaratHapus=[
            'id_kamar'=>$idKamar
        ];
        $this->kamar->where($syaratHapus)->delete();
        return redirect()->to('/tampil-kamar')->with('info','<div class="alert alert-success">Kamar berhasil dihapus</div>');        
    }


    public function hapusItemFasilitas($idDetailKamar){
        $syaratHapus=[
            'id_detail_kamar'=>$idDetailKamar
        ];
        $this->detailkamar->delete($syaratHapus);
        return redirect()->to('/tampil-kamar')->with('info','<div class="alert alert-success">Fasilitas kamar berhasil dihapus</div>');        
    }

}
