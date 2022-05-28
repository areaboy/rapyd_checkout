<?php
/*
The phpmailer keyword must be declared in the outermost or topmost scope of a file (the global scope) 
or inside namespace declarations. This is because the importing is done at compile time and not runtime.
 otherwise it will throw error syntax error, unexpected 'use' (T_USE)
*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




error_reporting(0);
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);

session_start();
$cart_session_sess = $_SESSION['guest_session'];

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

ini_set('max_execution_time', 300); //300 seconds = 5 minutes
// temporarly extend time limit
set_time_limit(300);


echo $discount_status = strip_tags($_POST['discount_status']);
//$id = strip_tags($_POST['id']);
$cart_session = strip_tags($_POST['cart_session']);
$reason = strip_tags($_POST['reason_checkout']);
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
    //print_r($object);

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


/*
create table sales(id int primary key auto_increment, email varchar(100), fullname varchar(100),address varchar(200),postal_code varchar(10),
country varchar(100),cart_session varchar(100),price varchar(100),product_id varchar(100),shipping_rate varchar(100),total_amount varchar(100)
,total_amount1 varchar(100),product_title varchar(100), product_photo varchar(100),qty varchar(100),timer1 varchar(100),timer2 varchar(100),
checkout_pageid  varchar(400), payment_id  varchar(400),payment_status varchar(50),payment_redirect_url text);


alter table sales add column(merchant_reference_id varchar(100));

create table payments(id int primary key auto_increment, email varchar(100), fullname varchar(100),cart_session varchar(100),merchant_reference_id varchar(100),
checkout_pageid text, total_amount varchar(50), discount varchar(50),payment_id text, payment_status varchar(100));

*/


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

$update = $db->prepare('UPDATE cart set cart_status = :cart_status, reason=:reason where cart_session = :cart_session');

		$update->execute(array(
			':cart_status' => 'saved',':reason' => $reason, ':cart_session' =>$cart_session
    ));


}


if($statement){
echo "<script>alert('Checkout Page Successfully Created and Emailed');</script>";
echo "<div id='alertdata' style='background:green;color:white;padding:10px;border:none;'>Checkout Page Successfully Created and Emailed</div>";



//$site_url;

$sender_name= $company_name;
$email_subject = "Your Saved Checkout Items";
$email_message="Hi, $fullname <br>Please Click Link Below to complete your Checkout Payments. Thanks.<br> <br>
<a style='color:white;background:green;padding:6px;' href='$site_url/checkout_saved.php?cart_id=$cart_session'>Continue with Checkout & Payments</a><br><br>

";



// Load Composer's autoloader
require 'mail_vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


$recipient_name = $fullname;
$recipient_email = $email;		    

$messaging = "Hi $recipient_name, You have Message Alerts from $sender_name. $email_message";



// php mailer try starts here

try {
    
    
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

    //Server settings
    $mail->SMTPDebug = 0;                                       // 0 - Disable Debugging, 2 - Responses received from the server
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = $smtp_email_host;  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $smtp_email_username;                     // SMTP username
    $mail->Password   = $smtp_email_password;                               // SMTP password
    $mail->SMTPSecure = 'tls';//PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = $smtp_email_port;                                    // TCP port to connect to

    //Sender and sender name
    //$mail->setFrom('support@fredjarsoft.com', 'fred boy');

    $mail->setFrom('support@fredjarsoft.com', "$sender_name");

//recipient email address and name
    //$mail->addAddress('ese@gmail.com', 'fred recipients');     // Add a recipient
      $mail->addAddress($recipient_email, $recipient_name);     // Add a recipient
  
    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $email_subject;
    $mail->Body = $messaging;
    $mail->AltBody = $messaging; // for Plain text for non-HTML mails

   $sent =  $mail->send();
    echo "<div style='background:green;color:white;padding:10px;border:none;'> Email Message successfully sent</div>";



// clear all sessions on email success
session_start();
unset($_SESSION["guest_session"]);
session_destroy();



echo "<script>
window.setTimeout(function() {
    window.location.href = 'index.php';
}, 1000);
</script><br><br>";



} catch (Exception $e) {
 echo "<div style='background:red;color:white;padding:10px;border:none;'>Email Message not sent. Error: {$mail->ErrorInfo}</div>";

//echo 0;

}


//php mailer try email ends here




}

                else {
echo "<div id='alertdata' class='alerts alert-danger'>Checkout Page Creation Failed. Please Try Again...<br></div>";
                }


}// close if for rapyd success

}


?>



