<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardPetugas extends BaseController
{
    public function index()
    {
        //tambah  panggilan view dashboard
        $data['intro']='<div class="jumbotron mt-5">
        <h1>Hai, '.session()->get('nama_pengguna').'</h1>
        <p>Silahkan gunakan halaman ini untuk  menampilkan informasi Hotel !</p>
        </div>';
        return view ('dashboardd', $data);
    }
}
