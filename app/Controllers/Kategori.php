<?php

namespace App\Controllers;

class Kategori extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
        helper("form");
    }
    public function index(): string
    {
        $query = "SELECT jenisid,jenisname,jeniscode,remarks,opadd FROM tbm_jenis_barang WHERE dlt=? ORDER BY jenisid DESC";
        $data = [
            "title" => "Daftar kategori",
            "kategori" => $this->db->query($query, 'f')->getResult()
        ];
        return view('kategori/kategori', $data);
    }
    public function create()
    {
        $data = [
            "title" => "Tambah kategori",
        ];
        return view("kategori/tambahkategori", $data);
    }
    public function save()
    {
        if (!$this->validate([
            "jenisname" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Nama kategori tidak boleh kosong"
                ]
            ],
            "jeniscode" => [
                "rules" => "required|is_unique[tbm_jenis_barang.jeniscode]",
                "errors" => [
                    "required" => "Kode kategori tidak boleh kosong",
                    "is_unique" => "Kode kategori sudah ada"
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        } else {
            $kategoriId = $this->db->query("SELECT NEXTVAL('tbm_jenis_barang_nextid')")->getRow();

            $jenisid = $kategoriId->nextval;
            $jenisname = $this->request->getVar("jenisname");
            $jeniscode = $this->request->getVar("jeniscode");
            $remarks = $this->request->getVar("remarks");
            $opadd = "admin";
            $pcadd = $this->request->getIPAddress();
            $luadd = date("Y-m-d H:i:s");
            $inactive = $this->request->getPost('inactive');

            $query = "INSERT INTO tbm_jenis_barang(jenisid,jenisname,jeniscode,remarks,opadd,pcadd,luadd,inactive) VALUES (?,?,?,?,?,?,?,?)";
            $this->db->query($query, [
                $jenisid, $jenisname, $jeniscode, $remarks, $opadd,
                $pcadd, $luadd, $inactive
            ]);
            session()->setFlashdata("success", "Data berhasil disimpan");
            return redirect()->to("/kategori");
        }
    }
    public function edit($jeniscode)
    {
        // dd(validation_errors());
        $query = "SELECT jenisname,jeniscode,inactive,remarks FROM tbm_jenis_barang WHERE jeniscode=?";
        $ktg = $this->db->query($query, $jeniscode)->getRow();
        $data = [
            "title" => "edit kategori",
            "kategori" => $ktg,
        ];
        return view("kategori/editkategori", $data);
    }
    public function update($jeniscode)
    {
        $query = "SELECT jenisname,jeniscode,inactive,remarks FROM tbm_jenis_barang WHERE jeniscode=?";
        $kategori = $this->db->query($query, $jeniscode)->getRow();
        if (!$this->validate([
            "jenisname" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Nama kategori tidak boleh kosong"
                ]
            ],
            "jeniscode" => [
                "rules" => "required|is_unique[tbm_jenis_barang.jeniscode,jeniscode,$jeniscode]",
                "errors" => [
                    "required" => "Kode kategori tidak boleh kosong",
                    "is_unique" => "Kode kategori sudah ada"
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        } else {
            if (empty($kategori)) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException("Kode kategori" . $jeniscode . " tidak ditemukan");
            } else {
                $jenisname = $this->request->getVar("jenisname");
                $jenis_code = $this->request->getVar("jeniscode");
                $remarks = $this->request->getVar("remarks");
                $opedit = "admin";
                $pcedit = $this->request->getIPAddress();
                $luedit = date("Y-m-d H:i:s");
                $inactive = $this->request->getPost('inactive');

                $query = "UPDATE tbm_jenis_barang SET jenisname=?, jeniscode=?, remarks=?, pcedit=?, opedit=?, luedit=?, inactive=? WHERE jeniscode=?";;
                $this->db->query($query, [
                    $jenisname, $jenis_code, $remarks, $opedit,
                    $pcedit, $luedit, $inactive, $jeniscode
                ]);
                session()->setFlashdata("success", "Update data kategori berhasil");
                return redirect()->to("/kategori");
            }
        }
    }
    public function delete($jeniscode)
    {
        $query = "UPDATE tbm_jenis_barang SET dlt=? WHERE jeniscode=?";
        $this->db->query($query, ['t', $jeniscode]);
        session()->setFlashdata("success", "Kategori berhasil dihapus");
        return redirect()->to("/kategori");
    }
}
