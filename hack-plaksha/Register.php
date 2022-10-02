<html>
<?php include("conn.php"); ?>

<?php
    if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset ($_SESSION['login']);
    }
?>

<?php

    // Check whether submit button is clicked
    if (isset($_POST['submit'])) {
        // Process for login

        // 1. Get data from login form
        $fname = $_POST['first_name'];
        $lname = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password']; 
        $rpwd = $_POST['password_repeat'];
        // $password = md5($_POST['password']);

        if ($rpwd!= $password) {
            $_SESSION['check-pwd'] = "<div>Password doesn't match</div>";
        }

        else {
            // 2. Check whether username and password are correct
            $sql = "INSERT into users (First_Name,Last_Name,Email,Password) VALUES ('$fname','$lname','$email','$password')";
            $res = mysqli_query($conn, $sql);
            header("location:".SITEURL."");
        }
    }

?>


</html>
