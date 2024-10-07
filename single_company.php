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
    <?php
    $company_id = $_GET['company_id'];  //this is from update button href
    $query = $admin->ret("SELECT * FROM `company` where `company_id`=$company_id");
    $row = $query->fetch(PDO::FETCH_ASSOC);
    ?>



    <div style="  padding-top: 10px;
  background-color: black;
  background-image: url(cargo_images/singleboat.jpg);
  background-position: left bottom;
  background-repeat: no-repeat;
  background-size: cover; 
  height:400px;">
        <div class="container">
            <div class="page-title-content">
                <h1 style="color:white; margin-top:100px; background-color:#274F68; border-radius: 25px; text-align:center;">company name: <?php echo $row['company_name'] ?></h1>
                <ul>
                </ul>
            </div>
        </div>
    </div>

    <!-- single company -->

    <div class="doctors-details-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div style="height: 300px; background-color:#354046 !important; ">
                        <center> <img src="company/uploads/<?php echo $row['company_imagedb'] ?>" style="margin-top: 25px;"> </center>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="doctors-details-content">
                        <h3><?php echo $row['company_name'] ?></h3>
                        <ul class="doctors-details-list">
                            <li>Phone: <?php echo $row['phone'] ?></li>
                            <li>Email: <?php echo $row['email'] ?></li>
                            <li style="color:blue;"><b>verified company</li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
        <div class="doctors-details-shape">
            <img src="assets/img/doctors/doctors-shape4.png" alt="Images">
        </div>
    </div>

    <!--🟡 company services starts-->
    <div class="product-area pt-30 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">

                </div>
                <!-- <div class="col-lg-3 col-md-6">
