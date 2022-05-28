<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Petugas;
use App\Models\Fasilitashotel;

class FasilitasHotelController extends BaseController
{
    public function index()
    {
        //
    }
    public function tampilfasilitashotel()
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
        $Datafasilitas = New FasilitasHotel;
        $data['ListFasilitashotel'] = $Datafasilitas->findAll();
        return view('Fasilitashotel/tampil-fasilitas-hotel',$data);
    }
    public function tambahfasilitashotel(){
        if(!session()->get('sudahkahLogin')){
        return redirect()->to('/petugas');
        exit;
        }
        // cek apakah yang login bukan admin ?
        if(session()->get('level')!='admin'){
        return redirect()->to('/petugas/dashboard');
        exit;
        }
        return view('Fasilitashotel/tambah-fasilitas-hotel');
        }
        public function simpanfasilitashotel(){
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
    $Datafasilitas = New FasilitasHotel ;
    $datanya=[  
                'nama_fasilitas' => $this->request->getPost('txtInputNama'), 
                'deskripsi'=> $this->request->getPost('txtInputDeskripsi'),
                'foto'=> $upload->getName()
             ];
                $Datafasilitas->insert($datanya);
                return redirect()->to('/fasilitas-hotel');
            }
            public function editfasilitashotel($id_fasilitas_hotel){
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
                $Datafasilitas = New FasilitasHotel;
                $data['detailFasilitashotel']=$Datafasilitas->where('id_fasilitas_hotel',$id_fasilitas_hotel)->findAll();
                return view('Fasilitashotel/edit-fasilitas-hotel',$data);
                }
                public function updatefasilitashotel(){
                    // cek apakah sudah login
                    if(!session()->get('sudahkahLogin')){
                    return redirect()->to('/petugas');
                    exit;
                    }
                    // cek apakah yang login bukan admin ?
                    if(session()->get('level')!='admin'){
                    return redirect()->to('/petugas/dashboard') ;
                    exit;
                    }
                    $Datafasilitas = New FasilitasHotel;
                    helper(['form']);
                    $data=[
                        'nama_fasilitas'=>$this->request->getPost('txtInputNama'), 
                        'deskripsi'=>$this->request->getPost('txtInputDeskripsi'),
                    ];
                    $Datafasilitas->update($this->request->getPost('id_fasilitas'), $data);
                    return redirect()->to('/fasilitas-hotel');
                    }
                    public function editfoto($id_fasilitas_hotel){
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
                        $Datafasilitas = New FasilitasHotel;
                        $data['detailFasilitashotel']=$Datafasilitas->where('id_fasilitas_hotel',$id_fasilitas_hotel)->findAll();
                        return view('Fasilitashotel/edit-foto',$data);
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
                        $Datafasilitas = New FasilitasHotel;
                        $syarat = $this->request->getPost('foto');
                        unlink('gambar/'.$syarat);
                        $upload = $this->request->getFile('txtInputFoto');
                        $upload->move(WRITEPATH . '../public/gambar/');
                        $data = ['foto'=>$upload->getName()];
                        $Datafasilitas->update($this->request->getPost('txtInputNama'),$data);
                        return redirect()->to('/fasilitas-hotel');
                    }
                    public function hapusfasilitashotel($id_fasilitas_hotel){
                    if(!session()->get('sudahkahLogin')){
                    return redirect()->to('/petugas');
                    exit;
                }
                // cek apakah yang login bukan admin ?
                if(session()->get('level')!='admin'){
                    return redirect()->to('/petugas/dashboard');
                    exit;
                }
                $Datafasilitas = New FasilitasHotel;
                $syarat=['id_fasilitas_hotel'=>$id_fasilitas_hotel];
                $infoFile=$Datafasilitas->where($syarat)->find();
                //Hapus Foto
                unlink('gambar/'.$infoFile[0]['foto']);
                //Hapus Data 
                $Datafasilitas->where('id_fasilitas_hotel',$id_fasilitas_hotel)->delete();
                return redirect()->to('/fasilitas-hotel');
            }                  
        }