<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // 1. Daftar kamar
        $data['listKamar']=$this->kamar->distinct()->find();
        return view('beranda',$data);
    }
}
