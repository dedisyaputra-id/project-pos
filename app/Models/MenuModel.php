<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
  protected $db;
  public function __construct()
  {
    $this->db = db_connect();
  }
  public function get()
  {
    $query = "SELECT tbm_menu.menuid,tbm_menu.menuname,tbm_menu.menucode,tbm_menu.opadd,tbm_menu.luadd,tbm_menu.inactive,tbm_menu.photo,tbm_menu.price,tbm_menu.remarks,tbm_menu.opedit,tbm_menu.luedit,tbm_jenismenu.jenismenuname FROM tbm_menu JOIN tbm_jenismenu ON tbm_menu.jenismenuid = tbm_jenismenu.jenismenuid WHERE tbm_menu.dlt=?";
    $menu = $this->db->query($query, 'f')->getResult();
    return $menu;
  }
  public function create()
  {
    $query = "SELECT jenismenuid,jenismenuname FROM tbm_jenismenu WHERE dlt=?";
    $jenismMenu = $this->db->query($query, "f")->getResult();
    return $jenismMenu;
  }
  public function simpan($inputMenu)
  {
    $menuid = $this->db->query("SELECT NEXTVAL('tbm_menu_nextid')")->getRow();
    $file = $inputMenu["photo"];

    if (!$file) {
      $query = "INSERT INTO tbm_menu(menuid,menuname,menucode,jenismenuid,price,opadd,pcadd,luadd,inactive,remarks) VALUES (?,?,?,?,?,?,?,?,?,?)";
      $this->db->query($query, [$menuid->nextval, ...$inputMenu]);
    } else {
      $file->move("assets/gambar-menu", $menuid->nextval . "." . $file->getExtension());
      $photo = $file->getName();
      $query = "INSERT INTO tbm_menu(menuid,photo,menuname,menucode,jenismenuid,price,opadd,pcadd,luadd,inactive,remarks) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
      $this->db->query($query, [$menuid->nextval, $photo, $inputMenu["menuname"], $inputMenu["menucode"], $inputMenu["jenismenuid"], $inputMenu["price"], $inputMenu["opadd"], $inputMenu["pcadd"], $inputMenu["luadd"], $inputMenu["inactive"], $inputMenu["remarks"]]);
    }
  }
  public function edit($id)
  {
    $queryMenu = "SELECT tbm_menu.menuid,tbm_menu.menuname,tbm_menu.menucode,tbm_menu.inactive,tbm_menu.price,tbm_menu.remarks,tbm_jenismenu.jenismenuname,tbm_jenismenu.jenismenuid FROM tbm_menu JOIN tbm_jenismenu ON tbm_menu.jenismenuid = tbm_jenismenu.jenismenuid WHERE tbm_menu.menuid=?";
    $query = "SELECT jenismenuid, jenismenuname FROM tbm_jenismenu WHERE tbm_jenismenu.dlt=? AND jenismenuid !=?";
    $menu = $this->db->query($queryMenu, $id)->getRow();
    $jenisMenu = $this->db->query($query, ['f', $menu->jenismenuid])->getResult();
    if (!$menu) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("Menu dengan id" . $id . " tidak ditemukan");
    }
    return ["jenismenu" => $jenisMenu, "menu" => $menu];
  }
  public function ubah($id, $inputMenu)
  {
    $queryMenu = "SELECT menuid,photo FROM tbm_menu WHERE menuid=?";
    $menu = $this->db->query($queryMenu, $id)->getRow();
    $file = $inputMenu["photo"];
    if (!$menu) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("Menu dengan id " . $id . " tidak ditemukan");
    }
    if ($file == "") {
      $query = "UPDATE tbm_menu SET menuname=?,menucode=?,jenismenuid=?,price=?,opedit=?,pcedit=?,luedit=?,inactive=?,remarks=? WHERE menuid=?";
      $this->db->query($query, [$inputMenu["menuname"], $inputMenu["menucode"], $inputMenu["jenismenuid"], $inputMenu["price"], $inputMenu["opedit"], $inputMenu["pcedit"], $inputMenu["luedit"], $inputMenu["inactive"], $inputMenu["remarks"], $menu->menuid]);
    } else {
      unlink("assets/gambar-menu/" . $menu->photo);
      $file->move("assets/gambar-menu", $menu->menuid . "." . $file->getExtension());
      $photo = $file->getName();
      $query = "UPDATE tbm_menu SET photo=?,menuname=?,menucode=?,jenismenuid=?,price=?,opedit=?,pcedit=?,luedit=?,inactive=?,remarks=? WHERE menuid=?";
      $this->db->query($query, [$photo, $inputMenu["menuname"], $inputMenu["menucode"], $inputMenu["jenismenuid"], $inputMenu["price"], $inputMenu["opedit"], $inputMenu["pcedit"], $inputMenu["luedit"], $inputMenu["inactive"], $inputMenu["remarks"], $menu->menuid]);
    }
    return $menu;
  }
  public function hapus($id)
  {
    $menu = $this->db->query("SELECT menuid FROM tbm_menu WHERE menuid =?", $id);
    if (!$menu) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException("Menu dengan id" . $id . " tidak ditemukan");
    } else {
      $query = "UPDATE tbm_menu SET dlt=? WHERE menuid=?";
      $this->db->query($query, ["t", $id]);
    }
  }
}
