<?php 
ob_start();
error_reporting(0);
session_start();
$cart_session = $_SESSION['guest_session'];


 ?>
<script>
$(document).ready(function(){

$('.notify_delete_cart_btn').click(function(){
// confirm start
 if(confirm("Are you sure you want to Delete This Cart: ")){
var id = $(this).data('id');
var rid = $(this).data('rid');


$(".loader-notify-delete-cart_"+id).fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i>&nbsp;Please Wait, Cart is being deleted...</div>');
var datasend = {'id': id, 'rid': rid};
		$.ajax({
			
			type:'POST',
			url:'cart_notify_delete.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){


	if(msg == 1){
alert('Cart Successfully Deleted');
$(".loader-notify-delete-cart_"+id).hide();



$(".result-notify-delete-cart_"+id).animate({'backgroundColor':'#fb6c6c'},300).animate({ opacity: 0.35 }, "slow");
$(".result-notify-delete-cart_"+id).slideUp('slow', function() {$(this).remove();});
//parent.slideUp('slow', function() {$(this).remove();});


// update cart info

cart_updates();
cart_updates_load();

//$(".result-notify-delete-cart_"+id).html("<div style='color:white;background:green;padding:10px;'>Cart Successfully Deleted</div>");
//setTimeout(function(){ $(".result-notify-delete-cart_"+id).html(''); }, 5000);
//location.reload();
}


	if(msg == 0){

alert('Cart could not be deleted. Please ensure you are connected to Internet.');
$(".loader-notify-delete-cart_"+id).hide();
$(".result-notify-delete-cart_"+id).html("<div style='color:white;background:red;padding:10px;'>Cart could not be deleted. Please ensure you are connected to Internet.</div>");
setTimeout(function(){ $(".result-notify-delete-cart_"+id).html(''); }, 5000);

}

}
			
});
}

// confirm ends

                });










            });









//$(document).ready(function(){

function cart_updates(){
var cart_sessionx = '<?php echo $cart_session; ?>';
$("#loader-notify_cart").fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i></div>');
var datasend = {cart_sessionx:cart_sessionx};

	
		$.ajax({
			
			type:'POST',
			url:'cart_notify_count.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

//alert(msg);

$("#loader-notify_cart").hide();
$("#result-notify_cart").html(msg);
//setTimeout(function(){ $('#result-notify_cart').html(''); }, 5000);	


			
	
}
			
		});
}
		
		

//});









//$(document).ready(function(){


function cart_updates_load(){
var cart_sessionx = '<?php echo $cart_session; ?>';


if(cart_sessionx ==''){
alert('something is wrong with Cart Session');
}


else{


$("#loader-load-cart").fadeIn(400).html('<br><div style="color:white;background:#ec5574;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i>&nbsp;Please Wait,Loading Your Carts Updates...</div>');
var datasend = {cart_sessionx:cart_sessionx};


	
		$.ajax({
			
			type:'POST',
			url:'cart_notification_load.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-load-cart").hide();
$("#result-load-cart").html(msg);
//setTimeout(function(){ $('#result-load-cart(''); }, 5000);				

//location.reload();	
}
			
		});
		
		}


//});

}







// Checkout nowPage Creation


$(document).ready(function(){

$('.checkout_now_btn').click(function(){
var discount_status = $('#discount_status').val();
alert(discount_status);
var id = $(this).data('id');
var cart_session = $(this).data('cart_session');

$(".loader-checkout_now").fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><i class="fa fa-spinner fa-spin" style="font-size:20px"></i> Creating Your Checkout Page</div>');
var datasend = {discount_status:discount_status, id:id, cart_session:cart_session};

	
		$.ajax({
			
			type:'POST',
			url:'checkout_page_create.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

//alert(msg);

$(".loader-checkout_now").hide();
$(".result-checkout_now").html(msg);
//setTimeout(function(){ $('.result-checkout_now').html(''); }, 2000);	


			
	
}
			
		});

		
		
});
});



</script>





<style>



.post-css2{
background:#ec5574;
border:none;
color:white;
padding:6px;
border-radius:20%;
}

.post-css2:hover{
background:orange;
color:black;
}




.post-css1{
background:red;
border:none;
color:white;
padding:6px;
}

