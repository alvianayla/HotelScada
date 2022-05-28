<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Reservasi;
use App\Models\Tamu;

class ReservasiController extends BaseController
{
    public function index(){
        $currentPage = $this->request->getVar('page_reservasi') ? $this->request->getVar('page_reservasi') :1; 

        //d($this->request->getVar('keyword'));

        $keyword = $this->request->getVar('keyword');
        if($keyword){ 
            $datatamu = $this->reservasi->search($keyword); 
        }else{
            $datatamu = $this->reservasi->findAll();    
        }

        $data = [
            'title'=> 'Berikut ini daftar Tamu yang sudah terdaftar dalam database.',
            //'tamu' => $datatamu->paginate(10, 'reservasi'),
            'tamu' => $datatamu,
            'pager' => $this->reservasi->pagers,
            'currentPage' => $currentPage
            ] ;
        return view('Reservasi/tampil', $data);
            }
        public function simpan()
    {
        $jml_kamar = $this->request->getPost('jumlahkamar');
        $id_tipe_kamar = $this->request->getPost('tipekamar');

        $kamar_tersedia = $this->kamar
            ->where('id_tipe_kamar', $id_tipe_kamar)
            ->where('status', 'tersedia')
            ->countAllResults();

        if ($kamar_tersedia < 1) {
            return redirect()->to('/hotel')->with('pesan-danger', 'Kamar yang anda pesan tidak tersedia');
        }

        if ($kamar_tersedia < $jml_kamar) {
            return redirect()->to('/hotel')->with('pesan-danger', 'Jumlah Kamar yang anda pesan meleibi jumlah kamar yang tersedia');
        }

        $tipekamar = $this->tipe_kamar->find($id_tipe_kamar);
        $hargatkamar = $tipekamar['harga'];

        $harga = $jml_kamar * $hargatkamar;
        // $harga= jumlah kamar * harga kamar

        //lama menginap = checkout - checkin
        $cekin = strtotime($this->request->getPost('cekin'));
        $cekout = strtotime($this->request->getPost('cekout'));
        $lama_menginap = ($cekout - $cekin) / 60 / 60 / 24;

        $total = $harga * $lama_menginap;
        //$total = harga * lama menginap  
        $datanya = [
            'nama_tamu' => $this->request->getPost('nama'),
            'email_tamu' => $this->request->getPost('email'),
            'nik' => $this->request->getPost('nik'),
            'id_tipe_kamar' => $this->request->getPost('tipekamar'),
            'checkin' => $this->request->getPost('cekin'),
            'checkout' => $this->request->getPost('cekout'),
            'jml_kamar' => $this->request->getPost('jumlahkamar'),
            'status' => 'pending',
            'harga' => $harga,
            'total' => $total
        ];
        $this->reservasi->insert($datanya);
        $id_reservasi = $this->reservasi->db->insertID();

        // Merubah status kamar menjadi di pesan
        $kamar_dipesan = $this->kamar
            ->where('id_tipe_kamar', $id_tipe_kamar)
            ->where('status', 'tersedia')
            ->get($jml_kamar)->getResultArray();

        $kamar_dipesan = array_map(function ($kamar) {
            $kamar['status'] = 'dipesan';
            return $kamar;
        }, $kamar_dipesan);

        foreach ($kamar_dipesan as $kamar) {
            $this->kamar->save($kamar);
        }
dd($this->reservasi->getInsertId());
        // return redirect()->to('/invoice/' . $this->reservasi->getInsertId());
    }
    public function invoice($id_reservasi)
    {
        // $data['reservasi'] = $this->reservasi->find($id_reservasi); // SELECT * FROM reservasi WHERE id_reservasi = $id_reservasi
        $syarat = ['id_reservasi' => $id_reservasi];
        // d($syarat);
        $data['reservasi'] = $this->reservasi
            // ->select('reservasi.*, tbl_kamar.tipe_kamar, tbl_kamar.harga_kamar AS harga_tipe_kamar')
            ->select('reservasi.*')
            // ->join('tbl_kamar', 'tbl_kamar.no_kamar = reservasi.tipe_kamar')
            // ->join('tamu', 'tamu.nik = reservasi.nik')
            ->find($syarat);
        // SELECT reservasi.*, tipe_kamar.tipe, tipe_kamar.harga AS harga_tipe_kamar
        // FROM reservasi
        // JOIN tipe_kamar ON tipe_kamar.id = reservasi.id_tipe_kamar
        // WHERE id_reservasi = $id_reservasi

        // dd($data);
        $data['reservasi']['lama_menginap'] = (strtotime($data['reservasi'][0]['cek-out']) - strtotime($data['reservasi'][0]['cek-in'])) / 60 / 60 / 24;
        
        return view('Reservasi/invoice', $data);
    }
    public function in($id_reservasi){
        $datanya = ['status' => ['cek-in']];
        $this->reservasi->update($id_reservasi, $datanya);
    return redirect()->to(site_url('/reservasi'))->with('berhasil','Data berhasil diupdate');
    }

    public function out($id_reservasi){
        $datanya = ['status' => ['cek-out']];
        $this->reservasi->update($id_reservasi, $datanya);
    return redirect()->to(site_url('/reservasi'))->with('berhasil','Data berhasil diupdate');

    }
    public function selesai($id_reservasi){
        $datanya = ['status' => ['selesai']];
        $this->reservasi->update($id_reservasi, $datanya);
    return redirect()->to('/invoice/' . $id_reservasi);
    
}
}