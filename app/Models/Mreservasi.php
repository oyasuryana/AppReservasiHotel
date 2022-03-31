<?php

namespace App\Models;

use CodeIgniter\Model;

class Mreservasi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_reservasi';
    protected $primaryKey       = 'id_reservasi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_reservasi','nama_pemesan',
                                    'no_handphone','email',
                                    'nama_tamu','id_kamar','tgl_cek_in',
                                    'tgl_cek_out','jml_kamar_dipesan','status'];

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


    public function cariData($kataKunci){
        $reservasi = new Mreservasi;
        $reservasi->like('nama_pemesan',$kataKunci);
        return $reservasi->find();
    }

}
