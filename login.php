<?php
session_start();
if (isset($_SESSION['role'])) {
    header("location:barang.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Pos Koperasi </title>
    <!-- Load Favicon-->
    <link href="assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <!-- Load Material Icons from Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />
    <!-- Roboto and Roboto Mono fonts from Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500" rel="stylesheet" />
    <!-- Load main stylesheet-->
    <link href="styles.css" rel="stylesheet" />
</head>

<body class="bg-pattern-waihou">
    <!-- Layout wrapper-->
    <div id="layoutAuthentication">
        <!-- Layout content-->
        <div id="layoutAuthentication_content">
            <!-- Main page content-->
            <main>
                <!-- Main content container-->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xxl-10 col-xl-10 col-lg-12">
                            <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-4">
                                <div class="row g-0">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="card-body p-5">
                                            <!-- Auth header with logo image-->
                                            <div class="text-center">
                                                <img class="mb-3" src="https://material-admin-pro.startbootstrap.com/assets/img/icons/background.svg" alt="..." style="height: 48px" />
                                                <h1 class="display-5 mb-0">Login</h1>
                                                <div class="subheading-1 mb-5">untuk melanjutkan ke aplikasi <br>user: admin - password: admin</div>
                                            </div>
                                            <!-- Login submission form-->
                                            <form class="mb-5" autocomplete="on">
                                                <div class="mb-4">
                                                    <mwc-textfield class="w-100" label="Username" outlined="" autocomplete="username"></mwc-textfield>
                                                </div>
                                                <div class="mb-4">
                                                    <mwc-textfield class="w-100" label="Password" outlined="" type="password" autocomplete="current-password"></mwc-textfield>
                                                </div>
                                                <!-- <div class="d-flex align-items-center">
                                                    <mwc-formfield label="Remember password">
                                                        <mwc-checkbox></mwc-checkbox>
                                                    </mwc-formfield>
                                                </div> -->
                                                <div class="form-group d-flex justify-content-center">
                                                    <!-- <a class="small fw-500 text-decoration-none" href="app-auth-password-basic.html">Forgot Password?</a> -->
                                                    <a class="btn btn-primary btn-block" id="iya">Login</a>
                                                    <!-- <button class="btn btn-primary btn-block" id="iya">Lomgin</button> -->
                                                </div>
                                            </form>
                                            <!-- Auth card message-->
                                        </div>
                                    </div>
                                    <!-- Background image column using inline CSS-->
                                    <div class="col-lg-7 col-md-6 d-none d-md-block" style="background-image: url('1335-qr-code-flattt.gif'); background-size: cover; background-repeat: no-repeat; background-position: center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <!-- Layout footer-->
        <div id="layoutAuthentication_footer"></div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script> -->
    <script src="js/sa.js"></script>
    <script>
        $(document).ready(function() {

            $("#iya").click(function() {

                var user = $('[label="Username"]').val();
                var pass = $('[label="Password"]').val();

                if (user.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Username Wajib Diisi !'
                    });

                } else if (pass.length == "") {

                    Swal.fire({
                        type: 'warning',
                        title: 'Oops...',
                        text: 'Password Wajib Diisi !'
                    });

                } else {

                    $.ajax({

                        url: "ajax.php",
                        type: "POST",
                        data: {
                            "username": user,
                            "password": pass
                        },

                        success: function(response) {

                            if (response == "success") {

                                Swal.fire({
                                        type: 'success',
                                        title: 'Login Berhasil!',
                                        text: 'Mengarahkan...',
                                        timer: 2000,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    })
                                    .then(function() {
                                        window.location.href = "barang.php";
                                    });

                            } else {

                                Swal.fire({
                                    type: 'error',
                                    title: 'Login Gagal!',
                                    text: 'silahkan coba lagi!'
                                });

                            }

                            console.log(response);

                        },

                        error: function(response) {

                            Swal.fire({
                                type: 'error',
                                title: 'Opps!',
                                text: 'server error!'
                            });

                            console.log(response);

                        }

                    });

                }

            });

        });

        $('[label="Username"], [label="Password"]').keyup(function(event) {
            if (event.keyCode === 13) {
                $("#iya").click();
            }
        });

        // $(document).ready(function() {
        //     $("#iyaaaa").click(function() {
        //         var user = $('[label="Username"]').val();
        //         var pass = $('[label="Password"]').val();
        //         // alert(user);
        //         // alert(pass);
        //         //     stop();
        //         if (user) {
        //             $.ajax({
        //                 type: 'POST',
        //                 url: 'ajax.php',
        //                 data: {
        //                     "username": user,
        //                     "password": pass
        //                 },
        //                 success: function(html) {
        //                     $('#sub').html(html);
        //                     $("#sub").val(subID).change();
        //                     $('.subtipe').selectpicker('refresh');
        //                     $('.subtipe').selectpicker('val', subID);


        //                 }
        //             });
        //         } else {
        //             $('#sub').html('<option value="" disabled>--Pilih Tipe Terlebih Dahulu--</option>');
        //         }
        //     });
        // });
    </script>
    <!-- Load Bootstrap JS bundle-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Load global scripts-->
    <script type="module" src="js/material.js"></script>
    <script src="js/scripts.js"></script>

    <!-- <script src="https://assets.startbootstrap.com/js/sb-customizer.js"></script>
        <sb-customizer project="material-admin-pro"></sb-customizer> -->
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"721dd933fc846c00","token":"6e2c2575ac8f44ed824cef7899ba8463","version":"2022.6.0","si":100}' crossorigin="anonymous"></script>
</body>

</html>