<?php

namespace App\Models;

use CodeIgniter\Model;

class Reservasi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'reservasi';
    protected $primaryKey       = 'id_reservasi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_reservasi','nik', 'tipe_kamar', 'nama_pemesan','email_pemesan','nama_tamu', 'no_telp', 'cek-in','cek-out','jumlah_kamar','harga_kamar','total','status'];

    public function search($keyword){
        return $this->table('reservasi')->like('nama_tamu', $keyword)->orLike('cek-in', $keyword);
        }
        public function cari($keyword){
            $this->table('reservasi')->like('email_pemesan', $keyword);
            $this->table('reservasi')->like('status', 'cek-in');
            return $this->table('reservasi')->find();
            }

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
