<?= $this->extend("layouts/maintemplate"); ?>
<?= $this->section("content"); ?>
<div class="page-header">
    <div class="page-title">
        <h4>Edit Detail Barang Masuk</h4>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <form action="/detailbarangmasuk/ubah/<?= $detailbarangmasuk->id; ?>" method="post">
            <?php csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Kode Barang</label>
                        <select name="barangid" id="barangid" class="form-select <?= (validation_show_error("barangid")  ? "is-invalid" : ""); ?>">
                            <option value="">Pilih kode</option>
                            <option value="<?= $detailbarangmasuk->barangid; ?>" selected><?= $detailbarangmasuk->barangcode; ?></option>
                            <?php foreach ($barang as $brg) : ?>
                                <option value="<?= $brg->barangid; ?>"><?= $brg->barangcode; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("barangid"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Kode Barang Masuk</label>
                        <select name="barangmasukid" id="barangmasukid" class="form-select <?= (validation_show_error("barangmasukid")  ? "is-invalid" : ""); ?>">
                            <option value="" selected>Pilih kode</option>
                            <option value="<?= $detailbarangmasuk->barangmasukid; ?>" selected><?= $detailbarangmasuk->barangmasukcode; ?></option>
                            <?php foreach ($barangmasuk as $brg) : ?>
                                <option value="<?= $brg->barangmasukid; ?>"><?= $brg->barangmasukcode; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("barangmasukid"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Jumlah</label>
                        <input type="number" name="qty" class="form-control <?= (validation_show_error("qty")  ? "is-invalid" : ""); ?>" value="<?= (old("qty") ? old("qty") : $detailbarangmasuk->jumlah);  ?>" min="0">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("qty"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Harga Beli</label>
                        <input type="number" name="hargabeli" class="form-control  <?= (validation_show_error("hargabeli") ? "is-invalid" : ""); ?>" value="<?= (old("hargabeli") ? old("hargabeli") : $detailbarangmasuk->hargabeli);  ?>" min="0">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("hargabeli"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Harga App</label>
                        <input type="number" name="hargapp" class="form-control <?= (validation_show_error("hargapp") ? "is-invalid" : "") ?>" value="<?= (old("hargapp") ? old("hargapp") : $detailbarangmasuk->hargapp);  ?>" min="0">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("hargapp"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Harga Jual</label>
                        <input type="number" name="hargajual" class="form-control <?= (validation_show_error("hargajual") ? "is-invalid" : ""); ?>" value="<?= (old("hargajual") ? old("hargajual") : $detailbarangmasuk->hargajual);  ?>" min="0">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("hargajual"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Barcode</label>
                        <input type="text" name="barcode" class="form-control <?= (validation_show_error("barcode")  ? "is-invalid" : ""); ?>" value="<?= (old("barcode") ? old("barcode") : $detailbarangmasuk->barcode);  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("barcode"); ?>
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
                                <?php if ($detailbarangmasuk->satuan == "Gram") : ?>
                                    <option value="Gram" selected>Gram</option>
                                    <option value="KG">KG</option>
                                    <option value="Ons">Ons</option>
                                <?php elseif ($detailbarangmasuk->satuan == "KG") : ?>
                                    <option value="Gram">Gram</option>
                                    <option value="KG" selected>KG</option>
                                    <option value="Ons">Ons</option>
                                <?php else : ?>
                                    <option value="Gram">Gram</option>
                                    <option value="KG">KG</option>
                                    <option value="Ons" selected>Ons</option>
                                <?php endif; ?>
                            <?php endif; ?>
                        </select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("satuan"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="remarks" rows="4"><?= (old("remarks") ? old("remarks") : $detailbarangmasuk->deskripsi); ?></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2" type="submit">Submit</button>
                    <a href="/detailbarangmasuk" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>