<?php

include '../config.php';

$admin = new Admin();

if (!isset($_SESSION['admin_id'])) {
  header("location:login_front.php");
  //$_SESSION is from admin loginback.php page
  //checks admin login d or not, otherwise it will redirect to login page
}

$s_variable = $_SESSION['admin_id']; //assigning session to variable

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>view bookings</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- 1. container scroller starts -->

    <?php include 'header.php' ?>
    <!--  # navbar / header -->

    <div class="container-fluid page-body-wrapper">
      <!--2. body wrapper starts-->
      <?php include 'sidebar.php' ?>
      <!--  #  sidebar   # -->

      <div class="main-panel">
        <!--3. main panel starts-->
        <div class="content-wrapper">
          <!-- 4. content wrapper starts-->

          <!-------------🟦MAIN CONTENT STARTS------------>


          <!-- 🟡displaying booking details starts-->
          <div class="col-lg-12 grid-margin stretch-card" id="token_table_ajax">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Service booking details</h4>
                <!-- <a href="controller/booking_controller.php?cancel_remaining_tokens" class="btn btn-danger mr-2">Cancel remaining tokens</a> -->

                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>User Name</th>
                        <th>email</th>
                        <th>date</th>
                        <th>Booking Status</th>
                      </tr>
                    </thead>
                    <tbody>

                      <!--table data starts -->
                      <?php $query = $admin->ret("SELECT * FROM ((`booking` INNER JOIN `user` ON booking.user_idb = user.user_id)INNER JOIN `service` ON booking.service_idb = service.service_id )  ORDER BY `booking_date`;");
                      while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                          <td><?php echo $row['user_name'] ?></td>
                          <td><?php echo $row['email'] ?></td>
                          <td><?php echo $row['booking_date'] ?></td>
                          <td><?php echo $row['booking_status'] ?></td>

                        </tr>
                      <?php } ?>
                      <!--while loop ends-->
                      <!--table data ends-->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- 🟡displaying booking details ends-->


          <!-----------🟦MAIN CONTENT ENDS------------------>

        </div>
        <!--content wrapper ends-->
        <?php include 'footer.php' ?>
        <!-- #   footer # -->

      </div>
      <!--main panel ends-->
    </div>
    <!--body wrapper ends-->
  </div>
  <!--container scroller ends-->

  <!-- javascript ------------------------------------------------------------->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="assets/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>