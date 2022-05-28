<?php
session_start();
unset($_SESSION["admin_session"]);
session_destroy();
header("Location:index.php");
?>