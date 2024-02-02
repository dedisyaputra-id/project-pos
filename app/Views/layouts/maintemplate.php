<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta name="description" content="POS - Bootstrap Admin Template" />
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive" />
    <meta name="author" content="Dreamguys - Bootstrap Admin Template" />
    <meta name="robots" content="noindex, nofollow" />
    <title><?= $title  ?></title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url("/assets/img/favicon.png")  ?>" />

    <link rel="stylesheet" href="<?php echo base_url("/assets/css/bootstrap.min.css")  ?>" />

    <link rel="stylesheet" href="<?php echo base_url("/assets/css/animate.css")  ?>" />

    <link rel="stylesheet" href="<?php echo base_url("/assets/css/dataTables.bootstrap4.min.css")  ?>" />

    <link rel="stylesheet" href="<?php echo base_url("/assets/plugins/fontawesome/css/fontawesome.min.css")  ?>" />
    <link rel="stylesheet" href="<?php echo base_url("/assets/plugins/fontawesome/css/all.min.css")  ?>" />

    <link rel="stylesheet" href="<?php echo base_url("/assets/css/style.css")  ?>" />
    <link rel="stylesheet" href="<?php echo base_url("/assets/css/mycss.css")  ?>" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>

<body>
    <!-- <div id="global-loader">
        <div class="whirly-loader"></div>
    </div> -->
    <div class="main-wrapper">
        <?= $this->include("layouts/header"); ?>
        <?= $this->include("layouts/sidebar"); ?>
        <div class="page-wrapper">
            <div class="content">
                <?= $this->renderSection("content"); ?>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url("/assets/js/myjs.js")  ?>"></script>
    <script src="<?php echo base_url("/assets/js/jquery-3.6.0.min.js")  ?>"></script>

    <script src="<?php echo base_url("/assets/js/feather.min.js")  ?>"></script>

    <script src="<?php echo base_url("/assets/js/jquery.slimscroll.min.js")  ?>"></script>

    <script src="<?php echo base_url("/assets/js/jquery.dataTables.min.js")  ?>"></script>
    <script src="<?php echo base_url("/assets/js/dataTables.bootstrap4.min.js")  ?>"></script>

    <script src="<?php echo base_url("/assets/js/bootstrap.bundle.min.js")  ?>"></script>

    <script src="<?php echo base_url("/assets/plugins/apexchart/apexcharts.min.js")  ?>"></script>
    <script src="<?php echo base_url("/assets/plugins/apexchart/chart-data.js")  ?>"></script>

    <script src="<?php echo base_url("/assets/js/script.js")  ?>"></script>
    <script src="<?php base_url() ?>/assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="<?php base_url() ?>/assets/plugins/sweetalert/sweetalerts.min.js"></script>
    <?php $this->renderSection("ajax") ?>
</body>

</html>