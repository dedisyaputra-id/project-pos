<?= $this->extend("layouts/maintemplate.php") ?>
<?= $this->section("content") ?>
<div class="page-header">
    <div class="page-title">
        <h4>Daftar suplier</h4>
        <h6>Atur data suplier anda</h6>
    </div>
    <div class="page-btn">
        <a href="/supplier/tambah" class="btn btn-added"><img src="<?= base_url(); ?>/assets/img/icons/plus.svg" alt="img">Tambah suplier</a>
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
            <table class="table datanew">
                <thead>
                    <tr>
                        <th>
                            <label class="checkboxs">
                                <input type="checkbox" id="select-all">
                                <span class="checkmarks"></span>
                            </label>
                        </th>
                        <th>Nama suplier</th>
                        <th>Kode</th>
                        <th>Nomor Hp</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($suppliers as $supplier) : ?>
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td><?= $supplier->supplier_name; ?></td>
                            <td><?= $supplier->supplier_code; ?></td>
                            <td><?= $supplier->phone_no; ?></td>
                            <td><?= $supplier->email; ?></td>
                            <?php if ($supplier->inactive == "f") : ?>
                                <td><span class="bg-lightred badges">Tidak aktif</span></td>
                            <?php else : ?>
                                <td><span class="bg-lightgreen badges">Aktif</span></td>
                            <?php endif; ?>
                            <td>
                                <a class="me-3" href="/supplier/<?= $supplier->supplierid; ?>">
                                    <img src="<?php base_url() ?>/assets/img/icons/eye.svg" alt="img">
                                </a>
                                <a class="me-3" href="/supplier/edit/<?= $supplier->supplierid; ?>">
                                    <img src="<?php echo base_url() ?>/assets/img/icons/edit.svg" alt="img">
                                </a>
                                <form action="/supplier/delete/<?= $supplier->supplierid; ?>" method="post" class="d-inline">
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