<?php
session_start();
try {
    require_once 'dbconfig.php';
    if(isset($_POST['login-btn'])){
        
        if(empty($_POST['user-studentnum']) || empty($_POST['user-password'])){

            $message ="All fields are required";
            exit();

        }else{
            $sql = "SELECT * FROM tblusers WHERE studentnumber =:sn AND pass=:ps";
            $userrow =$dbh->prepare($sql);
            $userrow->execute(
                array(
                    'sn' => $_POST['user-studentnum'],
                    'ps' => $_POST['user-password']
                )
            );
            $count = $userrow->rowCount();
            if($count > 0){
                foreach($userrow as $result);
                $_SESSION['userid'] = $result['id'];
                $_SESSION['user-fullname'] = $result['fullname'];
                $_SESSION['welcome'] = "Welcome back,";
                $_SESSION['user-type'] = $result['type'];
                header('location: dashboard-crm.php');
                exit();
            }else{
                $message ="Wrong username or password";
                exit();
            }
        }

    }
} catch (\Throwable $error) {
   $message->$error->getMessage();
   exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Adtest Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        
        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    </head>

    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <div class="account-pages pt-2 pt-sm-4 pb-4 pb-sm-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="index.html">
                                    <span><img src="assets/images/logo.png" alt="" height="18"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                    <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                                </div>

                                <form method="POST">

                                    <div class="mb-3">
                                        <label for="studentnum" class="form-label">Student Number</label>
                                        <input class="form-control" name="user-studentnum" type="text" id="studentnum" required="" placeholder="Enter your student number">
                                    </div>

                                    <div class="mb-3">
                                        <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your password?</small></a>
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" name="user-password" id="password" class="form-control" placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary" type="submit" name="login-btn"> Log In </button>
                                    </div>
                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                        <!-- end row -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            ?? ACES Batch 2018-2022
        </footer>

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>
