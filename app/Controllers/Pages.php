<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Web Validasi Peserta'
        ];
        return view('pages/home', $data);
    }
}
