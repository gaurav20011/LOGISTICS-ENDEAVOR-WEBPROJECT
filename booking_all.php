<?php

include 'config.php';

$admin = new Admin();

if (!isset($_SESSION['petowner_id'])) {
    header("location:petowner/login_front.php");
    //$_SESSION is from admin loginback.php page
    //checks admin login d or not, otherwise it will redirect to login page
}

$s_variable =$_SESSION['petowner_id'];
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
<title>all tokens</title>

<link rel="icon" type="image/png" href="medico_assets/assets/img/favicon.png">
</head>
<body>


<?php include 'medico_header.php' ?>

<!-- 🔴🔴🔴MAIN CONTENT AREA STARTS ----------------------------- -->


    <!-- 🟡 slot table starts -->
    <section class="cart-wraps-area ptb-100">
        <div class="container" id="table_ajax_id">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="cart-wraps">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Token Number</th>
                                        <th scope="col">Doctor name</th>
                                        <th scope="col">Vaccine name</th>
                                        <th scope="col">Booking Date</th>
                                        <th scope="col">Token Status</th>
                                    </tr>
                                </thead>



                                <tbody>

                                    <?php $query = $admin->ret("SELECT * FROM ((`booking`  INNER JOIN `doctor` ON booking.doctor_id=doctor.doctor_id)INNER JOIN `vaccine` ON vaccine.vaccine_id=booking.vaccine_id) where `petowner_id`=$s_variable");
                                    // FROM ((Orders
                                    // INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID)
                                    // INNER JOIN Shippers ON Orders.ShipperID = Shippers.ShipperID);
                                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>

                                            <td class="product-name">
                                                <b></b><?php echo $row['booking_id'] ?></b>
                                            </td>

                                            <td class="product-name">
                                                <b></b><?php echo $row['doctor_name'] ?></b>
                                            </td>

                                            <td class="product-name">
                                                <b></b><?php echo $row['vaccine_name'] ?></b>
                                            </td>

                                            <td class="product-name">
                                                <b></b><?php echo $row['booking_date'] ?></b>
                                            </td>

                                            <?php if ($row['booking_status'] == 'booked') { ?>
                                                <td class="product-name">
                                                    <button type="button" class="btn btn-warning btn-rounded btn-fw">booked</button>
                                                </td>
                                            <?php } elseif($row['booking_status'] == 'vaccination_completed') {?>
                                                <td class="product-name">
                                                    <button type="button" class="btn btn-success btn-rounded btn-fw">vaccination completed</button>
                                                </td>
                                                <?php } ?>
                                                
                             

                                            <!-- <td class="product-price">
                                                <a href="petowner/controller/booking_controller.php?cancel_booking=<?php echo $row['booking_id'] ?>&doctor_id=<?php echo $doctor_id ?>" class="btn btn-danger btn-rounded btn-fw">cancel</a>
                                            </td> -->
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
    <!-- 🟡 slot table ends -->

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