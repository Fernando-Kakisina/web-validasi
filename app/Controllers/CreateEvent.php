<?php

namespace App\Controllers;

class CreateEvent extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Create Event'
        ];
        return view('create-event/index', $data);
    }
}
