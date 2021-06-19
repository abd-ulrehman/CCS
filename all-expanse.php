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
    <title>CCS - My Companies</title>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <?php
    require_once 'connection.php';
    ?>
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        var userId;

        function getId(u_id) {
            userId = u_id;
        }

        function edit(u_id) {
            window.location.href = "edit-expanse.php?id=" + u_id + "";
        }
        $(document).ready(function() {
            $('.click').click(function() {
                $('.popup_box').css("display", "block");
            });
            $('.btn1').click(function() {
                $('.popup_box').css("display", "none");
                window.location.href = "all-expanse.php";
            });
            $('.btn2').click(function() {
                $('.popup_box').css("display", "none");
                window.location.href = "delete.php?id=" + userId + "";
            });
        });
    </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        require 'sidebar.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                require 'navbar.php';
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 mt-3">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">All Expanses</h6>
                            <a href="add-general-expanse.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus mr-1"></i>Add Expanse</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Details</th>
                                            <th>Payment Type</th>
                                            <th>Amount</th>
                                            <th>Company</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "select * from general_expanse";
                                        $data = mysqli_query($conn, $query);
                                        $total = mysqli_num_rows($data);
                                        if ($total != 0) {
                                            while ($result = mysqli_fetch_assoc($data)) {
                                                $id = $result['id'];
                                                if ($result['payment_type'] == 0) {
                                                    $payment_type = "Debit";
                                                } else {
                                                    $payment_type = "Credit";
                                                }
                                        ?>
                                                <tr>
                                                    <td> <?php echo $result['date'] ?> </td>
                                                    <td> <?php echo $result['detail'] ?></td>
                                                    <td> <?php echo $payment_type ?></td>
                                                    <td> <?php echo $result['amount'] ?></td>
                                                    <td> <?php echo $result['company_name'] ?></td>
                                                    <td>
                                                        <button class="btn p-0 text-primary" onclick="edit(<?php echo $result['id'] ?>)">Edit</button>

                                                        <button style="color:red" onclick="getId(<?php echo $result['id'] ?>)" class="btn p-0 float-right click">Delete</button>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Champion Crop Sciences 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <div class="popup_box">
        <i class="fas fa-exclamation"></i>
        <h1>Your are goin to delete the expanse!</h1>
        <label>Are you sure to proceed?</label>
        <div class="btns">
            <a href="#" class="btn1">Cancel</a>
            <a href="#" class="btn2">Delete</a>
        </div>
    </div>

    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>