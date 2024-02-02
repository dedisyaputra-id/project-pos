<?= $this->extend("layouts/maintemplate"); ?>
<?= $this->section("content"); ?>
<div class="page-header">
    <div class="page-title">
        <h4>Product Details</h4>
        <h6>Full details of a product</h6>
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
                            <h4>Produk</h4>
                            <h6><?= $product->barangname; ?></h6>
                        </li>
                        <li>
                            <h4>Category</h4>
                            <h6>Computers</h6>
                        </li>
                        <li>
                            <h4>Sub Category</h4>
                            <h6>None</h6>
                        </li>
                        <li>
                            <h4>Brand</h4>
                            <h6>None</h6>
                        </li>
                        <li>
                            <h4>Unit</h4>
                            <h6>Piece</h6>
                        </li>
                        <li>
                            <h4>Kode Barang</h4>
                            <h6><?= $product->barangcode; ?></h6>
                        </li>
                        <li>
                            <h4>Stok Awal</h4>
                            <h6><?= $product->stokawal; ?></h6>
                        </li>
                        <li>
                            <h4>Harga Jual</h4>
                            <h6><?= $product->hargajual; ?></h6>
                        </li>
                        <li>
                            <h4>Harga Beli</h4>
                            <h6><?= $product->hargabeli; ?></h6>
                        </li>
                        <li>
                            <h4>Harga App</h4>
                            <h6><?= $product->hargapp; ?></h6>
                        </li>
                        <li>
                            <h4>Status</h4>
                            <h6>Active</h6>
                        </li>
                        <li>
                            <h4>Deskripsi</h4>
                            <h6><?= $product->remarks; ?></h6>
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
                            <img src="<?php base_url() ?>/assets/gambar-produk/<?= $product->file_gambar ?>" alt="img">
                            <h4><?= $product->barangname; ?></h4>
                            <h6><?= $product->hargapp; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>