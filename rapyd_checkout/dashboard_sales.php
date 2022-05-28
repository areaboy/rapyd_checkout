<?php
error_reporting(0);
include('rapyd_settings.php');

session_start();
//set session
if(!isset($_SESSION['admin_session']) || (trim($_SESSION['admin_session']) == '')) {
echo "<script>alert('Session Expired. Direct access to this Page Not allowed..');</script>";
		header("location: index.php");
		exit();
	}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="jquery.min.js"></script>
<script src="moment.js"></script>
	<script src="livestamp.js"></script>

    <!-- Bootstrap CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="img/logo.png" type="image/png" sizes="16x16">

    <title>Rapyd One Page Products Checkout</title>

<style>

.imagelogo_li_remove {
list-style-type: none;
margin: 0;
 padding: 0;
}

.imagelogo_data{
 width:120px;
 height:80px;
}

 .bottomcorner_css{
  //position:fixed;
position:absolute;
  bottom:0;
  right:0;
  }


 .topcorner_css{
  //position:fixed;
position:absolute;
  top:10;
  right:0;
  }


</style>

</head>

<body>
    <div>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                 
                </a>





<li class="navbar-brand home_click imagelogo_li_remove" ><img class="img-rounded imagelogo_data" src="img/bike-img.jpeg"></li>

                <a class="navbar-brand" href="index.php">Home/Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">/

   <li class="nav-item">
                            <a style='cursor:pointer;' class="nav-link" title="Add Products" data-bs-toggle="modal" data-bs-target="#myModal_products">Add Products</a>
                        </li>/

                        <li class="nav-item">
                            <a class="nav-link" href="dashboard_cart_abandon.php" title="Manage Abandon Carts">Manage Abandon Carts</a>
                        </li>/

<li class="nav-item">
                            <a class="nav-link" href="dashboard_cart_saved.php" title="Manage Saved Carts Checkout">Manage Saved Carts Checkout</a>
                        </li>/

<li class="nav-item">
                            <a class="nav-link" href="dashboard_customers_signup.php" title="Manage Registered Customers">Manage Registered Customers</a>
                        </li>/


     <li class="nav-item">
                            <a class="nav-link" href="admin_logout.php" title="Logout">Logout</a>
                        </li>
                      
                    </ul>
                </div>
            </div>
        </nav>




<br><br><br><br><br>







<h3><center><b style='color:'>Products Sales Tracking & Email Payments Reminding System....</b></center></h3>
Easily track and Monitor Your Products Sales. Send Email Reminder to Customers whose <b>Rapyd Payments Status</b> is still <b>Active(ACT)</b> urging them to complete
their Payments

<br><br>




<?php
include('data6rst.php');


$resc_cart = $db->prepare("SELECT * FROM cart");
$resc_cart->execute(array());
$rowc_cart = $resc_cart->fetch();
$counting_cart = $resc_cart->rowCount();

$resc_cart_abandon = $db->prepare("SELECT * FROM cart where cart_status='abandon' ");
$resc_cart_abandon->execute(array());
$rowc_cart_abandon = $resc_cart_abandon->fetch();
$counting_cart_abandon = $resc_cart_abandon->rowCount();

$resc_cart_saved = $db->prepare("SELECT * FROM cart where cart_status='saved'");
$resc_cart_saved->execute(array());
$rowc_cart_saved = $resc_cart_saved->fetch();
$counting_cart_saved = $resc_cart_saved->rowCount();

$resc_customers = $db->prepare("SELECT * FROM users");
$resc_customers->execute(array());
$rowc_customers = $resc_customers->fetch();
$counting_customers = $resc_customers->rowCount();

$resc_sales = $db->prepare("SELECT * FROM sales where payment_status='CLO' ");
$resc_sales->execute(array());
$rowc_sales = $resc_sales->fetch();
$counting_sales = $resc_sales->rowCount();




$resc_revenue = $db->prepare("SELECT sum(total_amount_payable) AS total FROM sales where payment_status='CLO' ");
$resc_revenue->execute(array());
$rowc_revenue = $resc_revenue->fetch();
$counting_revenue = $resc_revenue->rowCount();
$sales_total_revenuex = $rowc_revenue['total'];

