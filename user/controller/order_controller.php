<?php

include '../../config.php';

$admin = new Admin();

if (!isset($_SESSION['petowner_id'])) {
    header("../login_front.php");
}

$s_variable = $_SESSION['petowner_id'];

//---add customer details to payment table

if (isset($_POST['checkout_the_product'])) {

    //from cart to order table
    $query_cart = $admin->ret("SELECT * FROM `cart` where `petowner_id`=$s_variable ");
    while ($row = $query_cart->fetch(PDO::FETCH_ASSOC)) {

        $cart_id = $row['cart_id'];

        $product_id = $row['product_id'];

        $petowner_id = $row['petowner_id'];

        $quantity = $row['quantity'];

        $cart_total = $row['cart_total'];

        $query_orders = $admin->cud("INSERT INTO `orders`(`cart_id`,`product_id`,`petowner_id`,`quantity`,`cart_total`) VALUES('$cart_id','$product_id','$petowner_id','$quantity','$cart_total')", "saved"); 
    }

    
        //🔵 form insertion elements
    $first_name = $_POST['first_name'];

    $country = $_POST['country'];

    $street = $_POST['street'];

    $city = $_POST['city'];

    // $phone = $_POST['phone'];

    $pincode = $_POST['pincode'];

    $phone = $_POST['phone'];

    $email = $_POST['email'];

    $order_status = 'pending';

        //🟨 inserting into payment table
        $card_number = $_POST['card_number'];

        $expiry = $_POST['expiry'];
    
        $transaction_id = $_POST['transaction_id'];
    
        $payment_method = $_POST['payment_method'];

// 🔰while loop
    $query_details = $admin->ret("SELECT * FROM `orders` WHERE `petowner_id`=$s_variable");
    while ($row = $query_details->fetch(PDO::FETCH_ASSOC)) {

        $order_id = $row['order_id'];

        $product_id = $row['product_id'];

        $query = $admin->cud("UPDATE `orders` SET `first_name`='$first_name', `country`='$country',  `street`='$street',  `city`='$city',`pincode`='$pincode', `datetime`=now(), `phone`='$phone',`email`='$email', `order_status`='$order_status' WHERE orders.petowner_id='$s_variable' ", "updated successfully");
        
         // inserting to payment table
         $query_payment = $admin->cud("INSERT INTO `payment`(`order_id`,`product_id`) VALUES('$order_id','$product_id')", "saved");
        
        
    }
    // deleting from cart
    $query = $admin->cud("DELETE FROM `cart` where `petowner_id`=$s_variable", "Deleted successfully");


    //🔰while loop
    // ⭕ inserting order id to payment table
    $query_details = $admin->ret("SELECT * FROM `orders` WHERE `petowner_id`=$s_variable");
    while ($row = $query_details->fetch(PDO::FETCH_ASSOC)) {

        $order_id = $row['order_id'];

        $query_pay = $admin->cud("UPDATE `payment` SET `petowner_id`='$s_variable',`card_number`='$card_number',`expiry`='$expiry',`transaction_id`='$transaction_id',`payment_method`='$payment_method' where `order_id`='$order_id' ", "saved");
    }
     echo "<script>alert('order placed');window.location.href='../../pet_products_order_status.php';</script>";
}
?>

<!-- cancel order - order_status -->
<?php
if (isset($_GET['cancel_order_id'])) {

    $order_id = $_GET['cancel_order_id'];


    $query = $admin->cud("DELETE FROM `orders` where `order_id`='$order_id' ", "Deleted successfully");

    $query = $admin->cud("DELETE FROM `payment` where `order_id`='$order_id' ", "Deleted successfully");

    echo "<script>alert('cancelled this order');window.location.href='../../pet_products_order_status.php';</script>";
}
?>