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



$cart_sessionx = strip_tags($_POST['cart_sessionx']);


include('data6rst.php');
include('rapyd_settings.php');

// start Email Calls Here



// Load Composer's autoloader
require 'mail_vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


// query users table 
$resultp = $db->prepare('SELECT * FROM sales where  cart_session=:cart_session');
$resultp->execute(array(':cart_session' => $cart_sessionx));
$nosofrowsp = $resultp->rowCount();


if($nosofrowsp > 0){
//foreach($row['data'] as $v1){
while($row = $resultp->fetch()){



        $id= $row['id'];
                $postid = $row['id'];
                $title = $row['product_title'];
                $email = $row['email'];
                $timing = $row['timer1'];
                $timer2= $row['timer2'];
                $fullname =$row['fullname'];
                $photo = $row['product_photo'];
                $address = $row['address'];
                $postal_code = $row['postal_code'];
$price = $row['price'];
$country = $row['country'];          
$cart_session = $row['cart_session'];    
$product_id = $row['product_id'];  
         // $microcontent = substr($description, 0, 100)."...";  
$shipping_rate = $row['shipping_rate']; 
$total_amount = $row['total_amount']; 
$qty = $row['qty']; 
$pay_status = $row['payment_status']; 
$total_amount1 = $row['total_amount1']; 
$payment_id = $row['payment_id'];  
$discount_split = $row['discount_split']; 
$payment_redirect_url = $row['payment_redirect_url']; 
$total_amount_payable = $row['total_amount_payable']; 
$discount_all = $row['discount_all'];

$merchant_reference_id = $row['merchant_reference_id'];


$amount_after_discount = $total_amount1 - $discount_all;
$tx=time();

// start email messaging



$sender_name= $company_name;
$recipient_name = $fullname;
$recipient_email = $email;
$title_product = "$title Purchase. ---$tx";
$email_subject = $title_product;

		    

$messaging = "
Hi Customer! <b>$recipient_name</b>, <span style='color:green'>Your Products Purchase  is Successful.</span><br>
<br>

<h3>About Your Rapyd Payments</h3>
<h4> Your Rapyd Payment Id: $payment_id</h4>
<h5> Your Rapyd Merchant Reference Id: $merchant_reference_id</h5>
<b> Rapyd Payment Status:</b> $pay_status<br><br>

<h3>About Your Rapyd Products</h3>
<h4> Products Title: $title</h4>
<b> Transaction/Cart Session Id: </b>$cart_session <br>
<b> price:</b>  $price($country_currency_code)<br>
<b> Quantity:</b> $qty<br>
<b> Shipping Rate:</b> $shipping_rate($country_currency_code)<br>
<b> Discount:</b> $discount_all($country_currency_code)<br>
<b> Total Amount Before Discount:</b> $total_amount1($country_currency_code) <br>
<b> Total Amount After Discount:</b> $amount_after_discount($country_currency_code) <br><br>


<h3>About Your Shipping Details</h3>
<b>Customer Name: </b> $fullname<br>
<b>Customer Email: </b> $email<br>
<b>Full Shipping Address:</b> $address<br>
<b>Postal Code: </b> $postal_code<br>
<b>Country:</b> $country<br>

";





// php mailer try starts here

//try {
    
    
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
    //echo 'Message successfully sent';
    //echo 1;


//} catch (Exception $e) {
 //echo "Message not sent. Error: {$mail->ErrorInfo}";

//echo 0;

//}


 $mail->clearAllRecipients(); // Clear all recipient types(to, bcc, cc) before adding new email address.

//php mailer try email ends here


}
}

if(!$sent) 
{
echo "<div style='background:red;color:white;padding:8px;border:none;'>Purchasing Email Message not sent. Ensure Internet Connection.  Error: {$mail->ErrorInfo}</div>";

echo "<script>alert('Email not Sent. Ensure Internet Connection.');</script>";
} 
else 
{
echo "<script>alert('Your Items and Payments Detail successfully sent to your Email. Please Check your Inbox or Spam Box');</script>";
  echo "<br><div style='background:green;color:white;padding:8px;border:none;'>Your Items and Payments Detail successfully sent to your Email. Please Check your Inbox or Spam Box</div>";
    
}




// end Email Calls Here




}


?>



