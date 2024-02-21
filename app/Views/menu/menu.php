<?= $this->extend("layouts/maintemplate.php") ?>
<?= $this->section("content") ?>
<div class="page-header">
    <div class="page-title">
        <h4>Daftar Menu</h4>
    </div>
    <div class="page-btn">
        <a href="/menu/tambah" class="btn btn-added">
            <img src="<?php echo base_url() ?>/assets/img/icons/plus.svg" class="me-1" alt="img">Tambah Menu
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
                        <th>Foto menu</th>
                        <th>Kode menu</th>
                        <th>Nama menu</th>
                        <th>Harga</th>
                        <th>Jenis menu</th>
                        <th>Status</th>
                        <th>Dibuat oleh</th>
                        <th>Tgl ditambahkan</th>
                        <th>Diubah oleh</th>
                        <th>Tgl ubah</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menu as $menudata) : ?>
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td class="productimgname">
                                <?php if ($menudata->photo) : ?>
                                    <a href="javascript:void(0);" class="product-img">
                                        <img src="<?php base_url() ?>/assets/gambar-menu/<?= $menudata->photo ?>" alt="product" style="object-fit: cover;">
                                    </a>
                                <?php else : ?>
                                    <a href="javascript:void(0);" class="product-img">
                                        <img src="<?php base_url() ?>/assets/img/icons/image.svg" alt="img">
                                    </a>
                                <?php endif ?>
                            </td>
                            <td><?= $menudata->menucode; ?></td>
                            <td><?= $menudata->menuname; ?></td>
                            <td>Rp. <?= number_format($menudata->price, 0, ",", "."); ?></td>
                            <td><?= $menudata->jenismenuname; ?></td>
                            <?php if ($menudata->inactive == "f") : ?>
                                <td><span class="bg-lightred badges">Tidak aktif</span></td>
                            <?php else : ?>
                                <td><span class="bg-lightgreen badges">Aktif</span></td>
                            <?php endif; ?>
                            <td><?= $menudata->opadd; ?></td>
                            <td><?= date("d-M-Y", strtotime($menudata->luadd)); ?></td>
                            <td><?= $menudata->opedit; ?></td>
                            <?php if (!$menudata->luedit) : ?>
                                <td></td>
                            <?php else : ?>
                                <td><?= date("d-M-Y", strtotime($menudata->luedit)); ?></td>
                            <?php endif ?>
                            <td><?= $menudata->remarks; ?></td>
                            <td>
                                <a class="me-3" href="/menu/<?= $menudata->menuid; ?>">
                                    <img src="<?php echo base_url() ?>/assets/img/icons/edit.svg" alt="img">
                                </a>
                                <form action="/menu/hapus/<?= $menudata->menuid ?>" method="post" class="d-inline">
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