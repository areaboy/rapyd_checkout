<?php
error_reporting(0);

session_start();
$cart_session_sess = $_SESSION['guest_session'];
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);
$discount_status = strip_tags($_POST['discount_status']);
$id = strip_tags($_POST['id']);
$cart_session = strip_tags($_POST['cart_session']);
$timer1= time();
// connect to Rapyd to create checkout Page
include('utilities.php');
include('rapyd_settings.php');
include('data6rst.php');
$resultx = $db->prepare('SELECT sum(total_amount) AS total FROM cart where cart_session = :cart_session order by id desc');
$resultx->execute(array(':cart_session' =>$cart_session));
$nosofrowsx = $resultx->rowCount();
$v1x = $resultx->fetch();
$total_sum = $v1x['total'];
$resulty = $db->prepare('SELECT * FROM cart where cart_session = :cart_session order by id desc');
$resulty->execute(array(':cart_session' =>$cart_session));
$nosofrowsy = $resulty->rowCount();
$no_of_carts_shopped = $nosofrowsy;
if($discount_status =='Timer-Active'){
$discount = $discount_checkout;
$discount_total = $discount * $nosofrowsy;
//$total_sum_payable = $total_sum - $discount;
$total_sum_payable = trim($total_sum - $discount_total);
$discount_split = $discount_checkout/$no_of_carts_shopped;
}
if($discount_status =='Timer-Expired'){
$total_sum_payable = trim($total_sum);
$discount = '0';
$discount_split= '0';
}
$body = [
    "amount" => $total_sum_payable,
    "complete_payment_url" => "$complete_payment_url",
     "cancel_checkout_url" => "$cancel_checkout_url",
    "complete_checkout_url" => "$complete_checkout_url",
    "ewallet" => "$saler_ewallet",
    "country" => "$country",
    "currency" => "$country_currency_code",
    "error_payment_url" => "$error_payment_url",
    "merchant_reference_id" => "$timer1",
    "language" => "$language",
    "metadata" => array(
        "merchant_defined" => true
    ),
  "payment_method_types_include"  => [
   "$payment_method_types_include_mastercard",
    "$payment_method_types_include_visacard"
    ]
];
try {
    $object = make_request('post', '/v1/checkout', $body);
   // print_r($object);
$json = json_decode(json_encode($object), true);
//$json = json_encode($object, true);
//print_r($json);
if($object==''){
echo "<br><br><div style='background:red;color:white;padding:8px;border:none;'>Checkout Page Creation Failed. Try again</div>";
exit();
}
} catch(Exception $e) {
    echo "<div style='background:red;color:white;padding:8px;border:none;'>Error: $e</div>";
}
$status_success = $json['status']['status'];
$checkout_page_id = $json['data']['id'];
$redirect_url = $json['data']['redirect_url'];
$payment_captured  =  $json['data']['payment']['captured'];
$payment_amount  =  $json['data']['payment']['amount'];



$mt_id=rand(0000,9999);
$dt2=date("Y-m-d H:i:s");
$ipaddress = strip_tags($_SERVER['REMOTE_ADDR']);







include("time/now.fn");
$timer2=strip_tags($now);



if($status_success =='SUCCESS'){  // close if for rapyd success

$result = $db->prepare('SELECT * FROM cart where cart_session=:cart_session');
$result->execute(array(':cart_session' =>$cart_session));
$nosofrows = $result->rowCount();
while($row = $result->fetch()){



                $id= $row['id'];
                $email = $row['email'];
$fullname = $row['fullname'];
$address = $row['address'];
$postal_code = $row['postal_code'];
$country = $row['country'];
$cart_session = $row['cart_session'];
$price = $row['price'];
$product_id = $row['product_id'];
$shipping_rate = $row['shipping_rate'];
$total_amount = $row['total_amount'];
$total_amount1 = $row['total_amount1'];
$product_photo = $row['product_photo'];
$product_title = $row['product_title'];
$qty = $row['qty'];
$timer1 = $row['timer1'];
$timer2 = $row['timer2'];              


$_SESSION['email_session'] = $email;
$_SESSION['fullname_session'] = $fullname;



$stmt = $db->prepare('INSERT INTO payments
(email,fullname,cart_session,merchant_reference_id,
checkout_pageid,total_amount,discount,payment_id,payment_status)
 
                          values
(:email,:fullname,:cart_session,:merchant_reference_id,
:checkout_pageid,:total_amount,:discount,:payment_id,:payment_status)');

$stmt->execute(array( 
':email' => $email,
':fullname' => $fullname,
':cart_session' => $cart_session,
':merchant_reference_id' =>$timer1,
':checkout_pageid' => $checkout_page_id,
':total_amount' => $total_amount,
':discount'  =>$discount,
':payment_id' => '0',
':payment_status' => 'ACT'
));



$statement = $db->prepare('INSERT INTO sales
(email,fullname,address,postal_code,country,cart_session,price,product_id,shipping_rate,total_amount,total_amount1,product_title, product_photo,qty,timer1,timer2,
checkout_pageid, payment_id,payment_status,payment_redirect_url,total_amount_payable,discount_split,discount_all,merchant_reference_id)
 
                          values
(:email,:fullname,:address,:postal_code,:country,:cart_session,:price,:product_id,:shipping_rate,:total_amount,:total_amount1,:product_title,:product_photo,:qty,
:timer1,:timer2,:checkout_pageid,:payment_id,:payment_status,:payment_redirect_url,:total_amount_payable,:discount_split,:discount_all,:merchant_reference_id)');

$statement->execute(array( 
':email' => $email,
':fullname' => $fullname,
':address' => $address,
':postal_code' => $postal_code,
':country' => $country,
':cart_session' => $cart_session,
':price' => $price,
':product_id' => $product_id,
':shipping_rate' => $shipping_rate,
':total_amount' => $total_amount,
':total_amount1' => $total_amount1,
':product_photo' => $product_photo,
':product_title' => $product_title,
':qty' => $qty,
':timer1' => $timer1,
':timer2' => $timer2,
':checkout_pageid' => $checkout_page_id,
':payment_id' => '0',
':payment_status' => 'ACT',
':payment_redirect_url'  =>$redirect_url,
':total_amount_payable'  =>$total_sum_payable,
':discount_split'  =>$discount_split,
':discount_all'  =>$discount,
':merchant_reference_id' =>$timer1



));



// update cart status from abandon to activated

$update = $db->prepare('UPDATE cart set cart_status = :cart_status where cart_session = :cart_session');

		$update->execute(array(
			':cart_status' => 'abandon', ':cart_session' =>$cart_session
    ));


}


if($statement){
echo "<script>alert('Checkout Page Successfully Created. We will redirect you in a Second');</script>";
echo "<div id='alertdata' style='background:green;color:white;padding:10px;border:none;'>Checkout Page Successfully Created.  .Redirecting in a second.....<img src='loader.gif'></div>";

echo "<script>
window.setTimeout(function() {
    window.location.href = 'checkout_now.php?cart_id=$cart_session';
}, 1000);
</script><br><br>";



/*
// open in new window
echo "<script>
window.open(
  'checkout_now.php?cart_id=$cart_session',
  '_blank'
);
</script><br><br>";
*/


}

                else {
echo "<div id='alertdata' class='alerts alert-danger'>Checkout Page Creation Failed. Please Try Again...<br></div>";
                }


}// close if for rapyd success

}


?>



