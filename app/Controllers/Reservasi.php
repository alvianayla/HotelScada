<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Reservasi extends BaseController
{
    public function index()
    {
        $currentPage = $this->request->getVar('page_reservasi') ? $this->request->getVar('page_reservasi') :1; 

        //d($this->request->getVar('keyword'));
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $datatamu = $this->reservasi->search($keyword);
        }else{
            $datatamu = $this->reservasi;    
        }

        $data = [
            'title'=> 'Berikut ini daftar Tamu yang sudah terdaftar dalam database.',
            'tamu' => $datatamu->paginate(10, 'reservasi'),
            'pager' => $this->reservasi->pager,
            'currentPage' => $currentPage
            ] ;
        return view('Reservasi/tampil', $data);
    }
}
