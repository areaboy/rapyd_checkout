<?php
//error_reporting(0);

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {



$qty = strip_tags($_POST['qty']);
$email = strip_tags($_POST['email']);
$fullname = strip_tags($_POST['fullname']);
$address = strip_tags($_POST['address']);
$postal_code = strip_tags($_POST['postal_code']);
$country = strip_tags($_POST['country']);
$cart_session = strip_tags($_POST['cart_session']);
$price = strip_tags($_POST['price_value']);
$product_id = strip_tags($_POST['product_id']);

$mt_id=rand(0000,9999);
$dt2=date("Y-m-d H:i:s");
$ipaddress = strip_tags($_SERVER['REMOTE_ADDR']);



include('data6rst.php');



$timer1= time();

include("time/now.fn");
$timer2=strip_tags($now);


$result = $db->prepare('SELECT * FROM products where timer1=:timer1');
$result->execute(array(':timer1' =>$product_id));
$nosofrows = $result->rowCount();
$row = $result->fetch();

                $id= $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $timing = $row['timer1'];
                $created_time = $row['created_time'];
                $product_price = $row['price'];
                $photo = $row['photo'];
                $shipping_rate = $row['shipping_rate'];

		$total_payments = $price * $qty;

$total_amount= $total_payments + $shipping_rate;
$total_amount1= $total_amount;


// check if products price has been tampered at frontend

if($price != $product_price ){
echo "<div style='background:red;color:white;padding:10px;'>Products Price has been Tampered by You..</div>";
exit();
}


$statement = $db->prepare('INSERT INTO cart

(email,fullname,address,postal_code,country,cart_session,price,product_id,shipping_rate,total_amount,total_amount1,product_title, product_photo,qty,timer1,timer2,cart_status,discount)
 
                          values
(:email,:fullname,:address,:postal_code,:country,:cart_session,:price,:product_id,:shipping_rate,:total_amount,:total_amount1,:product_title,:product_photo,:qty,:timer1,:timer2,:cart_status,:discount)');

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
':product_photo' => $photo,
':product_title' => $title,
':qty' => $qty,
':timer1' => $timer1,
':timer2' => $timer2,
':cart_status'  => 'abandon',
':discount'  => '0'

));


if($statement){
echo "<script>alert('Cart Successfully Updated');</script>";
echo "<div id='alertdata' class='alerts alert-success'>Cart Successfully Updated.</div>";

}

                else {
echo "<div id='alertdata' class='alerts alert-danger'>Cart Update Failed<br></div>";
                }

}


?>



