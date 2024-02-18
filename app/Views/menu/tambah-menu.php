<?= $this->extend("layouts/maintemplate"); ?>
<?= $this->section("content"); ?>
<div class="page-header">
    <div class="page-title">
        <h4>Tambah kategori barang</h4>
        <h6>Buat kategori barang</h6>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="/tambahkategori/simpan" method="post">
            <?php csrf_field() ?>
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Nama kategori</label>
                        <input type="text" name="jenisname" autofocus class="form-control <?= (isset($validation) ? ($validation->getError("jenisname") ? "is-invalid" : "") : ""); ?>" value="<?= (isset($_POST["jenisname"]) ? $_POST["jenisname"] : "");  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("jenisname") : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Kode kategori</label>
                        <input type="text" name="jeniscode" autofocus class="form-control <?= (isset($validation) ? ($validation->getError("jeniscode") ? "is-invalid" : "") : ""); ?>" value="<?= (isset($_POST["jeniscode"]) ? $_POST["jeniscode"] : "");  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("jeniscode") : ""); ?>
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