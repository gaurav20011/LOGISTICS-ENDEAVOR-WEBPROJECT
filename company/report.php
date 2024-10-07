<!-- PHP code starts------------------------------------------------------------------------------------------------>
<?php

include '../config.php';

$admin = new Admin();

if (!isset($_SESSION['company_id'])) {
    header("location:loginfront.php");
    //$_SESSION is from admin loginback.php page
    //checks admin login d or not, otherwise it will redirect to login page
}

$s_variable = $_SESSION['company_id']; //shows may be particular user data

?>

<!-- PHP code ends------------------------------------------------------------------------------------------------>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin report</title>
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

    <!-- body starts ------------------------------------------------------------------------------------->
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

                    <!---------------MAIN CONTENT STARTS------------------->
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Service Booking reports</h4>

                                <form class="forms-sample" method="POST" action="report.php">

                                    <div class="form-group">
                                        <label for="exampleInputName1">select starting date</label>
                                        <input type="date" name="start_date" class="form-control" id="exampleInputName1" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">select ending date</label>
                                        <input type="date" name="end_date" class="form-control" id="exampleInputName1" required>
                                    </div>


                                    <button type="submit" name="view_report" class="btn btn-primary mr-2">view report</button>
                                    <a href="report.php" class="btn btn-light">Clear</a>
                                </form>
                            </div>
                        </div>
                    </div>



                    <?php
                    //showing order table
                    if (isset($_POST['view_report'])) {

                        $start_date = $_POST['start_date'];

                        $end_date = $_POST['end_date'];
                    ?>

                        <!--table starts-->
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Order Details</h4>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <!-- <th>customer id</th> -->
                                                    <th>Company Name</th>
                                                    <th>Service Name</th>
                                                    <th>Booked by</th>
                                                    <th>Booking Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!--table data starts -->
                                                <?php $query = $admin->ret("SELECT * FROM (((`booking`
INNER JOIN `company` ON booking.company_idb = company.company_id)
INNER JOIN `service` ON booking.service_idb = service.service_id)
INNER JOIN `user` ON booking.user_idb = user.user_id) where `company_id`='$s_variable' AND `booking_date` between '$start_date' and '$end_date' ");
                                                while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <tr>
                                                        <td><?php echo $row['company_name'] ?></td>
                                                        <td><?php echo $row['service_name'] ?></td>
                                                        <td><?php echo $row['user_name'] ?></td>
                                                        <td><?php echo $row['booking_date'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php } ?>
                    <!-- if condition ends-->

                    <!-----------------MAIN CONTENT ENDS------------------->

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

    <!-- javascript ------------------------------------------------------------------->
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