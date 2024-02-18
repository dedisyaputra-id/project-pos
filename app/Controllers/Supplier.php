<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use CodeIgniter\Exceptions\PageNotFoundException;

class Supplier extends BaseController
{

  protected $db;
  public function __construct()
  {
    $this->db = db_connect();
    helper("form");
  }

  public function index()
  {
    $query = "SELECT supplierid,supplier_code,supplier_name,phone_no,email,inactive FROM tbm_supplier WHERE dlt=? ORDER BY supplierid DESC";
    $data = [
      "title" => "Daftar suplier",
      "suppliers" => $this->db->query($query, 'f')->getResult()
    ];
    return view('supplier/supplier', $data);
  }
  public function create()
  {
    $data = [
      "title" => "Tambah suplier",
    ];
    return view("supplier/tambah-supplier", $data);
  }
  public function save()
  {
    if (!$this->validate([
      "supplier_name" => [
        "rules" => "required",
        "errors" => [
          "required" => "Nama suplier tidak boleh kosong"
        ]
      ],
      "supplier_code" => [
        "rules" => "required|is_unique[tbm_supplier.supplier_code]",
        "errors" => [
          "required" => "Kode suplier tidak boleh kosong",
          "is_unique" => "Kode suplier sudah ada"
        ]
      ],
    ])) {
      return redirect()->back()->withInput();
    } else {
      $id = $this->db->query("SELECT NEXTVAL('tbm_supplier_nextid')")->getRow();

      $supplierid = $id->nextval;
      $supplier_name = $this->request->getVar("supplier_name");
      $supplier_code = $this->request->getVar("supplier_code");
      $phone_no = $this->request->getVar("phone_no");
      $email = $this->request->getVar("email");
      $address = $this->request->getVar("address");
      $remarks = $this->request->getVar("remarks");
      $opadd = "admin";
      $pcadd = $this->request->getIPAddress();
      $luadd = date("Y-m-d H:i:s");
      $inactive = $this->request->getPost('inactive');

      $query = "INSERT INTO tbm_supplier(supplierid,supplier_name,supplier_code,phone_no,email,address,remarks,opadd,pcadd,luadd,inactive) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
      $this->db->query($query, [
        $supplierid, $supplier_name, $supplier_code, $phone_no, $email, $address, $remarks, $opadd,
        $pcadd, $luadd, $inactive
      ]);
      session()->setFlashdata("success", "Data berhasil disimpan");
      return redirect()->to("/supplier");
    }
  }
  public function detail($id)
  {
    $query = "SELECT supplierid,supplier_name as namasuplier, supplier_code as kodesuplier, phone_no as nohp,email, address as alamat, remarks as deskripsi, opadd as ditambahkanoleh, luadd as waktuditambahkan,luedit as waktuterakhirdiupdate, inactive as status FROM tbm_supplier WHERE supplierid =?";

    $supplier = $this->db->query($query, $id)->getRow();

    if (!$supplier) {
      throw new PageNotFoundException("suplier dengan id " . $id . " tidak ditemukan");
    }
    $time = Time::parse($supplier->waktuditambahkan, 'Asia/Jakarta');
    $data = [
      "title" => "detail suplier",
      "supplier" => $supplier,
      "waktuditambahkan" => $time->toLocalizedString('d MMM, yyyy'),
      "terakhirupdate" => $time->humanize(),
    ];

    return view("supplier/detail-supplier", $data);
  }
  public function edit($id)
  {
    $query = "SELECT supplierid,supplier_name as namasupplier, supplier_code as kodesupplier, phone_no as nohp,email, address as alamat, remarks as deskripsi, inactive FROM tbm_supplier WHERE supplierid =?";

    $supplier = $this->db->query($query, $id)->getRow();
    if (!$supplier) {
      throw new PageNotFoundException("suplier dengan id " . $id . " tidak ditemukan");
    }
    $data = [
      "title" => "edit suplier",
      "supplier" => $supplier
    ];

    return view("supplier/edit-supplier", $data);
  }
  public function update($id)
  {
    $query = "SELECT supplierid,supplier_name as namasupplier, supplier_code as kodesupplier, phone_no as nohp,email, address as alamat, remarks as deskripsi, inactive FROM tbm_supplier WHERE supplierid =?";

    $supplier = $this->db->query($query, $id)->getRow();

    if (!$supplier) {
      throw new PageNotFoundException("suplier dengan id " . $id . " tidak ditemukan");
    }
    if (!$this->validate([
      "supplier_name" => [
        "rules" => "required",
        "errors" => [
          "required" => "Nama suplier tidak boleh kosong"
        ]
      ],
      "supplier_code" => [
        "rules" => "required|is_unique[tbm_supplier.supplier_code,supplier_code,$supplier->kodesupplier]",
        "errors" => [
          "required" => "Kode suplier tidak boleh kosong",
          "is_unique" => "Kode suplier sudah ada"
        ]
      ],
    ])) {
      return redirect()->back()->withInput();
    } else {
      $supplier_name = $this->request->getVar("supplier_name");
      $supplier_code = $this->request->getVar("supplier_code");
      $phone_no = $this->request->getVar("phone_no");
      $email = $this->request->getVar("email");
      $address = $this->request->getVar("address");
      $remarks = $this->request->getVar("remarks");
      $opedit = "admin";
      $pcedit = $this->request->getIPAddress();
      $luedit = date("Y-m-d H:i:s");
      $inactive = $this->request->getPost('inactive');

      $query = "UPDATE tbm_supplier SET supplier_name=?,supplier_code=?,phone_no=?,email=?,address=?,remarks=?,opedit=?,pcedit=?,luedit=?,inactive=? WHERE supplierid =?";
      $this->db->query($query, [
        $supplier_name, $supplier_code, $phone_no, $email, $address, $remarks, $opedit,
        $pcedit, $luedit, $inactive, $supplier->supplierid
      ]);
      session()->setFlashdata("success", "Data berhasil diubah");
      return redirect()->to("/supplier");
    }
  }
  public function delete($id)
  {
    $query = "UPDATE tbm_supplier SET dlt=? WHERE supplierid=?";
    $this->db->query($query, ['t', $id]);
    session()->setFlashdata("success", "data berhasil dihapus");
    return redirect()->to("/supplier");
  }
}
