<?php
error_reporting(0); 
//site url for Rapyd must begin with http or https.
$site_url_rapyd = 'https://fredjarsoft.com/rapyd_checkout';

// Rapyd Payments Settings
$country_currency_symbol = '$';
$country_currency_code = 'SGD';
$country = 'SG';
$saler_ewallet = "ewallet_c0aa732d8bc940dd62b7bbbabd41f35e";
$complete_payment_url = "$site_url_rapyd/payment_complete.php";
$cancel_checkout_url = "$site_url_rapyd/payment_cancel.php";
$complete_checkout_url = "$site_url_rapyd/payment_complete_checkout.php";
$error_payment_url = "$site_url_rapyd/payment_error.php";
$languagex = "en";

$payment_method_types_include_mastercard = 'sg_credit_mastercard_card';
$payment_method_types_include_visacard = 'sg_credit_visa_card';
$payment_method_types_include_bank = "sg_paynow_bank";
$payment_method_types_include_grabpay = "sg_grabpay_ewallet";


 

//Please do not add  http or https to the site url below otherwise Email messages will not work.
$site_url=  "fredjarsoft.com/rapyd_checkout";
//$site_url=  "localhost/rapyd_checkout";

// Your Seller or Company Name
$company_name ='Rapyd Single Page Checkout Sales.';
$company_email ='esedofredrick@gmail.com';

// Email Server Setup
$smtp_email_host ='mail.fredjarsoft.com';  //Eg. mail.gmail.com
$smtp_email_username ='support@fredjarsoft.com';
$smtp_email_password ='mypass9078';
$smtp_email_port ='587';


/***************************************************************
VeryImportant:

 Settings below will also help to combat Cart Abandoment, facilitates more Products Sales and hence More Checkout and Payments conversions

*****************************************************************/







/*
Set Javascript Timer to Increase Items Sales and Payments urgency with limited-time offers.
This Javascript countdown timer will make your Customers see a running clock timing urging them to buy your item immediately. If they purchase within the timer, 
Discount amount set below will be apply.
*/

$buynow_timer = 10;  // set to 10 minutes (ticking clock timing...)
$buynow_timer_start = "10:00";  // set timer to start counting down from 10 minutes


   
/*
Set Discount. That is amount you will like to give to customers as discount upon Checkout of each shopping Cart via Checkout Timer Above.
If Customer checkout within the Timing Period you set above Eg.( 15 minutes etc), Discount will be Applied. If timer expires before checkout, discount will
 not be applied. Again Eg. if Customers is checking out 3 carts of itmes at a time, The discount will be discount amount (X) no of Cart  beign checked out.
*/
$discount_checkout = 2;   //Eg 2(SGD)


// Set Welcome Message popup that will be displayed when a Customer enters your Site
$welcome_message ="You are Welcome to Our Site <b>Guest</b>. All Our Products comes with Low Shipping Cost. <br><br>Apply Your <b>Promo Code Coupon</b> or <b>Checkout Cart Products</b> within <b>15 Minutes</b> to Get More Discount. Thank You....";
$welcome_message_status = 1;  // set it to 1 to display welcome Message or 0 to turn welcome message popup off




// Set Message popup that will be displayed to your Customers if he tries to abandon his Cart Checkout items..
$message_abandon_cart ="Hi Our <b>Guest</b>, You still Have some Products in the Carts awaiting Checkout. Please Checkout now or when ready to get More Discount... Thanks";
$message_abandon_cart_status = 1; // set it to 1 to display abandon Carts popup Message or 0 to turn it off


/*
 Set Customers Complement Messages whenever a Products and Items is added to Carts. Compliment Message is a greate way of Thanking your Customer
for adding items to their Carts.
*/
$compliment_customers_message_cart ="Wow!!!. You really have a good Taste. This Item You added to Your Cart is Fantastic. Thank You...";

?>