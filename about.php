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
    <div class="case-details-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="case-article">
                            <div class="case-details-img">
                                <img
                                    src="cargo_images/airo.jpg" alt="Images">
                            </div>
                            <div class="case-article-content">
                                <h2>About our company</h2>
                                <p>
                                    Lorem ipsum dolor sit amet, consetetur
                                    sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore et
                                    dolore magna aliquyam erat, sed diam
                                    voluptua. At vero eos et accu sam et justo
                                    duo dolores et ea rebum.
                                    Stet clita kasd gubergren, no sea takimata
                                    sanctus est Lorem ipsum dolor sit amet.
                                    Lorem ipsum dolor sit amet,
                                    consetetur sadipscing elitr.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consetetur
                                    sadipscing elitr, sed diam nonumy eirmod
                                    tempor invidunt ut labore et
                                    dolore magna aliquyam erat, sed diam
                                    voluptua. At vero eos et accu sam et justo
                                    duo dolores et ea rebum.
                                    Stet clita kasd gubergren, no sea takimata
                                    sanctus est Lorem ipsum dolor sit amet.
                                    Lorem ipsum dolor sit amet,
                                    consetetur sadipscing elitr.
                                </p>
                            </div>
                  
                        </div>
                    </div>
                </div>
            </div>
            <div class="case-details-shape">
                <img src="medico_assets/assets/img/case-study/case-study-shape.png"
                    alt="Images">
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

    <!-- 🟥form submit script starts -->
    <script>
        function myFunction(token) {

            document.getElementById('token_number').value = token;
            //getting token number from while loop and inserting as value
            //pushing it to values which is inside form

            var name = document.getElementById('user_name').value;
            var email = document.getElementById('email').value;
            var date = document.getElementById('date').value;

            if (name == '') {
                alert('please enter name');
            } else if (email == "") {
                alert("please enter email");
            } else if (date == "") {
                alert("select date");
            } else {
                document.getElementById("myForm").submit();
            }
        }
    </script>
    <!-- 🟥form submit script ends -->


</body>

<!-- Mirrored from templates.hibootstrap.com/medizo/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 May 2022 11:22:00 GMT -->

</html>