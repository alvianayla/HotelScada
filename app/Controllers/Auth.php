<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tamu;

class Auth extends BaseController
{
    public function index()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }
     public function login()
    {
        $DataTamu = New Tamu;
        $syarat = [ ''=> $this->request->getPost('txtemail'),'password'=>md5($this->request->getPost('txtPassword'))];
        $Userpetugas = $DataTamu->where($syarat)->find(); if(count($Userpetugas)==1)
        {
            $session_data=['username' => $Userpetugas[0]['email'],
            'nik' => $Userpetugas[0]['nik'],
            'sudahkahLogin' => TRUE];
            session()->set($session_data);
            return redirect()->to('/kamar');
        }
    }
}