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
        <form action="/barang/update/<?= $barang->idbarang ?>" method="post" enctype="multipart/form-data">
            <?php csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label> Gambar Barang</label>
                        <input type="file" name="file_gambar" class="form-control <?= (validation_show_error("file_gambar")  ? "is-invalid" : ""); ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("file_gambar"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Nama Barang</label>
                        <input type="text" name="barangname" autofocus class="form-control <?= (validation_show_error("barangname")  ? "is-invalid" : ""); ?>" value="<?= (old("barangname") ? old("barangname") : $barang->namabarang);  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("barangname"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Kode Barang</label>
                        <input type="text" name="barangcode" class=" form-control <?= (validation_show_error("barangcode")  ? "is-invalid" : ""); ?>" value="<?= (old("barangcode") ? old("barangcode") : $barang->kodebarang);  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("barangcode"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Stok Awal</label>
                        <input type="text" name="stokawal" class="form-control <?= (validation_show_error("stokawal")  ? "is-invalid" : ""); ?>" value="<?= (old("stokawal") ? old("stokawal") : $barang->stok);  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("stokawal"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Kategori</label>
                        <select class="form-select <?= (validation_show_error("jenisid") ? "is-invalid" : ""); ?> " name="jenisid">
                            <option value="">Pilih Kategori</option>
                            <option value="<?= $barang->jenisid; ?>" selected><?= $barang->jenisname; ?></option>
                            <?php foreach ($kategori as $ktg) : ?>
                                <option value="<?= $ktg->jenisid; ?>"><?= $ktg->jenisname; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("jenisid"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="remarks" rows="4"><?= (old("remarks") ? old("remarks") : $barang->deskripsi); ?></textarea>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Harga Beli</label>
                        <input type="text" name="hargabeli" class="form-control  <?= (validation_show_error("hargabeli") ? "is-invalid" : ""); ?>" value="<?= (old("hargabeli") ? old("hargabeli") : $barang->hargabelibarang);  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("hargabeli"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Harga App</label>
                        <input type="text" name="hargapp" class="form-control <?= (validation_show_error("hargapp") ? "is-invalid" : "") ?>" value="<?= (old("hargapp") ? old("hargapp") : $barang->hargappbarang);  ?>">
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("hargapp"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-3">
                        <label>Harga Jual</label>
                        <input type="text" name="hargajual" class="form-control <?= (validation_show_error("hargajual") ? "is-invalid" : ""); ?>" value="<?= (old("hargajual") ? old("hargajual") : $barang->hargajualbarang);  ?>">
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
                                <?php if ($barang->unit == "Gram") : ?>
                                    <option value="Gram" selected>Gram</option>
                                    <option value="KG">KG</option>
                                    <option value="Ons">Ons</option>
                                <?php elseif ($barang->unit == "KG") : ?>
                                    <option value="Gram">Gram</option>
                                    <option value="KG" selected>KG</option>
                                    <option value="Ons">Ons</option>
                                <?php elseif ($barang->unit == "Ons") : ?>
                                    <option value="Gram">Gram</option>
                                    <option value="KG">KG</option>
                                    <option value="Ons" selected>Ons</option>
                                <?php endif ?>
                            <?php endif; ?>
                        </select>
                        <div id="validationServer04Feedback" class="invalid-feedback">
                            <?= validation_show_error("satuan"); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="mb-4">
                        <label>Status</label>
                        <select class="form-select" name="inactive">
                            <?php if (old("inactive") == "f") : ?>
                                <option value="f" selected>Tidak Aktif</option>
                                <option value="t">Aktif</option>
                            <?php elseif (old("inactive") == "t") : ?>
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
                    <button class="btn btn-submit me-2" type="submit">Submit</button>
                    <a href="/barang" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>