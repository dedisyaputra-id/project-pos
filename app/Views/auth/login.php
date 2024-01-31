<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php base_url(); ?>assets/img/favicon.png">

    <link rel="stylesheet" href=" <?php base_url(); ?>assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php base_url(); ?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php base_url(); ?>assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="<?php base_url(); ?>assets/css/style.css">
</head>

<body class="account-page">
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src=" <?php base_url(); ?>assets/img/logo/remove-logo.png" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Halaman Login</h3>
                            <h4>Silahkan login keakun anda</h4>
                            <div class="alert alert-danger" role="alert" id="alert-error" style="visibility: hidden;">
                            </div>
                        </div>
                        <!-- <form class="form-login-user">
                            <div class="form-login">
                                <label>Username</label>
                                <div class="mb-3">
                                    <input type="text" placeholder="Masukkan username anda" name="username" id="username" class="username">
                                    <img src="<?php base_url(); ?>/assets/img/icons/user.svg" alt="img">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="pass-input" placeholder="Masukkan password anda" name="password" id="password" class="password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <button class="btn btn-login">Login</button>
                            </div>
                        </form> -->
                        <form class="form-login-user">
                            <?= csrf_field(); ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="username">
                                <div class="invalid-feedback" id="user-error">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="password">
                                <div class="invalid-feedback" id="password-error">

                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary btn-login">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class=" login-img">
                    <div>
                        <img src="<?php base_url(); ?>/assets/img/login.jpg" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>


    <script src="<?php base_url(); ?>/assets/js/jquery-3.6.0.min.js"></script>

    <script src="<?php base_url(); ?>/assets/js/feather.min.js"></script>

    <script src="<?php base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?php base_url(); ?>/assets/js/script.js"></script>
    <script>
        $(document).ready(function() {
            $(".btn-login").click(function(event) {
                event.preventDefault();
                let username = $("#username").val();
                let password = $("#password").val();
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url()  ?>login/save",
                    data: {
                        "username": username,
                        "password": password,
                    },
                    dataType: "JSON",
                    beforeSend: function() {
                        $(".btn-login").prop("disabled", true);
                        $(".btn-login").html("<span>Loading...</span>");
                    },
                    complete: function() {
                        $(".btn-login").prop("disabled", false);
                        $(".btn-login").html("<span>Login</span>");
                    },
                    success: function(response) {
                        console.log(response)
                        if (response.error) {
                            if (response.error.username && response.error.password) {
                                $("#username").addClass("is-invalid");
                                $("#password").addClass("is-invalid");
                                $("#user-error").html(`<span>${response.error.username}</span>`);
                                $("#password-error").html(`<span>${response.error.password}</span>`);
                            } else if (response.error.password) {
                                $("#username").removeClass("is-invalid");
                                $("#password").addClass("is-invalid");
                                $("#password-error").html(`<span>${response.error.password}</span>`);
                            } else if (response.error.username) {
                                $("#password").removeClass("is-invalid");
                                $("#username").addClass("is-invalid");
                                $("#user-error").html(`<span>${response.error.username}</span>`);
                            } else {
                                $("#password").removeClass("is-invalid");
                                $("#username").removeClass("is-invalid");
                                $("#alert-error").css("visibility", "visible");
                                $("#alert-error").text(response.error.message);
                            }
                        } else {
                            let username = $("#username").val("");
                            let password = $("#password").val("");
                            window.location = response.link;
                            // console.log(response.data);
                        }

                    },
                    error: function(response) {
                        console.log(response);
                    },
                });


            });
            // $(".btn-fetch").click(function() {
            //     event.preventDefault()
            //     $.ajax({
            //         method: "POST",
            //        
            //         dataType: "json",
            //         beforeSend: function() {
            //             $(".btn-login").prop("disabled", true)
            //             $(".btn-login").html("<span>Loading...</span>")
            //         },
            //         complete: function() {
            //             $(".btn-login").prop("disabled", false)
            //             $(".btn-login").html("<span>Login</span>")
            //         },
            //         success: function(response) {
            //             console.log(response.success);
            //         },
            //         error: function(data) {
            //             console.log(data.error);
            //         }
            //     });
            // })
        });
    </script>
</body>

</html>