<?php
session_start();
unset($_SESSION["cus_id"]);
unset($_SESSION["cus_email"]);
unset($_SESSION["cus_fullname"]);

session_destroy();
header("Location:index.php");


?>