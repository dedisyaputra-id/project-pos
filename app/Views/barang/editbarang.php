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
            <?php if (isset($validation)) : ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> Gambar Barang</label>
                            <input type="file" name="file_gambar" class="form-control <?= ($validation->getError("file_gambar") ? "is-invalid" : "")  ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                <?= $validation->getError("file_gambar") ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Nama Barang</label>
                            <input type="text" name="barangname" autofocus class="form-control <?= (($validation->getError("barangname")) ? "is-invalid" : ""); ?>" value="<?= ($_POST["barangname"] ? $_POST["barangname"] : $barang->namabarang); ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                <?= $validation->getError("barangname") ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Stok Awal</label>
                            <input type="text" name="stokawal" class="form-control <?= ($validation->getError("stokawal") ? "is-invalid" : "")  ?>" value="<?= ($_POST["stokawal"] ? $_POST["stokawal"] : $barang->stok); ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                <?= ($validation->getError("stokawal")) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Kode Barang</label>
                            <input type="text" name="barangcode" class=" form-control <?= ($validation->getError("barangcode") ? "is-invalid" : "")  ?>" value="<?= ($_POST["barangcode"] ? $_POST["barangcode"] : $barang->kodebarang); ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                <?= $validation->getError("barangcode"); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Kategori</label>
                            <select class="form-select" name="jenisid">
                                <option>Pilih Kategori</option>
                                <option value="<?= $barang->jenisid; ?>" selected><?= $barang->jenisname; ?></option>
                                <?php foreach ($kategori as $ktg) : ?>
                                    <option value="<?= $ktg->jenisid; ?>"><?= $ktg->jenisname; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="remarks" rows="4"><?= ($_POST["remarks"] ? $_POST["remarks"] : $barang->deskripsi)  ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Harga Beli</label>
                            <input type="text" name="hargabeli" class="form-control <?= ($validation->getError("hargabeli") ? "is-invalid" : "")  ?>" value="<?= ($_POST["hargabeli"] ? $_POST["hargabeli"] : $barang->hargabelibarang); ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                <?= $validation->getError("hargabeli"); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Harga App</label>
                            <input type="text" name="hargapp" class="form-control <?= ($validation->getError("hargapp") ? "is-invalid" : "")  ?>" value="<?= ($_POST["hargapp"] ? $_POST["hargapp"] : $barang->hargappbarang); ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                <?= $validation->getError("hargapp"); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Harga Jual</label>
                            <input type="text" name="hargajual" class="form-control <?= ($validation->getError("hargajual") ? "is-invalid" : "")  ?>" value="<?= ($_POST["hargajual"] ? $_POST["hargajual"] : $barang->hargajualbarang); ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                                <?= $validation->getError("hargajual"); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Satuan</label>
                            <select class="form-select" name="satuan">
                                <option value="" selected>Pilih Satuan</option>
                                <?php if ($_POST["satuan"]) : ?>
                                    <?php if ($_POST["satuan"] == "Gram") : ?>
                                        <option value="Gram" selected>Gram</option>
                                        <option value="KG">KG</option>
                                        <option value="Ons">Ons</option>
                                    <?php elseif ($_POST["satuan"] == "KG") : ?>
                                        <option value="Gram">Gram</option>
                                        <option value="KG" selected>KG</option>
                                        <option value="Ons">Ons</option>
                                    <?php else : ?>
                                        <option value="Gram">Gram</option>
                                        <option value="KG">KG</option>
                                        <option value="Ons" selected>Ons</option>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <?php if ($barang->unit == "Gram") : ?>
                                        <option value="Gram" selected>Gram</option>
                                        <option value="KG">KG</option>
                                        <option value="Ons">Ons</option>
                                    <?php elseif ($barang->unit == "KG") : ?>
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
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-4">
                            <label>Status</label>
                            <select class="form-select" name="inactive">
                                <?php if ($_POST["inactive"]) : ?>
                                    <?php if ($_POST["inactive"] == "f") : ?>
                                        <option value="f" selected>f</option>
                                        <option value="t">t</option>
                                    <?php elseif ($_POST["inactive"] == "t") : ?>
                                        <option value="f">f</option>
                                        <option value="t" selected>t</option>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <?php if ($barang->status == "f") : ?>
                                        <option value="f" selected>f</option>
                                        <option value="t">t</option>
                                    <?php elseif ($barang->status == "t") : ?>
                                        <option value="f">f</option>
                                        <option value="t" selected>t</option>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-submit me-2" type="submit">Submit</button>
                        <a href="/barang" class="btn btn-cancel">Cancel</a>
                    </div>
                </div>
            <?php else : ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label> Gambar Produk</label>
                            <input type="file" name="file_gambar" class="form-control">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Nama Produk</label>
                            <input type="text" name="barangname" autofocus class="form-control" value="<?= $barang->namabarang; ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Kode Barang</label>
                            <input type="text" name="barangcode" class=" form-control" value="<?= $barang->kodebarang; ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Stok Awal</label>
                            <input type="text" name="stokawal" class="form-control" value="<?= $barang->stok; ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Kategori</label>
                            <select class="form-select" name="jenisid">
                                <option>Pilih Category</option>
                                <option value="<?= $barang->jenisid; ?>" selected><?= $barang->jenisname; ?></option>
                                <?php foreach ($kategori as $ktg) : ?>
                                    <option value="<?= $ktg->jenisid; ?>"><?= $ktg->jenisname; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="remarks" rows="4"><?= $barang->deskripsi ?></textarea>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Harga Beli</label>
                            <input type="text" name="hargabeli" class="form-control" value="<?= $barang->hargabelibarang; ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Harga App</label>
                            <input type="text" name="hargapp" class="form-control" value="<?= $barang->hargappbarang; ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Harga Jual</label>
                            <input type="text" name="hargajual" class="form-control" value="<?= $barang->hargajualbarang; ?>">
                            <div id="validationServer04Feedback" class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-3">
                            <label>Satuan</label>
                            <select class="form-select" name="satuan">
                                <option value="">Pilih Satuan</option>
                                <?php if ($barang->unit == "Gram") : ?>
                                    <option value="Gram" selected>Gram</option>
                                    <option value="KG">KG</option>
                                    <option value="Ons">Ons</option>
                                <?php elseif ($barang->unit == "KG") : ?>
                                    <option value="Gram">Gram</option>
                                    <option value="KG" selected>KG</option>
                                    <option value="Ons">Ons</option>
                                <?php else : ?>
                                    <option value="Gram">Gram</option>
                                    <option value="KG">KG</option>
                                    <option value="Ons" selected>Ons</option>
                                <?php endif; ?>
                            </select>
                            <div id="validationServer04Feedback" class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="mb-4">
                            <label>Status</label>
                            <select class="form-select" name="inactive">
                                <?php if ($barang->status == "f") : ?>
                                    <option value="f" selected>Tidak Aktif</option>
                                    <option value="t">Aktif</option>
                                <?php elseif ($barang->status == "t") : ?>
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
                        <button class="btn btn-submit me-2" type="submit">Update</button>
                        <a href="/barang" class="btn btn-cancel">Batal</a>
                    </div>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>