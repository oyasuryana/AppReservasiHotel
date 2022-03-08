<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        return view('admin/form_login');
    }

    public function login()
    {   
        // di kelas XI $_POST['txtUser']
        //1. menampung username dan password
        $usernya     =  $this->request->getPost('txtUser');   
        $passwordnya =  md5($this->request->getPost('txtPass'));
        
        // array untuk menentukan syarat siapa yang login
        $syarat=[
            'username'=>$usernya,
            'password'=>$passwordnya
        ];
        
        // mencari user berdasarkan syarat diatas
        $queryUser = $this->admin->where($syarat)->find();  
        
        //SQL = select * from tbluser where usename = ? and password = ?

        // membuktikan apakah user ada atau tida
        //var_dump($queryUser);
        
        if(count($queryUser)==1){
            // membuat session
            $dataSession=[
                'user' =>$queryUser[0]['username'],
                'nama' =>$queryUser[0]['namauser'],
                'level' =>$queryUser[0]['leveluser'] ,
                'sudahkahLogin'=>true
            ];
            session()->set($dataSession);
            
            // jika sukses login arahkan ke dashboar
          return redirect()->to(site_url('/dashboard'));
        } else {
            //mengembalikan ke halamana login
            return redirect()->to(site_url('/login'))->with('info','<div style="color:red;font-size:10px">Gagal Login</div>');
        }

    }

    public function logout(){
        // 1. menghapus session
        session()->destroy();
        // 2. mengarahkan ke halaman login
        return redirect()->to(site_url('/login'));
    }

}
