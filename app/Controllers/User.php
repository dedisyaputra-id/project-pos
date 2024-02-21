<?php

namespace App\Controllers;

class User extends BaseController
{
    protected $session;
    protected $db;
    public function __construct()
    {
        $this->db  = db_connect();
        helper(["form", "upload"]);
    }
    public function index(): string
    {
        $n = 5000;
        $this->cachePage($n);
        $query = "SELECT userid,fullname as namalengkap,gender as jeniskelamin,photo as profil,tbm_user.inactive as status, tbm_user.opadd as dibuatoleh, usergroupname  FROM tbm_user JOIN tbm_usergroup ON tbm_user.usergroupid = tbm_usergroup.usergroupid WHERE tbm_user.dlt =? ORDER BY tbm_user.userid DESC";
        $user = $this->db->query($query, 'f')->getResult();

        $data = [
            "title" => "Pengguna",
            "users" => $user
        ];
        return view('user/user', $data);
    }
    public function create()
    {
        $query = "SELECT usergroupid,usergroupname FROM tbm_usergroup WHERE dlt=?";
        $data = [
            "title" => "Tambah pengguna",
            "usergroup" => $this->db->query($query, 'f')->getResult(),
        ];
        return view("user/tambahuser", $data);
    }
    public function save()
    {
        $userid = $this->db->query("SELECT NEXTVAL('tbm_user_nextid')")->getRow();
        $currval = $this->db->query("SELECT CURRVAL('tbm_user_nextid')")->getRow();

        $file = $this->request->getFile("photo");
        $id = $userid->nextval;
        $username = password_hash($this->request->getVar("username"), PASSWORD_BCRYPT);
        $password = password_hash($this->request->getVar("password"), PASSWORD_BCRYPT);
        $fullname = $this->request->getVar("fullname");
        $gender = $this->request->getPost("gender");
        $address = $this->request->getVar("address");
        $remarks = $this->request->getVar("remarks");
        $inactive = $this->request->getPost("inactive");
        $opadd = "admin";
        $pcadd = $this->request->getIPAddress();
        $luadd = date("Y-m-d H:i:s");
        $usergroupid = $this->request->getPost("usergroupid");
        if (!$this->validate([
            "username" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Username tidak boleh kosong"
                ]
            ],
            "password" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Password tidak boleh kosong"
                ]
            ],
            "konfirmasipassword" => [
                "rules" => "required|matches[password]",
                "errors" => [
                    "required" => "Password tidak boleh kosong",
                ]
            ],
            "fullname" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Nama lengkap tidak boleh kosong"
                ]
            ],
            "gender" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Gender tidak boleh kosong"
                ]
            ],
            "photo" => [
                "rules" => "max_size[photo,2000]|ext_in[photo,png,jpg]",
                "errors" => [
                    "max_size" => "Ukuran gambar produk harus kurang dari 2 MB",
                    "ext_in" => "Format gambar harus png ataujpg"
                ]
            ],
            "usergroupid" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Role tidak boleh kosong",
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        } else {
            if ($file->getFilename() == "") {
                $query = "INSERT INTO tbm_user(userid,username,paswd,fullname,gender,address,remarks,opadd,pcadd,luadd,inactive, usergroupid) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                $this->db->query($query, [
                    $id, $username, $password, $fullname, $gender,
                    $address, $remarks, $opadd, $pcadd, $luadd, $inactive, $usergroupid
                ]);
            } else {
                $file->move("assets/gambar-profil", $currval->currval . "." . $file->getExtension());
                $gambarProfil = $file->getFilename();
                $query = "INSERT INTO tbm_user(userid,photo,username,paswd,fullname,gender,address,remarks,opadd,pcadd,luadd,inactive, usergroupid) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $this->db->query($query, [
                    $id,
                    $gambarProfil, $username, $password, $fullname, $gender,
                    $address, $remarks, $opadd, $pcadd, $luadd, $inactive, $usergroupid
                ]);
            }
            session()->setFlashdata("success", "Data berhasil disimpan");
            return redirect()->to("/pengguna");
        }
    }
    public function edit($userid)
    {
        // $n = 5000;
        // $this->cachePage($n);
        $query = "SELECT userid,fullname as namalengkap, username as namapengguna,gender as jeniskelamin,photo as profil,address, tbm_user.remarks as deskripsi, tbm_user.inactive as status, tbm_user.opadd as dibuatoleh, tbm_usergroup.usergroupname, tbm_usergroup.usergroupid  FROM tbm_user JOIN tbm_usergroup ON tbm_user.usergroupid = tbm_usergroup.usergroupid WHERE tbm_user.userid =?";
        $user = $this->db->query($query, $userid)->getRow();

        $usergroupQuery = "SELECT usergroupid, usergroupname FROM tbm_usergroup WHERE usergroupname !=? AND inactive =?";
        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("user dengan id " . $userid . " tidak ditemukan");
        }
        $data = [
            "title" => "edit pengguna",
            "user" => $user,
            "usergroup" => $this->db->query($usergroupQuery, [$user->usergroupname, 'f'])->getResult()
        ];
        return view("user/edituser", $data);
    }
    public function update($userid)
    {
        $query = "SELECT userid, fullname as namalengkap, username as namapengguna,gender as jeniskelamin,photo as profil,address, tbm_user.remarks as deskripsi, tbm_user.inactive as status, tbm_usergroup.usergroupname, tbm_usergroup.usergroupid  FROM tbm_user JOIN tbm_usergroup ON tbm_user.usergroupid = tbm_usergroup.usergroupid WHERE tbm_user.userid =?";
        $user = $this->db->query($query, $userid)->getRow();

        $file = $this->request->getFile("photo");
        $file_gambar = $file->getName();
        $hash_username = password_hash($this->request->getVar("username"), PASSWORD_BCRYPT);
        $hash_password = password_hash($this->request->getVar("password"), PASSWORD_BCRYPT);

        $gambarProfil =  $file_gambar;
        $username = $hash_username;
        $password = $hash_password;
        $fullname = $this->request->getVar("fullname");
        $gender = $this->request->getPost("gender");
        $address = $this->request->getVar("address");
        $remarks = $this->request->getVar("remarks");
        $inactive = $this->request->getPost("inactive");
        $opedit = "admin";
        $pcedit = $this->request->getIPAddress();
        $luedit = date("Y-m-d H:i:s");
        $usergroupid = $this->request->getPost("usergroupid");

        if (!$this->validate([
            "konfirmasipassword" => [
                "rules" => "matches[password]",
                "errors" => [
                    "matches" => "Password tidak sama",
                ]
            ],
            "fullname" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Nama lengkap tidak boleh kosong"
                ]
            ],
            "gender" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Gender tidak boleh kosong"
                ]
            ],
            "photo" => [
                "rules" => "max_size[photo,2000]|ext_in[photo,png,jpg]",
                "errors" => [
                    "max_size" => "Ukuran gambar produk harus kurang dari 2 MB",
                    "ext_in" => "Format gambar harus png ataujpg"
                ]
            ],
            "usergroupid" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Role tidak boleh kosong",
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        } else {
            if (!$user) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException("pengguna dengan id " . $userid . " tidak ditemukan");
            }
            if ($file->getFileName() != "") {
                unlink("assets/gambar-profil/" . $user->userid . ".jpg");
                $file->move("assets/gambar-profil", $userid . "." . $file->getExtension());
                $query = "UPDATE tbm_user SET photo=?,username=?,paswd=?,fullname=?,gender=?,address=?,remarks=?,opedit=?,pcedit=?,luedit=?,inactive=?, usergroupid=? WHERE tbm_user.userid =?";
                $this->db->query($query, [
                    $gambarProfil, $username, $password, $fullname, $gender,
                    $address, $remarks, $opedit, $pcedit, $luedit, $inactive, $usergroupid, $userid
                ]);
            } else {
                $query = "UPDATE tbm_user SET username=?,paswd=?,fullname=?,gender=?,address=?,remarks=?,opedit=?,pcedit=?,luedit=?,inactive=?, usergroupid=? WHERE tbm_user.userid =?";
                $this->db->query($query, [
                    $username, $password, $fullname, $gender,
                    $address, $remarks, $opedit, $pcedit, $luedit, $inactive, $usergroupid, $userid
                ]);
            }
            session()->setFlashdata("success", "Data berhasil diubah");
            return redirect()->to("/pengguna");
        }
    }
    public function delete($userid)
    {
        $query = "UPDATE tbm_user SET dlt=? WHERE userid=?";
        $this->db->query($query, ['t', $userid]);
        session()->setFlashdata("success", "Data berhasil dihapus");
        return redirect()->to("/pengguna");
    }
}
