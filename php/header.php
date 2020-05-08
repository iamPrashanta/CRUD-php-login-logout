<?php
include_once("config.php");
session_start();
?>
<head>
    <link rel="shortcut icon" href="../../img/logo.ico">
    <script src="../../js/jquery.js"></script>
    <link rel="stylesheet" href="../../css/header.css">
</head>
<body>
    <header>
        <h2>Devpras.com</h2>
        <ul>
            <li><?php if (!isset($_SESSION['member_id'])){?><a href="../../pages/company/blogs.php">Blogs</a>
            <?php }else{?><a href="../../homepage.php">Home</a><?php }?>
            </li>
            <li><a href="../../pages/company/about.php">About</a></li>
            <li><?php if (!isset($_SESSION['member_id'])){ ?><a href="../../pages/help-contact.php">Contact</a>
            <?php }else{ ?><a href="../../settings.php">Settings</a><?php } ?>
            </li>
            <li><a href="../../php/logout.php" ><input type="button" value="<?php  if (!isset($_SESSION['member_id'])){
                echo "Login";
            }else{ echo "Log out"; } ?>"></a></li>
        </ul>
    </header>
<script src="../../js/react.js"></script>
</body>
