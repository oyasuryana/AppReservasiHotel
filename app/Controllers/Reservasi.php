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
            ->like($syarat)
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
                                ->orderBy('tbl_reservasi.tgl_cek_in','desc')
                                ->find();
        }
        return view('admin/tampil-reservasi',$data);
    }

    public function cekKamar(){
        $data=[
            'JudulHalaman' =>'Pengecekan Ketersediaan Kamar',
            'introText'=> 'Berikut ini daftar kamar beserta status keterediaan kamar '
        ];
        $data['listKamar']= $this->kamar->find();
        return view('admin/cek-kamar',$data);
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

    public function hasilCari(){
        $data['JudulHalaman']='Hasil Pencarian';
        $data['introText']='Berikut ini hasil pencarian invoice atas nama '.$this->request->getPost('txtKataKunci');
        $data['listHasilCari']=$this->reservasi->cariData($this->request->getPost('txtKataKunci'));

        return view('hasil-pencarian-invoice.php',$data);
    }

    public function invoice($idReservasi){
        $detailReservasi=$this->reservasi->select('tbl_reservasi.id_reservasi,tbl_reservasi.nama_pemesan,tbl_reservasi.no_handphone,tbl_reservasi.email,tbl_reservasi.tgl_cek_in,tbl_reservasi.tgl_cek_out,tbl_reservasi.jml_kamar_dipesan,
        tbl_kamar.tipe_kamar,tbl_kamar.harga_kamar,datediff(tbl_reservasi.tgl_cek_out,tbl_reservasi.tgl_cek_in) as jmlHari,(datediff(tbl_reservasi.tgl_cek_out,tbl_reservasi.tgl_cek_in)*tbl_kamar.harga_kamar * tbl_reservasi.jml_kamar_dipesan ) as totalBayar')
                         ->join('tbl_kamar','tbl_kamar.id_kamar=tbl_reservasi.id_kamar')
                         ->where('id_reservasi',$idReservasi)->find()[0];


        $pdf = new TCPDF();
		$pdf = new TCPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Oya Suryana');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

        $pdf->addPage();
        $html=null;

        $html .='<p style="margin-right:250px">';
        $html .='To :</br>';
        $html .= $detailReservasi['nama_pemesan'].'<br/>';
        $html .= $detailReservasi['no_handphone'].'<br/>';
        $html .= $detailReservasi['email'].'<br/>';

        $html .='</p>';
        $html .= '<h1 align="center">Invoice<br/>';
        $html .= '<span style="font-size:12pt">Nomor : #INV-'.$detailReservasi['id_reservasi'].'</span></h1>';
        $html .= '<table border="1" cellpadding="1">';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th width="25px">No</th>
                  <th width="250px">Item</th>
                  <th width="55px">Qty</th>
                  <th width="85px">Price</th>
                  <th width="115px">Amount</th>';
        $html .= '</tr>';
        $html .= '</thead>';

        $html .='<tr style="min-height:400px">
        <td width="25px">1</td>
        <td width="250px">Room : '.ucwords($detailReservasi['tipe_kamar']).' <br/>
            From : '.$detailReservasi['tgl_cek_in'].'<br/>
            To   : '.$detailReservasi['tgl_cek_out'].'
        </td>
        <td width="55px">'.$detailReservasi['jml_kamar_dipesan'].' kamar<br/>'.
        $detailReservasi['jmlHari'].' hari</td>
        <td width="85px">Rp. '.number_format($detailReservasi['harga_kamar'],0,',','.').'</td>
        <td width="115px">Rp. '.number_format($detailReservasi['totalBayar'],0,',','.').'</td>
        </tr>';
        $html .='</table>';

        // output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		//line ini penting
		$this->response->setContentType('application/pdf');
		//Close and output PDF document
        $pdf->Output('INV-'.$idReservasi.'.pdf', 'I');
        	    
    }



}
