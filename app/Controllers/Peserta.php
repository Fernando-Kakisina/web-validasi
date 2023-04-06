<?php

namespace App\Controllers;

use App\Models\Daftar_PesertaModel;
use DateTime;

class Peserta extends BaseController
{
    protected $daftar_pesertaModel;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->daftar_pesertaModel = new Daftar_pesertaModel();
    }

    public function index()
    {
        // $peserta = $this->daftar_pesertaModel->findAll();

        $currentPage = $this->request->getVar('page_daftar_peserta') ? $this->request->getVar('page_daftar_peserta') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $peserta = $this->daftar_pesertaModel->search($keyword);
        } else {
            $peserta = $this->daftar_pesertaModel;
        }

        $data = [
            'title' => 'Daftar Peserta',
            // 'peserta' => $peserta,
            'daftar_peserta' => $peserta->paginate(10, 'daftar_peserta'),
            'pager' => $peserta->pager,
            'currentPage' => $currentPage
        ];

        // dd($data);
        return view('peserta/index', $data);
    }

    public function create()
    {
        // session();
        $validation = \Config\Services::validation();
        $data = [
            'title' => 'Tambah Data Peserta',
            'validation' => $validation
        ];

        return view('peserta/create', $data);
    }

    public function save()
    {
        $validate_data = $this->validate([
            'nama_peserta' => [
                'rules' => 'required|is_unique[daftar_peserta.nama_peserta]',
                'errors' => [
                    'required' => 'Nama Harus Diisi',
                    'is_unique' => 'Nama Sudah Terdaftar'
                ]
            ],
            'no_telepon' => [
                'rules' => 'required|is_unique[daftar_peserta.no_telepon]',
                'errors' => [
                    'required' => 'No. Telepon Harus Diisi',
                    'is_unique' => 'No. Telepon Sudah Terdaftar'
                ]
            ],
            'instansi' => [
                'rules' => 'required[daftar_peserta.instansi]',
                'errors' => [
                    'required' => 'Instansi Harus Diisi',
                ]
            ]
        ]);

        if (!$validate_data) {
            $validation = \Config\Services::validation();
            return redirect()->to('/peserta/create')
                ->withInput()
                ->with('validation', $validation);
        }

        $this->daftar_pesertaModel->save([
            'id' => 0,
            'nama_peserta' => $this->request->getVar('nama_peserta'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'instansi' => $this->request->getVar('instansi')
        ]);

        session()->setFlashdata('pesan', 'Data peserta berhasil ditambahkan');

        return redirect()->to('/peserta');
    }

    public function delete($id)
    {
        $this->daftar_pesertaModel->delete($id);
        session()->setFlashdata('pesan', 'Data peserta berhasil dihapus');
        return redirect()->to('/peserta');
    }

    public function edit($id)
    {
        // session();
        $validation = \Config\Services::validation();
        $data = [
            'title' => 'Ubah Data Peserta',
            'validation' => $validation,
            'peserta' => $this->daftar_pesertaModel->getPeserta($id)
        ];

        // dd($validation->listErrors(), $validation);
        return view('peserta/edit', $data);
    }

    public function update($id)
    {
        // Cek nama_peserta
        $pesertaLama = $this->daftar_pesertaModel->getPeserta($this->request->getVar('id'));
        if ($pesertaLama['nama_peserta'] == $this->request->getVar('nama_peserta')) {
            $ruleNama = 'required';
        } else {
            $ruleNama = 'required|is_unique[daftar_peserta.nama_peserta]';
        }

        // Cek no_telepon
        $pesertaLama = $this->daftar_pesertaModel->getPeserta($this->request->getVar('id'));
        if ($pesertaLama['no_telepon'] == $this->request->getVar('no_telepon')) {
            $ruleNoTelepon = 'required';
        } else {
            $ruleNoTelepon = 'required|is_unique[daftar_peserta.no_telepon]';
        }

        $validate_data = $this->validate([
            'nama_peserta' => [
                'rules' => $ruleNama,
                'errors' => [
                    'required' => 'Nama Harus Diisi',
                    'is_unique' => 'Nama Sudah Terdaftar'
                ]
            ],
            'no_telepon' => [
                'rules' => $ruleNoTelepon,
                'errors' => [
                    'required' => 'No. Telepon Harus Diisi',
                    'is_unique' => 'No. Telepon Sudah Terdaftar'
                ]
            ],
            'instansi' => [
                'rules' => 'required[daftar_peserta.instansi]',
                'errors' => [
                    'required' => 'Instansi Harus Diisi',
                ]
            ]
        ]);

        if (!$validate_data) {
            $validation = \Config\Services::validation();
            return redirect()->to('/peserta/edit/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
        }

        $this->daftar_pesertaModel->save([
            'id' => $id,
            'nama_peserta' => $this->request->getVar('nama_peserta'),
            'no_telepon' => $this->request->getVar('no_telepon'),
            'instansi' => $this->request->getVar('instansi')
        ]);

        session()->setFlashdata('pesan', 'Data peserta berhasil diubah');

        return redirect()->to('/peserta');
    }
}
