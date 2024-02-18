<?= $this->extend("layouts/maintemplate"); ?>
<?= $this->section("content"); ?>
<div class="page-header">
    <div class="page-title">
        <h4>Manajemen Suplier</h4>
        <h6>Edit Suplier</h6>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="/supplier/update/<?= $supplier->supplierid; ?>" method="post">
            <?php csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="">
                        <label>Kode Suplier</label>
                        <input type="text" class="form-control <?= (validation_show_error("supplier_code") ? "is-invalid" : ""); ?>" name="supplier_code" value="<?= (old("supplier_code") ? old("supplier_code") : $supplier->kodesupplier); ?>" autofocus>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("supplier_code"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="">
                        <label>Nama Supplier</label>
                        <input type="text" name="supplier_name" class="form-control <?= (validation_show_error("supplier_name") ? "is-invalid" : ""); ?>" value="<?= (old("supplier_name") ? old("supplier_name") : $supplier->namasupplier); ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("supplier_name"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="">
                        <label>Email</label>
                        <input type="email" class="form-control <?= (validation_show_error("email") ? "is-invalid" : ""); ?>" name="email" value="<?= (old("email") ? old("email") : $supplier->email); ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("email"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="">
                        <label>Nomor Hp</label>
                        <input type="number" min="1" class="form-control <?= (validation_show_error("") ? "is-invalid" : ""); ?>" name="phone_no" value="<?= (old("phone_no") ? old("phone_no") : $supplier->nohp); ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("phone_no"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 my-3">
                    <div class="">
                        <label>Status</label>
                        <select class="form-select" name="inactive">
                            <?php if (old("inactive") == "f") : ?>
                                <option value="f" selected>Tidak Aktif</option>
                                <option value="t">Aktif</option>
                            <?php elseif (old("inactive") == "t") : ?>
                                <option value="f">Tidak Aktif</option>
                                <option value="t" selected>Aktif</option>
                            <?php else : ?>
                                <?php if ($supplier->inactive == "f") : ?>
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
                <div class="col-lg-9 col-12 my-3">
                    <div class="">
                        <label>Alamat</label>
                        <input type="text" class="form-control <?= (validation_show_error("address") ? "is-invalid" : ""); ?>" name="address" value="<?= (old("address") ? old("address") : $supplier->alamat); ?>">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="remarks"><?= (old("remarks") ? old("remarks") : $supplier->deskripsi); ?></textarea>
                    </div>
                </div>
                <div class="col-lg-12 mt-4">
                    <button type="submit" class="btn btn-submit me-2">Submit</button>
                    <a href="/supplier" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>