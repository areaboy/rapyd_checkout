<?php
session_start();
unset($_SESSION["guest_session"]);
unset($_SESSION["email_session"]);
unset($_SESSION["fullname_session"]);

session_destroy();

echo "<script>alert('Your Session Data successfully Cleared and Protected..');</script>";

echo "<br><div style='background:green;color:white;padding:8px;border:none;'>Your Session Data successfully Cleared and Protected. Redirecting in a Second.....<img src='loader.gif'></div>";


echo "<script>
window.setTimeout(function() {
    window.location.href = 'index.php';
}, 1000);
</script><br><br>";
//header("Location:index.php");
?>