<div class="product-search-widget">
<form class="product-search-form">
<input type="search" class="form-control" placeholder="Search...">
<button type="submit">
<i class="bx bx-search"></i>
</button>
</form>
</div>
</div> -->
            </div>


            <div class="row pt-20">

                <!-- single product -->
                <?php
                // $query = $admin->ret("SELECT * FROM `service` where `company_id`=$company_id");
                $query = $admin->ret("SELECT * FROM `service`  where `company_ids`='$company_id' ");
                while ($v_row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="product-card">
                            <div class="product-img" style="height: 200px;">
                                <a href="">
                                    <img src="company/uploads/<?php echo $v_row['service_imagedb'] ?>">
                                </a>


                                <div class="product-add">
                                    <ul>
                                        <!-- <li><a href="#"><i class="flaticon-view"></i></a></li>
<li><a href="#"><i class="flaticon-testing"></i></a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="content">
                                <h4>International: Available</h4>
                                <!-- <h4><?php echo $row['company_name'] ?></h4> -->
                                <h3><?php echo $v_row['service_name'] ?> <span style="color:red !important;"><?php echo $v_row['service_price'] ?> RS</span></h3>

                                <?php if (isset($_SESSION['user_id'])) { ?>
                                    <div class="product-btn">
                                        <a href="booking.php?company_id=<?php echo $company_id ?> & service_id=<?php echo $v_row['service_id'] ?>" class="add-btn">Book service</a>
                                    </div>
                                <?php } else { ?>
                                    <div class="product-btn">
                                        <a href="user/login_front.php" class="add-btn">Book service</a>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!--while loop ends -->
            </div>
        </div>
    </div>


    <!-- 🟡company service ends -->


    <!-- 🟡 booking table starts -->
    <?php if (isset($_SESSION['user_id'])) { ?>
        <?php $s_variable = $_SESSION['user_id']; ?>
        <section class="cart-wraps-area ptb-100">
            <div class="container" id="table_ajax_id">
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <div class="cart-wraps">
                            <div class="cart-table table-responsive">
                                <h2>Already booked token</h2>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Booking date</th>
                                            <th scope="col">Service name</th>
                                            <th scope="col">Booking Status</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>



                                    <tbody>
                                        <h1 id="jump_to_table"></h1>
                                        <?php $query = $admin->ret("SELECT * FROM `booking` INNER JOIN `service` ON booking.service_idb = service.service_id where `user_idb`=$s_variable and `company_idb`='$company_id' ");
                                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <tr>

                                                <td class="product-name">
                                                    <b></b><?php echo $row['booking_date'] ?></b>
                                                </td>

                                                <td class="product-name">
                                                    <b></b><?php echo $row['service_name'] ?></b>
                                                </td>


                                                <?php if ($row['booking_status'] == 'booked') { ?>
                                                    <td class="product-name">
                                                        <button type="button" class="btn btn-warning btn-rounded btn-fw">booked</button>

                                                    <td class="product-price">
                                                        <a href="user/controller/booking_controller.php?cancel_booking=<?php echo $row['booking_id'] ?>&company_id=<?php echo $company_id  ?>" class="btn btn-danger btn-rounded btn-fw">cancel</a>
                                                    </td>

                                                    </td>
                                                <?php } elseif ($row['booking_status'] == 'booking accepted') { ?>
                                                    <td><a type="button" class="btn btn-primary btn-rounded btn-fw" href="">Booking Accepted</a></td>
                                                <?php } elseif ($row['booking_status'] == 'Goods picked') { ?>
                                                    <td><a type="button" class="btn btn-primary btn-rounded btn-fw" href="">Goods picked: current location-<?php echo $row['current_location'] ?></a></td>
                                                <?php } elseif ($row['booking_status'] == 'cancelled') { ?>
                                                    <td><a type="button" class="btn btn-danger btn-rounded btn-fw" href="">Cancelled</a></td>
                                                <?php } elseif ($row['booking_status'] == 'reached') { ?>
                                                    <td><a type="button" class="btn btn-success btn-rounded btn-fw" href="">Reached to destination</a></td>
                                                    <td><b>Service charge: <?php echo $row['service_price'] ?> RS</b></td>

                                                    <?php if ($row['payment_status'] == 'pending') { ?>
                                                        <td><a type="button" class="btn btn-primary btn-rounded btn-fw" href="service_payment.php?booking_id=<?php echo $row['booking_id'] ?>&company_id=<?php echo $company_id ?>">Pay</a></td>
                                                    <?php } else { ?>
                                                        <td><a type="button" class="btn btn-success btn-rounded btn-fw">Paid</a></td>
                                                    <?php } ?>


                                                <?php } ?>


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

        <!-- 🟡 booking table ends -->



        <!-- 🔵feedback form starts -->
        <div class="subscribe-area ptb-100">
            <div class="container">
                <div class="newsletter-area">
                    <h2>Give your feedback</h2>
                    <p>We are always at your side. We are 24 hours avail- able for you in emergency situation.</p>
                    <form class="newsletter-form" action="user/controller/feedback_controller.php" method="POST">
                        <input id="message_id" type="text" class="form-control" placeholder="write your feedback" name="message" required autocomplete="off">

                        <!-- sending as hindden -->
                        <input type="hidden" id="user" name="user_id" value="<?php echo $s_variable ?>">
                        <input type="hidden" id="company" name="company_id" value="<?php echo $company_id ?>">


                        <button class="subscribe-btn" onclick="feedback_function()" type="button" name="submit_feedback">
                            send
                        </button>
                        <div id="feedback_alert" style="color: white;"></div>
                    </form>
                </div>
            </div>
            <div class="subscribe-shape">
            </div>
        </div>
        <!-- 🔵feedback form ends -->
    <?php } ?>
    <!--end of session -->

    <script>
        function feedback_function() {

            var message_v = document.getElementById('message_id').value;
            var user_v = document.getElementById('user').value;
            var company_v = document.getElementById('company').value;
            console.log(this.responseText)

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("feedback_alert").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "feedback_ajax.php?message=" + message_v + '&user_id=' + user_v + '&company_id=' + company_v, true);
            xhttp.send();



        }
    </script>


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