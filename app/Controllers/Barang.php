<?php

namespace App\Controllers;

class Barang extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
        helper("form");
    }
    public function index(): string
    {
        // $this->db->cache_on();
        $n = 5000;
        $this->cachePage($n);
        $query = "SELECT tbrg.barangcode as kodebarang, tbrg.barangid as idbarang, tbrg.barangname as namabarang, tbrg.file_gambar as gambarbarang,tbrg.hargajual as hargajualbarang, tbrg.opadd as ditambaholeh,tbrg.stokawal as stok,jenisname FROM tbm_barang as tbrg JOIN tbm_jenis_barang ON tbrg.jenisid = tbm_jenis_barang.jenisid WHERE tbrg.dlt='f' ORDER BY barangid DESC";
        $produk = $this->db->query($query, 'f')->getResult();
        $data = [
            "title" => "Barang",
            "barang" => $produk
        ];
        return view('barang/index', $data);
    }
    public function create()
    {
        $query = "SELECT jenisid,jenisname FROM tbm_jenis_barang WHERE dlt=?";
        $kategori = $this->db->query($query, 'f')->getResult();
        $data = [
            "title" => "Tambah barang",
            "kategori" => $kategori,
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
            ],
            "jenisid" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Kategori tidak boleh kosong",
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
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
            $jenisid = $this->request->getPost("jenisid");

            $query = "INSERT INTO tbm_barang(barangid,file_gambar,barangname, stokawal, barangcode,hargabeli,hargajual,hargapp,remarks,satuan,opadd,pcadd,luadd,inactive, jenisid) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $this->db->query($query, [
                $barangid, $gambar, $barangname, $stokawal, $barangcode,
                $hargabeli, $hargajual, $hargapp, $remarks, $satuan, $opadd, $pcadd, $luadd, $inactive, $jenisid
            ]);
            session()->setFlashdata("success", "Data berhasil disimpan");
            return redirect()->to("/barang");
        }
    }
    public function detail(string $barangid)
    {
        $query = "SELECT tbrg.barangcode as kodebarang, tbrg.barangname as namabarang, tbrg.file_gambar as gambarbarang,tbrg.hargajual as hargajualbarang,tbrg.hargabeli as hargabelibarang,tbrg.hargapp as hargappbarang, tbrg.stokawal as stok, tbrg.inactive as statusbarang, tbrg.remarks as deskripsi, jenisname FROM tbm_barang as tbrg JOIN tbm_jenis_barang ON tbrg.jenisid = tbm_jenis_barang.jenisid WHERE tbrg.barangid=?";
        $product = $this->db->query($query, $barangid)->getRow();
        $data = [
            "title" => "Detail barang",
            "product" => $product
        ];
        if (empty($data["product"])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("title " . $barangid . " not found");
        }
        return view("barang/barangdetail", $data);
    }
    public function edit($barangid)
    {
        $query = "SELECT tbrg.barangcode as kodebarang, tbrg.barangid as idbarang, tbrg.barangname as namabarang, tbrg.file_gambar as gambarbarang,tbrg.hargabeli as hargabelibarang,tbrg.hargajual as hargajualbarang, tbrg.hargapp as hargappbarang,tbrg.satuan as unit,tbrg.inactive as status,tbrg.stokawal as stok, tbrg.remarks as deskripsi, jenisname, tbm_jenis_barang.jenisid  FROM tbm_barang as tbrg JOIN tbm_jenis_barang ON tbrg.jenisid = tbm_jenis_barang.jenisid WHERE tbrg.barangid=?";
        $barang = $this->db->query($query, $barangid)->getRow();
        $querykategori = "SELECT jenisid,jenisname FROM tbm_jenis_barang WHERE jenisname !=?";
        $data = [
            "title" => "edit barang",
            "barang" => $barang,
            "kategori" => $this->db->query($querykategori, $barang->jenisname)->getResult()
        ];
        return view("/barang/editbarang", $data);
    }
    public function update($barangid)
    {
        $query = "SELECT tbrg.barangcode as kodebarang, tbrg.barangid as idbarang, tbrg.barangname as namabarang, tbrg.file_gambar as gambarbarang,tbrg.hargabeli as hargabelibarang,tbrg.hargajual as hargajualbarang, tbrg.hargapp as hargappbarang,tbrg.satuan as unit,tbrg.inactive as status,tbrg.stokawal as stok, tbrg.remarks as deskripsi, jenisname, tbm_jenis_barang.jenisid  FROM tbm_barang as tbrg JOIN tbm_jenis_barang ON tbrg.jenisid = tbm_jenis_barang.jenisid WHERE tbrg.barangid=?";

        $barang = $this->db->query($query, $barangid)->getRow();

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
        $kategori = $this->request->getPost("jenisid");

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
            return redirect()->back()->withInput();
        } else {
            if (empty($barang)) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException("title " . $barangid . " not found");
            } else {
                if ($gambar == "") {
                    $query = "UPDATE tbm_barang SET barangcode=?, barangname=?, stokawal=?, hargapp=?,hargajual=?, hargabeli=?, satuan=?, remarks=?, pcedit=?, opedit=?, luedit=?, inactive=?, jenisid=? WHERE barangid=?";
                    $this->db->query($query, [$barangcode, $barangname, $stokawal, $hargapp, $hargajual, $hargabeli, $satuan, $remarks, $ipAddress, $opedit, $luedit, $inactive, $kategori, $barangid]);
                    session()->setFlashdata("success", "Update data barang berhasil");
                    return redirect()->to("/barang");
                } else {
                    unlink("assets/gambar-produk/" . $barang->file_gambar);
                    $gambar->move("assets/gambar-produk", $barang->barangid . "." . $gambar->getExtension());
                    $file_gambar = $gambar->getName();
                    $query = "UPDATE tbm_barang SET file_gambar=?, barangcode=?, barangname=?, stokawal=?, hargapp=?,hargajual=?, hargabeli=?, satuan=?, remarks=?, pcedit=?, opedit=?, luedit=?, inactive=?, jenisid? WHERE barangid=?";
                    $this->db->query($query, [$file_gambar, $barangcode, $barangname, $stokawal, $hargapp, $hargajual, $hargabeli, $satuan, $remarks, $ipAddress, $opedit, $luedit, $inactive, $kategori, $barangid]);
                    session()->setFlashdata("success", "Update data barang berhasil");
                    return redirect()->to("/barang");
                }
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
