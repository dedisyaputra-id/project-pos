<?= $this->extend("layouts/maintemplate.php") ?>
<?= $this->section("content") ?>
<div class="page-header">
    <div class="page-title">
        <h4>Daftar Pengguna</h4>
        <h6>Atur pengguna anda</h6>
    </div>
    <div class="page-btn">
        <a href="/tambah/pengguna" class="btn btn-added">
            <img src="<?php echo base_url() ?>/assets/img/icons/plus.svg" class="me-1" alt="img">Tambah Pengguna
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
                        <img src="<?php base_url() ?>/assets/img/icons/filter.svg" alt="img">
                        <span><img src="<?php base_url() ?>/assets/img/icons/closes.svg" alt="img"></span>
                    </a>
                </div>
                <div class="search-input">
                    <a class="btn btn-searchset"><img src="<?php base_url() ?>/assets/img/icons/search-white.svg" alt="img"></a>
                </div>
            </div>
            <div class="wordset">
                <ul>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="<?php base_url() ?>/assets/img/icons/pdf.svg" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="<?php base_url() ?>/assets/img/icons/excel.svg" alt="img"></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="<?php base_url() ?>/assets/img/icons/printer.svg" alt="img"></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table  datanew">
                <thead>
                    <tr>
                        <th>
                            <label class="checkboxs">
                                <input type="checkbox" id="select-all">
                                <span class="checkmarks"></span>
                            </label>
                        </th>
                        <th>Nama Lengkap</th>
                        <th>Gender</th>
                        <th>Hak akses</th>
                        <th>Alamat</th>
                        <th>Deskripsi</th>
                        <th>Dibuat Oleh</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td class="productimgname">
                                <a href="javascript:void(0);" class="product-img">
                                    <img src="<?= base_url() ?>/assets/gambar-produk/<?= $user->userid  ?>.jpg" alt="">
                                </a>
                                <a href="javascript:void(0);"><?= $user->namalengkap; ?></a>
                            </td>
                            <td><?= $user->jeniskelamin; ?></td>
                            <td><?= $user->usergroupname; ?></td>
                            <td><?= $user->alamat; ?></td>
                            <td><?= $user->deskripsi; ?></td>
                            <td><?= $user->dibuatoleh; ?></td>
                            <td>
                                <a class="me-3" href="/kategori/">
                                    <img src="<?php echo base_url() ?>/assets/img/icons/edit.svg" alt="img">
                                </a>
                                <form action="/hapus/pengguna/<?= $user->userid; ?>" method="post" class="d-inline">
                                    <?php csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="border-0" type="submit" onclick="return confirm('apakah anda yakin ingin menghapus?')" style="background: none;">
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