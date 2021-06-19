<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <?php
    require_once 'connection.php';
    ?>

</head>

<body class="bg-gradient-primary">
    <script>
        var users = ["Muhammad Imran", "Ali Ahmad", "Akbar Ali"];
        var userEmails = ["imran@css.com", "aliahmad@css.com", "akbarali@css.com"];
        var userPasswords = ["123456", "123456", "12121212"];
    </script>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="userEmail" class="form-control form-control-user" id="userEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="userPassword" class="form-control form-control-user" id="userPassword" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <input type="submit" value="Login" class="btn btn-primary btn-user btn-block" name="submit" />

                                    </form>
                                    <?php
                                    if (isset($_POST['submit'])) {
                                        $userEmail = $_POST['userEmail'];
                                        $userPassword = $_POST['userPassword'];
                                        $sql = "SELECT user_name, user_email, user_password FROM users WHERE user_email='$userEmail'";
                                        $result = $conn->query($sql);

                                        if (!is_null($result) && $result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $db_password = $row['user_password'];
                                                if ($db_password) {
                                                    $_SESSION['username'] = $row['user_name'];
                                                    header("Location: dashboard.php");
                                                } else {
                                                    echo ('<p style="color:red; margin-top:2px; text-align:center">User Not Found</p>');
                                                }
                                            }
                                        } else {
                                            echo ('<p style="color:red; margin-top:2px; text-align:center">User Not Found</p>');
                                        }
                                        $conn->close();
                                    }
                                    ?>
                                    <!-- <script>
                                        function logIn() {
                                            var userEmail = document.getElementById('userEmail').value;
                                            var userPassword = document.getElementById('userPassword').value;
                                            for (var a = 0; a < users.length; a++) {
                                                if (userEmail == userEmails[a] && userPassword == userPasswords[a]) {
                                                    window.location.href = "dashboard.php";
                                                    break;
                                                } else {
                                                    alert("Details are incorrect");
                                                    break;
                                                }
                                            }
                                        }
                                    </script> -->
                                    <?php
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>