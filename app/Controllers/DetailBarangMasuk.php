<?php

namespace App\Controllers;

use \App\Models\DetailBarangMasukModel;

class DetailBarangMasuk extends BaseController
{
  protected $detailBarangMasukModel;
  public function __construct()
  {
    $this->detailBarangMasukModel = new DetailBarangMasukModel();
    helper("form");
  }
  public function index()
  {
    $detailbarangMasuk = $this->detailBarangMasukModel->get();
    $data = [
      "title" => "detail barang masuk",
      "detailbarangmasuk" => $detailbarangMasuk
    ];
    return view("detailbarangmasuk/detailbarangmasuk", $data);
  }
  public function detail($id)
  {
    $detailbarangMasuk = $this->detailBarangMasukModel->getDetail($id);
    $data = [
      "title" => "data lengkap barang masuk",
      "item" => $detailbarangMasuk
    ];

    return view("detailbarangmasuk/detailbarangmasuk-lengkap", $data);
  }
  public function create()
  {
    $data = $this->detailBarangMasukModel->create();
    $data = [
      "title" => "Tambah barang masuk",
      "barang" => $data["barang"],
      "barangmasuk" => $data["barangmasuk"],
    ];
    return view("detailbarangmasuk/tambah-detailbarangmasuk", $data);
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
      "barangmasukid" => [
        "rules" => "required",
        "errors" => [
          "required" => "Kode barang tidak boleh kosong"
        ]
      ],
      "barangid" => [
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
      $inputDetailBarangMasuk = [
        $this->request->getVar("qty"),
        $this->request->getPost("barangmasukid"),
        $this->request->getPost("barangid"),
        $this->request->getVar("hargabeli"),
        $this->request->getVar("hargajual"),
        $this->request->getVar("hargapp"),
        $this->request->getVar("remarks"),
        $this->request->getVar("satuan"),
        "admin",
        $this->request->getIPAddress(),
        date("Y-m-d H:i:s"),
        $this->request->getVar("barcode")
      ];
      $this->detailBarangMasukModel->simpan($inputDetailBarangMasuk);
      session()->setFlashdata("success", "Data berhasil disimpan");
      return redirect()->to("/detailbarangmasuk");
    }
  }
  public function edit($id)
  {
    $detailBarangMasuk = $this->detailBarangMasukModel->edit($id);
    $data = [
      "title" => "Edit barang masuk",
      "barang" => $detailBarangMasuk["barang"],
      "barangmasuk" => $detailBarangMasuk["barangmasuk"],
      "detailbarangmasuk" => $detailBarangMasuk["detailbarangmasuk"]
    ];
    return view("detailbarangmasuk/edit-detailbarangmasuk", $data);
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
      "barangmasukid" => [
        "rules" => "required",
        "errors" => [
          "required" => "Kode barang tidak boleh kosong"
        ]
      ],
      "barangid" => [
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
      $inputDetailBarangMasuk = [
        $this->request->getVar("qty"),
        $this->request->getPost("barangmasukid"),
        $this->request->getPost("barangid"),
        $this->request->getVar("hargabeli"),
        $this->request->getVar("hargajual"),
        $this->request->getVar("hargapp"),
        $this->request->getVar("remarks"),
        $this->request->getVar("satuan"),
        "admin",
        $this->request->getIPAddress(),
        date("Y-m-d H:i:s"),
        $this->request->getVar("barcode")
      ];
      $this->detailBarangMasukModel->ubah($inputDetailBarangMasuk, $id);
      session()->setFlashdata("success", "Data berhasil diubah");
      return redirect()->to("/detailbarangmasuk");
    }
  }
  public function delete($id)
  {
    $this->detailBarangMasukModel->hapus($id);
    session()->setFlashdata("success", "Data berhasil dihapus");
    return redirect()->to("/detailbarangmasuk");
  }
}
