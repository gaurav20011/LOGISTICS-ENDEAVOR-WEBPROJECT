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
    <title>Index page</title>

    <link rel="icon" type="image/png" href="medico_assets/assets/img/favicon.png">
</head>

<body>


    <?php include 'medico_header.php' ?>

    <!-- 🔴🔴🔴MAIN CONTENT AREA STARTS ----------------------------- -->

    <div style="  padding-top: 10px;
  background-color: black;
  background-image: url(cargo_images/header.jpg);
  background-position: left bottom;
  background-repeat: no-repeat;
  background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="banner-content">
                        <h1>WE WILL TAKE CARE OF YOUR CARGO TRANSPORTATION</h1>
                        <div class="banner-btn">
                            <a href="#doctor_images" class="appointment-btn">Request Service</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- 🟡doctor photo starts-->
    <div class="doctor-tab-area pt-100 pb-70" id="doctor_images">
        <div class="container">
            <div class="section-title text-center">
                <h2 style="color:red;">CARGO COMPANIES</h2>
                <div class="section-icon">
                    <div class="icon">
                        <i class="flaticon-dna"></i>
                    </div>
                </div>
            </div>

            <div class="tab doctor-tab text-center">
                <div class="tab_content current active pt-45">


                    <div class="tabs_item current">
                        <div class="doctor-tab-item">
                            <div class="row">

                                <!-- single doctor -->
                                <?php $query = $admin->ret("SELECT * FROM `company` ");
                                while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="doctors-item" >
                                            <div style="height: 360px; background-color:#354046 !important;">

                                                <a href="single_company.php?company_id=<?php echo $row['company_id'] ?>">
                                                    <img src="company/uploads/<?php echo $row['company_imagedb'] ?>">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h3><?php echo $row['company_name'] ?></a></h3>
                                                <span><?php echo $row['email'] ?> </span>

                                                <ul class="social-link">
                                                    <span><?php echo $row['phone'] ?> </span>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!--while loop ends-->

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- 🟡company photo ends -->


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