if($sales_total_revenuex ==''){
$sales_total_revenue  = 0;
}

if($sales_total_revenuex !=''){
$sales_total_revenue  = $sales_total_revenuex;
}

?>
<div class='row'>

<div class='col-sm-2' style='background:#ddd;'>
<b style='font-size:20px'>
(<?php echo $counting_cart; ?>) </b><br>
Total Carts Created

</div>

<div class='col-sm-2' style='background:#ccc;'>
<b style='font-size:20px'>
(<?php echo $counting_cart_abandon; ?>) </b><br>
Total Abandon Carts

</div>

<div class='col-sm-2' style='background:#ddd;'>
<b style='font-size:20px'>
(<?php echo $counting_cart_saved; ?>) </b><br>
Total Saved Carts

</div>

<div class='col-sm-2' style='background:#ccc;'>
<b style='font-size:20px'>
(<?php echo $counting_sales; ?>) </b><br>
Total Sales
</div>

<div class='col-sm-2' style='background:#ddd;'>
<b style='font-size:20px'>
<?php echo $sales_total_revenue; ?> (SGD) </b><br>
Sales Revenue

</div>

<div class='col-sm-2' style='background:#ccc;'>
<b style='font-size:20px'>
(<?php echo $counting_customers; ?>) </b><br>
Total Registered Customers
</div>

</div><br>





<div class='row'>
<div class='col-sm-0' style='display:none;'>

<h3 style='color:#800000'>Cart</h3><br>





</div>

<style>

//if screen is less than 600px wide become mobile responsive

@media screen and (max-width: 768px) {
    .tab1_responsive, .tab2_responsive {


width:100%;



  }
}


@media screen and (max-width: 700px) {
   .tab1_responsive, .tab2_responsive {

 //float: left;

width:1%;
  padding-right: 20px;

  float: right;

display: flex;
  flex-direction: column;
  justify-content: center;
margin-right:-160px;

  }
}




@media screen and (max-width: 600px) {
    .tab1_responsive, .tab2_responsive {


width:1%;
  //padding-right: 20px;
padding-right: 20px;

  float: right;

display: flex;
  flex-direction: column;
  justify-content: center;
//margin-right:-160px;
margin-right: -300px;

  }
}






.tabj{
display: flex;
  flex-direction: column;
  justify-content: center;

  padding: 10px;
  display: flex;
  align-items: center;
  float: left;
}



</style>

<div class='col-sm-12'>


        <div class="container">

            <?php
			include ("data6rst.php");
            $rowpage = 526;
            $limit = 0;

/*
Full texts 	id	email	fullname	address	postal_code	
country	cart_session	price	product_id	shipping_rate	total_amount	
total_amount1	product_title	product_photo	qty	timer1	timer2	checkout_pageid	payment_id	
payment_status	payment_redirect_url	total_amount_payable	discount_split	discount_all	merchant_reference_id 	
	Edit Edit 	Copy

*/

$res= $db->prepare("SELECT count(*) as totalcount FROM sales");
$res->execute(array());
$t_row = $res->fetch();
$totalcount = $t_row['totalcount'];

if($totalcount == 0){
echo "<div style='background:red;color:white;padding:10px;border:none;'>No Sales and Payments Yet.<b></b></div>";
//exit();
}

$result = $db->prepare("SELECT * FROM sales order by id desc limit :row1, :rowpage");
$result->bindValue(':rowpage', (int) trim($rowpage), PDO::PARAM_INT);
$result->bindValue(':row1', (int) trim($limit), PDO::PARAM_INT);
//$result->bindValue(':userid', trim($userid_sess), PDO::PARAM_STR);
//$result->bindValue(':project_id', trim($projectid), PDO::PARAM_INT);
$result->execute();

$count_post = $result->rowCount();


echo '<div class="tab1_responsive">
<table style="" border="0" cellspacing="2" cellpadding="2" class="tabj tab1_responsive table table-striped_no table-bordered "> 
      <tr> 
