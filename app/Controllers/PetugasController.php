<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Petugas;
use App\Models\Kamar;

class PetugasController extends BaseController
{
    public function index()
    {
        return view('v_login');
    }
    public function login()
    {
        $Datapetugas = New Petugas;
        $syarat = [ 'username'=> $this->request->getPost('txtUsername'),'password'=>md5($this->request->getPost('txtPassword'))];
        $Userpetugas = $Datapetugas->where($syarat)->find(); if(count($Userpetugas)==1)
        {
            $session_data=['username' => $Userpetugas[0]['username'],
            'id_petugas' => $Userpetugas[0]['id_petugas'],
            'level' => $Userpetugas[0]['level'],
            'sudahkahLogin' => TRUE];
            session()->set($session_data);
            return redirect()->to('/petugas/dashboard');
        }else{
            return redirect()->to('/petugas');
        }
    }
    public function logout(){
        return view('v_login');
    }
    public function tampilkamar()
    {
        if(!session()->get('sudahkahLogin')){

            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if(session()->get('level')!='admin'){
            return redirect()->to('/petugas/dashboard');
            exit;
        }
        $DataKamar = New Kamar;
        $data['Listkamar'] = $DataKamar->findAll();
        return view('Petugas/tampil-kamar',$data);
    }
    public function tambahkamar(){
        if(!session()->get('sudahkahLogin')){
        return redirect()->to('/petugas');
        exit;
        }
        // cek apakah yang login bukan admin ?
        if(session()->get('level')!='admin'){
        return redirect()->to('/petugas/dashboard');
        exit;
        }
        return view('Petugas/tambah-kamar');
        }
        public function simpankamar(){
            if(!session()->get('sudahkahLogin')){
            return redirect()->to('/petugas');
            exit;
        }
        // cek apakah yang login bukan admin ?
        if(session()->get('level')!='admin'){
        return redirect()->to('/petugas/dashboard');
        exit;
    }
    helper(['form']);
    $upload = $this->request->getFile('txtInputFoto');
    $upload->move(WRITEPATH . '../public/gambar/');
    $DataKamar = New Kamar;
    $datanya=[  'no_kamar'=>$this->request->getPost('txtInputNo'), 
                'tipe_kamar'=>$this->request->getPost('txtInputTipe'), 
                'deskripsi'=>$this->request->getPost('txtInputDeskripsi'),
                'harga_kamar'=>$this->request->getPost('txtInputHarga'),
                'fasilitas_kamar'=>$this->request->getPost('txtInputFasilitas'),
                'jumlahkamar'=>$this->request->getPost('txtInputJumlah'),
                'foto'=> $upload->getName()
            ];
                $DataKamar->insert($datanya);
                return redirect()->to('/kamar');
            }
            public function editkamar($no_kamar){
                // cek apakah sudah login ?
                if(!session()->get('sudahkahLogin')){
                return redirect()->to('/petugas');
                exit;
                }
                // cek apakah yang login bukan admin ?
                if(session()->get('level')!='admin'){
                return redirect()->to('/petugas/dashboard');
                exit;
                }
                // cek apakah yang login bukan admin ?
                if(session()->get('level')!='admin'){
                return redirect()->to('/petugas/dashboard');
                exit;
                }
                $DataKamar = New Kamar;
                $data['detailKamar']=$DataKamar->where('no_kamar',$no_kamar)->findAll();
                return view('Petugas/edit-kamar',$data);
                }
                public function updatekamar(){
                    // cek apakah sudah login
                    if(!session()->get('sudahkahLogin')){
                    return redirect()->to('/petugas');
                    exit;
                    }
                    // cek apakah yang login bukan admin ?
                    if(session()->get('level')!='admin'){
                    return redirect()->to('/petugas/dashboard');
                    exit;
                    }
                    $DataKamar = New Kamar;
                    helper(['form']);
                    $data=[
                        'tipe_kamar'=>$this->request->getPost('txtInputTipe'), 
                        'deskripsi'=>$this->request->getPost('txtInputDeskripsi'),
                        'harga_kamar'=>$this->request->getPost('txtInputHarga'),
                        'fasilitas_kamar'=>$this->request->getPost('txtInputFasilitas'),
                        'jumlahkamar'=>$this->request->getPost('txtInputJumlah'),
                    ];
                    $DataKamar->update($this->request->getPost('txtInputNo'), $data);
                    return redirect()->to('/kamar');
                    }
                    public function editfoto($no_kamar){
                        // cek apakah sudah login ?
                        if(!session()->get('sudahkahLogin')){
                        return redirect()->to('/petugas');
                        exit;
                        }
                        // cek apakah yang login bukan admin ?
                        if(session()->get('level')!='admin'){
                        return redirect()->to('/petugas/dashboard');
                        exit;
                        }
                        // cek apakah yang login bukan admin ?
                        if(session()->get('level')!='admin'){
                        return redirect()->to('/petugas/dashboard');
                        exit;
                        }
                        $DataKamar = New Kamar;
                        $data['detailKamar']=$DataKamar->where('no_kamar',$no_kamar)->findAll();
                        return view('Petugas/edit-foto',$data);
                        }
                    public function updatefoto(){
                        if(!session()->get('sudahkahLogin')){
                            return redirect()->to('/petugas');
                            exit;
                        }
                        // cek apakah yang login bukan admin ?
                        if(session()->get('level')!='admin'){
                            return redirect()->to('/petugas/dashboard');
                            exit;
                        }
                        helper(['form']);
                        $DataKamar = New Kamar;
                        $syarat = $this->request->getPost('foto');
                        unlink('gambar/'.$syarat);
                        $upload = $this->request->getFile('txtInputFoto');
                        $upload->move(WRITEPATH . '../public/gambar/');
                        $data = ['foto'=>$upload->getName()];
                        $DataKamar->update($this->request->getPost('txtInputNo'),$data);
                        return redirect()->to('/kamar');
                    }
                    public function hapuskamar($no_kamar){
                    if(!session()->get('sudahkahLogin')){
                    return redirect()->to('/petugas');
                    exit;
                }
                // cek apakah yang login bukan admin ?
                if(session()->get('level')!='admin'){
                    return redirect()->to('/petugas/dashboard');
                    exit;
                }
                $DataKamar = New Kamar;
                $syarat=['no_kamar'=>$no_kamar];
                $infoFile=$DataKamar->where($syarat)->find();
                //Hapus Foto
                unlink('gambar/'.$infoFile[0]['foto']);
                //Hapus Data 
                $DataKamar->where('no_kamar',$no_kamar)->delete();
                return redirect()->to('/kamar');
            }                   
        }
