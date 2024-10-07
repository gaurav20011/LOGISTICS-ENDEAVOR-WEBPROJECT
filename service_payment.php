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
    <title>Doctor view</title>

    <link rel="icon" type="image/png" href="medico_assets/assets/img/favicon.png">
</head>

<body>


    <?php include 'medico_header.php' ?>

    <!-- 🔴🔴🔴MAIN CONTENT AREA STARTS ----------------------------- -->
<!-- 🟨 service id -->
<?php $booking_id=$_GET['booking_id'] ?> 
<?php $company_id=$_GET['company_id'] ?>


    <div class="checkout-area ptb-100">
        <div class="container">

            <form autocomplete="off" action="user/controller/service_payment_controller.php" method="POST">
                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="order-details">
                            <h3>Choose payment method</h3>

                            <div class="payment-box">
                                <div >
                                    <p>
                                        <input type="radio" id="direct-bank-transfer" value="upi" name="payment_method" onchange="cardform(this.value)" required>
                                        <label for="direct-bank-transfer"><b>UPI/Net Banking</b></label> <br>
                                        Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                    </p>
                                    <div style="display: none;" id="upi_div"><img src="shreejithqr.jpg" width="500px" height="600px">

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Transaction id <span class="required">*</span></label>
                                                <input style="border-color: #cccdcf;" name="transaction_id" placeholder="Enter transaction id" type="text" class="form-control" autocomplete="off" pattern="[0-9]{18}" title="Enter 18 digits transaction id numbers">
                                            </div>
                                            <br>
                                        </div>
                                    </div>

                                    <p>
                                        <input type="radio" id="paypal" value="card" name="payment_method" onchange="cardform(this.value)" required >
                                        <label for="paypal"><b>Debit card / Credit card</b></label> <br>
                                        <!-- <img src="pet_products_assets/assets/img/paypal.png" alt="paypal"> -->
                                        Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.
                                    </p>
                                    <div style="display: none;" id="card_div">
                                        <!-- 🔴 card paymen  body starts -->
                                        <div class="container d-flex justify-content-center main">
                                            <div class="card" style="background-color: black; color:white;">

                                                <div class="px-3 pt-3">
                                                    <label for="card number" class="d-flex justify-content-between"><span class="labeltxt">CARD NUMBER</span><img src="https://img.icons8.com/color/48/000000/mastercard-logo.png" width="25" class="image" /></label>
                                                    <input type="text" class="form-control inputtxt" id="card_no" name="card_number" placeholder="0000 0000 0000 0000" pattern="[0-9]{16}" title="Enter 16 digits only">
                                                </div>


                                                <div class="d-flex justify-content-between px-3 pt-4">
                                                    <div><label for="date" class="exptxt"> Expiry </label><input type="text" name="expiry" class="form-control expiry" placeholder="MM / YY" id="card_expiry" name="card_expiry" minlength="5" maxlength="5"></div>
                                                    <div><label for="cvv" class="cvvtxt">CVV / CVC</label><input type="text" name="number" class="form-control cvv" id="exp" pattern="[0-9]{3}" title="Enter 3 digits only"></div>
                                                </div>
                                                <div class="d-flex justify-content-between px-3 pt-4 pb-4">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- 🔴 card paymen  body ends -->
                                    </div>


                                    <p>
                                        <input type="radio" id="cash-on-delivery" value="cash" name="payment_method" onchange="cardform(this.value)" required>
                                        <label for="cash-on-delivery"><b>Cash Pay</b></label>

                                    </p>
                                    <div style="display: none;" id="cash_div">Go to the company office and pay</div>

                                </div>

                                <input type="hidden" name="booking_id" value="<?php echo $booking_id ?>">
                                <input type="hidden" name="company_id" value="<?php echo $company_id ?>">

                                <button type="submit" name="pay_to_service" class="default-btn"><span>Pay</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- 🟡 div flow down javascript starts-->
    <script>
        function cardform(myvalue) {


            if (myvalue == 'upi') { //upi radio button value
                document.getElementById('upi_div').style.display = 'block'; //div id
                document.getElementById('card_div').style.display = 'none';
                document.getElementById('cash_div').style.display = 'none';
            } else if (myvalue == 'card') { //card radio button id
                document.getElementById('card_div').style.display = 'block';
                document.getElementById('upi_div').style.display = 'none';
                document.getElementById('cash_div').style.display = 'none';
            } else if (myvalue == 'cash') {
                document.getElementById('card_div').style.display = 'none';
                document.getElementById('upi_div').style.display = 'none';
                document.getElementById('cash_div').style.display = 'block';
            }

        }
    </script>
    <!-- 🟡 div flow down javascript ends-->


    <!-- 🟡payment card javascript starts -->
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript' src=''></script>
    <script type='text/Javascript'></script>
    <!-- 🟡payment card javascript ends -->

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

            var name = document.getElementById('petowner_name').value;
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