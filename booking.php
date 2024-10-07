<?php

include 'config.php';

$admin = new Admin();

if (!isset($_SESSION['user_id'])) {
    header("location:user/login_front.php");
    //$_SESSION is from admin loginback.php page
    //checks admin login d or not, otherwise it will redirect to login page
}

$s_variable = $_SESSION['user_id'];
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
    <title>Token booking page</title>

    <link rel="icon" type="image/png" href="medico_assets/assets/img/favicon.png">
</head>

<body>


    <?php include 'medico_header.php' ?>

    <!-- 🔴🔴🔴MAIN CONTENT AREA STARTS ----------------------------- -->
    <?php
    $company_id = $_GET['company_id'];  //this is from company photo href
    $query = $admin->ret("SELECT * FROM `company` where `company_id`=$company_id");
    $row = $query->fetch(PDO::FETCH_ASSOC);

    // $service_id = $_GET['service_id'];
    // $query = $admin->ret("SELECT * FROM `service` where `service_id`=$service_id");
    // $v_row = $query->fetch(PDO::FETCH_ASSOC);


    $service_id = $_GET['service_id'];
    $query = $admin->ret("SELECT * FROM `service`  where `service_id`=$service_id");
    $v_row = $query->fetch(PDO::FETCH_ASSOC);



    $query = $admin->ret("SELECT * FROM `user` where `user_id`=$s_variable");
    $po_row = $query->fetch(PDO::FETCH_ASSOC);
    ?>


    <div class="appointment-area appointment-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="appointment-from-area">
                        <div class="appointment-from ">
                            <h2>Get Your Appointment</h2>


                            <form action="user\controller\booking_controller.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>company Name</label>
                                            <select class="form-control" name="company_id">
                                                <option value="<?php echo $row['company_id'] ?>"><?php echo $row['company_name'] ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>service Name</label>
                                            <select class="form-control" name="service_id">
                                                <option value="<?php echo $v_row['service_id'] ?>"><?php echo $v_row['service_name'] ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" value="<?php echo $row['company_id'] ?>">
                                    <input type="hidden" value="" id='token_number' name="token_number">
                                    <!-- 🟡kept value as null: I think this is not used -->


                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Your name</label>
                                            <input type="text" readonly name="user_name" value="<?php echo $po_row['user_name'] ?>" id="user_name" class="form-control" data-error="Please enter your name" placeholder="Name">
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_id" value="<?php echo $po_row['user_id'] ?>">


                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" readonly name="email" id="email" value="<?php echo $po_row['email'] ?>" class="form-control" data-error="Please enter your email" placeholder="Email">
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Date </label>
                                            <div>
                                                <input type="date" id="booking_date" name="booking_date" value="<?php echo date('Y-m-d'); ?>" class="form-control" placeholder="Select date">
                                                <span class="input-group-addon"></span>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Pickup Location</label>
                                            <input type="text" name="p_location" id="email"  class="form-control" data-error="Please enter pickup location" placeholder="Location" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <div class="form-group">
                                            <label>City-State-Country-Pincode</label>
                                            <input type="text" name="map_location" id="email"  class="form-control" data-error="Google map link" placeholder="City, State, counrty, pincode" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" name="token_booking_button" class="default-btn">
                                            Book An Appointment
                                        </button>
                                    </div>

                                    <?php if (isset($_SESSION['user_id'])) {
                                        echo "session is active";
                                    } else {
                                        echo "please login";
                                    } ?>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="appointment-img-2">
            <!-- <img src="medico_assets/assets/img/appointment/appointment-img2.png" alt="Images"> -->
        </div>
        <div class="appointment-shape">
            <!-- <img src="medico_assets/assets/img/appointment/appointment-shape.png" alt="Images"> -->
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