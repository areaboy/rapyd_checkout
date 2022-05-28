<?php
//error_reporting(0);
session_start();
$cart_session_sess = $_SESSION['guest_session'];

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

 $cart_sessionx = strip_tags($_POST['cart_sessionx']);



include('data6rst.php');

$payment_statusx ='CLO';

// update carts Payments Status

$update = $db->prepare('UPDATE sales set payment_status =:payment_status where cart_session =:cart_session');
		$update->execute(array(
			':payment_status' => $payment_statusx, 
':cart_session' =>$cart_sessionx
    ));


$update2 = $db->prepare('UPDATE payments set payment_status =:payment_status where cart_session =:cart_session');
		$update2->execute(array(
			':payment_status' => $payment_statusx,
 ':cart_session' =>$cart_sessionx
    ));



// update cart status from abandon to activated

$update = $db->prepare('UPDATE cart set cart_status = :cart_status where cart_session = :cart_session');

		$update->execute(array(
			':cart_status' => 'activated', ':cart_session' =>$cart_sessionx
    ));



if($update){

 echo "<div style='background:green;color:white;padding:8px;border:none;'>Your Cart Checkout Status Successfully Updated....</div>";


}

else{

 echo "<div style='background:red;color:white;padding:8px;border:none;'>We Could not Update Your Cart Checkout Status Updates. <br>Ensure there is Internet Connection 
and Try Again...  </div>";
}





}


?>



