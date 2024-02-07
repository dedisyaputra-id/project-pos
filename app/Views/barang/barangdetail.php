<?= $this->extend("layouts/maintemplate"); ?>
<?= $this->section("content"); ?>
<div class="page-header">
    <div class="page-title">
        <h4>Detail Barang</h4>
        <h6>Detail Barang Secara Penuh</h6>
    </div>
</div>

<div class="row">
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="bar-code-view">
                    <img src="<?php echo base_url("assets/img/barcode1.png") ?>" alt="barcode">
                    <a class="printimg">
                        <img src="<?php echo base_url("assets/img/icons/printer.svg") ?>" alt="print">
                    </a>
                </div>
                <div class="productdetails">
                    <ul class="product-bar">
                        <li>
                            <h4>Kode Barang</h4>
                            <h6><?= $product->kodebarang; ?></h6>
                        </li>
                        <li>
                            <h4>Nama Barang</h4>
                            <h6><?= $product->namabarang; ?></h6>
                        </li>
                        <li>
                            <h4>Kategori</h4>
                            <h6><?= $product->jenisname; ?></h6>
                        </li>
                        <li>
                            <h4>Stok Awal</h4>
                            <h6><?= number_format($product->stok, 0, ",", "."); ?></h6>
                        </li>
                        <li>
                            <h4>Harga Jual</h4>
                            <h6>Rp. <?= number_format($product->hargajualbarang, 0, ",", "."); ?></h6>
                        </li>
                        <li>
                            <h4>Harga Beli</h4>
                            <h6>Rp. <?= number_format($product->hargabelibarang, 0, ",", "."); ?></h6>
                        </li>
                        <li>
                            <h4>Harga App</h4>
                            <h6>Rp. <?= number_format($product->hargappbarang, 0, ",", "."); ?></h6>
                        </li>
                        <li>
                            <h4>Status</h4>
                            <?php if ($product->statusbarang == "f") : ?>
                                <h6>Tidak Aktif</h6>
                            <?php else : ?>
                                <h6>Aktif</h6>
                            <?php endif; ?>
                        </li>
                        <li>
                            <h4>Deskripsi</h4>
                            <h6><?= $product->deskripsi; ?></h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="slider-product-details">
                    <div class="owl-carousel owl-theme product-slide">
                        <div class="slider-product">
                            <img src="<?php base_url() ?>/assets/gambar-produk/<?= $product->gambarbarang ?>" alt="img">
                            <h4><?= $product->namabarang; ?></h4>
                            <h6>Rp. <?= number_format($product->hargappbarang, 0, ",", "."); ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>