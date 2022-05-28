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
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard_sales.php" title="Back to Sales Dashboard">Back to Sales Dashboard</a>
                        </li>


     <li class="nav-item">
                            <a class="nav-link" href="admin_logout.php" title="Logout">Logout</a>
                        </li>
                      
                    </ul>
                </div>
            </div>
        </nav>




<br><br><br><br><br>







<h3><center><b style='color:'>Customers Abandon Carts Tracking & Email Reminding System....</b></center></h3>
Easily track and send email reminders to Customers along with some discounts urging them to checkout their abandon carts and make Payments...

<br><br>













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

 //float: left;

width:1%;
  padding-right: 20px;

  float: right;

display: flex;
  flex-direction: column;
  justify-content: center;
//margin-right:-160px;
margin-right:-200px;

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



$res= $db->prepare("SELECT count(*) as totalcount FROM cart where cart_status='abandon'");
$res->execute(array());
$t_row = $res->fetch();
$totalcount = $t_row['totalcount'];

if($totalcount == 0){
echo "<div style='background:red;color:white;padding:10px;border:none;'>No  Abandon Cart by Your Customers Yet..<b></b></div>";
//exit();
}

$result = $db->prepare("SELECT * FROM cart where cart_status='abandon' order by id desc limit :row1, :rowpage");
$result->bindValue(':rowpage', (int) trim($rowpage), PDO::PARAM_INT);
$result->bindValue(':row1', (int) trim($limit), PDO::PARAM_INT);
//$result->bindValue(':userid', trim($userid_sess), PDO::PARAM_STR);
//$result->bindValue(':project_id', trim($projectid), PDO::PARAM_INT);
$result->execute();

$count_post = $result->rowCount();





echo '<div class="tab1_responsive">
<table style="left:0;" border="0" cellspacing="2" cellpadding="2" class="tabj tab1_responsive table table-striped_no table-bordered table-hover"> 
      <tr> 
<th> <font face="Arial">Customer<br>Name</font> </th> 
<th> <font face="Arial">Email</font> </th> 
<th> <font face="Arial">Tracking<br>ID</font> </th> 
          <th> <font face="Arial">Image</font> </th> 
          <th> <font face="Arial">Title</font> </th> 
          <th> <font face="Arial">Price</font> </th> 
          <th> <font face="Arial">Quantity</font> </th> 
          <th> <font face="Arial">Amount</font> </th> 
<th> <font face="Arial">Status</font> </th>  
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
$cart_status = $row['cart_status']; 
$total_amount1 = $row['total_amount1']; 


