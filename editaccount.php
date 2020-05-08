
<?php
include("./php/config.php");
session_start();
if (!isset($_SESSION['member_email'])){
header('location:index.php');
} else{
    $myname = $_SESSION['member_email'];
}
$result = mysqli_query($con, "SELECT * FROM accountdetails where email_address='$myname'");

?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <link rel="shortcut icon" href="img/logo.ico">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="./css/editaccount.css">
</head>
<body>
<header>
        <h2>Devpras.com</h2>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="settings.php">Profile</a></li>
            <li><a href="editaccount.php" class="active">Edit Account</a></li>
            <li><a href="./php/logout.php" onClick="return confirm('Are you sure you want to Logout?')"><?php  if (!isset($_SESSION['member_id'])){
                echo "Login";
            }else{
                echo "Log out";
            } ?></a></li>
        </ul>
</header>
<div class="main">
<?php
    if(isset($_POST['update'])){
        $username=$_POST['username'];
        $email_address = $_POST['email_address'];
        $phone_number=$_POST['phone_number'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $pin_code=$_POST['pin_code'];
        $password=$_POST['password'];
    
        $sql = "UPDATE accountdetails SET username='$username', email_address='$email_address', phone_number=$phone_number, address='$address',city='$city',pin_code=$pin_code, s_password='$password' WHERE email_address='$myname';";
        if ($con->query($sql) === TRUE){
            echo "<div class='succ'>Account Details Update Successfully, you need to be Log in again</div>";
            session_destroy();
        }
        else {
            echo "<div class='err'>error : Please fillup all field correctly</div>";
            echo "error :" .$sql."<br>".$con->error;
            session_destroy();
        }
    }

?>
<form action="#" method="POST">
    <?php 
	if($res = mysqli_fetch_array($result)) { 		
        $res['username'];
        $res['email_address'];
        $res['phone_number'];
        $res['address'];
        $res['city'];
        $res['pin_code'];
        $res['s_password'];
    } 
    else {
        echo "no result found";
    }
    ?>
    <h4>Edit Account Details</h4>
    <table>
        <tr> 
            <td>Your Name</td>
            <td><input type="text" name="username" value="<?php echo $res['username']; ?>" required></td>
        </tr>
        <tr> 
            <td>Your Email Address</td>
            <td><input type="email" name="email_address" value="<?php echo $res['email_address'];?>" required></td>
        </tr>
        <tr> 
            <td>Phone Number</td>
            <td><input type="text" name="phone_number" value="<?php  if ($res['phone_number'] !== ''){
                echo $res['phone_number'];
            }else{
                echo "";
            } ?>" placeholder="not given"></td>
        </tr>
        <tr> 
            <td>Address</td>
            <td><input type="text" name="address" value="<?php  if ($res['address'] !== ''){
                echo $res['address'];
            }else{
                echo "";
            } ?>" placeholder="not given"></td>
        </tr>
        <tr> 
            <td>City or Hometown</td>
            <td><input type="text" name="city" value="<?php  if ($res['city'] !== ''){
                echo $res['city'];
            }else{
                echo "";
            } ?>" placeholder="not given"></td>
        </tr>
        <tr> 
            <td>PIN Code</td>
            <td><input type="text" name="pin_code" value="<?php  if ($res['pin_code'] !== ''){
                echo $res['pin_code'];
            }else{
                echo "";
            } ?>" placeholder="not given"></td>
        </tr>
        <tr> 
            <td>Password</td>
            <td><input type="text" name="password" required value="<?php echo $res['s_password']; ?>"></td>
        </tr>
        <tr>
            <td><a href="settings.php"><input type="button" id="mainbtn1" value="cancel"></a></td>
            <td><input type="submit" id="mainbtn2" value="update" name="update"></td>
        </tr>
    </table>
    <button id="deleteaccount" name="delete" onClick="return confirm('Are you sure you want to delete your Account ?')">Delete my Account</button>
</form>
<?php
if(isset($_POST['delete'])){
    $delete = mysqli_query($con, "DELETE FROM accountdetails WHERE email_address='$myname'");
if($delete == true){
    echo "<div class='err'>Account Deleted Successfully</div>";
    session_destroy();
    header("refresh:3;");
}else {
    echo "<div class='err'>Something wrong</div>";
    session_destroy();
}
}
?>

</div>
<!-- <div class="foot">
</div> -->
</body>
</html>