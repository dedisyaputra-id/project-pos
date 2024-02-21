<?php

namespace App\Controllers;


class JenisMenu extends BaseController
{
  protected $jenisMenuModel;
  public function __construct()
  {
    $this->jenisMenuModel = new \App\Models\JenisMenuModel;
    helper("form");
  }
  public function index()
  {
    $jenisMenu = $this->jenisMenuModel->get();
    $data = [
      "title" => "Daftar jenis menu",
      "jenismenu" => $jenisMenu
    ];
    return view("jenismenu/jenismenu", $data);
  }
  public function create()
  {
    $data = [
      "title" => "Tambah jenis menu",
    ];
    return view("jenismenu/tambah-jenismenu", $data);
  }
  public function save()
  {
    if (!$this->validate([
      "jenismenuname" => [
        "rules" => "required",
        "errors" => [
          "required" => "Nama jenis menu tidak boleh kosong"
        ]
      ],
    ])) {
      return redirect()->back()->withInput();
    } else {
      $inputJenisName = [
        $this->request->getVar("jenismenuname"),
        $this->request->getVar("remarks"),
        "admin",
        $this->request->getIPAddress(),
        date("Y-m-d H:i:s"),
        $this->request->getPost('inactive'),
      ];
      $this->jenisMenuModel->create($inputJenisName);
      session()->setFlashdata("success", "Data berhasil disimpan");
      return redirect()->to("/jenismenu");
    }
  }
  public function edit($id)
  {
    $jenismenu = $this->jenisMenuModel->edit($id);
    $data = [
      "title" => "Edit jenis menu",
      "jenismenu" => $jenismenu
    ];
    return view("jenismenu/edit-jenismenu", $data);
  }
  public function update($id)
  {
    if (!$this->validate([
      "jenismenuname" => [
        "rules" => "required",
        "errors" => [
          "required" => "Nama jenis menu tidak boleh kosong"
        ]
      ],
    ])) {
      return redirect()->back()->withInput();
    } else {
      $inputJenisMenu = [
        $this->request->getVar("jenismenuname"),
        $this->request->getVar("remarks"),
        $this->request->getIPAddress(),
        "admin",
        date("Y-m-d H:i:s"),
        $this->request->getPost('inactive'),
      ];
      $this->jenisMenuModel->ubah($id, $inputJenisMenu);
      session()->setFlashdata("success", "Data berhasil diubah");
      return redirect()->to("/jenismenu");
    }
    $data = [
      "title" => "Edit jenis menu",
    ];
    return view("jenismenu/edit-jenismenu", $data);
  }
  public function delete($id)
  {
    $this->jenisMenuModel->hapus($id);
    session()->setFlashdata("success", "Data berhasil dihapus");
    return redirect()->to("/jenismenu");
  }
}
