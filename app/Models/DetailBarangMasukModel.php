<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailBarangMasukModel extends Model
{
    protected $db;
    public function __construct()
    {
        $this->db = db_connect();
        helper("form");
    }

    public function get()
    {
        $query = "SELECT tbm_detail.barangmasukdetailid as id, tbm_detail.qty as jumlah,tbm_detail.luadd as waktu,tbm_detail.opadd as dibuatoleh, tbm.barangmasukcode,tbm_barang.barangcode FROM tbl_barangmasuk_detail as tbm_detail LEFT JOIN tbl_barangmasuk as tbm ON tbm_detail.barangmasukid = tbm.barangmasukid LEFT JOIN tbm_barang ON tbm_detail.barangid = tbm_barang.barangid WHERE tbm_detail.dlt =? ORDER BY tbm_detail.barangmasukdetailid DESC";
        $detailbarangMasuk = $this->db->query($query, 'f')->getResult();

        return $detailbarangMasuk;
    }
    public function getDetail($id)
    {
        $query = "SELECT tbm_detail.barangmasukdetailid as id, tbm_detail.qty as jumlah,tbm_detail.luadd as waktu,tbm_detail.opadd as dibuatoleh,tbm_detail.luedit as waktudiubah,tbm_detail.satuan,tbm_detail.barcode,tbm_detail.hargajual,tbm_detail.hargabeli,tbm_detail.hargapp,tbm_detail.remarks as deskripsi, tbm.barangmasukcode,tbm_barang.barangcode FROM tbl_barangmasuk_detail as tbm_detail LEFT JOIN tbl_barangmasuk as tbm ON tbm_detail.barangmasukid = tbm.barangmasukid LEFT JOIN tbm_barang ON tbm_detail.barangid = tbm_barang.barangid WHERE tbm_detail.barangmasukdetailid =?";
        $barangmasukdetail = $this->db->query($query, $id)->getRow();
        if (!$barangmasukdetail) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("detail barang masuk dengan id " . $id . " tidak ditemukan");
        }

        return $barangmasukdetail;
    }
    public function create()
    {
        $queryBarang = "SELECT barangid,barangcode FROM tbm_barang WHERE dlt=?";
        $queryBarangMasuk = "SELECT barangmasukid,barangmasukcode FROM tbl_barangmasuk WHERE dlt=?";
        $barang = $this->db->query($queryBarang, 'f')->getResult();
        $barangMasuk = $this->db->query($queryBarangMasuk, 'f')->getResult();

        return [
            "barangmasuk" => $barangMasuk,
            "barang" => $barang,
        ];
    }
    public function simpan($inputDetailBarangMasuk)
    {
        $id = $this->db->query("SELECT NEXTVAL('tbl_barangmasuk_detail_nextid')")->getRow();
        $barangmasukdetailid = $id->nextval;
        $query = "INSERT INTO tbl_barangmasuk_detail(barangmasukdetailid,qty, barangmasukid,barangid,hargabeli,hargajual,hargapp,remarks,satuan,opadd,pcadd,luadd,barcode) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $createDetailBarangMasuk =  $this->db->query($query, [$barangmasukdetailid, ...$inputDetailBarangMasuk]);
        return $createDetailBarangMasuk;
    }
    public function edit($id)
    {
        $query = "SELECT tbm_detail.barangmasukdetailid as id, tbm_detail.qty as jumlah,tbm_detail.satuan,tbm_detail.barcode,tbm_detail.hargajual,tbm_detail.hargabeli,tbm_detail.hargapp,tbm_detail.remarks as deskripsi, tbm.barangmasukcode, tbm.barangmasukid, tbm_barang.barangid,tbm_barang.barangcode FROM tbl_barangmasuk_detail as tbm_detail LEFT JOIN tbl_barangmasuk as tbm ON tbm_detail.barangmasukid = tbm.barangmasukid LEFT JOIN tbm_barang ON tbm_detail.barangid = tbm_barang.barangid WHERE tbm_detail.barangmasukdetailid =?";
        $queryBarang = "SELECT barangid,barangcode FROM tbm_barang WHERE dlt=? AND barangid !=?";
        $queryBarangMasuk = "SELECT barangmasukid,barangmasukcode FROM tbl_barangmasuk WHERE dlt=? AND barangmasukid!=?";
        $detailBarangMasuk = $this->db->query($query, $id)->getRow();
        $barang = $this->db->query($queryBarang, ['f', $detailBarangMasuk->barangmasukid])->getResult();
        $barangMasuk = $this->db->query($queryBarangMasuk, ['f', $detailBarangMasuk->barangid])->getResult();

        return [
            "detailbarangmasuk" => $detailBarangMasuk,
            "barang" => $barang,
            "barangmasuk" => $barangMasuk
        ];
    }
    public function ubah($inputDetailBarangMasuk, $id)
    {
        $detailbarangmasuk = "SELECT barangmasukdetailid FROM tbl_barangmasuk_detail WHERE barangmasukdetailid=?";
        $getDetailBarangMasuk = $this->db->query($detailbarangmasuk, $id);
        if (!$getDetailBarangMasuk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("detail barang masuk dengan id " . $id . " tidak ditemukan");
        } else {
            $query = "UPDATE  tbl_barangmasuk_detail SET qty=?, barangmasukid=?,barangid=?,hargabeli=?,hargajual=?,hargapp=?,remarks=?,satuan=?,opedit=?,pcedit=?,luedit=?,barcode=? WHERE barangmasukdetailid=?";
            $this->db->query($query,  [...$inputDetailBarangMasuk, $id]);
        }
    }
    public function hapus($id)
    {
        $query = "UPDATE tbl_barangmasuk_detail SET dlt=? WHERE barangmasukdetailid=?";
        $this->db->query($query, ['t', $id]);
    }
}
