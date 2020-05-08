
<?php
include_once("./php/config.php");
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
    <link rel="stylesheet" href="./css/settings.css">
</head>
<body>
<header>
        <h2>Devpras.com</h2>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="settings.php" class="active">Profile</a></li>
            <li><a href="editaccount.php">Edit Account</a></li>
            <li><a href="./php/logout.php" onClick="return confirm('Are you sure you want to Logout?')"><?php  if (!isset($_SESSION['member_id'])){
                echo "Login";
            }else{
                echo "Log out";
            } ?></a></li>
        </ul>
</header>
<div class="main">
    <h5>Overview</h5>
    <h2>User Profile</h2>
<div class="inside">
    <form class="profile" action="#" method="POST">
        <img src="img/demoimage.jpg" alt="">
        <h2><?php  echo $_SESSION['member_id'];?></h2>
        <div class="desc">
            <h3>Description</h3>
            <textarea rows="8" cols="40" name="desctext" disabled>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia itaque a temporibus delectus ex fugiat inventore, incidunt necessitatibus reiciendis debitis, unde neque aperiam voluptas dolorum sint eaque quo at deleniti</textarea>
            <input type="button" value="Edit Profile" name="edit" id="edit">
    
        </div>
    </form>
    <!-- ---------------------- -->
    <form name="profile_details" id="profile_set">
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
    <h4>Account Details</h4>
    <table>
        <tr> 
            <td>Your Name</td>
            <td><?php echo $res['username']; ?></td>
        </tr>
        <tr> 
            <td>Your Email Address</td>
            <td><?php echo $res['email_address'];?></td>
        </tr>
        <tr> 
            <td>Phone Number</td>
            <td><?php  if($res['phone_number'] !== ''){
                echo $res['phone_number'];
            }?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php  if($res['address'] !== ''){
                echo $res['address'];
            }else{
                echo " address not given by you";
            } ?></td>
        </tr>
        <tr>
            <td>City or Hometown</td>
            <td><?php  if($res['city'] !== ''){
                echo $res['city'];
            }else{
                echo "city or hometown not given by you";
            } ?></td>
        </tr>
        <tr>
            <td>PIN Code</td>
            <td><?php  if($res['pin_code'] !== ''){
                echo $res['pin_code'];
            }else{
                echo "pin code not given by you";
            } ?></td>
        </tr>
        <tr> 
            <td>Password</td>
            <td><input type="password" id="password" value="<?php echo $res['s_password']; ?>" disabled><input type="button" id="show" value="show"></td>
        </tr>
        <!-- <tr>
        <td colspan="2">
        <a href="editaccount.php"><input type="button" id="mainbtn" value="Edit Account"></a></td>
        </tr> -->
    </table>
    </form>
</div>

</div>
<!-- <div class="foot">
</div> -->




<script>
    $("#show").click(function(){
        $("#password").attr('type','text');
    });
</script>
</body>
</html>