<th> <font face="Arial">Customer<br>Name</font> </th> 
<th style="display:none"> <font face="Arial">Email</font> </th> 
<th> <font face="Arial">Tracking<br>ID</font> </th> 
          <th> <font face="Arial">Image</font> </th> 
          <th> <font face="Arial">Title</font> </th> 
          <th> <font face="Arial">Price</font> </th> 
          <th> <font face="Arial">Quantity</font> </th> 
          <th> <font face="Arial">Shipping Rate</font> </th> 
<th> <font face="Arial">Discount Per Cart</font> </th>
          <th> <font face="Arial">Total Amount Before Discount</font> </th> 
   <th> <font face="Arial">Total Amount After Discount</font> </th> 
<th> <font face="Arial">Payment Status</font> </th>   
<th> <font face="Arial">Email Reminder</font> </th> 
<th> <font face="Arial">Time</font> </th> 
</tr>';


while($row = $result->fetch()){
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

if($pay_status == 'ACT'){

$st = "ACT";
$colorx ="red_css";
}else{

$st = "CLO";
$colorx ="green_css";

}


            ?>

<style>
.full-screen-modal {
    width: 100%;
    height: 100%;
    margin: 0;
    top: 0;
    left: 0;
}

.red_css {
    background:red;
    color: white;
    padding: 6px;
border:none;
border-radius:15%;
text-align:center;
font-size:12px;
}

.green_css {
    background:green;
    color: white;
    padding: 6px;
border:none;
border-radius:15%;
text-align:center;
font-size:12px;
}

.email_css{
background: navy;
color:white;
padding:6px;
cursor:pointer;
border:none;
font-size:12px;
//border-radius:25%;
//font-size:16px;
}

.email_css:hover{
background: black;
color:white;

}


.sales_css{
background: #800000;
color:white;
padding:6px;
cursor:pointer;
border:none;
font-size:12px;
//border-radius:25%;
//font-size:16px;
}

.email_css:hover{
background: black;
color:white;

}

</style>




<script>
$(document).ready(function(){
$('.btn_action').click(function(){
//$(document).on( 'click', '.btn_action', function(){ 






var id = $(this).data('id');
var title = $(this).data('title');
var product_id = $(this).data('product_id');
var photo = $(this).data('photo');
var price = $(this).data('price');

var total_payments = $(this).data('total_payments');
var shipping_rate = $(this).data('shipping_rate');

var shipping_rate = $(this).data('shipping_rate');
var address = $(this).data('address');
var postal_code = $(this).data('postal_code');
var country = $(this).data('country');
var email = $(this).data('email');
var fullname = $(this).data('fullname');
var qty = $(this).data('qty');
var cart_session = $(this).data('cart_session');
var payment_redirect_url = $(this).data('payment_redirect_url');


//alert(id);
//alert(title);
//alert(identity);

var cart_id = $(this).data('cart_id');


var image = "<span>" +
"<img src='uploads/" + photo +"'  style='width:100px;max-width:100px;height:100px;max-height:100px;border-style: solid; border-width:3px; border-color: orange;'>" +
 "</span>";

$('.p_photo').html(image);
$('.p_title').html(title);
$('.p_product_id').html(product_id);
$('.p_price').html(price);
$('.p_total_payments').html(total_payments);
$('.p_shipping_rate').html(shipping_rate);
$('.p_address').html(address);
$('.p_postal_code').html(postal_code);
$('.p_country').html(country);
$('.p_email').html(email);
$('.p_fullname').html(fullname);
$('.p_qty').html(qty);

$('.p_identity_value').val(product_id).value;
$('.p_price_value').val(price).value;
$('.p_cart_session_value').val(cart_session).value;
$('.p_cart_id_value').val(cart_id).value;
$('.p_email_value').val(email).value;
$('.p_fullname_value').val(fullname).value;
$('.pay_url_value').val(payment_redirect_url).value;



});

});






// clear Modal div content on modal closef closed
$(document).ready(function(){

$("#myModal_carto").on("hidden.bs.modal", function(){
    //$(".modal-body").html("");
 $('.mydata_empty').empty(); 
$('#qty').val(''); 
});



});





</script>

















<script>
$(document).ready(function(){
$('.btn_action_sales').click(function(){
//$(document).on( 'click', '.btn_action_sales', function(){ 






var id = $(this).data('id');
var title = $(this).data('title');
var product_id = $(this).data('product_id');
var photo = $(this).data('photo');
var price = $(this).data('price');

var total_payments = $(this).data('total_payments');
var shipping_rate = $(this).data('shipping_rate');
var address = $(this).data('address');
var postal_code = $(this).data('postal_code');
var country = $(this).data('country');
var email = $(this).data('email');
var fullname = $(this).data('fullname');
var qty = $(this).data('qty');
var cart_session = $(this).data('cart_session');
var payment_redirect_url = $(this).data('payment_redirect_url');
var total_amount_payable = $(this).data('total_amount_payable');
var payment_idx = $(this).data('payment_id');
var discount_split = $(this).data('discount_split');
var discount_all = $(this).data('discount_all');
var merchant_reference_id = $(this).data('merchant_reference_id');

if(payment_idx  == 0){
var payment_id ='Payment not Completed Yet';
var payment_status='ACT';
}

if(payment_idx  != 0){
var payment_id =payment_idx;
var payment_status='CLO';
}

var cart_id = $(this).data('cart_id');


var image = "<span>" +
"<img src='uploads/" + photo +"'  style='width:200px;max-width:200px;height:200px;max-height:200px;border-style: solid; border-width:3px; border-color: orange;'>" +
 "</span>";

$('.p_photox').html(image);
$('.p_titlex').html(title);
$('.p_product_idx').html(product_id);
$('.p_pricex').html(price);
$('.p_total_paymentsx').html(total_payments);
$('.p_shipping_ratex').html(shipping_rate);
$('.p_addressx').html(address);
$('.p_postal_codex').html(postal_code);
$('.p_countryx').html(country);
$('.p_emailx').html(email);
$('.p_fullnamex').html(fullname);
$('.p_qtyx').html(qty);
$('.p_cart_sessionx').html(cart_session);
$('.p_payment_redirect_urlx').html(payment_redirect_url);
$('.p_total_amount_payablex').html(total_amount_payable);
$('.p_payment_idx').html(payment_id);
$('.p_payment_statusx').html(payment_status);
$('.p_discount_splitx').html(discount_split);
$('.p_discount_allx').html(discount_all);
$('.p_merchant_reference_idx').html(merchant_reference_id);

});

});






// clear Modal div content on modal closef closed
$(document).ready(function(){

$("#myModal_sales").on("hidden.bs.modal", function(){
    //$(".modal-body").html("");
 $('.mydata_emptyx').empty(); 
});



});





</script>








                <div class='post'  id="post_<?php echo $id; ?>">


<?php
if($id){
?>








<tr> 
<td><b style='color:purple'><?php echo $fullname; ?></b></td> 
<td style='display:none'><b style='color:purple'><?php echo $email; ?></b></td> 
<td><b style='color:navy'><?php echo $cart_session; ?></b>

<button title='View Details' class="sales_css  btn_action_sales" data-bs-toggle="modal" data-bs-target="#myModal_sales" 
 data-id='<?php echo $id; ?>' data-title='<?php echo $title; ?>' data-cart_session='<?php echo $cart_session; ?>'
data-email='<?php echo $email; ?>'
data-fullname='<?php echo $fullname; ?>'
data-photo='<?php echo $photo; ?>'
data-address='<?php echo $address; ?>'
data-postal_code='<?php echo $postal_code; ?>'
data-price='<?php echo $price; ?>'
data-country='<?php echo $country; ?>'
data-product_id='<?php echo $product_id; ?>'
data-shipping_rate='<?php echo $shipping_rate; ?>'
data-qty='<?php echo $qty; ?>'
data-total_payments='<?php echo $total_amount1; ?>'
data-cart_session='<?php echo $cart_session; ?>'
data-cart_id='<?php echo $id; ?>'
data-payment_redirect_url='<?php echo $payment_redirect_url; ?>'
data-total_amount_payable='<?php echo $total_amount_payable; ?>'
data-payment_id='<?php echo $payment_id; ?>'
data-discount_split='<?php echo $discount_split; ?>'
data-discount_all='<?php echo $discount_all; ?>'
data-merchant_reference_id='<?php echo $merchant_reference_id; ?>'

>
 View Payments & Shipping Info</button>

</td> 






                  <td><img class='' style='border-style: solid; border-width:3px; border-color:#8B008B; width:50px;height:50px; 
max-width:50px;max-height:50px;border-radius: 50%;' src='uploads/<?php echo $photo; ?>' title='Image'></td> 
                  <td><?php echo $title; ?></td> 
 <td><?php echo $price; ?>(<?php echo $country_currency_code; ?>)
</td> 
                  <td><?php echo $qty; ?></td> 
<td><?php echo $shipping_rate; ?>(<?php echo $country_currency_code; ?>)</td> 
 <td><?php echo $discount_all; ?>(<?php echo $country_currency_code; ?>)</td> 
                  <td><?php echo $total_amount; ?>(<?php echo $country_currency_code; ?>)</td> 
<td><?php echo $amount_after_discount; ?>(<?php echo $country_currency_code; ?>)</td> 

<td><div class='<?php echo $colorx; ?>' > <?php echo $st; ?> </div></td> 

<?php

if($pay_status == 'ACT'){

?>
                  
                  <td>
<button title='Email Payments Reminder' class="email_css email_btn btn_action" data-bs-toggle="modal" data-bs-target="#myModal_carto" 
 data-id='<?php echo $id; ?>' data-title='<?php echo $title; ?>' data-cart_session='<?php echo $cart_session; ?>'
data-email='<?php echo $email; ?>'
data-fullname='<?php echo $fullname; ?>'
data-photo='<?php echo $photo; ?>'
data-address='<?php echo $address; ?>'
data-postal_code='<?php echo $postal_code; ?>'
data-price='<?php echo $price; ?>'
data-country='<?php echo $country; ?>'
data-product_id='<?php echo $product_id; ?>'
data-shipping_rate='<?php echo $shipping_rate; ?>'
data-qty='<?php echo $qty; ?>'
data-total_payments='<?php echo $total_amount1; ?>'
data-cart_session='<?php echo $cart_session; ?>'
data-cart_id='<?php echo $id; ?>'
data-payment_redirect_url='<?php echo $payment_redirect_url; ?>'


>
 Email Payments Completion Reminder</button>
 <div class="loader-broadcast_<?php echo $id; ?>"></div>
   <div class="result-broadcast_<?php echo $id; ?>"></div></td>

<?php
}else{
echo "<td><div style='color:green;background:;padding:10px;font-size:12px;'>Payment Completed</div></td>";

}
?>


<td><span data-livestamp='<?php echo $timing; ?>'></span></span> </td> 

              </tr>
</div>



    






<?php } ?>








                   
                </div>

            <?php
            }
            ?>


