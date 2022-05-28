<?php

namespace App\Controllers;
use App\Models\Kamar;
use App\Models\Fasilitashotel;
use App\Models\Reservasi;
use App\Models\Tamu;
class Home extends BaseController
{
    public function index()
    {
        return view('hotel');
    }

    public function kamar(){
        $DataKamar = New Kamar;
        $data['Listkamar'] = $DataKamar->findAll();
        return view ('kamar', $data);
    }
    public function fasilitas(){
        $Datafasilitas = New FasilitasHotel;
        $data['ListFasilitashotel'] = $Datafasilitas->findAll();
            return view('fasilitas', $data);
    }
    public function form_reservasi()
    {
        $data['Listkamar'] = $this->kamar->findAll();
        return view('reservasi', $data);
    }
    public function cari(){
        $keyword = $this->request->getVar('keyword');
        $datatamu = $this->reservasi->cari($keyword);
        $data = [
            'title'=> 'Berikut ini daftar Tamu yang sudah terdaftar dalam database.',
            'tamu' => $datatamu
            ] ;
        return view ('cari', $data);
    }
    public function register()
    {
        return view('register');
    }
    public function reservasi(){
        helper(['form']);
        $aturanForm=[
            'txtInputTipeKamar'=>'required',
            'nama'=>'required',
            'nohp'=>'required',
            'email'=>'required',
            'tamu'=>'required',
            'checkin'=>'required',
            'checkout'=>'required',
            'jml_kmr'=>'required'
        ];
        $checkin = $this->request->getPost('checkin');
        $checkout =$this->request->getPost('checkout');

        $in =new \DateTime($checkin);
        $out =new \DateTime($checkout);
        $interval= $in->diff($out);
        $jml_hari =$interval->d;
        // ambil harga
        $tipe_kamar = $this->request->getPost('txtInputTipeKamar');
        $hrg = $this->kamar->select('harga_kamar')
        ->where('tipe_kamar', $tipe_kamar)
        ->find()[0]['harga_kamar'];
        d($hrg);
        if($this->validate($aturanForm)){
            $data=[
                'tipe_kamar'=>$this->request->getPost('txtInputTipeKamar'),
                'nama_pemesan'=>$this->request->getPost('nama'),
                'nik'=>$this->request->getPost('nik'),
                'email_pemesan'=>$this->request->getPost('email'),
                'nama_tamu'=>$this->request->getPost('tamu'),
                'no_telp'=>$this->request->getPost('nohp'),
                'cek-in'=>$this->request->getPost('checkin'),
                'cek-out'=>$this->request->getPost('checkout'),
                'jumlah_kamar'=>$this->request->getPost('jml_kmr'),
                'harga_kamar' => $hrg,
                'total' => $hrg * $this->request->getPost('jml_kmr') * $jml_hari,
            ];
            d($data);
            $this->reservasi->save($data);
            return redirect()->to('/invoice/' . $this->reservasi->getInsertId());
        }
        
        // return view ('reservasi', $data);
    }

// public function invoice($id_reservasi)
// {
//     // $data['reservasi'] = $this->reservasi->find($id_reservasi); // SELECT * FROM reservasi WHERE id_reservasi = $id_reservasi
//     $data['reservasi'] = $this->reservasi
//         ->select('reservasi.*, tipe_kamar.tipe, tipe_kamar.harga AS harga_tipe_kamar')
//         ->join('tipe_kamar', 'tipe_kamar.id = reservasi.id_tipe_kamar')
//         ->find($id_reservasi);
//     // SELECT reservasi.*, tipe_kamar.tipe, tipe_kamar.harga AS harga_tipe_kamar
//     // FROM reservasi
//     // JOIN tipe_kamar ON tipe_kamar.id = reservasi.id_tipe_kamar
//     // WHERE id_reservasi = $id_reservasi

//     $data['reservasi']['lama_menginap'] = (strtotime($data['reservasi']['cek-out']) - strtotime($data['reservasi']['cek-in'])) / 60 / 60 / 24;
//     // dd($data);

//     return view('Reservasi/invoice', $data);
//     return redirect()->to('/form-reservasi');
// }
}