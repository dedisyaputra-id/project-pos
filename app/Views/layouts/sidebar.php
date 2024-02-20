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
                        <h6 class="submenu-hdr">Barang</h6>
                    </div>
                    <a href="/barang" class="<?= ($title == "Barang") ? "active" : ""  ?>"> <img src="<?php echo base_url("/assets/img/icons/product.svg") ?>" alt="img" />
                        <span>Daftar Barang</span>
                    </a>
                    <a href="/barang/tambah" class="<?= ($title == "Tambah barang") ? "active" : "" ?>"><img src="<?php echo base_url("/assets/img/icons/plus-square.svg") ?>" alt="img" /><span>Tambah Barang</span></a>
                    <a href="/kategori" class="<?= ($title == "Daftar kategori") ? "active" : "" ?>"><img src="<?php echo base_url("/assets/img/icons/codepen.svg") ?>" alt="img" /><span>Daftar Kategori</span></a>
                    <a href="/tambahkategori" class="<?= ($title == "Tambah kategori") ? "active" : "" ?>"><img src="<?php echo base_url("/assets/img/icons/plus-square.svg") ?>" alt="img" /><span>Tambah Kategori</span></a>
                    <a href="barcode.html"> <img src="<?php echo base_url("/assets/img/icons/align-justify.svg") ?>" alt="img" /><span>Cetak Barcode</span></a>
                </li>
                <li class="">
                    <div class="submenu-open">
                        <h6 class="submenu-hdr">Menu</h6>
                    </div>
                    <a href="saleslist.html"> <img src="<?php echo base_url("/assets/img/icons/menu.svg") ?>" alt="img" /> <span>Daftar Menu</span></a>
                    <a href="pos.html"> <img src="<?php echo base_url("/assets/img/icons/plus.svg") ?>" alt="img" /> <span>Tambah Menu</span></a>
                    <a href="/jenismenu"> <img src="<?php echo base_url("/assets/img/icons/file-text.svg") ?>" alt="img" /><span>Daftar Jenis Menu</span></a>
                    <a href="/jenismenu/tambah"><img src="<?php echo base_url("/assets/img/icons/plus.svg") ?>" alt="img" /><span>Tambah Jenis Menu</span></a>
                </li>
                <li class="submenu">
                    <div class="submenu-open">
                        <h6 class="submenu-hdr">Penjualan</h6>
                    </div>
                    <a href="saleslist.html"> <img src="<?php echo base_url("/assets/img/icons/shopping-cart.svg") ?>" alt="img" /> <span>Daftar Penjualan</span></a>
                    <a href="pos.html"> <img src="<?php echo base_url("/assets/img/icons/hard-drive.svg") ?>" alt="img" /> <span>POS</span></a>
                    <a href="pos.html"> <img src="<?php echo base_url("/assets/img/icons/plus.svg") ?>" alt="img" /><span>Penjualan Baru</span></a>
                </li>
                <li class="">
                    <div class="submenu-open">
                        <h6 class="submenu-hdr">Pembelian</h6>
                    </div>
                    <a href="/barangmasuk" class="<?= ($title == "Barang masuk") ? "active" : "" ?>"><img src="<?php echo base_url("/assets/img/icons/shopping-bag.svg") ?>" alt="img" /><span>Daftar Pembelian</span></a>
                    <a href="/barangmasuk/tambah" class="<?= ($title == "Tambah barang masuk") ? "active" : "" ?>"><img src="<?php echo base_url("/assets/img/icons/quotation1.svg") ?>" alt="img" /><span>Tambah Pembelian</span> </a>
                    <a href="/detailbarangmasuk" class="<?= ($title == "detail barang masuk") ? "active" : "" ?>"><img src="<?php echo base_url("/assets/img/icons/feather.svg") ?>" alt="img" /><span>Detail Pembelian</span></a>
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
                <li class="">
                    <div class="submenu-open">
                        <h6 class="submenu-hdr">Orang</h6>
                    </div>
                    <a href="customerlist.html"><img src="<?php echo base_url("/assets/img/icons/users.svg") ?>" alt="img" /> <span>Daftar Pembeli</span> </a>
                    <a href="addcustomer.html"><img src="<?php echo base_url("/assets/img/icons/user-plu") ?>s.svg" alt="img" /> <span>Tambah Pembeli</span></a>
                    <a href="/supplier" class="<?= ($title == "Daftar suplier") ? "active" : "" ?>"><img src="<?php echo base_url("/assets/img/icons/user-") ?>x.svg" alt="img" /> <span>Daftar Suplier</span></a>
                    <a href="/supplier/tambah" class="<?= ($title == "Tambah suplier") ? "active" : "" ?>"><img src="<?php echo base_url("/assets/img/icons/chevrons-dow") ?>n.svg" alt="img" /> <span></span> Tambah Suplier</a>
                    <a href="/pengguna" class="<?= ($title == "Pengguna") ? "active" : "" ?>"><img src="<?php echo base_url("/assets/img/icons/user-chec") ?>k.svg" alt="img" /> <span></span> Daftar Pengguna</a>
                    <a href="/tambah/pengguna" class="<?= ($title == "Tambah pengguna") ? "active" : "" ?>"><img src="<?php echo base_url("/assets/img/icons/arrow-dow") ?>n.svg" alt="img" /> <span></span> Tambah Pengguna</a>
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