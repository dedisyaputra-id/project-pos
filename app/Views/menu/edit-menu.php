<?= $this->extend("layouts/maintemplate"); ?>
<?= $this->section("content"); ?>
<div class="page-header">
    <div class="page-title">
        <h4>Edit kategori barang</h4>
    </div>
</div>
<?= validation_list_errors(); ?>
<div class="card">
    <div class="card-body">
        <form action="/kategori/ubah/<?= $kategori->jeniscode; ?>" method="post">
            <?php csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Nama kategori</label>
                        <input type="text" name="jenisname" class="form-control <?= (validation_show_error("jenisname") ? "is-invalid" : ""); ?>" value="<?= (old("jenisname") ? old("jenisname") : $kategori->jenisname); ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("jenisname"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
                    <div class="mb-3">
                        <label>Kode kategori</label>
                        <input type="text" name="jeniscode" class="form-control<?= (validation_show_error("jeniscode") ? "is-invalid" : ""); ?>" value="<?= (old("jeniscode") ? old("jeniscode") : $kategori->jeniscode) ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("jeniscode"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-12">
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
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="remarks" rows="4"><?= $kategori->remarks ?></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2" type="submit">Submit</button>
                    <a href="/kategori" class="btn btn-cancel">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>