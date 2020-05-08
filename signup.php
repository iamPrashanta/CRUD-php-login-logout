<?php
include("./php/config.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>devpras.com signup_page</title>
    <link rel="shortcut icon" href="img/logo.ico">
    <script src="jquery.js"></script>
    <link rel="stylesheet" href="./css/signup.css"/>

</head>
<body>
    <div class="main">
        <div class="two">
            <div class="top">
                <h2>sign up</h2>
            </div>
            <div class="bottom">
                <form action="#" method="POST" class="signupform">
                    <table>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" class="userfield" name="username" autofocus autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td><input type="email" class="emailfield" name="email_address" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="text" class="passfield" name="password"  autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td><input type="text" class="passfield" name="repassword" autocomplete="off"></td>
                        </tr>
                    </table>
                    <input type="button" id="drop" value="Clear">
                    <input type="submit" id="sub" name="sub" value="Confirm">
                </form>
            </div>
            <div class="tirmcond">
                <p>By clicking the Sign Up button, you agree to our <br> <a href="./php/terms.php">Terms & Condition,</a> and <a href="./php/privacy.php">Privacy Policy</a></p>
            </div>
            <div class="down">
                <p>Already have an account? <a href="index.php">Login here</a></p>
                <p id="signresult">
                 
                </p>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['sub'])){
       $username=$_POST['username'];
       $email_address = $_POST['email_address'];
       $password=$_POST['password'];
       $repassword = $_POST['repassword'];
      $sql = "INSERT INTO accountdetails (username,email_address,s_password) VALUE('$username','$email_address','$password');";
   
      
      if ($username == '' || $email_address == '' || $password == '' || $password !== $repassword){
          echo "Input field can't be black & both password need to be match while creating a new account";
          echo "<br/><a href='signup.php'>try again</a>";
          header("Refresh:5; url=signup.php");
          exit();
      } else if ($con->query($sql) === TRUE){
           echo "Account Created Successfully";
           echo "<br/><a href='index.php'>login now</a>";
           header("Refresh:3; url=index.php");
           exit();
      } else {
          echo "error :" .$sql."<br>".$con->error;
          echo "<br/><a href='signup.php'>try again</a>";
          header("Refresh:3; url=signup.php");
      }
   }
   ?>

<script src="react.js"></script>
</body>
</html>