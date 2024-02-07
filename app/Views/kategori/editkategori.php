<?= $this->extend("layouts/maintemplate"); ?>
<?= $this->section("content"); ?>
<div class="page-header">
    <div class="page-title">
        <h4>Edit kategori barang</h4>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="/kategori/ubah/<?= $kategori->jeniscode; ?>" method="post">
            <?php csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <?php if (isset($validation)) : ?>
                <div class="row">
                    <div class="col-lg-4 col-sm-4 col-12">
                        <div class="mb-3">
                            <label>Nama kategori</label>
                            <input type="text" name="jenisname" autofocus class="form-control <?= (($validation->getError("jenisname")) ? "is-invalid" : ""); ?>" value="<?= ($_POST["jenisname"] ? $_POST["jenisname"] : $kategori->jenisname); ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                <?= $validation->getError("jenisname") ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-12">
                        <div class="mb-3">
                            <label>Kode kategori</label>
                            <input type="text" name="jeniscode" autofocus class="form-control <?= (($validation->getError("jeniscode")) ? "is-invalid" : ""); ?>" value="<?= ($_POST["jeniscode"] ? $_POST["jeniscode"] : $kategori->jeniscode); ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                <?= $validation->getError("jeniscode") ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-12">
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
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="remarks" rows="4"><?= ($_POST["remarks"] ? $_POST["remarks"] : $kategori->remarks)  ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-submit me-2" type="submit">Submit</button>
                        <a href="/barang/tambahkategori" class="btn btn-cancel">Batal</a>
                    </div>
                </div>
            <?php else : ?>
                <div class="row">
                    <div class="col-lg-4 col-sm-4 col-12">
                        <div class="mb-3">
                            <label>Nama kategori</label>
                            <input type="text" name="jenisname" autofocus class="form-control" value="<?= $kategori->jenisname; ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-12">
                        <div class="mb-3">
                            <label>Kode kategori</label>
                            <input type="text" name="jeniscode" autofocus class="form-control" value="<?= $kategori->jeniscode ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-12">
                        <div class="mb-3">
                            <label>Status</label>
                            <select class="form-select" name="inactive">
                                <?php if ($kategori->inactive == "f") : ?>
                                    <option value="f" selected>Tidak Aktif</option>
                                    <option value="t">Aktif</option>
                                <?php elseif ($kategori->inactive == "t") : ?>
                                    <option value="f">Tidak Aktif</option>
                                    <option value="t" selected>Aktif</option>
                                <?php else : ?>
                                    <option value="f">Tidak Aktif</option>
                                    <option value="t">Aktif</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="remarks" rows="4"><?= $kategori->remarks ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-submit me-2" type="submit">Submit</button>
                        <a href="/kategori" class="btn btn-cancel">Batal</a>
                    </div>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>