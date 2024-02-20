<?= $this->extend("layouts/maintemplate.php") ?>
<?= $this->section("content") ?>
<div class="page-header">
    <div class="page-title">
        <h4>Daftar Jenis Menu</h4>
    </div>
    <div class="page-btn">
        <a href="/jenismenu/tambah" class="btn btn-added">
            <img src="<?php echo base_url() ?>/assets/img/icons/plus.svg" class="me-1" alt="img">Tambah Jenis Menu
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
                        <th>Nama jenis menu</th>
                        <th>Dibuat oleh</th>
                        <th>Tgl ditambahkan</th>
                        <th>Diubah oleh</th>
                        <th>Tgl ubah</th>
                        <th>Status</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jenismenu as $jenismenudata) : ?>
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td><?= $jenismenudata->jenismenuname; ?></td>
                            <td><?= $jenismenudata->opadd; ?></td>
                            <td><?= date("d-M-Y", strtotime($jenismenudata->luadd)); ?></td>
                            <td><?= $jenismenudata->opedit; ?></td>
                            <?php if (!$jenismenudata->luedit) : ?>
                                <td></td>
                            <?php else : ?>
                                <td><?= date("d-M-Y", strtotime($jenismenudata->luedit)); ?></td>
                            <?php endif ?>
                            <?php if ($jenismenudata->inactive == "f") : ?>
                                <td><span class="bg-lightred badges">Tidak aktif</span></td>
                            <?php else : ?>
                                <td><span class="bg-lightgreen badges">Aktif</span></td>
                            <?php endif; ?>
                            <td><?= $jenismenudata->remarks; ?></td>
                            <td>
                                <a class="me-3" href="/jenismenu/<?= $jenismenudata->jenismenuid; ?>">
                                    <img src="<?php echo base_url() ?>/assets/img/icons/edit.svg" alt="img">
                                </a>
                                <form action="/jenismenu/hapus/<?= $jenismenudata->jenismenuid ?>" method="post" class="d-inline">
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