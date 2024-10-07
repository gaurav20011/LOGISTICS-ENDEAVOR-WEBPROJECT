<?php

include 'config.php';

$admin = new Admin();
?>


<!doctype html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/medizo/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 May 2022 11:21:54 GMT -->

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="medico_assets/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="medico_assets/assets/css/animate.min.css">

    <link rel="stylesheet" href="medico_assets/assets/fonts/flaticon.css">

    <link rel="stylesheet" href="medico_assets/assets/css/boxicons.min.css">

    <link rel="stylesheet" href="medico_assets/assets/css/boxicons.min.css">

    <link rel="stylesheet" href="medico_assets/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="medico_assets/assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="medico_assets/assets/css/nice-select.min.css">

    <link rel="stylesheet" href="medico_assets/assets/css/meanmenu.css">

    <link rel="stylesheet" href="medico_assets/assets/css/style.css">

    <link rel="stylesheet" href="medico_assets/assets/css/responsive.css">

    <link rel="stylesheet" href="medico_assets/assets/css/theme-dark.css">
    <title>company view</title>

    <link rel="icon" type="image/png" href="medico_assets/assets/img/favicon.png">
</head>

<body>


    <?php include 'medico_header.php' ?>

    <!-- 🔴🔴🔴MAIN CONTENT AREA STARTS ----------------------------- -->
    <div class="testimonials-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <!-- <span>Testimonials</span> -->
                <h2>Thoughts of Our Users</h2>
            </div>
            <div class="row pt-45">
                <div class="col-lg-6">
                    <div class="testimonials-img">
                        <!-- <img src="assets/img/testimonials/testimonials-img.jpg" > -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testimonials-slider-area">
                        <div class="testimonials-slider owl-carousel
                                owl-theme">

                            <!-- single feedback starts -->
                            <?php $query = $admin->ret("SELECT * FROM `feedback` INNER JOIN `user` ON feedback.user_id = user.user_id");
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                            <div class="testimonials-item">
                                <i class="flaticon-left-quote"></i>
                                <p><?php echo $row['message'] ?></p>
                                <div class="content">
                                    <img src="user/uploads/<?php echo $row['user_imagedb'] ?>" alt="Images">
                                    <h3><?php echo $row['user_name'] ?></h3>
                                </div>
                            </div>
                            <?php } ?>
                            <!-- single feedback ends -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- 🔴🔴🔴MAIN CONTENT AREA ENDS----------------------------- -->

    <?php include 'medico_footer.php' ?>



    <script src="medico_assets/assets/js/jquery.min.js"></script>

    <script src="medico_assets/assets/js/bootstrap.bundle.min.js"></script>

    <script src="medico_assets/assets/js/jquery.magnific-popup.min.js"></script>

    <script src="medico_assets/assets/js/owl.carousel.min.js"></script>

    <script src="medico_assets/assets/js/jquery.nice-select.min.js"></script>

    <script src="medico_assets/assets/js/wow.min.js"></script>

    <script src="medico_assets/assets/js/meanmenu.js"></script>

    <script src="medico_assets/assets/js/datepicker.min.js"></script>

    <script src="medico_assets/assets/js/jquery.ajaxchimp.min.js"></script>

    <script src="medico_assets/assets/js/form-validator.min.js"></script>

    <script src="medico_assets/assets/js/contact-form-script.js"></script>

    <script src="medico_assets/assets/js/custom.js"></script>




</body>

<!-- Mirrored from templates.hibootstrap.com/medizo/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 May 2022 11:22:00 GMT -->

</html>