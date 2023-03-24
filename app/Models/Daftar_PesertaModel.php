<?php

namespace App\Models;

use CodeIgniter\Model;

class Daftar_PesertaModel extends Model
{
    protected $table = 'daftar_peserta';
    // protected $useTimestamps = true;
    protected $allowedFields = ['nama_peserta', 'no_telepon', 'instansi'];

    public function getPeserta($id)
    {
        return $this->find($id);
    }
}
