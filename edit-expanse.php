<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}

include "connection.php"; // Using database connection file here

$id = $_GET['id'];
$query = "select * from general_expanse where id ='$id'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
if ($result['payment_type'] == 0) {
    $payment_type = "Debit";
} else {
    $payment_type = "Credit";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCS - Add Expanse</title>
    <link href="vendor-general/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor-general/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor-general/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor-general/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <?php
    require_once 'connection.php';
    ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <?php
        require 'sidebar.php';
        ?>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php
                require 'navbar.php';
                ?>
                <div class="page-wrapper bg-gradient-success p-t-100 p-b-100 font-poppins">
                    <div class="wrapper wrapper--w680">

                        <div class="card card-3">
                            <div class="card-body">
                                <h2 class="title">Edit General Expanse</h2>
                                <form method="POST">
                                    <div class="row row-space">
                                        <div class="col-4">
                                            <div class="input-group">
                                                <label class="label">Date</label>
                                                <div class="input-group-icon">
                                                    <input class="input--style-4 pt-0 pb-0 pl-2 pr-2" type="date" name="date" name="date" value="<?php echo $result['date'] ?>">
                                                    <!-- <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i> -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <div class="input-group">
                                                <label class="label">Detail</label>
                                                <input class="input--style-4" type="text" name="detail" value="<?php echo $result['detail'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-space">

                                        <div class="input-group">
                                            <div class="col-4">
                                                <div class="input-group">
                                                    <label class="label">Amount</label>
                                                    <input class="input--style-4" type="number" name="amount" value="<?php echo $result['amount'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label class="label">Payment Type</label>
                                                <div class="col col-space">
                                                    <label class="radio-container m-r-45">Debit
                                                        <input type="radio" <?php if ($result['payment_type'] === '0') echo 'checked="checked"'; ?> value="0" name="payment-type">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="radio-container">Credit
                                                        <input type="radio" <?php if ($result['payment_type'] === '1') echo 'checked="checked"'; ?> value="1" name="payment-type">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-space">
                                        <div class="input-group">
                                            <div class="col-4">
                                                <label class="label">Company(opt.)</label>
                                            </div>

                                            <div class="col-8 srs-select2 js-select-simple select--no-search">
                                                <select class="col-12" name="company">
                                                    <option <?php if ($result['company_name'] === 'None') echo 'selected="selected"'; ?>>None</option>
                                                    <option <?php if ($result['company_name'] === 'Company A') echo 'selected="selected"'; ?>>Company A</option>
                                                    <option <?php if ($result['company_name'] === 'Company B') echo 'selected="selected"'; ?>>Company B</option>
                                                    <option <?php if ($result['company_name'] === 'Company C') echo 'selected="selected"'; ?>>Company C</option>
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <button class="btn btn-secondary" type="cancel" name="cancel"> Cancel </button>
                                        <button class="btn btn-success" type="submit" value="Edit" name="submit"> Update</button>
                                    </div>
                                </form>
                                <?php
                                if (isset($_POST['submit'])) {
                                    $date = $_POST['date'];
                                    $newDate = date("Y-m-d", strtotime($date));
                                    $detail = $_POST['detail'];
                                    $amount = $_POST['amount'];
                                    $payment_type = $_POST['payment-type'];
                                    $company = $_POST['company'];
                                    $sql = "UPDATE general_expanse SET date='$newDate', detail='$detail', amount='$amount', payment_type='$payment_type', company_name='$company' WHERE id='$id' ";
                                    $result = $conn->query($sql);

                                    if ($result) {
                                ?>
                                        <script>
                                            window.location.href = "all-expanse.php";
                                        </script>

                                    <?php
                                    }
                                }
                                if (isset($_POST['cancel'])) {
                                    ?>
                                    <script>
                                        window.location.href = "all-expanse.php";
                                    </script>
                                <?php
                                }

                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Champion Crop Sciences 2021</span>
            </div>
        </div>
    </footer>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>