<?= $this->extend("layouts/maintemplate"); ?>
<?= $this->section("content"); ?>

<div class="page-header">
    <div class="page-title">
        <h4>Daftar Barang</h4>
        <h6>Atur data barang anda</h6>
    </div>
    <div class="page-btn">
        <a href="/barang/tambah" class="btn btn-added"><img src="<?php base_url() ?>/assets/img/icons/plus.svg" alt="img" class="me-1">Tambah Barang Baru</a>
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
                        <th>Nama Barang</th>
                        <th>Kode Barang</th>
                        <th>Kategori</th>
                        <th>Brand</th>
                        <th>Harga</th>
                        <th>Unit</th>
                        <th>Stok Awal</th>
                        <th>Ditambah Oleh</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang as $brg) : ?>
                        <tr>
                            <td>
                                <label class="checkboxs">
                                    <input type="checkbox">
                                    <span class="checkmarks"></span>
                                </label>
                            </td>
                            <td class="productimgname">
                                <a href="javascript:void(0);" class="product-img">
                                    <img src="<?php base_url() ?>/assets/gambar-produk/<?= $brg->file_gambar ?>" alt="product" style="object-fit: cover;">
                                </a>
                                <a href="javascript:void(0);"><?= $brg->barangname ?></a>
                            </td>
                            <td><?= $brg->barangcode ?></td>
                            <td>Computers</td>
                            <td>N/D</td>
                            <td><?= $brg->hargajual; ?></td>
                            <td>pc</td>
                            <td><?= $brg->stokawal; ?></td>
                            <td><?= $brg->opadd; ?></td>

                            <td>
                                <a class="me-3" href="/barang/<?= $brg->barangid; ?>">
                                    <img src="<?php base_url() ?>/assets/img/icons/eye.svg" alt="img">
                                </a>
                                <a class="me-3" href="/barang/edit/<?= $brg->barangid ?>">
                                    <img src="<?php base_url() ?>/assets/img/icons/edit.svg" alt="img">
                                </a>
                                <form action="/barang/hapus/<?= $brg->barangid ?>" method="post" class="d-inline">
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
<?= $this->section("ajax"); ?>
<script>
    // $(".btn-delete").click(function() {
    //     Swal.fire({
    //         title: "Apakah anda yakin?",
    //         icon: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#3085d6",
    //         cancelButtonColor: "#d33",
    //         confirmButtonText: "Iya, Hapus",
    //         cancelButtonText: "Batal",
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             let id = 29
    //             $.ajax({
    //                 url: "/barang/hapus/" + id,
    //                 method: "delete",
    //                 dataType: "JSON",
    //                 beforeSend: function() {
    //                     Swal.fire({
    //                         title: 'Please Wait !',
    //                         html: 'data uploading',
    //                         allowOutsideClick: false,
    //                         showConfirmButton: false,
    //                         onBeforeOpen: () => {
    //                             Swal.showLoading()
    //                         },
    //                     });
    //                 },
    //                 success: function(response) {
    //                     console.log(response)
    //                     if (response.success) {
    //                         Swal.fire({
    //                             title: "Deleted!",
    //                             text: "Your file has been deleted.",
    //                             icon: "success"
    //                         });
    //                         window.location = "/barang"
    //                     }
    //                 },
    //                 error: function(err) {
    //                     console.log(err)
    //                 }
    //             })
    //         }
    //     });
    // });
</script>
<?= $this->endSection(); ?>
<?= $this->endSection(); ?>