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
        <!-- <form action="/barang/simpan" method="post" enctype="multipart/form-data">
            <?php csrf_field() ?>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="barangname">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-select">
                            <option>Pilih Category</option>
                            <option>Computers</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Merek</label>
                        <select class="form-select">
                            <option>Pilih Merek</option>
                            <option>Brand</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Unit</label>
                        <select class="form-select">
                            <option>Pilih Unit</option>
                            <option>Unit</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Stok Awal</label>
                        <input type="text" name="stokawal">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" name="barangcode">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="remarks"></textarea>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="text" name="hargabeli">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Harga App</label>
                        <input type="text" name="hargapp">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="text" name="hargajual">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Satuan</label>
                        <select class="form-select" name="satuan">
                            <option>Pilih Satuan</option>
                            <option value="Gram">Gram</option>
                            <option value="KG">KG</option>
                            <option value="Ons">Ons</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Status</label>
                        <select class="form-select">
                            <option>Closed</option>
                            <option>Open</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label> Gambar Produk</label>
                        <div class="image-upload">
                            <input type="file">
                            <div class="image-uploads">
                                <img src="<?php base_url() ?>/assets/img/icons/upload.svg" alt="img">
                                <h4>Drag and drop a file to upload</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2" type="submit">Submit</button>
                    <a href="/barang" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </form> -->
        <form class="form-tambah-barang">
            <?php csrf_field() ?>
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="barangname">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-select">
                            <option>Pilih Category</option>
                            <option>Computers</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Merek</label>
                        <select class="form-select">
                            <option>Pilih Merek</option>
                            <option>Brand</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Unit</label>
                        <select class="form-select">
                            <option>Pilih Unit</option>
                            <option>Unit</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Stok Awal</label>
                        <input type="text" name="stokawal">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" name="barangcode">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" name="remarks"></textarea>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="text" name="hargabeli">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Harga App</label>
                        <input type="text" name="hargapp">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="text" name="hargajual">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Satuan</label>
                        <select class="form-select" name="satuan">
                            <option>Pilih Satuan</option>
                            <option value="Gram">Gram</option>
                            <option value="KG">KG</option>
                            <option value="Ons">Ons</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="form-group">
                        <label> Status</label>
                        <select class="form-select">
                            <option>Closed</option>
                            <option>Open</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label> Gambar Produk</label>
                        <div class="image-upload">
                            <input type="file">
                            <div class="image-uploads">
                                <img src="<?php base_url() ?>/assets/img/icons/upload.svg" alt="img">
                                <h4>Drag and drop a file to upload</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button class="btn btn-submit me-2" type="submit">Submit</button>
                    <a href="/barang" class="btn btn-cancel">Cancel</a>
                </div>
            </div>
        </form>
        <button class="btn-click btn mt-5" type="click">Click me</button>
    </div>
</div>
<?= $this->section("ajax") ?>
<script>
    $(document).ready(function() {
        $(".btn-click").click(function(event) {
            event.preventDefault()
            console.log($(".btn-click").text());
        });
    })
</script>
<?= $this->endSection("ajax") ?>
<?= $this->endSection(); ?>