.post-css1:hover{
background:orange;
color:black;
}


.post-css{
background:navy;
border:none;
color:white;
padding:6px;
text-align:center;
}

.post-css:hover{
background:orange;
color:black;
}

.notify_content_css{
display:inline-block;border-style: dashed; border-width:2px; border-color: 
orange;color:black;background:#eeeeee;padding:10px;
}


.notify_content_css:hover{
color:black;background:#ec5574;
}




.post-css-later{
background:red;
border:none;
color:white;
padding:10px;
}

.post-css-later:hover{
background:orange;
color:black;
}



.post-css-now{
background:navy;
border:none;
color:white;
padding:10px;
}

.post-css-now:hover{
background:orange;
color:black;
}
</style>




<?php

include('rapyd_settings.php');


$cart_sessionx=strip_tags($_POST['cart_sessionx']);



require('data6rst.php');

$resultx = $db->prepare('SELECT sum(total_amount) AS total FROM cart where cart_session = :cart_session order by id desc');
$resultx->execute(array(':cart_session' =>$cart_sessionx));

$v1x = $resultx->fetch();
$total_sum = $v1x['total'];

$discount = $discount_checkout;

//$total_sum_payable = $total_sum - $discount;



$result = $db->prepare('SELECT * FROM cart where cart_session = :cart_session order by id desc');
$result->execute(array(':cart_session' =>$cart_sessionx));
$nosofrows = $result->rowCount();

$discount_total = $discount * $nosofrows;
$total_sum_payable = $total_sum - $discount_total;


//echo $nosofrows;

$rec_List1 = $nosofrows;


if($rec_List1  == 0){

echo "<div style='background:red;color:white;padding:10px;border:none'>You have not added anything to your Cart Yet.</div>";
}

while($v1 = $result->fetch()){




$id = $v1['id'];
$email = $v1['email'];
$fullname = $v1['fullname'];
$address = $v1['address'];
$postal_code = $v1['postal_code'];
$country = $v1['country'];
$cart_session = $v1['cart_session'];
$price = $v1['price'];
$shipping_rate = $v1['shipping_rate'];
$total_amount = $v1['total_amount'];
$product_photo = $v1['product_photo'];
$product_title = $v1['product_title'];
$product_id = $v1['product_id'];
$qty = $v1['qty'];
$timer1 = $v1['timer1'];
$timer2 = $v1['timer2'];



?>





<div class="col-sm-12 notify_content_css result-notify-delete-cart_<?php echo $id; ?>" >
<ul class='search_results'>
<?php 
if($id != ''){
echo "success...";
?>


<div  style="color:black;padding:10px;background:#ddd">
<div class='row'>

<h5><b style='color:#800000'>Cart Text Message Complement: </b><?php echo $compliment_customers_message_cart;?> (<?php echo $fullname; ?>) </h5>

<div class='col-sm-6'>
<img style='min-height:150px;min-width:150px;max-height:150px;max-width:150px;' class='img-rounded' src='uploads/<?php echo $product_photo; ?>' alt='Items Image'>


</div>
<div class='col-sm-6'>
<h4><b>Title:</b> <?php echo $product_title; ?></h4>
<b>Price:</b> <?php echo $price; ?> (<?php echo $country_currency_code; ?>)<br>
<b>Shipping Rate:</b> <?php echo $shipping_rate; ?> (<?php echo $country_currency_code; ?>)<br>
<b>Quantity:</b> <?php echo $qty; ?><br>
<b>Total Amount:</b> <?php echo $total_amount; ?> (<?php echo $country_currency_code; ?>)<br>
<span style='color:#800000;'><b> Time: </b> <span data-livestamp="<?php echo $timer1;?>"></span></span> 


<button class='pull-right col-sm-6 post-css1 notify_delete_cart_btn' data-id='<?php echo $id; ?>' data-rid='<?php echo $cart_session; ?>' title='Delete Cart'>Delete Cart</button>
   <div class="loader-notify-delete-cart_<?php echo $id; ?>"></div>
   <div class="result-notify-delete-cart_<?php echo $id; ?>"></div>

</div>
</div>


</div>
<?php
}
?>
<div class='row'>
<div class='col-sm-6'>
<h5><b>Customer Info</b></h5>
<b>Customer Name:</b> <?php echo $fullname; ?> <br>
<b>Customer Email:</b> <?php echo $email; ?>
</div>
<div class='col-sm-6'>
<h5><b>Shipping Details</b></h5>
<b>Full Shipping Address:</b> <?php echo $address; ?> <br>
<b>Postal Code:</b> <?php echo $postal_code; ?><br> 
<b>Country:</b> <?php echo $country; ?> 

</div></div>
</ul>

</div>



<?php
}
?>

