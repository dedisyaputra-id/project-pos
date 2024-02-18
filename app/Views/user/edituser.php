<?= $this->extend("layouts/maintemplate"); ?>
<?= $this->section("content"); ?>
<div class="page-header">
    <div class="page-title">
        <h4>Edit pengguna</h4>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="/update/pengguna/<?= $user->userid; ?>" method="post" enctype="multipart/form-data">
            <?php csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-lg-2">
                    <?php if ($user->profil) : ?>
                        <img src="<?php base_url() ?>/assets/gambar-profil/<?= $user->userid ?>.jpg" class="img-thumbnail img-preview" alt="">
                    <?php else : ?>
                        <img src="<?php base_url() ?>/assets/gambar-profil/default-profile_.png" class="img-thumbnail img-preview" alt="">
                    <?php endif; ?>
                    <!-- <button type="button" onclick="imageDel()" class="img-delete">Delete foto</button> -->
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <label class="custome-file-label">Foto Profil</label>
                        <input type="file" name="photo" id="photo" class="form-control <?= (validation_show_error("photo") ? "is-invalid" : ""); ?>" onchange="imagePreview()">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("photo"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="fullname" class="form-control <?= (validation_show_error("fullname") ? "is-invalid" : ""); ?>" value="<?= (old("fullname")) ? old("fullname") : $user->namalengkap;  ?>" placeholder="input nama lengkap pengguna">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("fullname"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Nama Pengguna</label>
                        <input type="text" name="username" class="form-control <?= (validation_show_error("username") ? "is-invalid" : ""); ?>" value="<?= (old("username") ? old("username") : "");  ?>" placeholder="input nama pengguna">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("username"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Gender</label>
                        <select class="form-select <?= (validation_show_error("gender") ? "is-invalid" : ""); ?>" name="gender">
                            <option value="">Pilih gender</option>
                            <?php if (old("gender") == "laki-laki") : ?>
                                <option value="laki-laki" selected>Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            <?php elseif (old("perempuan") == "perempuan") : ?>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan" selected>Perempuan</option>
                            <?php else : ?>
                                <?php if ($user->jeniskelamin == "laki-laki") : ?>
                                    <option value="laki-laki" selected>Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                <?php elseif ($user->jeniskelamin == "perempuan") : ?>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan" selected>Perempuan</option>
                                <?php endif; ?>
                            <?php endif; ?>
                        </select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("gender"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4 col-12">
                    <label>Password</label>
                    <div class="mb-3 pass-group d-flex align-center">
                        <input type="password" name="password" autofocus class="pass-input form-control <?= (validation_show_error("password") ? "is-invalid" : ""); ?>" value="<?= (old("password") ? old("password") : "");  ?>" placeholder="input password pengguna">
                        <span class="fas toggle-password fa-eye-slash"></span>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("password"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4 col-12">
                    <label>Konfirmasi Password</label>
                    <div class="mb-3 pass-group d-flex align-center">
                        <input type="konfirmasipassword" name="konfirmasipassword" class="pass-input form-control <?= (validation_show_error("konfirmasipassword") ? "is-invalid" : ""); ?>" value="<?= (old("konfirmasipassword") ? old("konfirmasipassword") : "");  ?>" placeholder="konfirmasi password ">
                        <span class="fas toggle-konfirmasipassword fa-eye-slash"></span>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("konfirmasipassword"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Role</label>
                        <select class="form-select <?= (validation_show_error("usergroupid") ? "is-invalid" : ""); ?>" name="usergroupid">
                            <option value="">Pilih role</option>
                            <option value="<?= $user->usergroupid; ?>" selected><?= $user->usergroupname; ?></option>
                            <?php foreach ($usergroup as $role) : ?>
                                <option value="<?= $role->usergroupid; ?>"><?= $role->usergroupname; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("usergroupid"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Status</label>
                        <select class="form-select" name="inactive">
                            <?php if (old("inactive") == "f") : ?>
                                <option value="f" selected>Tidak Aktif</option>
                                <option value="t">Aktif</option>
                            <?php elseif (old("inactive") == "t") : ?>
                                <option value="f">Tidak Aktif</option>
                                <option value="t" selected>Aktif</option>
                            <?php else : ?>
                                <?php if ($user->status == "f") : ?>
                                    <option value="f" selected>Tidak Aktif</option>
                                    <option value="t">Aktif</option>
                                <?php else : ?>
                                    <option value="f">Tidak Aktif</option>
                                    <option value="t" selected>Aktif</option>
                                <?php endif; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="address" rows="4"><?= (old("address") ? old("address") : $user->address); ?></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="remarks" rows="4"><?= (old("remarks") ? old("remarks") : $user->deskripsi); ?></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2" type="submit">Update</button>
                    <a href="/pengguna" class="btn btn-cancel">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>