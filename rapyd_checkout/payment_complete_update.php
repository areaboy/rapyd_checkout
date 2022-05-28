<?php
//error_reporting(0);
session_start();
$cart_session_sess = $_SESSION['guest_session'];

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);



$cart_sessionx = strip_tags($_POST['cart_sessionx']);



//get checkout page id for the said cart session

include('data6rst.php');


$resultx = $db->prepare('SELECT * FROM payments where cart_session =:cart_session');
$resultx->execute(array(':cart_session' =>$cart_sessionx));

$v1x = $resultx->fetch();
$checkout_pageidx = $v1x['checkout_pageid'];




// connect to Rapyd to create checkout Page

include('utilities.php');
//include('rapyd_settings.php');


try {
//$object = make_request("get", "/v1/checkout/$checkout_pageidx");  // completed

    $object = make_request('get', "/v1/checkout/$checkout_pageidx");  // completed
$json = json_decode(json_encode($object), true);

//$json = json_encode($object, true);
//print_r($json);

if($object==''){

echo "<br><br><div style='background:red;color:white;padding:8px;border:none;'>Payment Query Updates Failed. Try again</div>";
exit();
}

} catch(Exception $e) {
    echo "<div style='background:red;color:white;padding:8px;border:none;'>Error: $e</div>";
}




$status_success = $json['status']['status'];
$payment_amount  =  $json['data']['payment']['amount'];
$payment_id  =  $json['data']['payment']['id'];
$payment_statusx  =  $json['data']['payment']['status'];






if($status_success =='SUCCESS'){  // close if for rapyd success


// update carts Payments Status

$update = $db->prepare('UPDATE sales set  payment_id=:payment_id where cart_session =:cart_session');
		$update->execute(array(
			':payment_id' => $payment_id, 
':cart_session' =>$cart_sessionx
    ));


$update2 = $db->prepare('UPDATE payments set  payment_id=:payment_id where cart_session =:cart_session');
		$update2->execute(array(
':payment_id'=>$payment_id,
 ':cart_session' =>$cart_sessionx
    ));







 echo "<br><div style='background:green;color:white;padding:8px;border:none;'>Your Rapyd Payments ID Successfully Updated with Our Database</div>";


}
/*
else{

 echo "<div style='background:red;color:white;padding:8px;border:none;'>We Could not Update Your Rapyd Payments Status Updates. <br>Ensure there is Internet Connection 
and Try Again...  </div>";
}
*/




}


?>



