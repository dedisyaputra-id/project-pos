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
        $query = "SELECT * FROM tbm_barang WHERE dlt=? ORDER BY barangid DESC";
        $produk = $this->db->query($query, 'f')->getResult();
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
                "rules" => "uploaded[file_gambar]|ext_in[file_gambar,png,jpg]",
                "errors" => [
                    "uploaded" => "Gambar produk tidak boleh kosong",
                    "max_size" => "Ukuran gambar produk harus kurang dari 2 MB",
                    "ext_in" => "Format gambar harus png ataujpg"
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

            $gambar =  $file_gambar;
            $barangid = $barangId->nextval;
            $barangname = $this->request->getVar("barangname");
            $stokawal = $this->request->getVar("stokawal");
            $barangcode = $this->request->getVar("barangcode");
            $hargabeli = $this->request->getVar("hargabeli");
            $hargajual = $this->request->getVar("hargajual");
            $hargapp = $this->request->getVar("hargapp");
            $remarks = $this->request->getVar("remarks");
            $satuan = $this->request->getVar("satuan");
            $opadd = "admin";
            $pcadd = $this->request->getIPAddress();
            $luadd = date("Y-m-d H:i:s");
            $inactive = $this->request->getPost('inactive');

            $query = "INSERT INTO tbm_barang(barangid,file_gambar,barangname, stokawal, barangcode,hargabeli,hargajual,hargapp,remarks,satuan,opadd,pcadd,luadd,inactive) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $this->db->query($query, [
                $barangid, $gambar, $barangname, $stokawal, $barangcode,
                $hargabeli, $hargajual, $hargapp, $remarks, $satuan, $opadd, $pcadd, $luadd, $inactive
            ]);
            session()->setFlashdata("success", "Data berhasil disimpan");
            return redirect()->to("/barang");
        }
    }
    public function detail(string $barangid)
    {
        $query = "SELECT * FROM tbm_barang WHERE barangid =?";
        $product = $this->db->query($query, $barangid)->getRow();
        $data = [
            "title" => "Detail produk",
            "product" => $product
        ];
        if (empty($data["product"])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("title " . $barangid . " not found");
        }
        return view("barang/barangdetail", $data);
    }
    public function edit($barangid)
    {
        $query = "SELECT * FROM tbm_barang WHERE barangid=?";
        $data = [
            "title" => "edit barang",
            "barang" => $this->db->query($query, $barangid)->getRow()
        ];
        return view("/barang/editbarang", $data);
    }
    public function update($barangid)
    {
        $gambar = $this->request->getFile("file_gambar");
        $barangcode = $this->request->getVar("barangcode");
        $barangname = $this->request->getVar("barangname");
        $stokawal = $this->request->getVar("stokawal");
        $hargapp = $this->request->getVar("hargapp");
        $hargabeli = $this->request->getVar("hargabeli");
        $hargajual = $this->request->getVar("hargajual");
        $satuan = $this->request->getVar("satuan");
        $remarks = $this->request->getVar("remarks");
        $ipAddress = $this->request->getIPAddress();
        $inactive = $this->request->getPost("inactive");
        $opedit = "admin";
        $luedit = date("Y-m-d H:i:s");

        $validation = $this->validate([
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
                "rules" => "max_size[file_gambar, 2000]|ext_in[file_gambar,png,jpg]",
                "errors" => [
                    "max_size" => "Ukuran gambar produk harus kurang dari 2 MB",
                    "ext_in" => "Format gambar harus png atau jpg"
                ]
            ]
        ]);
        if (!$validation) {
            $validation = \Config\Services::validation();
            $query = "SELECT * FROM tbm_barang WHERE barangid=?";
            $data = [
                "title" => "edit barang",
                "validation" => $validation,
                "barang" => $this->db->query($query, $barangid)->getRow()
            ];
            return view("barang/editbarang", $data);
        } else {
            $selectBarang = "SELECT * FROM tbm_barang WHERE barangid=?";
            $barang = $this->db->query($selectBarang, $barangid)->getRow();
            if ($gambar == "") {
                if (empty($barang)) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException("title " . $barangid . " not found");
                } else {
                    $query = "UPDATE tbm_barang SET barangcode=?, barangname=?, stokawal=?, hargapp=?,hargajual=?, hargabeli=?, satuan=?, remarks=?, pcedit=?, opedit=?, luedit=?, inactive=? WHERE barangid=?";
                    $this->db->query($query, [$barangcode, $barangname, $stokawal, $hargapp, $hargajual, $hargabeli, $satuan, $remarks, $ipAddress, $opedit, $luedit, $inactive, $barangid]);
                    session()->setFlashdata("success", "Update data barang berhasil");
                    return redirect()->to("/barang");
                }
            } else {
                unlink("assets/gambar-produk/" . $barang->file_gambar);
                $gambar->move("assets/gambar-produk", $barang->barangid . "." . $gambar->getExtension());
                $file_gambar = $gambar->getName();
                $query = "UPDATE tbm_barang SET file_gambar=?, barangcode=?, barangname=?, stokawal=?, hargapp=?,hargajual=?, hargabeli=?, satuan=?, remarks=?, pcedit=?, opedit=?, luedit=?, inactive=? WHERE barangid=?";
                $this->db->query($query, [$file_gambar, $barangcode, $barangname, $stokawal, $hargapp, $hargajual, $hargabeli, $satuan, $remarks, $ipAddress, $opedit, $luedit, $inactive, $barangid]);
                session()->setFlashdata("success", "Update data barang berhasil");
                return redirect()->to("/barang");
            }
        }
    }
    public function delete($barangid)
    {
        $query = "UPDATE tbm_barang SET dlt=? WHERE barangid=?";
        $this->db->query($query, ['t', $barangid]);
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
