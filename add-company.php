<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCS - Add Cpmpany</title>
    <link href="vendor-general/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor-general/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor-general/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor-general/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

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
                                <h2 class="title">Add New Company</h2>
                                <!-- <form method="POST">
                                    <div class="row row-space">
                                        <div class="col-4">
                                            <div class="input-group">
                                                <label class="label">Date</label>
                                                <div class="input-group-icon">
                                                    <input class="input--style-4 js-datepicker" type="text" name="date">
                                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <div class="input-group">
                                                <label class="label">Detail</label>
                                                <input class="input--style-4" type="text" name="last_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row row-space">

                                        <div class="input-group">
                                            <div class="col-4">
                                                <div class="input-group">
                                                    <label class="label">Amount</label>
                                                    <input class="input--style-4" type="number" name="last_name">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <label class="label">Payment Type</label>
                                                <div class="col col-space">
                                                    <label class="radio-container m-r-45">Debit
                                                        <input type="radio" checked="checked" name="payment-type">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <label class="radio-container">Credit
                                                        <input type="radio" name="payment-type">
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
                                                <select name="subject" class="col-12">
                                                    <option disabled="disabled" selected="selected">Choose option</option>
                                                    <option>Company A</option>
                                                    <option>Company B</option>
                                                    <option>Company C</option>
                                                </select>
                                                <div class="select-dropdown"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <button class="btn btn-secondary" type="submit">Cancel</button>
                                        <button class="btn btn-success" type="submit">Save</button>
                                    </div>
                                </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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