<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Pricing-Yearly--Monthly-badges.css">
    <link rel="stylesheet" href="assets/css/Pricing-Yearly--Monthly-icons.css">
    <link rel="stylesheet" href="assets/css/untitled-1.css">
    <link rel="stylesheet" href="assets/css/untitled-2.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>
<?php include("conn.php"); ?>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-flex"><img src="assets/img/avatars/avatar5.jpeg" width="442" height="583"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <?php
                                        if (isset($_SESSION['login'])) {
                                            echo $_SESSION['login'];
                                            unset ($_SESSION['login']);
                                        }
                                    ?>
                                    <form action = "login.php" method = "POST" class="user" style="text-align: left;background: linear-gradient(black, white), var(--bs-btn-hover-color);">
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address" name="email" style="padding-right: 0px;margin-left: 0px;margin-right: 0px;" required = "required"></div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password" required = "required"></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1">
                                                    <label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary d-block btn-user w-100" type="submit" name="submit"><a href = "index.html">Login</a></button>
                                        <hr><a class="btn btn-primary d-block btn-google btn-user w-100 mb-2" role="button"><i class="fab fa-google"></i>&nbsp; Login with Google</a><a class="btn btn-primary d-block btn-facebook btn-user w-100" role="button"><i class="fab fa-facebook-f"></i>&nbsp; Login with Facebook</a>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                    <div class="text-center"><a class="small" href="register.html">Create an Account!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>

<?php

    // Check whether submit button is clicked
    if (isset($_POST['submit'])) {
        // Process for login

        // 1. Get data from login form
        $email = $_POST['email'];
        $password = $_POST['password']; 
        // $password = md5($_POST['password']);

        // 2. Check whether username and password are correct
        $sql = "SELECT * FROM users WHERE Email = '$email' AND Password = '$password'";
        $res = mysqli_query($conn, $sql);

        // 4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            $_SESSION['login'] = "<div class='success'>Logged in Successfully</div>"; //To display log in message
            $_SESSION['admin-user'] = $email; //To ensure admin is logged in at all times when using the website
            header("location:".SITEURL."/");
        } else {
            $_SESSION['login'] = "<div class='error'>Login Failed</div>";
            header("location:".SITEURL."login.php");            
        }
    }

?>