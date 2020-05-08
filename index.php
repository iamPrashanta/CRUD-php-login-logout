<?php
include("./php/config.php");
session_start();
if (isset($_SESSION['member_id'])){
header('location:homepage.php');
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>devpras.com login_page</title>
    <link rel="shortcut icon" href="img/logo.ico">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="./css/indexstyle.css">
</head>
<body>
    <div class="main">
        <div class="two">
            <div class="top">
                <h2>Login here</h2>
            </div>
            <div class="middle">
                <p id="result">*if you don't remember, click forget password</p>
            </div>
            <div class="bottom">
                <form action="#" method="POST" class="loginform">
                <input type="text" name="email_address" class="inputfieldone" placeholder="Email ID" autofocus require>
                <br>
                <input type="password" name="password" class="inputfieldtwo" placeholder="Password" require>
                <br>
                <input type="checkbox" id="setlocal">remember me
                <input name="login" class="btn" id="btn" type="submit" value="LOGIN">
                <div class="last">
                    <p>Not a member? <a href="signup.php">Sign up now</a></p>
                    <p><a href="forget_password.php">Forgot password?</a></p>
                </div>
                </form>
                
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['login'])){
        $email_address = $_POST['email_address'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM accountdetails WHERE email_address ='$email_address' AND s_password ='$password'";
        $result = mysqli_query($con,$sql);
        // $num = mysqli_num_rows($result);

        $row=mysqli_fetch_array($result);
        if (mysqli_num_rows($result) > 0){
            session_start();
            $_SESSION['member_id']=$row['username'];
            $_SESSION['member_email']=$row['email_address'];
            header('location:homepage.php'); 
        }else{
            header('location:/?message=wrong-email-or-password');
        }
    }

    ?>

<script src="js/react.js"></script>
</body>
</html>