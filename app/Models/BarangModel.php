<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = "tbm_barang";
    protected $allowedFields = ["barangid", "barangname", "stokawal", "barangcode", "hargabeli", "hargajual", "hargapp", "remarks", "satuan", "opadd", "pcadd", "luadd"];
}