<div id="loader_posts" class="loader_posts"></div>
<div id="nomore_content_check_no"></div>
            <input type="hidden" id="row_limit" value="0">
            <input type="hidden" id="total_count" value="<?php echo $totalcount; ?>">

        </div>






</div></div>
<!--end rows-->












<!-- The Modal 2 start -->
<div class="modal fade" id="myModal_carto" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Customers Cart Payments Completion Reminders</h4>
        <button type="button" class="btn-close modal_close_btn" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body starts-->
      <div class="modal-body">



<script>



$(document).ready(function(){
$('#email_btn').click(function(){
		
var email_reminder = $('#email_reminder').val();
var product_id = $('.p_identity_value').val();

var cart_session = $('.p_cart_session_value').val();
var cart_id = $('.p_cart_id_value').val();
var email = $('.p_email_value').val();
var fullname = $('.p_fullname_value').val();
var pay_url_value = $('.pay_url_value').val();

/*
if(isNaN(discount)){

alert('Discount Must be Number.');
$('.discount_alert').html("<div class='alert alert-warning' style='color:red;'>Discount Must be Number.</div>");

return false;
}
*/
if(email_reminder==""){
alert('Email Message cannot be Empty.');
$('.reminder_alert').html("<div class='alert alert-warning' style='color:red;'>Email Message Cannot be Empty.</div>");


}


else{


$('#loader_rec').fadeIn(400).html('<br><div style="color:black;background:#ddd;padding:10px;"><img src="loader.gif" style="font-size:20px"> &nbsp;Please Wait, Payments URL Completion Reminders being sent to Customers Email.</div>');
var datasend = {pay_url_value:pay_url_value, email_reminder:email_reminder, cart_session:cart_session, product_id:product_id, cart_id:cart_id,email:email,fullname:fullname};


$.ajax({
			
			type:'POST',
			url:'payments_reminders.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){


                        $('#loader_rec').hide();
				//$('#result_rec').fadeIn('slow').prepend(msg);
$('#result_rec').html(msg);
$('#alertdata_rec').delay(7000).fadeOut('slow');
$('#alertdata_rec').delay(7000).fadeOut('slow');


			
			}
			
		});
		
		}
		
	})
					
});




