<?php

namespace App\Controllers;


use App\Models\BarangModel;

class Barang extends BaseController
{
    protected $session;
    protected $barangModel;
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
        $this->barangModel = new BarangModel();
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function index(): string
    {
        $barang = $this->barangModel->findAll();
        $data = [
            "title" => "Barang",
            "barang" => $barang
        ];
        return view('barang/index', $data);
    }
    public function create()
    {
        $data = [
            "title" => "Tambah barang"
        ];
        return view("barang/tambahbarang", $data);
    }
    public function save()
    {
        $valid = $this->validate([
            "barangname" => "required",
            "stokawal" => "required",
            "barangcode" => "required",
            "hargabeli" => "required",
            "hargajual" => "required",
            "hargapp" => "required",
            "satuan" => "required",
        ]);
        if ($valid) {
            $barangId = $this->db->query("SELECT NEXTVAL('tbm_barang_nextid')")->getRow();
            $input = [
                "barangid" => $barangId->nextval,
                "barangname" => $this->request->getVar("barangname"),
                "stokawal" => $this->request->getVar("stokawal"),
                "barangcode" => $this->request->getVar("barangcode"),
                "hargabeli" => $this->request->getVar("hargabeli"),
                "hargajual" => $this->request->getVar("hargajual"),
                "hargapp" => $this->request->getVar("hargapp"),
                "remarks" => $this->request->getVar("remarks"),
                "satuan" => $this->request->getVar("satuan"),
                "opadd" => "admin",
                "pcadd" => $this->request->getIPAddress(),
                "luadd" => date("Y-m-d H:i:s")
            ];
            $this->barangModel->save($input);
            return redirect()->to("/barang");
        } else {
            $validation = \Config\Services::validation();
            dd($validation);
        }
    }
    public function category()
    {
        $data = [
            "title" => "Daftar kategori"
        ];
        return view("barang/kategoribarang", $data);
    }
}
