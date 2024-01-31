<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Home extends BaseController
{
    protected $session;
    protected $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function index(): string
    {
        $data = [
            "title" => "Dasbor"
        ];
        return view('index', $data);
    }
}
