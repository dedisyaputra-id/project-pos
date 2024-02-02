<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $session;
    protected $response;
    public function __construct()
    {
        $this->response = \Config\Services::response();
        $this->session = \Config\Services::session();
        $this->session->start();
        $this->userModel = new UserModel();
    }
    public function index(): string
    {
        $data["title"] = "login";
        return view("auth/login", $data);
    }
    public function login()
    {

        if ($this->request->isAJAX()) {
            $username = $this->request->getVar("username");
            $password = $this->request->getVar("password");

            $validation = \Config\Services::validation();
            $validate = $this->validate([
                "username" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "{field} tidak boleh kosong"
                    ]
                ],
                "password" => [
                    "rules" => "required|min_length[8]",
                    "errors" => [
                        "required" => "{field} tidak boleh kosong",
                        "min_length" => "{field} minimal 8 karakter"
                    ]
                ]
            ]);
            if (!$validate) {
                $message = [
                    "error" => [
                        "username" => $validation->getError("username"),
                        "password" => $validation->getError("password"),
                    ]
                ];
            } else {
                $users = $this->userModel->where("username", $username)->find();
                if (!$users) {
                    $message = [
                        "error" => [
                            "message" => "Login gagal, cek kembali username dan password anda",
                        ]
                    ];
                } else {
                    foreach ($users as $user) {
                        if ($password == $user["password"]) {
                            $simpan_data = [
                                "login" => true,
                                "id" => $user["id"],
                                "username" => $user["username"],
                                "name" => $user["name"],
                            ];
                            $this->session->set("user", $simpan_data);
                            $message = [
                                "link" => "/",
                            ];
                        } else {
                            $message = [
                                "error" => [
                                    "message" => "Login gagal, cek kembali username dan password anda",
                                ]
                            ];
                        }
                    }
                }
            }

            echo json_encode($message);
        }
    }
    // public function logout(){
    //     session()
    // }
}
