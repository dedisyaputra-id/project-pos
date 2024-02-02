<?php

namespace App\Controllers;


use App\Models\BarangModel;

class Barang extends BaseController
{
    protected $session;
    protected $barangModel;
    protected $db;
    protected $response;
    public function __construct()
    {
        $this->db = db_connect();
        $this->barangModel = new BarangModel();
    }
    public function index(): string
    {
        session();
        $query = "SELECT * FROM tbm_barang WHERE dlt='f'";
        $produk = $this->db->query($query)->getResult();
        $data = [
            "title" => "Barang",
            "barang" => $produk
        ];
        return view('barang/index', $data);
    }
    public function create()
    {
        $data = [
            "title" => "Tambah barang",
        ];
        return view("barang/tambahbarang", $data);
    }
    public function save()
    {
        if (!$this->validate([
            "barangname" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Nama barang tidak boleh kosong"
                ]
            ],
            "stokawal" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Stok awal tidak boleh kosong"
                ]
            ],
            "barangcode" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Kode barang tidak boleh kosong"
                ]
            ],
            "hargabeli" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Harga beli tidak boleh kosong"
                ]
            ],
            "hargajual" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Harga jual tidak boleh kosong"
                ]
            ],
            "hargapp" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Harga app tidak boleh kosong"
                ]
            ],
            "satuan" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Satuan tidak boleh kosong"
                ]
            ],
            "file_gambar" => [
                "rules" => "uploaded[file_gambar]",
                "errors" => [
                    "uploaded" => "Gambar produk tidak boleh kosong",
                    "max_size" => "Ukuran gambar produk harus kurang dari 2 MB",
                    "mime_in" => "Format gambar harus png/jpg"
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $data = [
                "title" => "Tambah barang",
                "validation" => $validation
            ];
            return view("barang/tambahbarang", $data);
        } else {
            $barangId = $this->db->query("SELECT NEXTVAL('tbm_barang_nextid')")->getRow();
            $currval = $this->db->query("SELECT CURRVAL('tbm_barang_nextid')")->getRow();
            $file = $this->request->getFile("file_gambar");
            $file->move("assets/gambar-produk", $currval->currval . "." . $file->getExtension());
            $file_gambar = $file->getName();
            $input = [
                "file_gambar" =>  $file_gambar,
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
                "luadd" => date("Y-m-d H:i:s"),
            ];
            $this->barangModel->save($input);
            session()->setFlashdata("success", "Data berhasil disimpan");
            return redirect()->to("/barang");
        }
    }
    public function detail(string $barangcode)
    {
        $query = "SELECT * FROM tbm_barang WHERE barangcode = '$barangcode'";
        $product = $this->db->query($query)->getRow();
        $data = [
            "title" => "Detail produk",
            "product" => $product
        ];
        if (empty($data["product"])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("title " . $barangcode . " not found");
        }
        return view("barang/barangdetail", $data);
    }
    public function edit($barangid)
    {
        $query = "SELECT * FROM tbm_barang WHERE barangid= '$barangid'";
        dd($this->db->query($query)->getResultObject());
        $data = [
            "title" => "edit barang",
            "barang" => $this->db->query($query)->getResultObject()
        ];
        return view("/barang/editbarang", $data);
    }
    public function delete($barangid)
    {
        $query = "UPDATE tbm_barang SET dlt = 't' WHERE barangid='$barangid'";
        $this->db->query($query);
        session()->setFlashdata("success", "Barang berhasil dihapus");
        return redirect()->to("/barang");
    }
    public function category()
    {
        $data = [
            "title" => "Daftar kategori"
        ];
        return view("barang/kategoribarang", $data);
    }
}
