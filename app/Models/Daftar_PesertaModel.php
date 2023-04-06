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

    public function search($keyword)
    {
        // $builder = $this->table('daftar_peserta');
        // $builder->like('nama_peserta', $keyword);
        // return $builder;

        return $this->table('daftar_peserta')->like('nama_peserta', $keyword)->orLike('no_telepon', $keyword);
    }
}