</script>





<input  type="hidden" class="p_identity_value"  value="">
<input type="hidden" class="p_cart_session_value"  value="">
<input type="hidden" class="p_cart_id_value"  value="">

<input type="hidden" class="p_email_value"  value="">
<input type="hidden" class="p_fullname_value"  value="">


<div class='row'>
<div class='col-sm-12' style='background:#ddd;'>

<h4>Customers Info</h4>


<b>Name: </b><span class='p_fullname'></span><br>
<b>Email: </b><span class='p_email'></span><br>


               </div>


</div>


<br>

<h5> Send Rapyd  Payments Redirect link Email Reminders  to Customers urging them to complete their Checkout Payments</h5><br>
<b>We will email Customers Rapyd Redirect Payments url links to complete his payments......</b>



 <div class="form-group">
           
              <textarea class="col-sm-12 form-control" id="email_reminder" name="email_reminder" >Hi <?php echo $fullname; ?>, This Email is to remind you to 
kindly complete your Checkout Payments via Rapyd Redirect Payments url links send to your Email Address... </textarea>

            </div>

<div class='reminder_alert mydata_empty'></div>




 <div class="form-group">
           <b>Rapyd  Payments Redirect link</b>
              <input type='text' disabled class="col-sm-12 form-control pay_url_value" id="pay_url_value" name="pay_url_value" value="">

            </div>



