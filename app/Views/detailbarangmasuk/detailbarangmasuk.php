<?= $this->extend("layouts/maintemplate.php") ?>
<?= $this->section("content") ?>
<div class="page-header">
    <div class="page-title">
        <h4>Detail Barang Masuk</h4>
        <span>Atur detail barang masuk</span>
    </div>
    <div class="page-btn">
        <a href="/detailbarangmasuk/tambah" class="btn btn-added">
            <img src="<?php echo base_url() ?>/assets/img/icons/plus.svg" class="me-1" alt="img">Tambah Detail Barang Masuk
        </a>
    </div>
</div>
<?php if (session()->getFlashdata("success")) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata("success") ?>
    </div>
<?php endif; ?>
<div class="card">
    <div class="card-body">
        <div class="table-top">
            <div class="search-set">
                <div class="search-path">
                    <a class="btn btn-filter" id="filter_search">
                        <img src="<?= base_url(); ?>/assets/img/icons/filter.svg" alt="img">
                        <span><img src="<?= base_url(); ?>/assets/img/icons/closes.svg" alt="img"></span>
                    </a>
                </div>
                <div class="search-input">
                    <a class="btn btn-searchset"><img src="<?= base_url(); ?>/assets/img/icons/search-white.svg" alt="img"></a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table datanew">
                <thead>
                    <tr>
                        <th>
                            <label class="checkboxs">
                                <input type="checkbox" id="select-all">
                                <span class="checkmarks"></span>
                            </label>
                        </th>
                        <th>Kode Barang</th>
                        <th>Kode Barang Masuk</th>
                        <th>Ditambahkan Oleh</th>
                        <th>Tanggal Ditambahkan</th>
                        <th>Jumlah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detailbarangmasuk as $item) : ?>
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td class="text-bolds"><?= $item->barangcode; ?></td>
                            <td><?= $item->barangmasukcode; ?></td>
                            <td><?= $item->dibuatoleh; ?></td>
                            <td><?= date("d-M-Y", strtotime($item->waktu)); ?></td>
                            <td><?= $item->jumlah; ?></td>
                            <td>
                                <a class="me-3" href="/detailbarangmasuk/<?= $item->id; ?>">
                                    <img src="<?php base_url() ?>/assets/img/icons/eye.svg" alt="img">
                                </a>
                                <a class="me-3" href="/detailbarangmasuk/edit/<?= $item->id; ?>">
                                    <img src="<?= base_url(); ?>/assets/img/icons/edit.svg" alt="img">
                                </a>
                                <form action="/detailbarangmasuk/hapus/<?= $item->id ?>" method="post" class="d-inline">
                                    <?php csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="border-0" type="submit" onclick="return confirm('apakah anda yakin?')" style="background: none;">
                                        <img src="<?php base_url() ?>/assets/img/icons/delete.svg" alt="img">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>