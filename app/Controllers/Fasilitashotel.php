<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Fasilitashotel extends BaseController
{
    public function index()
    {
        // membuat data dengan index JudulHalaman dan mengirim ke views
        $data['JudulHalaman']='Fasilitas Hotel';

        // membuat data index introText dan mengirim ke views
        $data['introText']='<p>Berikut ini adalah daftar fasilitas hotel, silahkan lakukan pengelolaan  fasilitas hotel</p>';
        
        $data['listFasilitas']=$this->fasilitashotel->find();
        // memanggil file tampil-fasilitas-hotel.php di folder app\views\admin
        return view('admin/tampil-fasilitas-hotel', $data);
    }

    public function tambah(){
        // 1. membuat data dengan index JudulHalaman & intro dan mengirim ke views
        $data['JudulHalaman']='Penambahan Fasilitas Hotel';
        $data['introText']='<p>Silahkan masukan data fasilitas hotel pada form dibawah ini !</p>';

        // 2. load helper form    
        helper(['form']);
        
        // 3. buat aturan form 
        $aturanForm=[
            'txtNamaFasilitas'=>'required',
            'txtDeskrkipsiFasilitas'=>'required'
        ];

        // 4. mengecek apakah tombol simpan diklik ?
        if($this->validate($aturanForm)){
            //echo $this->request->getPost('txtNamaFasilitas');
            //echo $this->request->getPost('txtDeskrkipsiFasilitas');
            $data=[
                'nama_fasilitas'=> $this->request->getPost('txtNamaFasilitas'),
                'deskripsi_fasilitas' => $this->request->getPost('txtDeskrkipsiFasilitas'),
                'foto_fasilitas'=>'-'
            ];
            $this->fasilitashotel->save($data);
            return redirect()->to(site_url('/fasilitas-hotel'));
        }

        return view('admin/tambah-fasilitas-hotel',$data);
    } 

    public function hapus($id_fasilitas_hotel){
        $this->fasilitashotel->where('id_fasilitas_hotel',$id_fasilitas_hotel)->delete();
        return redirect()->to(site_url('/fasilitas-hotel'))->with('info','data berhasil dihapus');
    }
}
