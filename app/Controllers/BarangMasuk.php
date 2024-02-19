<?php

namespace App\Controllers;

class BarangMasuk extends BaseController
{
  protected $db;
  public function __construct()
  {
    $this->db = db_connect();
    helper("form");
  }
  public function index()
  {
    $query = "SELECT tblb.barangmasukid as id, tblb.barangmasukcode as kodebarangmasuk, tblb.qty as jumlah,tblb.luadd as waktu,tblb.opadd as dibuatoleh, tbm_supplier.supplier_name as namasupplier FROM tbl_barangmasuk as tblb LEFT JOIN tbm_supplier ON tblb.supplierid = tbm_supplier.supplierid WHERE tblb.dlt =? ORDER BY tblb.barangmasukid DESC";
    $barangMasuk = $this->db->query($query, 'f')->getResult();
    $data = [
      "title" => "Barang masuk",
      "barangmasuk" => $barangMasuk
    ];
    return view("barangmasuk/barangmasuk", $data);
  }
  public function detail($id)
  {
    $query = "SELECT tblb.barangmasukcode as kodebarangmasuk, tblb.qty as jumlah,tblb.luadd as waktu,tblb.opadd as ditambahakanoleh, tblb.luedit as waktudiubah,tblb.remarks as deskripsi,tblb.hargabeli,tblb.hargajual,tblb.hargapp, tblb.satuan ,tbm_supplier.supplier_name as namasupplier FROM tbl_barangmasuk as tblb LEFT JOIN tbm_supplier ON tblb.supplierid = tbm_supplier.supplierid WHERE tblb.barangmasukid =?";
    $barangmasuk = $this->db->query($query, $id)->getRow();

    if (!$barangmasuk) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("barang masuk dengan id " . $id . " tidak ditemukan");
    }
    $data = [
      "title" => "Detail barang masuk",
      "item" => $barangmasuk
    ];

    return view("barangmasuk/detail-barangmasuk", $data);
  }
  public function create()
  {
    $query = "SELECT supplierid,supplier_name FROM tbm_supplier WHERE dlt=?";
    $supplier = $this->db->query($query, 'f')->getResult();
    $data = [
      "title" => "Tambah barang masuk",
      "supplier" => $supplier,
    ];
    return view("barangmasuk/tambah-barangmasuk", $data);
  }
  public function save()
  {
    if (!$this->validate([
      "qty" => [
        "rules" => "required",
        "errors" => [
          "required" => "Stok awal tidak boleh kosong"
        ]
      ],
      "barangmasukcode" => [
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
      ]
    ])) {
      return redirect()->back()->withInput();
    } else {
      $id = $this->db->query("SELECT NEXTVAL('tbl_barangmasuk_nextid')")->getRow();

      $barangmasukid = $id->nextval;
      $qty = $this->request->getVar("qty");
      $barangmasukcode = $this->request->getVar("barangmasukcode");
      $hargabeli = $this->request->getVar("hargabeli");
      $hargajual = $this->request->getVar("hargajual");
      $hargapp = $this->request->getVar("hargapp");
      $remarks = $this->request->getVar("remarks");
      $satuan = $this->request->getVar("satuan");
      $opadd = "admin";
      $pcadd = $this->request->getIPAddress();
      $luadd = date("Y-m-d H:i:s");
      $supplierid = $this->request->getPost("supplierid");

      $query = "INSERT INTO tbl_barangmasuk(barangmasukid,qty, barangmasukcode,hargabeli,hargajual,hargapp,remarks,satuan,opadd,pcadd,luadd,supplierid) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
      $this->db->query($query, [
        $barangmasukid, $qty, $barangmasukcode,
        $hargabeli, $hargajual, $hargapp, $remarks, $satuan, $opadd, $pcadd, $luadd, $supplierid
      ]);
      session()->setFlashdata("success", "Data berhasil disimpan");
      return redirect()->to("/barangmasuk");
    }
  }
  public function edit($id)
  {
    $query = "SELECT tblb.barangmasukid as id, tblb.barangmasukcode, tblb.qty, tblb.hargapp,tblb.hargabeli,tblb.hargajual, tblb.satuan, tblb.remarks, tbm_supplier.supplierid,tbm_supplier.supplier_name FROM tbl_barangmasuk as tblb LEFT JOIN tbm_supplier ON tblb.supplierid = tbm_supplier.supplierid WHERE tblb.barangmasukid =?";
    $barangmasuk = $this->db->query($query, $id)->getRow();
    $querySupplier = "SELECT supplierid,supplier_name FROM tbm_supplier WHERE dlt=?";
    $supplier = $this->db->query($querySupplier, ['f'])->getResult();
    $data = [
      "title" => "Edit barang masuk",
      "supplier" => $supplier,
      "barangmasuk" => $barangmasuk
    ];
    return view("barangmasuk/edit-barangmasuk", $data);
  }
  public function update($id)
  {
    if (!$this->validate([
      "qty" => [
        "rules" => "required",
        "errors" => [
          "required" => "Stok awal tidak boleh kosong"
        ]
      ],
      "barangmasukcode" => [
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
      ]
    ])) {
      return redirect()->back()->withInput();
    } else {
      $query = "SELECT barangmasukid FROM tbl_barangmasuk WHERE barangmasukid =?";
      $barangmasuk = $this->db->query($query, $id)->getRow();
      if (!$barangmasuk) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("barang masuk dengan id " . $id . " tidak ditemukan");
      }
      $idbarangmasuk = $barangmasuk->barangmasukid;
      $qty = $this->request->getVar("qty");
      $barangmasukcode = $this->request->getVar("barangmasukcode");
      $hargabeli = $this->request->getVar("hargabeli");
      $hargajual = $this->request->getVar("hargajual");
      $hargapp = $this->request->getVar("hargapp");
      $remarks = $this->request->getVar("remarks");
      $satuan = $this->request->getVar("satuan");
      $opedit = "admin";
      $pcedit = $this->request->getIPAddress();
      $luedit = date("Y-m-d H:i:s");
      $supplierid = $this->request->getPost("supplierid");

      $query = "UPDATE tbl_barangmasuk SET qty=?,barangmasukcode=?,hargabeli=?,hargajual=?,hargapp=?,remarks=?,satuan=?,opedit=?,pcedit=?,luedit=?,supplierid=? WHERE barangmasukid=?";
      $this->db->query($query, [
        $qty, $barangmasukcode,
        $hargabeli, $hargajual, $hargapp, $remarks, $satuan, $opedit, $pcedit, $luedit, $supplierid, $idbarangmasuk
      ]);
      session()->setFlashdata("success", "Data berhasil diubah");
      return redirect()->to("/barangmasuk");
    }
  }
  public function delete($id)
  {
    $query = "UPDATE tbl_barangmasuk SET dlt=? WHERE barangmasukid=?";
    $this->db->query($query, ['t', $id]);
    session()->setFlashdata("success", "Data berhasil dihapus");
    return redirect()->to("/barangmasuk");
  }
}
