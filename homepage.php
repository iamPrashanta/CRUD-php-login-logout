
<?php
include_once("./php/config.php");
session_start();
if (!isset($_SESSION['member_id'])){
header('location:index.php');
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>
    <link rel="shortcut icon" href="./img/logo.ico">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="./css/homepage.css">
</head>
<body>
    <header>
    <h2>Welcome <span><a href="settings.php"><?php  echo $_SESSION['member_id']; ?></span></a></h2>
    <ul>
        <li><a href="#" id="active">Home</a></li>
        <li><a href="#Footer">Contact</a></li>
        <li><a href="settings.php">Settings</a></li>
        <li><a href="./php/logout.php" ><input type="button" value="Log out"></a></li>
    </ul>
    </header>
    <div id="main-body">
        <h1>Homepage</h1>









    </div>
    <?php include("./php/footer.html"); ?>
    <script src="js/react.js"></script>
</body>
</html>