<div class="form-group">
<div id="loader_rec" ></div>

<div id="result_rec" class='mydata_empty'></div>
<br />

<button type="button" id="email_btn" class="btn btn-primary" title='Send Email Reminders'>Email Payments Completion Reminder</button>
</div>



      </div>

      <!-- Modal body ends-->


      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger modal_close_btn" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



<!-- The Modal 2 Ends -->







<!-- The Modal sales start -->
<div class="modal fade" id="myModal_sales" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Customers Payments & Shipping Details</h4>
        <button type="button" class="btn-close modal_close_btn" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body starts-->
      <div class="modal-body">


<b>Payment ID: </b><span class='p_payment_idx'></span><br>
<b>Transaction ID: </b><span class='p_cart_sessionx'></span><br>
<b>Merchant Reference ID: </b><span class='p_merchant_reference_idx'></span><br>
<b>Payment Status: </b><span class='p_payment_statusx'></span><br><br>

<div class='row'>

<div class='col-sm-6'>
<div class='p_photox'></div>
</div>



<div class='col-sm-6'>
<h3><b>Title: </b><span class='p_titlex'></span></h3>
<b>Quantity: </b><span class='p_qtyx'></span><br>
<b>Price: </b><?php echo $country_currency_symbol; ?><span class='p_pricex'> </span> (<?php echo $country_currency_code; ?>)<br>

