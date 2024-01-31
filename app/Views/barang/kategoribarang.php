<?= $this->extend("layouts/maintemplate") ?>
<?= $this->section("content") ?>
<div class="page-header">
    <div class="page-title">
        <h4>Product Add Category</h4>
        <h6>Create new product Category</h6>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text">
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="form-group">
                    <label>Kode Kategori</label>
                    <input type="text">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label> Product Image</label>
                    <div class="image-upload">
                        <input type="file">
                        <div class="image-uploads">
                            <img src="<?php base_url() ?>/assets/img/icons/upload.svg" alt="img">
                            <h4>Drag and drop a file to upload</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
                <a href="categorylist.html" class="btn btn-cancel">Cancel</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>