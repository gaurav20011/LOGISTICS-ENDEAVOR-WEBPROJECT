<?php

include '../config.php';

$admin = new Admin();

if (!isset($_SESSION['petowner_id'])) {
       header("location:petowner/login_front.php");
       //$_SESSION is from admin loginback.php page
       //checks admin login d or not, otherwise it will redirect to login page
}

$s_variable =$_SESSION['petowner_id']; //assigning session to variable

?>


<!doctype html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/medizo/default/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 May 2022 11:22:21 GMT -->

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.min.css">

    <link rel="stylesheet" href="assets/fonts/flaticon.css">

    <link rel="stylesheet" href="assets/css/boxicons.min.css">

    <link rel="stylesheet" href="assets/css/boxicons.min.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="assets/css/nice-select.min.css">

    <link rel="stylesheet" href="assets/css/meanmenu.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="stylesheet" href="assets/css/responsive.css">

    <link rel="stylesheet" href="assets/css/theme-dark.css">
    <title>Medizo - Healthcare Clinic & Doctor HTML Template</title>

    <link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>

<body>


    <section class="cart-wraps-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="cart-wraps">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Token Number</th>
                                        <th scope="col">Token Status</th>
                                        <th scope="col">delete</th>
                                    </tr>
                                </thead>



                                <tbody>

                                    <?php $query = $admin->ret("SELECT * FROM `token` where `doctor_id`=$s_variable");
                                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>

                                            <td class="product-thumbnail">
                                                <?php echo $row['token_number']?>
                                            </td>

                                            <td class="product-name">
                                                <button type="button" class="btn btn-warning btn-rounded btn-fw">Warning</button>
                                            </td>

                                            <td class="product-price">
                                                <button type="button" class="btn btn-danger btn-rounded btn-fw">cancel</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <!--while loop ends-->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="assets/js/jquery.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="assets/js/jquery.nice-select.min.js"></script>

    <script src="assets/js/wow.min.js"></script>

    <script src="assets/js/meanmenu.js"></script>

    <script src="assets/js/datepicker.min.js"></script>

    <script src="assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="assets/js/form-validator.min.js"></script>

    <script src="assets/js/contact-form-script.js"></script>

    <script src="assets/js/custom.js"></script>
</body>

<!-- Mirrored from templates.hibootstrap.com/medizo/default/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 May 2022 11:22:21 GMT -->

</html>