<?= $this->extend("layouts/maintemplate"); ?>
<?= $this->section("content"); ?>
<div class="page-header">
    <div class="page-title">
        <h4>Tambah Barang</h4>
        <h6>Buat Barang Baru</h6>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="/barangmasuk/simpan" method="post" enctype="multipart/form-data">
            <?php csrf_field() ?>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Kode Barang</label>
                        <input type="text" name="barangmasukcode" class="form-control <?= (validation_show_error("barangmasukcode")  ? "is-invalid" : ""); ?>" value="<?= old("barangmasukcode");  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("barangmasukcode"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Jumlah</label>
                        <input type="number" name="qty" class="form-control <?= (validation_show_error("qty")  ? "is-invalid" : ""); ?>" value="<?= old("qty");  ?>" min="0">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("qty"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Supplier</label>
                        <select class="form-select <?= (validation_show_error("supplierid") ? "is-invalid" : ""); ?> " name="supplierid">
                            <option value="" selected>Pilih Supplier</option>
                            <?php foreach ($supplier as $spl) : ?>
                                <option value="<?= $spl->supplierid; ?>"><?= $spl->supplier_name; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("supplierid"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Harga Beli</label>
                        <input type="number" name="hargabeli" class="form-control  <?= (validation_show_error("hargabeli") ? "is-invalid" : ""); ?>" value="<?= old("hargabeli");  ?>" min="0">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("hargabeli"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Harga App</label>
                        <input type="number" name="hargapp" class="form-control <?= (validation_show_error("hargapp") ? "is-invalid" : "") ?>" value="<?= old("hargapp");  ?>" min="0">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("hargapp"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Harga Jual</label>
                        <input type="number" name="hargajual" class="form-control <?= (validation_show_error("hargajual") ? "is-invalid" : ""); ?>" value="<?= old("hargajual");  ?>" min="0">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("hargajual"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Satuan</label>
                        <select class="form-select <?= (validation_show_error("satuan") ? "is-invalid" : ""); ?>" name="satuan">
                            <option value="">Pilih Satuan</option>
                            <?php if (old("satuan") == "Gram") : ?>
                                <option value="Gram" selected>Gram</option>
                                <option value="KG">KG</option>
                                <option value="Ons">Ons</option>
                            <?php elseif (old("satuan") == "KG") : ?>
                                <option value="Gram">Gram</option>
                                <option value="KG" selected>KG</option>
                                <option value="Ons">Ons</option>
                            <?php elseif (old("satuan") == "Ons") : ?>
                                <option value="Gram">Gram</option>
                                <option value="KG">KG</option>
                                <option value="Ons" selected>Ons</option>
                            <?php else : ?>
                                <option value="Gram">Gram</option>
                                <option value="KG">KG</option>
                                <option value="Ons">Ons</option>
                            <?php endif; ?>
                        </select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("barangcode"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="remarks" rows="4"><?= old("remarks"); ?></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2" type="submit">Submit</button>
                    <a href="/barang" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>