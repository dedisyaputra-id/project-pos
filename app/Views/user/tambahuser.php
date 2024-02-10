<?= $this->extend("layouts/maintemplate"); ?>
<?= $this->section("content"); ?>
<div class="page-header">
    <div class="page-title">
        <h4>Tambah Pengguna</h4>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="/tambah/pengguna/simpan" method="post" enctype="multipart/form-data">
            <?php csrf_field() ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Foto Profil</label>
                        <input type="file" name="photo" class="form-control <?= (isset($validation) ? ($validation->getError("photo") ? "is-invalid" : "") : ""); ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("photo") : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="fullname" autofocus class="form-control <?= (isset($validation) ? ($validation->getError("fullname") ? "is-invalid" : "") : ""); ?>" value="<?= (isset($_POST["fullname"]) ? $_POST["fullname"] : "");  ?>" placeholder="input nama lengkap pengguna">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("fullname") : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Nama Pengguna</label>
                        <input type="text" name="username" autofocus class="form-control <?= (isset($validation) ? ($validation->getError("username") ? "is-invalid" : "") : ""); ?>" value="<?= (isset($_POST["username"]) ? $_POST["username"] : "");  ?>" placeholder="input nama pengguna">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("username") : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Gender</label>
                        <select class="form-select <?= (isset($validation) ? ($validation->getError("gender") ? "is-invalid" : "") : ""); ?>" name="gender">
                            <option value="">Pilih gender</option>
                            <?php if (isset($_POST["gender"])) : ?>
                                <?php if ($_POST["gender"] == "laki-laki" && $_POST["gender"] !== "") : ?>
                                    <option value="laki-laki" selected>Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                <?php elseif ($_POST["gender"] == "perempuan" && $_POST["gender"] !== "") : ?>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan" selected>Perempuan</option>
                                <?php endif; ?>
                            <?php else : ?>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            <?php endif; ?>
                        </select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("gender") : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4 col-12">
                    <label>Password</label>
                    <div class="mb-3 pass-group d-flex align-center">
                        <input type="password" name="password" autofocus class="pass-input form-control <?= (isset($validation) ? ($validation->getError("password") ? "is-invalid" : "") : ""); ?>" value="<?= (isset($_POST["password"]) ? $_POST["password"] : "");  ?>" placeholder="input password pengguna">
                        <span class="fas toggle-password fa-eye-slash"></span>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("password") : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4 col-12">
                    <label>Konfirmasi Password</label>
                    <div class="mb-3 pass-group d-flex align-center">
                        <input type="password" name="konfirmasipassword" autofocus class="pass-input form-control <?= (isset($validation) ? ($validation->getError("konfirmasipassword") ? "is-invalid" : "") : ""); ?>" value="<?= (isset($_POST["konfirmasipassword"]) ? $_POST["konfirmasipassword"] : "");  ?>" placeholder="input password pengguna">
                        <span class="fas toggle-password fa-eye-slash"></span>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("konfirmasipassword") : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Role</label>
                        <select class="form-select <?= (isset($validation) ? ($validation->getError("usergroupid") ? "is-invalid" : "") : ""); ?>" name="usergroupid">
                            <option value="" selected>Pilih role</option>
                            <?php foreach ($usergroup as $role) : ?>
                                <option value="<?= $role->usergroupid; ?>"><?= $role->usergroupname; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("usergroupid") : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Status</label>
                        <select class="form-select" name="inactive">
                            <?php if (isset($_POST["inactive"])) : ?>
                                <?php if ($_POST["inactive"] == "f" && $_POST["inactive"] !== "") : ?>
                                    <option value="f" selected>Tidak Aktif</option>
                                    <option value="t">Aktif</option>
                                <?php elseif ($_POST["inactive"] == "t" && $_POST["inactive"] !== "") : ?>
                                    <option value="f">Tidak Aktif</option>
                                    <option value="t" selected>Aktif</option>
                                <?php endif; ?>
                            <?php else : ?>
                                <option value="f">Tidak Aktif</option>
                                <option value="t">Aktif</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="address" rows="4"><?= (isset($_POST["address"]) ? $_POST["address"] : ""); ?></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="remarks" rows="4"><?= (isset($_POST["remarks"]) ? $_POST["remarks"] : ""); ?></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2" type="submit">Submit</button>
                    <a href="/barang/kategori" class="btn btn-cancel">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>