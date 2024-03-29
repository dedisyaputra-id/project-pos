<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <div class="submenu-open my-2">
                        <h6 class="submenu-hdr">Utama</h6>
                    </div>
                    <a href="/" class="<?= ($title == "Dasbor") ? "active" : ""  ?>"><img src="<?php echo base_url("/assets/img/icons/dashboard.svg") ?>" alt="img" />
                        <span>Dasbor</span>
                    </a>
                </li>
                <li class="">
                    <div class="submenu-open">
                        <h6 class="submenu-hdr">Produk</h6>
                    </div>
                    <a href="/barang" class="<?= ($title == "Barang") ? "active" : ""  ?>"> <img src="<?php echo base_url("/assets/img/icons/product.svg") ?>" alt="img" />
                        <span>Daftar Produk</span>
                    </a>
                    <a href="/barang/tambah"><img src="<?php echo base_url("/assets/img/icons/plus-square.svg") ?>" alt="img" /><span>Tambah Produk</span></a>
                    <a href="/barang/kategori" class="<?= ($title == "Daftar kategori") ? "active" : "" ?>"><img src="<?php echo base_url("/assets/img/icons/codepen.svg") ?>" alt="img" /><span>Daftar Kategori</span></a>
                    <a href="addcategory.html"><img src="<?php echo base_url("/assets/img/icons/plus-square.svg") ?>" alt="img" /><span>Tambah Kategori</span></a>
                    <a href="subcategorylist.html"><img src="<?php echo base_url("/assets/img/icons/speaker (1).svg") ?>" alt="img" /><span>Daftar Sub Kategori </span></a>
                    <a href="subaddcategory.html"><img src="<?php echo base_url("/assets/img/icons/plus.svg") ?>" alt="img" /><span>Tambah Sub Kategori</span></a>
                    <a href="barcode.html"> <img src="<?php echo base_url("/assets/img/icons/align-justify.svg") ?>" alt="img" /><span>Cetak Barcode</span></a>
                </li>
                <li class="submenu">
                    <div class="submenu-open">
                        <h6 class="submenu-hdr">Penjualan</h6>
                    </div>

                    <a href="saleslist.html"> <img src="<?php echo base_url("/assets/img/icons/shopping-cart.svg") ?>" alt="img" /> <span>Daftar Penjualan</span></a>
                    <a href="pos.html"> <img src="<?php echo base_url("/assets/img/icons/hard-drive.svg") ?>" alt="img" /> <span>POS</span></a>
                    <a href="pos.html"> <img src="<?php echo base_url("/assets/img/icons/plus.svg") ?>" alt="img" /><span>Penjualan Baru</span></a>
                </li>
                <li class="submenu">
                    <div class="submenu-open">
                        <h6 class="submenu-hdr"> Pembelian</h6>
                    </div>
                    <a href="purchaselist.html"><img src="<?php echo base_url("/assets/img/icons/shopping-bag.svg") ?>" alt="img" /><span>Daftar Pembelian</span></a>
                    <a href="addpurchase.html"> <img src="<?php echo base_url("/assets/img/icons/quotation1.svg") ?>" alt="img" /> <span>Tambah Pembelian</span> </a>
                </li>
                <li class="submenu">
                    <div class="submenu-open">
                        <h6 class="submenu-hdr">Pengeluaran</h6>
                    </div>

                    <a href="expenselist.html"><img src="<?php echo base_url("/assets/img/icons/share.svg") ?>" alt="img" /> <span>Daftar Pengeluaran</span></a>
                    <a href="createexpense.html"> <img src="<?php echo base_url("/assets/img/icons/copy.svg") ?>" alt="img" /> <span>Tambah Pengeluaran </span></a>
                    <a href="expensecategory.html"> <img src="<?php echo base_url("/assets/img/icons/grid.svg") ?>" alt="img" /> <span>Kategori Pengeluaran</span></a>
                </li>
                <li class="submenu">
                    <div class="submenu-open">
                        <h6 class="submenu-hdr">Transfer</h6>
                    </div>
                    <a href="transferlist.html"><img src="<?php echo base_url("/assets/img/icons/transfer1.svg") ?>" alt="img" /> <span>Daftar Transfer </span></a>
                    <a href="addtransfer.html"> <img src="<?php echo base_url("/assets/img/icons/file-text.svg") ?>" alt="img" /> <span>Tambah Transfer</span></a>
                    <a href="importtransfer.html"> <img src="<?php echo base_url("/assets/img/icons/upload-cloud.svg") ?>" alt="img" /><span>Import Transfer</span></a>
                </li>
                <li class="submenu">
                    <div class="submenu-open">
                        <h6 class="submenu-hdr">Retur</h6>
                    </div>
                    <a href="salesreturnlist.html"> <img src="<?php echo base_url("/assets/img/icons/expense1.svg") ?>" alt="img" /><span>Daftar Retur Penjualan</span></a>
                    <a href="createsalesreturn.html"> <img src="<?php echo base_url("/assets/img/icons/external-lin") ?>k.svg" alt="img" /> <span>Tambah Retur Penjualan</span> </a>
                    <a href="purchasereturnlist.html"><img src="<?php echo base_url("/assets/img/icons/repeat.svg") ?>" alt="img" /> <span>Daftar Pembayaran Retur</span></a>
                    <a href="createpurchasereturn.html"><img src="<?php echo base_url("/assets/img/icons/trello.svg") ?>" alt="img" /> <span>Tambah Retur Pembayaran</span></a>
                </li>
                <li class="submenu">
                    <div class="submenu-open">
                        <h6 class="submenu-hdr">Orang</h6>
                    </div>
                    <a href="customerlist.html"><img src="<?php echo base_url("/assets/img/icons/users.svg") ?>" alt="img" /> <span>Daftar Pembeli</span> </a>
                    <a href="addcustomer.html"><img src="<?php echo base_url("/assets/img/icons/user-plu") ?>s.svg" alt="img" /> <span>Tambah Pembeli</span></a>
                    <a href="supplierlist.html"><img src="<?php echo base_url("/assets/img/icons/user-") ?>x.svg" alt="img" /> <span>Daftar Suplier</span></a>
                    <a href="addsupplier.html"><img src="<?php echo base_url("/assets/img/icons/chevrons-dow") ?>n.svg" alt="img" /> <span></span> Tambah Suplier</a>
                    <a href="userlist.html"><img src="<?php echo base_url("/assets/img/icons/user-chec") ?>k.svg" alt="img" /> <span></span> Daftar Pengguna</a>
                    <a href="adduser.html"><img src="<?php echo base_url("/assets/img/icons/arrow-dow") ?>n.svg" alt="img" /> <span></span> Tambah Pengguna</a>
                    <a href="storelist.html"><img src="<?php echo base_url("/assets/img/icons/airplay.svg") ?>" alt="img" /> <span></span> Daftar Toko</a>
                    <a href="addstore.html"><img src="<?php echo base_url("/assets/img/icons/aperture.svg") ?>" alt="img" /> <span></span> Tambah Toko</a>
                </li>
                <li class="submenu">
                    <div class="submenu-open">
                        <h6 class="submenu-hdr">Laporan</h6>
                    </div>
                    <a href="purchaseorderreport.html"><img src="<?php echo base_url("/assets/img/icons/bar-char") ?>t-2.svg" alt="img" /> <span>Laporan Pesanan Pembelian</span></a>
                    <a href="inventoryreport.html"><img src="<?php echo base_url("/assets/img/icons/pie-char") ?>t.svg" alt="img" /> <span>Laporan Inventaris</span></a>
                    <a href="salesreport.html"><img src="<?php echo base_url("/assets/img/icons/book.svg") ?>" alt="img" /> <span>Laporan Penjualan</span></a>
                    <a href="invoicereport.html"><img src="<?php echo base_url("/assets/img/icons/archive.svg") ?>" alt="img" /> <span>Laporan Invoice</span> </a>
                    <a href="purchasereport.html"><img src="<?php echo base_url("/assets/img/icons/book-ope") ?>n.svg" alt="img" /> <span>Laporan Pembelian</span></a>
                    <a href="supplierreport.html"><img src="<?php echo base_url("/assets/img/icons/columns.svg") ?>" alt="img" /> <span>Laporan Suplier</span></a>
                    <a href="customerreport.html"><img src="<?php echo base_url("/assets/img/icons/file.svg") ?>" alt="img" /> <span>Laporan Pembeli</span></a>
                </li>
                <li class="submenu">
                    <div class="submenu-open">
                        <h6 class="submenu-hdr">Pengguna</h6>
                    </div>
                    <a href="newuser.html"><img src="<?php echo base_url("/assets/img/icons/user.svg") ?>" alt="img" /><span>Pengguna Baru</span></a>
                    <a href="userlists.html"><img src="<?php echo base_url("/assets/img/icons/users.svg") ?>" alt="img" /><span> Daftar Pengguna</span></a>
                </li>
                <li class="submenu">
                    <div class="submenu-open">
                        <h6 class="submenu-hdr">Pengaturan</h6>
                    </div>
                    <a href="generalsettings.html"><img src="<?php echo base_url("/assets/img/icons/settings.svg") ?>" alt="img" /><span>Pengaturan Umum</span></a>
                    <a href="emailsettings.html"><img src="<?php echo base_url("/assets/img/icons/mail.svg") ?>" alt="img" /><span> Pengaturan Email</span></a>
                    <a href="paymentsettings.html"><img src="<?php echo base_url("/assets/img/icons/send.svg") ?>" alt="img" /><span> Pengaturan Pembayaran</span></a>
                    <a href="grouppermissions.html"><img src="<?php echo base_url("/assets/img/icons/command.svg") ?>" alt="img" /><span> Izin Grup</span></a>
                    <a href="taxrates.html"><img src="<?php echo base_url("/assets/img/icons/bookmark.svg") ?>" alt="img" /><span> Tarif Pajak</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>