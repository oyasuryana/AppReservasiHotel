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
            'txtHargaKamar'=>'required'
        ];

        // 5. cek apakah txtHargaKamar diisi saat tombol simpan ditekan
        if($this->validate($aturanForm)){
            // 6. ambil file foto simpan di variabel $foto
            $foto=$this->request->getFile('txtFotoKamar');

            // 7. upload foto ke folder upload
            $foto->move('uploads');

            // 8. siapkan data kamar dalam array
            $dataKamar=[
                'jml_kamar'=>$this->request->getPost('txtJumlahKamar'),
                'harga_kamar'=>$this->request->getPost('txtHargaKamar'),
                'tipe_kamar'=>$this->request->getPost('txtTipeKamar'),
                'foto_kamar'=>$foto->getClientName()  // nama file foto disimpan ke database
            ];
            // 9. simppan ke tbl_kamar
            $this->kamar->save($dataKamar);

            // 10. kumpulkan fasiltias kamar yang di ceklist dalam array
            $txtIdFasilitasKamar=$this->request->getPost('txtIdFasilitasKamar');
            for($a=0;$a<count($txtIdFasilitasKamar);$a++){
                $dataFasilitasKamar[]=[
                    //11. id_kamar berasal dari id_kamar terakhir yang disimpan
                    'id_kamar'=>$this->kamar->getInsertID(), 
                    'id_fasilitas_kamar'=>$txtIdFasilitasKamar[$a]    
                ];
            }
            // 12. simpan fasilitas kamar ke tbl_detail_kamar
            $this->detailkamar->insertBatch($dataFasilitasKamar);

            // 13. arahkan ke tampil kamar
            return redirect()->to(site_url('/tampil-kamar'))->with('info','<div class="alert alert-success">Data berhasil disimpan</div>');

        };
            // 13. load view admin/tambah-kamar.php        
        return view('admin/tambah-kamar',$data);      
    }

    
    public function hapus($idKamar){
        // 1. syarat hapus kamar
        $syaratHapus=[
            'id_kamar'=>$idKamar
        ];
        
        // 2. info detail kamar yang akan dihapus
        $detailKamar=$this->kamar->where($syaratHapus)->find()[0];

        // 3. hapus file foto kamar di folder upload
        unlink('uploads/'.$detailKamar['foto_kamar']);

        // 4. hapus kamar mysql
        $this->kamar->where($syaratHapus)->delete();

        // 5. arahkan ke tampil-kamar dengan membawa pesan sukes hapus
        return redirect()->to('/tampil-kamar')->with('info','<div class="alert alert-success">Kamar berhasil dihapus</div>');        
    }


    public function edit($idKamar=null){
        // 1. Set judul halaman
        $data['JudulHalaman']='Data Kamar';

        // 2. Set intro halaman
        $data['introText']='<p>Berikut ini adalah daftar kamar, silahkan lakukan pengelolaan  data kamar </p>';  

        // 3. Bagian hanya dijalankan ketika mengklik tombol edit
        if($idKamar!=null){
            // 4. syarat hapus kamar
            $syarat=[
                'id_kamar'=>$idKamar
            ];
            
            // 5. info  kamar yang akan dihapus
            $data['Kamar']=$this->kamar->where($syarat)->find()[0];
            $data['idKamar']=$idKamar;
        }

        // 6. kirim data fasilitas kamar untuk checkbox
        $data['listFasilitasKamar']=$this->fasilitaskamar->find(); 

        // 7. load form helper
        helper(['form']);
        $aturanForm=[
            'txtHargaKamar'=>'required'
        ];

        // 8. bagian ini dijalankan jika tombol update diklik
        if($this->validate($aturanForm)){
            
            // 9. menampung file foto
            $foto=$this->request->getFile('txtFotoKamar');
            
            // 10. mengecek apakah memilih file foto atau tidak
            if($foto->isValid()){
                // 11. upload yang baru
                unlink('uploads/'.$this->request->getPost['txtFotoKamar']);
                $foto->move('uploads');
                $dataKamar=[
                    'jml_kamar'=>$this->request->getPost('txtJumlahKamar'),
                    'harga_kamar'=>$this->request->getPost('txtHargaKamar'),
                    'tipe_kamar'=>$this->request->getPost('txtTipeKamar'),
                    'foto_kamar'=>$foto->getClientName()
                ];
            }else {
                // 11. data kamar baru
                $dataKamar=[
                    'jml_kamar'=>$this->request->getPost('txtJumlahKamar'),
                    'harga_kamar'=>$this->request->getPost('txtHargaKamar'),
                    'tipe_kamar'=>$this->request->getPost('txtTipeKamar')
                ];
            }

            // 12. update data  kamar
            $this->kamar->update($this->request->getPost('txtIdKamar'),$dataKamar);

            // 13. kosongkan fasilitas kamar
            $this->detailkamar->where('id_kamar',$this->request->getPost('txtIdKamar'))->delete();

            // 14. kumpulkan fasiltias yang baru kamar yang di ceklist dalam array
            $txtIdFasilitasKamar=$this->request->getPost('txtIdFasilitasKamar');
            if($txtIdFasilitasKamar!=null){
                for($a=0;$a<count($txtIdFasilitasKamar);$a++){
                    $dataFasilitasKamar[]=[
                        //15. id_kamar berasal dari id_kamar terakhir yang disimpan
                        'id_kamar'=>$this->request->getPost('txtIdKamar'), 
                        'id_fasilitas_kamar'=>$txtIdFasilitasKamar[$a]    
                    ];
                }
                // 16. simpan fasilitas kamar ke tbl_detail_kamar
                $this->detailkamar->insertBatch($dataFasilitasKamar);
            }
            // 17. arahkan ke tampil-kamar dengan membawa pesan sukes hapus
            return redirect()->to('/tampil-kamar')->with('info','<div class="alert alert-success">Kamar berhasil diupdate</div>');        
        }        

        // 18. load view admin/tambah-kamar.php        
        return view('admin/edit-kamar',$data);      
    }

}