<?php

if($rec_List1  != 0){
?>

<script>

var buynow_timer = '<?php echo $buynow_timer; ?>';
function showTime(period, show) {
    var tm = period, minutes, seconds;
    var x =  setInterval(function () {

       // minutes = Math.floor(tm / 60, 10);
 minutes = parseInt(tm / 60, 10);
        minutes = minutes < 10 ? "0" + minutes : minutes;

        seconds = parseInt(tm % 60, 10);
        seconds = seconds < 10 ? "0" + seconds : seconds;

        show.text(minutes + ":" + seconds);



if (--tm < 0) {
clearInterval(x);
tm = period;
//alert('Discount Timer Expired');
$('.result_t').html("<div style='background:red;padding:6px;color:white;'><marquee>Discount Timer-Expired. Please Checkout in Full Payment</marquee></div>");
var tmx ='Timer-Expired';
$('.result_t_value').val(tmx).value;

var discount_amount = '<?php echo $discount; ?>';

var amount_call = $('.amount_call').val();
var amount_call1 = parseInt(amount_call) + parseInt(discount_amount);

$('.discount').text("0");
$('.amt').text(amount_call1);
$('.amt1').text(amount_call1);


        }else{

$('.result_t').html("<div style='background:green;padding:6px;color:white;'>Discount Timer is Still Active</div>");
var tmx ='Timer-Active';
$('.result_t_value').val(tmx).value;
}




    }, 1000);
}


$(function () {
    var distance = 60 * buynow_timer,
        show = $('#time');
    showTime(distance, show);
});



</script>

<br>
<h4 style='color:navy'>Carts Real-Time Order Summary Updates:</h4>

<?php
echo  "<br><h5 style='color:#800000'>Total Shopping Cart Created: <span class=''> $nosofrows</span>(Carts)</h5>";
echo  "<h5 style='color:#800000'>Sum Total Amount: <span class='amt'>$total_sum</span>($country_currency_code) 
<input type='hidden' class='amount_call' value='$total_sum_payable'></h5>";
echo  "<h5 style='color:#800000'>Discount per Cart: <span class='discount'> $discount</span>($country_currency_code)</h5>";
echo  "<h5 style='color:#800000'>Total Discount: <span class='discount'> $discount_total</span> ($country_currency_code) ie (<span class='discount'> $discount * $nosofrows Carts</span>)</h5>";
echo  "<h5 style='color:green'><b> Total Amount Payable Now: <span class='amt1'>$total_sum_payable</span>($country_currency_code)</b></h5>";

?>




   <div style='font-size:26px;background:black;color:white;padding:20px'>Checkout in <span style='font-size:36px;color:red;' id="time"><?php echo $buynow_timer_start; ?></span> minutes to get <?php echo $discount_total; ?>(<?php echo $country_currency_code; ?>) Total Discount.</div>
<div class='result_t'></div>
<input class='result_t_value' type='hidden' id='discount_status' value=''>
<br>



<button class='pull-left col-sm-5 post-css-now checkout_now_btn' title='Checkout Now' data-id='<?php echo $id; ?>' data-cart_session='<?php echo $cart_session; ?>'>Checkout  Now!!!</button>
   <div class="loader-checkout_now"></div>
   <div class="result-checkout_now"></div>




<button class='pull-right col-sm-5 post-css-later' data-bs-toggle="modal" data-bs-target="#myModal_saved"
 title='Save to Email & Checkout/Pay later' data-id='<?php echo $id; ?>' data-cart_session='<?php echo $cart_session; ?>'>Save to Email & Checkout/Pay later</button>
   <div class="loader-checkout_later"></div>
   <div class="result-checkout_later"></div>




<?php
}
?>


<?php
ob_flush();
?>





