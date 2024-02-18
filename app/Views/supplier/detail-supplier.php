<?= $this->extend("layouts/maintemplate"); ?>
<?= $this->section("content"); ?>
<div class="page-header">
    <div class="page-title">
        <h4>Detail Supplier</h4>
        <h6>Detail Supplier Secara Penuh</h6>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="productdetails">
                    <ul class="product-bar">
                        <li>
                            <h4>Kode Suplier</h4>
                            <h6><?= $supplier->kodesuplier; ?></h6>
                        </li>
                        <li>
                            <h4>Nama suplier</h4>
                            <h6><?= $supplier->namasuplier; ?></h6>
                        </li>
                        <li>
                            <h4>Nomor Hp</h4>
                            <h6><?= $supplier->nohp; ?></h6>
                        </li>
                        <li>
                            <h4>Email</h4>
                            <h6><?= $supplier->email; ?></h6>
                        </li>
                        <li>
                            <h4>Alamat</h4>
                            <h6><?= $supplier->alamat; ?></h6>
                        </li>
                        <li>
                            <h4>Ditambahkan Oleh</h4>
                            <h6> <?= $supplier->ditambahkanoleh; ?></h6>
                        </li>
                        <li>
                            <h4>Tgl ditambahkan</h4>
                            <h6> <?= $waktuditambahkan; ?></h6>
                        </li>
                        <li>
                            <h4>Terakhir diubah</h4>
                            <h6> <?= $terakhirupdate; ?></h6>
                        </li>
                        <li>
                            <h4>Status</h4>
                            <?php if ($supplier->status == "f") : ?>
                                <h6>Tidak Aktif</h6>
                            <?php else : ?>
                                <h6>Aktif</h6>
                            <?php endif; ?>
                        </li>
                        <li>
                            <h4>Deskripsi</h4>
                            <h6><?= $supplier->deskripsi; ?></h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>