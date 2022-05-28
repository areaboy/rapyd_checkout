

<?php
	
//set session
if(!isset($_SESSION['guest_session']) || (trim($_SESSION['guest_session']) == '')) {
echo "<script>alert('Session Expired. Direct access to this Page Not allowed..');</script>";
		header("location: index.php");
		exit();
	}


?>