if($cart_status == 'abandon'){

$st = "Abandon Cart";
$colorx ="red_css";
}else{

$st = "Cart Activated";
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









                <div class='post'  id="post_<?php echo $id; ?>">


<?php
if($id){
?>








<tr> 
<td><b style='color:purple'><?php echo $fullname; ?></b></td> 
<td><b style='color:purple'><?php echo $email; ?></b></td> 
<td><b style='color:navy'><?php echo $cart_session; ?></b></td> 
                  <td><img class='' style='border-style: solid; border-width:3px; border-color:#8B008B; width:50px;height:50px; 
max-width:50px;max-height:50px;border-radius: 50%;' src='uploads/<?php echo $photo; ?>' title='Image'></td> 
                  <td><?php echo $title; ?></td> 
 <td><?php echo $price; ?>(<?php echo $country_currency_code; ?>)
</td> 
                  <td><?php echo $qty; ?></td> 
                  <td><?php echo $total_amount; ?>(<?php echo $country_currency_code; ?>)</td> 

<td><div class='<?php echo $colorx; ?>' > <?php echo $st; ?> </div></td> 

                  
                  <td>
<button title='Email Customer Reminder' class="email_css email_btn btn_action" data-bs-toggle="modal" data-bs-target="#myModal_carto" 
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

>
 Email Customer Reminder</button>
 <div class="loader-broadcast_<?php echo $id; ?>"></div>
   <div class="result-broadcast_<?php echo $id; ?>"></div></td>


<td><span data-livestamp='<?php echo $timing; ?>'></span></span> </td> 

              </tr></div>


    






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
        <h4 class="modal-title"><span class='p_title'></span></h4>
        <button type="button" class="btn-close modal_close_btn" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body starts-->
      <div class="modal-body">



<script>



$(document).ready(function(){
$('#email_btn').click(function(){
		
var email_reminder = $('#email_reminder').val();
var product_id = $('.p_identity_value').val();

var price_value = $('.p_price_value').val();
var cart_session = $('.p_cart_session_value').val();
var cart_id = $('.p_cart_id_value').val();
var email = $('.p_email_value').val();
var fullname = $('.p_fullname_value').val();
var discount = $('#discount').val();



if(isNaN(discount)){

alert('Discount Must be Number.');
$('.discount_alert').html("<div class='alert alert-warning' style='color:red;'>Discount Must be Number.</div>");

return false;
}

if(email_reminder==""){
alert('Email Message cannot be Empty.');
$('.reminder_alert').html("<div class='alert alert-warning' style='color:red;'>Email Message Cannot be Empty.</div>");


}


else if(discount==""){
alert('Discount cannot be Empty.');
//$('.reminder_alert').html("<div class='alert alert-warning' style='color:red;'>Discount Cannot be Empty.</div>");


}


else{


$('#loader_rec').fadeIn(400).html('<br><div style="color:black;background:#ddd;padding:10px;"><img src="loader.gif" style="font-size:20px"> &nbsp;Please Wait, Abandon Cart Reminder is being sent to Customers Email.</div>');
var datasend = {discount:discount,email_reminder:email_reminder, cart_session:cart_session, price:price_value, product_id:product_id, cart_id:cart_id,email:email,fullname:fullname};

	//url:'checkout_page_create_abandon_carts_reminders.php',
$.ajax({
			
			type:'POST',
			url:'checkout_abandon_email.php',
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

<div class='row'>

<div class='col-sm-6'>
<div class='p_photo'></div>
</div>


<div class='col-sm-6'>
<h3><b>Title: </b><span class='p_title'></span></h3>
<b>Quantity: </b><span class='p_qty'></span><br>
<b>Price: </b><?php echo $country_currency_symbol; ?><span class='p_price'> </span> (<?php echo $country_currency_code; ?>)<br>

<b>Shipping Rate: </b><?php echo $country_currency_symbol; ?><span class='p_shipping_rate'> </span> (<?php echo $country_currency_code; ?>)
</div>
</div>



<input  type="hidden" class="p_identity_value"  value="">
<input type="hidden" class="p_price_value"  value="">
<input type="hidden" class="p_cart_session_value"  value="">
<input type="hidden" class="p_cart_id_value"  value="">

<input type="hidden" class="p_email_value"  value="">
<input type="hidden" class="p_fullname_value"  value="">


<div class='row'>
<div class='col-sm-6' style='background:#ddd;'>

<h4>Customers Info</h4>


<b>Name: </b><span class='p_fullname'></span><br>
<b>Email: </b><span class='p_email'></span><br>


               </div>

<div class='col-sm-6' style='background:#c1c1c1;'>


<h4>Customers Shipping ADetails</h4>



<b>Shipping Full Address: </b><span class='p_address'></span><br>
<b>Postal Code: </b><span class='p_postal_code'></span><br>
<b>Country: </b><span class='p_country'></span><br>





               </div>

</div>


<br>

<h4> Send Email Checkout Payments Reminders to Customers</h4>



 <div class="form-group">
           
              <textarea class="col-sm-12 form-control" id="email_reminder" name="email_reminder" >Hi <?php echo $fullname; ?>, This Email is to remind you to 
kindly complete your Abandon Checkout and Make Payments with Link send to your Email Address... </textarea>

            </div>

<div class='reminder_alert mydata_empty'></div>





 <div class="form-group">
           <b>Discount Apply(<?php echo $discount_checkout;?> <?php echo $country_currency_code;?>)</b>
              <input type="hidden" class="col-sm-12 form-control" id="discount" name="discount" value='<?php echo $discount_checkout;?>'>

            </div>


<div class='discount_alert mydata_empty'></div><br>




<div class="form-group">
<div id="loader_rec" ></div>

<div id="result_rec" class='mydata_empty'></div>
<br />

<button type="button" id="email_btn" class="btn btn-primary" title='Send Checkout & Payments Email Reminders'>Send Email Reminder</button>
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







    <script src="bootstrap.bundle.min.js"></script>

</body>
</html>

