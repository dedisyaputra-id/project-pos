<?php

namespace App\Controllers;

class Menu extends BaseController
{
  protected $menuModel;
  public function __construct()
  {
    $this->menuModel = new \App\Models\MenuModel();
    helper("form");
  }

  public function index()
  {
    $menu = $this->menuModel->get();
    $data = [
      "title" => "Daftar menu",
      "menu" => $menu
    ];
    return view("menu/menu", $data);
  }
  public function create()
  {
    $jenisMenu = $this->menuModel->create();
    $data = [
      "title" => "Tambah menu",
      "jenismenu" => $jenisMenu
    ];
    return view("menu/tambah-menu", $data);
  }
  public function save()
  {
    if (!$this->validate([
      "photo" => [
        "rules" => "ext_in[photo,png,jpg]|max_size[photo,2048]",
        "errors" => [
          "max_size" => "Ukuran gambar produk harus kurang dari 2 MB",
          "ext_in" => "Format gambar harus png atau jpg",
          "max_size" => "Ukuran gambar maksimal 2 mb"
        ]
      ],
      "menuname" => [
        "rules" => "required",
        "errors" => [
          "required" => "Nama menu tidak boleh kosong"
        ]
      ],
      "jenismenuid" => [
        "rules" => "required",
        "errors" => [
          "required" => "Jenis menu tidak boleh kosong"
        ]
      ],
      "price" => [
        "rules" => "required",
        "errors" => [
          "required" => "Harga menu tidak boleh kosong"
        ]
      ],
    ])) {
      return redirect()->back()->withInput();
    } else {
      $inputMenu = [
        "photo" => $this->request->getFile("photo"),
        "menuname" => $this->request->getVar("menuname"),
        "menucode" => $this->request->getVar("menucode"),
        "jenismenuid" => $this->request->getPost('jenismenuid'),
        "price" => $this->request->getVar("price"),
        "opadd" => "admin",
        "pcadd" => $this->request->getIPAddress(),
        "luadd" => date("Y-m-d H:i:s"),
        "inactive" => $this->request->getPost('inactive'),
        "remarks" => $this->request->getVar("remarks")
      ];
      $this->menuModel->simpan($inputMenu);
      session()->setFlashdata("success", "Data berhasil disimpan");
      return redirect()->to("/menu");
    }
  }
  public function edit($id)
  {
    $menu = $this->menuModel->edit($id);
    $data = [
      "title" => "Edit menu",
      "menu" => $menu["menu"],
      "jenismenu" => $menu["jenismenu"]
    ];
    return view("menu/edit-menu", $data);
  }
  public function update($id)
  {
    if (!$this->validate([
      "photo" => [
        "rules" => "ext_in[photo,png,jpg]|max_size[photo,2048]",
        "errors" => [
          "ext_in" => "Format gambar harus png atau jpg",
          "max_size" => "Ukuran gambar maksimal 2 mb"
        ]
      ],
      "menuname" => [
        "rules" => "required",
        "errors" => [
          "required" => "Nama menu tidak boleh kosong"
        ]
      ],
      "menucode" => [
        "rules" => "required",
        "errors" => [
          "required" => "Kode menu tidak boleh kosong",
          "is_unique" => "Kode menu sudah ada"
        ]
      ],
      "jenismenuid" => [
        "rules" => "required",
        "errors" => [
          "required" => "Jenis menu tidak boleh kosong"
        ]
      ],
      "price" => [
        "rules" => "required",
        "errors" => [
          "required" => "Harga menu tidak boleh kosong"
        ]
      ],
    ])) {
      return redirect()->back()->withInput();
    } else {
      $inputMenu = [
        "photo" => $this->request->getFile("photo"),
        "menuname" => $this->request->getVar("menuname"),
        "menucode" => $this->request->getVar("menucode"),
        "jenismenuid" => $this->request->getPost('jenismenuid'),
        "price" => $this->request->getVar("price"),
        "opedit" => "admin",
        "pcedit" => $this->request->getIPAddress(),
        "luedit" => date("Y-m-d H:i:s"),
        "inactive" => $this->request->getPost('inactive'),
        "remarks" => $this->request->getVar("remarks")
      ];
      $this->menuModel->ubah($id, $inputMenu);
      session()->setFlashdata("success", "Data berhasil diubah");
      return redirect()->to("/menu");
    }
  }
  public function delete($id)
  {
    $this->menuModel->hapus($id);
    session()->setFlashdata("success", "Data berhasil dihapus");
    return redirect()->to("/menu");
  }
}
