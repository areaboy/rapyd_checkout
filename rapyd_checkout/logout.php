<?php
session_start();
unset($_SESSION["guest_session"]);
session_destroy();
header("Location:index.php");
?>