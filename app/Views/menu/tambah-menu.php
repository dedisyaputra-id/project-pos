<?= $this->extend("layouts/maintemplate"); ?>
<?= $this->section("content"); ?>
<div class="page-header">
    <div class="page-title">
        <h4>Tambah menu</h4>
        <h6>Buat menu</h6>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="/menu/simpan" method="post" enctype="multipart/form-data">
            <?php csrf_field() ?>
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="mb-3">
                        <label>Foto menu</label>
                        <input type="file" name="photo" class="form-control <?= (validation_show_error("photo") ? "is-invalid" : ""); ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("photo"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Nama menu</label>
                        <input type="text" name="menuname" autofocus class="form-control <?= (validation_show_error("menuname") ? "is-invalid" : ""); ?>" value="<?= old("menuname");  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("menuname"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Kode menu</label>
                        <input type="text" name="menucode" class="form-control <?= (validation_show_error("menucode") ? "is-invalid" : ""); ?>" value="<?= old("menucode");  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("menucode"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Jenis menu</label>
                        <select class="form-select <?= (validation_show_error("jenismenuid") ? "is-invalid" : ""); ?>" name="jenismenuid">
                            <option value="" selected>Pilih jenis menu</option>
                            <?php foreach ($jenismenu as $kategori) : ?>
                                <option value="<?= $kategori->jenismenuid; ?>"><?= $kategori->jenismenuname; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("jenismenuid"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" min="0" name="price" class="form-control <?= (validation_show_error("price") ? "is-invalid" : ""); ?>" value="<?= old("price");  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("price"); ?>
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
                    <a href="/menu" class="btn btn-cancel">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>