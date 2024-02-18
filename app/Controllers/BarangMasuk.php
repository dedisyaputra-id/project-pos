<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

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
    $query = "SELECT tblb.barangmasukcode as kodebarangmasuk, tblb.qty as jumlah,tblb.luadd as waktu,tblb.opadd as ditambahakanoleh, tblb.remarks as deskripsi,tblb.hargabeli,tblb.hargajual,tblb.hargapp, tbm_supplier.supplier_name as namasupplier FROM tbl_barangmasuk as tblb LEFT JOIN tbm_supplier ON tblb.supplierid = tbm_supplier.supplierid WHERE tblb.barangmasukid =?";
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
  public function delete($id)
  {
    $query = "UPDATE tbl_barangmasuk SET dlt=? WHERE barangmasukid=?";
    $this->db->query($query, ['t', $id]);
    session()->setFlashdata("success", "Data berhasil dihapus");
    return redirect()->to("/barangmasuk");
  }
}
