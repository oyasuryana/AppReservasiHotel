<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use TCPDF;

class Reservasi extends BaseController
{
    public function index()
    {
        // 1. Set judul halaman
        $data['JudulHalaman']='Data Reservasi';

        // 2. Set intro halaman
        $data['introText']='<p>Berikut ini adalah data reservasi oleh calon tamu, silahkan lakukan pengelolaan  data reservasi dibawah ini. </p>';  

        // untuk pencarian nama
        if($this->request->getPost('txtNamaPemesan')!=null){
            $syarat=[
                'nama_pemesan'=>$this->request->getPost('txtNamaPemesan')
            ];
            $data['listReservasi']= $this->reservasi
            ->join('tbl_kamar','tbl_kamar.id_kamar=tbl_reservasi.id_kamar')
            ->where($syarat)
            ->find();
        } 
        // untuk pencarian tanggal cek in
        else if($this->request->getPost('txtTanggalCekIn')!=null) {  
            $syarat=[
                'tgl_cek_in'=>$this->request->getPost('txtTanggalCekIn')
            ];
            $data['listReservasi']= $this->reservasi
            ->join('tbl_kamar','tbl_kamar.id_kamar=tbl_reservasi.id_kamar')
            ->where($syarat)
            ->find();
        }
        // tanpa pencarian 
        else {
        $data['listReservasi']= $this->reservasi
                                ->join('tbl_kamar','tbl_kamar.id_kamar=tbl_reservasi.id_kamar')
                                ->find();
        }
        return view('admin/tampil-reservasi',$data);
    }

    public function order($idKamar=null){
        // 1. Set judul halaman
        $data['JudulHalaman']='Reservasi Kamar';

        // 2. Set detail kamar
        $syarat=[
            'id_kamar'=>$idKamar
        ];

        helper(['form']);

        $aturanForm=[
            'txtNamaPemesan'=>'required',
            'txtNoHandphone'=>'required',
            'txtEmail'=>'required',
            'txtNamaTamu'=>'required',
            'txtJmlKamarDipesan'=>'required',
            'txtTglCekIn'=>'required',
            'txtTglCekOut'=>'required'
        ];

        if($this->validate($aturanForm)){
            $dataOrder=[
                'nama_pemesan'=>$this->request->getPost('txtNamaPemesan'),
                'no_handphone'=>$this->request->getPost('txtNoHandphone'),
                'email'=>$this->request->getPost('txtEmail'),
                'nama_tamu'=>$this->request->getPost('txtNamaTamu'),
                'jml_kamar_dipesan'=>$this->request->getPost('txtJmlKamarDipesan'),
                'id_kamar'=>$this->request->getPost('txtIdKamar'),
                'tgl_cek_in'=>$this->request->getPost('txtTglCekIn'),
                'tgl_cek_out'=>$this->request->getPost('txtTglCekOut')            
            ];
            $this->reservasi->save($dataOrder);
            return redirect()->to(site_url());
        }

        if($idKamar!=null){
            $data['detailKamar']= $this->kamar->where($syarat)->find()[0];
        }
        
        $data['introText']='<p>Untuk melakukan reservasi kamar silahkan isi form reservasi dibawah ini ! </p>';  
        return view('form-order-kamar',$data);
    }


    public function setStatusIn($id_reservasi){
        $data=[
            'status'=>'in'
        ];
        $this->reservasi->update($id_reservasi,$data);
        return redirect()->to(site_url('/tampil-reservasi'));
    }

    public function setStatusOut($id_reservasi){

        $data=[
            'status'=>'out'
        ];

        $this->reservasi->update($id_reservasi,$data);
        return redirect()->to(site_url('/tampil-reservasi'));
    }

    public function invoice($idReservasi){
        $pdf = new TCPDF();
		$pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Dea Venditama');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();
        $html='<h1>Tes</h1>';
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		//line ini penting
		$this->response->setContentType('application/pdf');
		//Close and output PDF document
        $pdf->Output('invoice.pdf', 'I');
        	    
    }
}