<b>Shipping Rate: </b><?php echo $country_currency_symbol; ?><span class='p_shipping_ratex'> </span> (<?php echo $country_currency_code; ?>)
<br>
<b>Discount: </b><?php echo $country_currency_symbol; ?><span class='p_discount_allx'> </span> (<?php echo $country_currency_code; ?>)
<br>
<b>Total Amount Before Discount: </b><?php echo $country_currency_symbol; ?><span class='p_total_paymentsx'> </span> (<?php echo $country_currency_code; ?>)<br>
<b>Total Amount After Discount: </b><?php echo $country_currency_symbol; ?><span class='p_total_amount_payablex'> </span> (<?php echo $country_currency_code; ?>)<br>

</div>
</div>






<div class='row'>
<div class='col-sm-6' style='background:#ddd;'>

<h4>Customers Info</h4>

<b>Customer Name: </b><span class='p_fullnamex'></span><br>
<b>Customer Email: </b><span class='p_emailx'></span><br>

               </div>





<div class='col-sm-6' style='background:#c1c1c1;'>


<h4>Shipping Details</h4>


<b>Shipping Address: </b><span class='p_addressx'></span><br>
<b>Postal Code: </b><span class='p_postal_codex'></span><br>
<b>Country: </b><span class='p_countryx'></span><br>





               </div>

</div>


<br>





      </div>

      <!-- Modal body ends-->


      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger modal_close_btn" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



<!-- The Modal sales Ends -->









        <script>

function imagePreview(e) 
{
 var readImage = new FileReader();
 readImage.onload = function()
 {
  var displayImage = document.getElementById('imageupload_preview');
  displayImage.src = readImage.result;
 }
 readImage.readAsDataURL(e.target.files[0]);
}


            $(function () {
                $('#save_btn').click(function () {
                    var title = $('#title').val();
                    var description = $('#description').val();
                    var price =$('#price').val();
                    //var total_price = $('#total_price').val();
                    var file_fname = $('#file_content').val();
                    var shipping_rate = $('#shipping_rate').val();
                    var emailaddress_pot = $('#emailaddress_pot').val();




// start if validate
if(file_fname==""){
alert('please Select Products File to Upload');
}

else if(title==""){
alert('please Enter Products Title');
}


else if(description==""){
alert('please Enter Product description');
}

else if(price==""){
alert('please Enter Product Price');
}

else if(isNaN(price)){
alert('Price Must be Number');
}

else if(shipping_rate==""){
alert('please Add Shipping Rate');
}


else if(isNaN(shipping_rate)){
alert('Shipping Rate Must be Number');
}

else{

var fname=  $('#file_content').val();
var ext = fname.split('.').pop();
//alert(ext);

// add double quotes around the variables
var fileExtention_quotes = ext;
fileExtention_quotes = "'"+fileExtention_quotes+"'";

 var allowedtypes = ["PNG", "png", "gif", "GIF", "jpeg", "JPEG", "BMP", "bmp","JPG","jpg"];
    if(allowedtypes.indexOf(ext) !== -1){
//alert('Good this is a valid Image');
}else{
alert("Please Upload a Valid image. Only Images Files are allowed");
return false;
    }

          var form_data = new FormData();
          form_data.append('file_content', $('#file_content')[0].files[0]);
          form_data.append('file_fname', file_fname);
          form_data.append('title', title);
          form_data.append('description', description);
          form_data.append('price',price);
          form_data.append('emailaddress_pot', emailaddress_pot);
          form_data.append('shipping_rate', shipping_rate);



                    $('.upload_progress').css('width', '0');
                    $('#btn').attr('disabled', 'disabled');
                    $('#loader').fadeIn(400).html('<br><span class="well" style="color:black"><img src="ajax-loader.gif">&nbsp;Please Wait, Your Data is being Submitted</span>');
                    $.ajax({
                        url: 'create_products.php',
                        data: form_data,
                        processData: false,
                        contentType: false,
                        ache: false,
                        type: 'POST',
                        xhr: function () {
                      //var xhr = new window.XMLHttpRequest();
                            var xhr = $.ajaxSettings.xhr();
                            xhr.upload.addEventListener("progress", function (event) {
                                var upload_percent = 0;
                                var upload_position = event.loaded;
                                var upload_total  = event.total;

                                if (event.lengthComputable) {
                                    var upload_percent = upload_position / upload_total;
                                    upload_percent = parseInt(upload_percent * 100);
                                  //upload_percent = Math.ceil(upload_position / upload_total * 100);
                                    $('.upload_progress').css('width', upload_percent + '%');
                                    $('.upload_progress').text(upload_percent + '%');
                                }
                            }, false);
                            return xhr;
                        },
                        success: function (msg) {
                                $('#box').val('');
				$('#loader').hide();
				$('.result_data').fadeIn('slow').prepend(msg);
				$('#alertdata_uploadfiles').delay(5000).fadeOut('slow');
                                $('#alerts_reg').delay(5000).fadeOut('slow');
                                $('#alertdata_uploadfiles2').delay(20000).fadeOut('slow');
                                $('#save_btn').removeAttr('disabled');


//strip all html elemnts using jquery
var html_stripped = jQuery(msg).text();
//alert(html_stripped);

//check occurrence of word (successfully) from backend output already html stripped.
var Frombackend = html_stripped;
var bcount = (Frombackend.match(/successfully/g) || []).length;
//alert(bcount);

if(bcount > 0){
$('#file_fname').val('');
$('#title').val('');
$('#description').val('');
$('#price').val('');
$('#shipping_rate').val('');
}




                        }
                    });
} // end if validate
                });
            });



        </script>



