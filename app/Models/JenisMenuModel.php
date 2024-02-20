<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisMenuModel extends Model
{
  protected $db;
  public function __construct()
  {
    $this->db = db_connect();
  }
  public function get()
  {
    $query = "SELECT jenismenuid,jenismenuname,opadd,luadd,inactive, opedit,luedit,remarks FROM tbm_jenismenu WHERE dlt=?";
    $jenisMenu = $this->db->query($query, 'f')->getResult();

    return $jenisMenu;
  }
  public function create($inputJenisMenu)
  {
    $jenismenuid = $this->db->query("SELECT NEXTVAL('tbm_jenismenu_nextid')")->getRow();
    $query = "INSERT INTO tbm_jenismenu(jenismenuid,jenismenuname,remarks,opadd,pcadd,luadd,inactive) VALUES (?,?,?,?,?,?,?)";
    $this->db->query($query, [$jenismenuid->nextval, ...$inputJenisMenu]);
  }
  public function edit($id)
  {
    $query = "SELECT jenismenuid, jenismenuname,remarks,inactive FROM tbm_jenismenu WHERE jenismenuid=?";
    $jenisMenu = $this->db->query($query, $id)->getRow();
    if (!$jenisMenu) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("Jenis menu dengan id" . $id . " tidak ditemukan");
    }
    return $jenisMenu;
  }
  public function ubah($id, $inputJenisMenu)
  {
    $queryJenisMenu = "SELECT jenismenuid FROM tbm_jenismenu WHERE jenismenuid=?";
    $jenisMenu = $this->db->query($queryJenisMenu, $id)->getRow();
    if (!$jenisMenu) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("Jenis menu dengan id" . $id . " tidak ditemukan");
    }
    $query = "UPDATE tbm_jenismenu SET jenismenuname=?, remarks=?, pcedit=?, opedit=?, luedit=?, inactive=? WHERE jenismenuid=?";
    $this->db->query($query,  [...$inputJenisMenu, $id]);
  }
  public function hapus($id)
  {
    $jenismenu = $this->db->query("SELECT jenismenuid FROM tbm_jenismenu WHERE jenismenuid =?", $id);
    if (!$jenismenu) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("Jenis menu dengan id" . $id . " tidak ditemukan");
    } else {
      $query = "UPDATE tbm_jenismenu SET dlt=? WHERE jenismenuid=?";
      $this->db->query($query, ["t", $id]);
    }
  }
}
