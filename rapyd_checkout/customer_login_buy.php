<?php
error_reporting(0);

session_start();
session_destroy();

$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);
$product_id = strip_tags($_POST['product_id']);

if ($email == ''){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Email is Empty.</div>";
exit();
}


if ($password == ''){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Password is Empty..</div>";
exit();
}




include('data6rst.php');
$result = $db->prepare('SELECT * FROM users where email = :email');

		$result->execute(array(
			':email' => $email

    ));

$count = $result->rowCount();

$row = $result->fetch();

if( $count == 1 ) {





//start hashed passwordless Security verify
if(password_verify($password,$row["password"])){
            //echo "Password verified and ok";



$userid = $row['id'];
$fullname = $row['fullname'];
$phone_no = $row['phone_no'];


// initialize session if things where ok via html5 local storage.


session_start();
session_regenerate_id();

// initialize session if things where ok.
$_SESSION['cus_id'] = $row['id'];
$_SESSION['cus_email'] = $row['email'];
$_SESSION['cus_fullname'] = $row['fullname'];

$_SESSION['cus_login_track'] = time();


echo "<div style='background:green;padding:8px;color:white;border:none;'>Login sucessful <img src='ajax-loader.gif'></div>";
echo "<script>window.location='product.php?id=$product_id'</script>";



}
else{

echo "<div style='background:red;padding:8px;color:white;border:none;'>Password does not match..</div>";

}



}
else {

echo "<div style='background:red;padding:8px;color:white;border:none;'>User with this Email does not Exist</div>";
}






?>

<?php ob_end_flush(); ?>
