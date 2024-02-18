<?= $this->extend("layouts/maintemplate"); ?>
<?= $this->section("content"); ?>
<div class="page-header">
    <div class="page-title">
        <h4>Detail Barang Masuk</h4>
        <h6>Detail Barang Masuk Secara Penuh</h6>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="productdetails">
                    <ul class="product-bar">
                        <li>
                            <h4>Nama Supplier</h4>
                            <h6><?= $item->namasupplier; ?></h6>
                        </li>
                        <li>
                            <h4>Kode Barang masuk</h4>
                            <h6><?= $item->kodebarangmasuk; ?></h6>
                        </li>
                        <li>
                            <h4>Ditambahkan oleh</h4>
                            <h6><?= $item->ditambahakanoleh; ?></h6>
                        </li>
                        <li>
                            <h4>Waktu ditambahkan</h4>
                            <h6><?= date("d-M-Y, h:s:i a", strtotime($item->waktu)); ?></h6>
                        </li>
                        <li>
                            <h4>Jumlah</h4>
                            <h6><?= $item->jumlah; ?></h6>
                        </li>
                        <li>
                            <h4>Harga Jual</h4>
                            <h6>Rp. <?= number_format($item->hargajual, 0, ",", "."); ?></h6>
                        </li>
                        <li>
                            <h4>Harga Beli</h4>
                            <h6>Rp. <?= number_format($item->hargabeli, 0, ",", "."); ?></h6>
                        </li>
                        <li>
                            <h4>Harga App</h4>
                            <h6>Rp. <?= number_format($item->hargapp, 0, ",", "."); ?></h6>
                        </li>
                        <li>
                            <h4>Deskripsi</h4>
                            <h6><?= $item->deskripsi; ?></h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>