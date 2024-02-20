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
        <form action="/jenismenu/simpan" method="post">
            <?php csrf_field() ?>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Nama Jenis Menu</label>
                        <input type="text" name="jenismenuname" autofocus class="form-control <?= (validation_show_error("jenismenuname") ? "is-invalid" : ""); ?>" value="<?= old("jenismenuname");  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("jenismenuname"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Status</label>
                        <select class="form-select" name="inactive">
                            <?php if (old("inactive") == "f") : ?>
                                <option value="f" selected>Tidak aktif</option>
                                <option value="t">Aktif</option>
                            <?php elseif (old("inactive") == "t") : ?>
                                <option value="f">Tidak aktif</option>
                                <option value="t" selected>Aktif</option>
                            <?php else : ?>
                                <option value="f">Tidak aktif</option>
                                <option value="t">Aktif</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="remarks" rows="4"><?= old("remarks") ?></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2" type="submit">Submit</button>
                    <a href="/jenismenu" class="btn btn-cancel">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>