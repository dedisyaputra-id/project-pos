<?= $this->extend("layouts/maintemplate"); ?>
<?= $this->section("content"); ?>
<div class="page-header">
    <div class="page-title">
        <h4>Tambah Produk</h4>
        <h6>Buat Produk Baru</h6>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="/barang/simpan" method="post" enctype="multipart/form-data">
            <?php csrf_field() ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label> Gambar Produk</label>
                        <input type="file" name="file_gambar" class="form-control <?= (isset($validation) ? ($validation->getError("file_gambar") ? "is-invalid" : "") : ""); ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("file_gambar") : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Nama Produk</label>
                        <input type="text" name="barangname" autofocus class="form-control <?= (isset($validation) ? ($validation->getError("barangname") ? "is-invalid" : "") : ""); ?>" value="<?= (isset($_POST["barangname"]) ? $_POST["barangname"] : "");  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("barangname") : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Kategori</label>
                        <select class="form-select">
                            <option>Pilih Category</option>
                            <option>Computers</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Merek</label>
                        <select class="form-select">
                            <option>Pilih Merek</option>
                            <option>Brand</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Unit</label>
                        <select class="form-select">
                            <option>Pilih Unit</option>
                            <option>Unit</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Stok Awal</label>
                        <input type="text" name="stokawal" class="form-control <?= (isset($validation) ? ($validation->getError("stokawal") ? "is-invalid" : "") : ""); ?>" value="<?= (isset($validation) ? ($validation->hasError("stokawal") ? "" : $_POST["stokawal"]) : "");  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= isset($validation) ? $validation->getError("stokawal") : ""; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Kode Barang</label>
                        <input type="text" name="barangcode" class=" form-control <?= (isset($validation) ? ($validation->getError("barangcode") ? "is-invalid" : "") : ""); ?>" value="<?= (isset($_POST["barangcode"]) ? $_POST["barangcode"] : "");  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("barangcode") : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="remarks" rows="4"><?= (isset($_POST["remarks"]) ? $_POST["remarks"] : ""); ?></textarea>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Harga Beli</label>
                        <input type="text" name="hargabeli" class="form-control  <?= (isset($validation) ? ($validation->getError("hargabeli") ? "is-invalid" : "") : ""); ?>" value="<?= (isset($_POST["hargabeli"]) ? $_POST["hargabeli"] : "");  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("hargabeli") : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Harga App</label>
                        <input type="text" name="hargapp" class="form-control <?= (isset($validation) ? ($validation->getError("hargapp") ? "is-invalid" : "") : ""); ?>" value="<?= (isset($_POST["hargapp"]) ? $_POST["hargapp"] : "");  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("hargapp") : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Harga Jual</label>
                        <input type="text" name="hargajual" class="form-control <?= (isset($validation) ? ($validation->getError("hargajual") ? "is-invalid" : "") : ""); ?>" value="<?= (isset($_POST["hargajual"]) ? $_POST["hargajual"] : "");  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("hargajual") : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Satuan</label>
                        <select class="form-select <?= (isset($validation) ? ($validation->getError("satuan") ? "is-invalid" : "") : ""); ?>" name="satuan">
                            <option value="">Pilih Satuan</option>
                            <?php if (isset($_POST["satuan"])) : ?>
                                <?php if ($_POST["satuan"] == "Gram" && $_POST["satuan"] !== "") : ?>
                                    <option value="Gram" selected>Gram</option>
                                    <option value="KG">KG</option>
                                    <option value="Ons">Ons</option>
                                <?php elseif ($_POST["satuan"] == "KG" && $_POST["satuan"] !== "") : ?>
                                    <option value="Gram">Gram</option>
                                    <option value="KG" selected>KG</option>
                                    <option value="Ons">Ons</option>
                                <?php elseif ($_POST["satuan"] !== "") : ?>
                                    <option value="Gram">Gram</option>
                                    <option value="KG">KG</option>
                                    <option value="Ons" selected>Ons</option>
                                <?php else : ?>
                                    <option value="Gram">Gram</option>
                                    <option value="KG">KG</option>
                                    <option value="Ons">Ons</option>
                                <?php endif; ?>
                            <?php else : ?>
                                <option value="Gram">Gram</option>
                                <option value="KG">KG</option>
                                <option value="Ons">Ons</option>
                            <?php endif; ?>
                        </select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= (isset($validation) ? $validation->getError("satuan") : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-4">
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
                    <button class="btn btn-submit me-2" type="submit">Submit</button>
                    <a href="/barang" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>