<style>
.upload_progress{
padding:10px;
background:green;
color:white;
cursor:pointer;
min-width:30px;
}

#imageupload_preview
{
max-height:200px;
max-width:200px;
}
</style>


<!-- The Modal products start -->
<div class="modal fade" id="myModal_products">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Products</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body starts-->
      <div class="modal-body">
      


<div class='col-sm-12' style='background:#ddd;'>

  <h2 class="text-center"><span class="contact_name_color" style='font-size:20px;color:fuchsia;font-family:comic sans ms;'>
Add New Products/Items</span></h2>
<!--start form-->
<form id="" method="post">

<div class="form-group">
<label style="">Select Product Photo: </label>
<input style="background:#c1c1c1;" class="col-sm-12 form-control" type="file" id="file_content" name="file_content" accept="image/*" onchange="imagePreview(event)" />
 <img id="imageupload_preview"/>
</div><br>


 <div class="form-group">
              <label style="" for="">
Product Title</label>
              <input type="text" class="col-sm-12 form-control" id="title" name="title" placeholder="Enter Product Title">

            </div><br>




 <div class="form-group">
              <label style="" for="">
Product Description</label>
              <textarea class="col-sm-12 form-control" id="description" name="title" placeholder="Enter Product Description"></textarea>

            </div><br>





 <div class="form-group">
              <label style="" for="">
Product Price</label>
              <input type="text" class="col-sm-12 form-control" id="price" name="price" placeholder="Enter Product Price">

            </div><br>





 <div class="form-group">
              <label style="" for="">
Products Shipping Rate</label>
              <input type="text" class="col-sm-12 form-control" id="shipping_rate" name="shipping_rate" placeholder="Enter Product Shipping Rate">

            </div><br>



<style>
.secured_pot{ display:none; } /* hide because is spam protection */
</style>
<input class="secured_pot" type="text" name="emailaddress_pot" id="emailaddress_pot" />







                    <div class="form-group">
                            <div class="upload_progress" style="width:0%">0%</div>

                        <div id="loader"></div>
                        <div class="result_data"></div>
                    </div>

                    <input type="button" id="save_btn" class="pull-right btn btn-primary" value="Add Products" />
                </form>

<!--end form-->






</div>


      </div>

      <!-- Modal body ends-->


      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



<!-- The Modal products Ends -->







    <script src="bootstrap.bundle.min.js"></script>

</body>
</html>

