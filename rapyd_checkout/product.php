<?php
error_reporting(0);
include('rapyd_settings.php');



// Initialize session for tracking Customers Purchase

session_start();

//set session
if(!isset($_SESSION['guest_session']) || (trim($_SESSION['guest_session']) == '')) {

$sess_time = time();
$_SESSION['guest_session'] = $sess_time;
$cart_session = $_SESSION['guest_session'];

//echo "<script>alert('session not set');</script>";

}else{
$cart_session = $_SESSION['guest_session'];
//echo "<script>alert('session already exist');</script>";
}





$cus_email =$_SESSION['cus_email'];
$cus_fullname = $_SESSION['cus_fullname'];

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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">



    <title>Rapyd One Page Products Checkout</title>

</head>

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


<body>



 <script type="text/javascript">
  

/*
      window.addEventListener('beforeunload', function (event) {
            event.preventDefault();
            event.returnValue = '';
        });
*/

$(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() == $(document).height()) {
     //  alert("you are at bottom!");

// Display a Message when a User Scrolls to the bottom of the Page.
//$('#msg_bottom').html("<div class='bottomcorner_css' style='background:#ddd;color:black;padding:20px; width:100%;'> Remember If You have any Issue Kindly Let us know in the Contact Us Section</div>");
//$('#msg_top').html("<div class='topcorner_css' style='background:purple;color:white;padding:20px;'> Hello top</div>");

 $('#myModal_scroll_no').modal('show');



   }
});


    $(window).on('load', function() {
        $('#myModal_welcome').modal('show');
    });



    </script>




<?php
if($welcome_message_status == 1){
?>

<!-- welcome Modal start -->
<div class="modal fade" id="myModal_welcome">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Welcome <span style='color:#800000'><?php echo $cus_fullname; ?></span></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

<?php echo $welcome_message;  ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- welcome Modal ends -->
<?php
}
?>





<!-- scroll Modal start -->
<div class="modal fade" id="myModal_scroll">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Page Bottom Scroll Monitoring</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       Hi <b>Guest</b>, You Just Scroll to the Bottom of the Page.<br><br>
 In case if you have any Question, Please Contact Us in the <b>Contact Us</b> Section.  Thanks
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- scroll Modal ends -->








<?php
if($message_abandon_cart_status == 1){
?>


<!-- checkout Alert Monitoring Modal start -->
<div class="modal fade" id="myModal_checkout_notify_full">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Abandon Carts Notification Triggers(<span style='color:#800000'><?php echo $cus_fullname; ?></span>)</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
<?php echo $message_abandon_cart;  ?>
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- checkout Alert Monitoring Modal ends -->

<?php
}
?>




<!-- checkout Alert Monitoring Modal start 2-->
<div class="modal fade" id="myModal_checkout_notify_empty">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> Empty Carts Notification Triggers (<span style='color:#800000'><?php echo $cus_fullname; ?></span>)</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       Hi <b>Guest</b>, Your Cart is empty. Try Add a Products and Get Discount on the Fly...
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- checkout Alert Monitoring Modal ends 2-->



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
                     
 
                   
                        





<!--start Cart updates Notification-->

<style>

.notify_count { color: #FFF; display: block; float: right; border-radius: 12px; border: 1px solid #2E8E12; background: green; padding: 2px 6px;font-size:14px; }
.notify_count1 { color:#FFF; display: block; float: right; border-radius: 12px; border: 1px solid #2E8E12; background: purple; padding: 2px 6px;font-size:14px; }





@media screen and (max-width: 768px) {
  .e_d{
  width: 80%;
  }
}



@media screen and (max-width: 600px) {
  .e_d{
  width: 80%;
  }
}



@media screen and (max-width: 400px) {
  .e_d{
  width: 80%;
  }
}


@media screen and (max-width: 300px) {
  .e_d{
  width: 80%;
  }
}

</style>




<script>



$(document).ready(function(){



// stopt all bootstrap drop down menu from closing on click inside
/*
$(document).on('click', '.dropdown-menu', function (e) {
  e.stopPropagation();
});
*/


$('.dropdown-menu').on("click.bs.dropdown", function (e) {
    e.stopPropagation();
    e.preventDefault();                
});



// check if cart is empty on closing dropdown menu. I implement the id at cart_notification_load.php
$('.dropdown-toggle').on("hide.bs.dropdown", function () {
   //alert('Dropdown Menu is closed');  
 if($(".search_results").children().length<=0){
 // alert('Your Cart is empty. Try Add a Products and Get Discount on the Fly...');
 $('#myModal_checkout_notify_empty').modal('show');
   }else{
//alert('You have a Cart to Checkout. Please Checkout Now to Get a Discount...');
 $('#myModal_checkout_notify_full').modal('show');
}







          
});




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

$("#loader-notify_cart").hide();
$("#result-notify_cart").html(msg);
//setTimeout(function(){ $('#result-notify_cart').html(''); }, 5000);	


			
	
}
			
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



</script>



<li>
<span style='color:green;font-size:30px' class="dropdown fa fa-shopping-cart">
  <a style="color:white;font-size:14px;cursor:pointer;" title='Shopping Carts Notification Updates' class="btn1 btn-default1 dropdown-toggle"  data-bs-toggle="dropdown">
  <span class="notify_count"><span id="loader-notify_cart"></span><span id="result-notify_cart"></span></span>
</a>

<ul class="dropdown-menu e_d" style='width:700px;height: 500px;overflow-y : scroll; background:#ccc;'>
<h4 style='color:blue;'>Shopping Carts Notification Updates</h4>




<script>

$(document).ready(function(){


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


});






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




</script>



<!-- form START-->
<div id="loader-load-cart"></div>
<div id="result-load-cart"></div>


<!--form ENDS-->



<p></p>
//

<br><br><br><br>

</ul></span>
&nbsp;&nbsp;
</li>


<!--end Carts Updates notifications-->


     <li class="nav-item">
                            <a class="nav-link" href="dashboard_customer.php" title="Logout">My Dashboard</a>
                        </li>

     <li class="nav-item">
                            <a class="nav-link" href="customer_logout.php" title="Logout">Logout</a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>


<br><br><br>






<br><br>


<h3>Welcome Customer: <b style='color:#800000;'><?php echo $cus_fullname; ?></b></h3>


<h2 style='display:none;'><center>Introducing Single Page Carts Checkout Powered by Rapyd & Guest Checkout. </center></h2>





    
    



<?php
$product_id =strip_tags($_GET['id']);
include('data6rst.php');
$result = $db->prepare('SELECT * FROM products where timer1=:timer1');
$result->execute(array(':timer1' =>$product_id));



$nosofrows = $result->rowCount();



if($nosofrows == 0){
echo "<br><br><br><br><div style='background:red;color:white;padding:10px;'>This Products does not Exist</div>";
//exit();
}



while($row = $result->fetch()){

                $id= $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $timing = $row['timer1'];
                $created_time = $row['created_time'];
                $price = $row['price'];
                $photo = $row['photo'];
                $shipping_rate = $row['shipping_rate'];

		$total_payments = $price + $shipping_rate;
 
                

   // }





            ?>
            
            
             <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-md mb-4">
               

<img class='img-thumbnail border-0' style='width:450px;height:350px; 
max-width:450px;max-height:350px;' src='uploads/<?php echo $photo; ?>' title='Image'>

                </div>
                <div class="col-md">
                    <h2><?php echo $title;?></h2>
                    <h2 style="color: #F7785A">$<?php echo $price;?> (SGD)</h2>
                    <p><?php echo $description;?></p>
                    <div class="alert alert-warning" role="alert">
                        Shipping Rate: $<?php echo $shipping_rate;?> (SGD)
                    </div>

 <div style='display:none' class="alert alert-info" role="alert">
                        Total Amount Payable:  $<?php echo $total_payments;?> (SGD)
                    </div>





<button style='display:none;' title="Buy Now" data-bs-toggle="modal" data-bs-target="#myModal_buy" class="btn btn-lg btn-custom btn_action_buy" 
data-id="<?php echo $id; ?>" data-photo="<?php echo $photo; ?>" data-title="<?php echo $title; ?>" data-price="<?php echo $price; ?>" 
data-total_payments="<?php echo $total_payments; ?>"  data-description="<?php echo $description; ?>" data-identity="<?php echo $timing; ?>"  data-shipping_rate="<?php echo $shipping_rate; ?>">
Buy Now</button>



	
	<button title="Buy Now" data-bs-toggle="modal" data-bs-target="#myModal_buy" class="btn col-sm-5 guest_css  btn_action_buy" 
data-id="<?php echo $id; ?>" data-photo="<?php echo $photo; ?>" data-title="<?php echo $title; ?>" data-price="<?php echo $price; ?>" 
data-total_payments="<?php echo $total_payments; ?>"  data-description="<?php echo $description; ?>" data-identity="<?php echo $timing; ?>"  data-shipping_rate="<?php echo $shipping_rate; ?>">
	    Buy Now
	    </button>


    
   

           
                </div>
            </div>
        </div>

<?php } ?>


            
            
            
                


<h3><center>Other Products You May Like</center></h3>


<?php
$product_id =strip_tags($_GET['id']);
include('data6rst.php');
$result = $db->prepare('SELECT * FROM products where timer1 !=:timer1');
$result->execute(array(':timer1' =>$product_id));



$nosofrows = $result->rowCount();



if($nosofrows == 0){
echo "<br><br><br><br><div style='background:red;color:white;padding:10px;'>This Products does not Exist</div>";
//exit();
}



while($row = $result->fetch()){

                $id= $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $timing = $row['timer1'];
                $created_time = $row['created_time'];
                $price = $row['price'];
                $photo = $row['photo'];
                $shipping_rate = $row['shipping_rate'];

		$total_payments = $price + $shipping_rate;
 
                

   // }





            ?>
            
            






                

<script>
$(document).ready(function(){
$('.btn_action_buy').click(function(){
//$(document).on( 'click', '.btn_action_buy', function(){ 






var id = $(this).data('id');
var title = $(this).data('title');
var identity = $(this).data('identity');
var photo = $(this).data('photo');
var price = $(this).data('price');

var description = $(this).data('description');
var total_payments = $(this).data('total_payments');
var shipping_rate = $(this).data('shipping_rate');



//alert(id);
//alert(title);
//alert(identity);





var image = "<span>" +
"<img src='uploads/" + photo +"'  style='width:100px;max-width:100px;height:100px;max-height:100px;border-style: solid; border-width:3px; border-color: orange;'>" +
 "</span>";

$('.p_photo').html(image);
$('.p_description').html(description);
$('.p_title').html(title);
$('.p_identity').html(identity);
$('.p_price').html(price);
$('.total_payments').html(total_payments);
$('.p_shipping_rate').html(shipping_rate);



$('.p_identity_value').val(identity).value;
$('.p_price_value').val(price).value;

$('.p_shipping_value').val(shipping_rate).value;

});

});



$(document).ready(function(){


$('select').on('change', function() {

var qty = $('#qty').val();
var price_value = $('.p_price_value').val();
var shipping_value = $('.p_shipping_value').val();
//alert( this.value );

var total_pro = price_value * qty;
var total_pro2 = parseInt(total_pro) + parseInt(shipping_value);
var c_code = "<?php echo $country_currency_code; ?>";

$('.sum_total').html("<div class='alert alert-info' style=''><b><h4>Items Upfront Real-Time Payment Calculator Summary</h4>Product Quantity: </b>" + qty +"<br><b>Price: </b>" + price_value +" (" + c_code +")<br><b>Shipping Rate: </b>" + shipping_value +" (" + c_code +")<br><b>Total Amount Payable:</b> " + total_pro2 +" (" + c_code +")</div>");

});


});




// clear Modal div content on modal closef closed
$(document).ready(function(){

/*
$('.modal_close_btn').click(function(){
//alert('Modal Closed');
   $('.mydata_empty').empty(); 
$('#qty').val(''); 
 console.log("modal closed and content cleared");
//alert('closed');

 });
*/


$("#myModal_buy").on("hidden.bs.modal", function(){
    //$(".modal-body").html("");
 $('.mydata_empty').empty(); 
$('#qty').val(''); 
});



});





</script>

<style>
    
  .guest_css{
      background:navy;
      color:white;
      padding:20px;
      border:none;
      border-radius:20%;
      cursor:pointer;
      width:40%;
  }  
 
.guest_css:hover{
 color: black;
 background-color: orange;
cursor:pointer;
 //width:45%;
}  

.loginx_css{
      background:green;
      color:white;
      padding:20px;
      border:none;
      border-radius:20%;
      cursor:pointer;
      width:40%;
  }  
 
.loginx_css:hover{
    cursor:pointer;
 color: black;
 background-color: orange;

 //width:50%;
}  
</style>
        <div class="container">
            <div class="row justify-content-center my-5">
                <div class="col-md mb-4">
               

<img class='img-thumbnail border-0' style='width:450px;height:350px; 
max-width:450px;max-height:350px;' src='uploads/<?php echo $photo; ?>' title='Image'>

                </div>
                <div class="col-md">
                    <h2><?php echo $title;?></h2>
                    <h2 style="color: #F7785A">$<?php echo $price;?> (SGD)</h2>
                    <p><?php echo $description;?></p>
                    <div class="alert alert-warning" role="alert">
                        Shipping Rate : $<?php echo $shipping_rate;?> (SGD)
                    </div>

 <div style='display:none' class="alert alert-info" role="alert">
                        Total Amount Payable:  $<?php echo $total_payments;?> (SGD)
                    </div>





<button style='display:none;' title="Buy Now" data-bs-toggle="modal" data-bs-target="#myModal_buy" class="btn btn-lg btn-custom btn_action_buy" 
data-id="<?php echo $id; ?>" data-photo="<?php echo $photo; ?>" data-title="<?php echo $title; ?>" data-price="<?php echo $price; ?>" 
data-total_payments="<?php echo $total_payments; ?>"  data-description="<?php echo $description; ?>" data-identity="<?php echo $timing; ?>"  data-shipping_rate="<?php echo $shipping_rate; ?>">
Buy Now</button>



	
	<button title="Buy Now" data-bs-toggle="modal" data-bs-target="#myModal_buy" class="btn col-sm-5 guest_css  btn_action_buy" 
data-id="<?php echo $id; ?>" data-photo="<?php echo $photo; ?>" data-title="<?php echo $title; ?>" data-price="<?php echo $price; ?>" 
data-total_payments="<?php echo $total_payments; ?>"  data-description="<?php echo $description; ?>" data-identity="<?php echo $timing; ?>"  data-shipping_rate="<?php echo $shipping_rate; ?>">
	    Buy Now
	    </button>


    
   

           
                </div>
            </div>
        </div>

<?php } ?>


        <div class="container">
            <div class="row justify-content-center text-center border-top py-2">
                <span>&copy;2022. Rapyd Single Page Checkout Toolkit Integration Demo.</span>
            </div>
        </div>
    </div>

    <script src="bootstrap.bundle.min.js"></script>

</body>
</html>




<!-- The Modal 2 start -->
<div class="modal fade" id="myModal_buy" >
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


// Add item to Carts


$(document).ready(function(){
$('#cart_btn').click(function(){
		
var qty = $('#qty').val();
var email = $('#email').val();
var fullname = $('#fullname').val();
var address = $('#address').val();
var postal_code = $('#postal_code').val();
var country = $('#country_selector').val();

//alert(country);

var product_id = $('.p_identity_value').val();

var price_value = $('.p_price_value').val();
var shipping_value = $('.p_shipping_value').val();
//alert( this.value );

var total_pro = price_value * qty;
var total_pro2 = total_pro + shipping_value;

var cart_session = '<?php echo $cart_session; ?>';



if(qty==""){
//alert('Product Qunatity cannot be Empty.');
$('.qty_alert').html("<div class='alert alert-warning' style='color:red;'>Product Quantity Cannot be Empty.</div>");


}

else if(email==""){
//alert('Customer Email Cannot be Empty');
$('.email_alert').html("<div class='alert alert-warning' style='color:red;'>Customer Email Cannot be Empty.</div>");

}


else if(fullname==""){
//alert('Customer Name Cannot be Empty');
$('.fullname_alert').html("<div class='alert alert-warning' style='color:red;'>Customer Name Cannot be Empty.</div>");
}


else if(address==""){
//alert('please Enter Your Shipping Address');
$('.address_alert').html("<div class='alert alert-warning' style='color:red;'>please Enter Your Shipping Address.</div>");
}

else if(postal_code==""){
//alert('please Enter Postal Code');
$('.postal_code_alert').html("<div class='alert alert-warning' style='color:red;'>please Enter Postal Code.</div>");
}


else if(country==""){
//alert('country name cannot be empty');
$('.country_alert').html("<div class='alert alert-warning' style='color:red;'>country name cannot be empty.</div>");
}




else{


$('#loader_rec').fadeIn(400).html('<br><div style="color:black;background:#ddd;padding:10px;"><img src="loader.gif" style="font-size:20px"> &nbsp;Please Wait, updating your Shopping Cart...</div>');
var datasend = {qty:qty, email:email, fullname:fullname, address:address, postal_code:postal_code, country:country, cart_session:cart_session, price_value:price_value, product_id:product_id};


$.ajax({
			
			type:'POST',
			url:'cart.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){


                        $('#loader_rec').hide();
				//$('#result_rec').fadeIn('slow').prepend(msg);
$('#result_rec').html(msg);
$('#alertdata_rec').delay(7000).fadeOut('slow');
$('#alertdata_rec').delay(7000).fadeOut('slow');

//update Cart count data
cart_updates();

cart_updates_load();
			
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
<b>Description: </b><span class='p_description'></span><br>
<b>Price: </b><?php echo $country_currency_symbol; ?><span class='p_price'> </span> (<?php echo $country_currency_code; ?>)<br>

<b>Shipping Rate: </b><?php echo $country_currency_symbol; ?><span class='p_shipping_rate'> </span> (<?php echo $country_currency_code; ?>)
</div>
</div>



<input  type="hidden" class="p_identity_value"  value="">
<input type="hidden" class="p_price_value"  value="">
<input type="hidden" class="p_shipping_value"  value="">



 <div class="form-group">
              <b>
Select Quantity of Products to Purchase</b>
<select class="qty col-sm-12 form-control" id="qty" name="qty" >
 <option value="">---Select Product Quantity</option>
    <option value="1">1</option>
    <option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
  </div>

<div class='qty_alert mydata_empty'></div>
<br>

<div class='sum_total mydata_empty'></div>

<div class='row'>
<div class='col-sm-6' style='background:#ddd;'>

<h4>Customers Info</h4>

 <div class="form-group">
              <label style="" for="">
Name</label>
              <input type="text" class="col-sm-12 form-control" id="fullname" name="fullname" value='<?php echo $cus_fullname; ?>' placeholder="Enter Fullname">

            </div>

<div class='fullname_alert mydata_empty'></div><br>

 <div class="form-group">
              <label style="" for="">
Email</label>
              <input type="text" class="col-sm-12 form-control" id="email" name="email" value='<?php echo $cus_email; ?>' placeholder="Enter Email">

            </div>
<div class='email_alert mydata_empty'></div><br>




               </div>

<div class='col-sm-6' style='background:#c1c1c1;'>


<h4>Customers Shipping Details</h4>
Please Enter <b>N/A</b> if you do not want to provide Shipping Details.<br><br>

 <div class="form-group">
              <label style="" for="">
Full Shipping Address/Locations</label> Eg.<b>(Broadway 10012, New York, NY, USA)</b>
              <input type="text" class="col-sm-12 form-control address" id="address" name="address" placeholder="Enter Full Shipping Address">

            </div>
<div class='address_alert mydata_empty'></div><br>



 <div class="form-group">
              <label style="" for="">
Postal Code</label>
              <input type="text" class="col-sm-12 form-control" id="postal_code" name="postal_code" placeholder="Enter Postal Code">

            </div>
<div class='postal_code_alert mydata_empty'></div><br>


	
	<!-- country form starts -->
<link rel="stylesheet" href="build/css/countrySelect.css">
		<link rel="stylesheet" href="build/css/demov.css">

	 <label style="" for="">
Country</label>
			<div class="form-item">
				<input id="country_selector" type="text" class='col-sm-12 form-control'>
				<label for="country_selector" style="display:none;">Select a country here...</label>
			</div>
			<div class="form-item" style="display:none;">
				<input class='col-sm-12 form-control' type="text" id="country_selector_code" name="country_selector_code" data-countrycodeinput="1" readonly="readonly" placeholder="Selected country code will appear here" />
				<label for="country_selector_code">...and the selected country code will be updated here</label>
			</div>
	

	
		<script src="build/js/countrySelect.js"></script>
		<script>
			$("#country_selector").countrySelect({
				// defaultCountry: "jp",
				// onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
				// responsiveDropdown: true,
				preferredCountries: ['ca', 'gb', 'us']
			});
		</script>

		
<!-- country form ends -->



 <div style='display:none' class="form-group">
              <label style="" for="">
Country Name</label>
              <input type='text' class="col-sm-12 form-control" id="country" name="country" placeholder="Enter Country Name" value="USA">

            </div>
<div class='country_alert mydata_empty'></div><br>







               </div>

</div>


<br>

<div class="form-group">
<div id="loader_rec" ></div>

<div id="result_rec" class='mydata_empty'></div>
<br />

<button type="button" id="cart_btn" class="btn btn-primary" title='Add to Cart'>Add to Cart</button>
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







<!-- The Modal saved start -->
<div class="modal fade" id="myModal_saved" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Saved Checkout to Email and Make Payments Later System</span></h4>
        <button type="button" class="btn-close modal_close_btn" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body starts-->
      <div class="modal-body">

We will save and send your Checkout Links to your Email so that you can make payments later or anytime any day.<br>

<b>Please Tell us your reason for saving Your Carts and choosing to  make Payment Later</b>.<br>
<span style="color:red"> Do you forget your Credit Cards or Are you not okay with our Products? etc.</span>

<script>




$(document).ready(function(){
$('#checkout_later_btn').click(function(){
		
var reason_checkout = $('#reason_checkout').val();
var discount_status = $('#discount_status').val();
var cart_session = '<?php echo $cart_session; ?>';

//alert(discount_status);



if(reason_checkout==""){
alert('What are Your Reason for choosing to Checkout and making payments Later.');
$('.reason_checkout_alert').html("<div class='alert alert-warning' style='color:red;'>What are Your Reason for choosing to Checkout and making payments Later.</div>");


}




else{


$('#loader_check').fadeIn(400).html('<br><div style="color:black;background:#ddd;padding:10px;"><img src="loader.gif" style="font-size:20px"> &nbsp;Please Wait, Your Carts is being Saved and Sent to your Email...</div>');
var datasend = {reason_checkout:reason_checkout, discount_status:discount_status, cart_session:cart_session};


$.ajax({
			
			type:'POST',
			url:'checkout_page_create_later.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){


                        $('#loader_check').hide();
				//$('#result_check').fadeIn('slow').prepend(msg);
$('#result_check').html(msg);
$('#alertdata_check').delay(7000).fadeOut('slow');
$('#alertdata_check').delay(7000).fadeOut('slow');

//update Cart count data
cart_updates();

cart_updates_load();
			
			}
			
		});
		
		}
		
	})
					
});




</script>



<div class='col-sm-12' style='background:#c1c1c1;'>
<br>

 <div class="form-group">
              <label style="" for="">
Feedback/Reason For checking out & making Payments Later </label>
              <textarea class="col-sm-12 form-control reason_checkout" id="reason_checkout" name="reason_checkout" placeholder=""></textarea>

            </div>
<div class='reason_checkout_alert mydata_empty'></div><br>



</div>


<br>

<div class="form-group">
<div id="loader_check" ></div>

<div id="result_check" class='mydata_empty'></div>
<br />

<button type="button" id="checkout_later_btn" class="btn btn-primary" title='Save & Chectout Later'>Save to Email Now</button>
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



<!-- The Modal saved Ends -->





<script>



//Admin signup starts

$(document).ready(function(){
$('#signup_btn_admin').click(function () {

var username  = $('#admin_username_s').val();
var password = $('#admin_password_s').val();
var fullname = $('#admin_fullname_s').val();

//alert(username);

 if(fullname==""){
alert('please Enter Admin Fullname');
}


 else if(username==""){
alert('please Enter Admin Username');
}

else if(password==""){
alert('please Enter Admin Password');
}




else{


$("#loader-signup_admin").fadeIn(400).html('<br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Your data is being Created...</div>');
var datasend = {username:username, password:password, fullname:fullname};


	
		$.ajax({
			
			type:'POST',
			url:'admin_signup.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-signup_admin").hide();
$("#result-signup_admin").html(msg);
setTimeout(function(){ $("#result-signup_admin").html(''); }, 5000);


// clear all customers Data
//$('#emailxy').val('');		
//$('#passwordxy').val('');	


	
}
			
		});
		
		}

});

});

// Admin signup ends


//Admin login starts

$(document).ready(function(){
$('#login_btn_admin').click(function () {

var username  = $('#admin_username').val();
var password = $('#admin_password').val();





 if(username==""){
alert('please Enter Admin Username');
}

else if(password==""){
alert('please Enter Admin Password');
}




else{


$("#loader-login_admin").fadeIn(400).html('<br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Your are being login as Admin...</div>');
var datasend = {username:username, password:password};


	
		$.ajax({
			
			type:'POST',
			url:'admin_login.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-login_admin").hide();
$("#result-login_admin").html(msg);
setTimeout(function(){ $("#result-login_admin").html(''); }, 5000);


// clear all customers Data
//$('#emailxy').val('');		
//$('#passwordxy').val('');	


	
}
			
		});
		
		}

});

});

// Admin login ends
</script>


<!-- Admin login Modal start -->
<div class="modal fade" id="myModal_signup_admin">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Admin Signup System</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
 
Admin Signup System....<br><br>
 <div class="form-group">
              <label>Admin Fullname:  <b>rapyd</b></label>
              <input type="text" class="col-sm-12 form-control" id="admin_fullname_s" name="admin_fullname_s"  value="rapyd">
            </div>

 <div class="form-group">
              <label>Admin Username:  <b>rapyd</b></label>
              <input type="text" class="col-sm-12 form-control" id="admin_username_s" name="admin_username_s"  value="rapyd">
            </div>
 
 <div class="form-group">
              <label>Password: <b>rapyd</b></label>
              <input type="password" class="col-sm-12 form-control" id="admin_password_s" name="admin_password_s"  value="rapyd">
            </div>

<br>
<div id="loader-signup_admin"></div>
<div id="result-signup_admin"></div>


                    <input type="button" id="signup_btn_admin" class="btn btn-primary" value="Signup as Admin Now!" />



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Admin signup Modal ends -->


<!-- Admin login Modal start -->
<div class="modal fade" id="myModal_login_admin">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Admin Login System</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
 
Easily Login, Add Items/Products and Manage your Customers Carts, Checkouts, Sales and Payments as admin.....<br><br>

 <div class="form-group">
              <label>Admin Userame:  <b>rapyd</b></label>
              <input type="text" class="col-sm-12 form-control" id="admin_username" name="admin_username"  value="rapyd">
            </div>
 
 <div class="form-group">
              <label>Password: <b>rapyd</b></label>
              <input type="password" class="col-sm-12 form-control" id="admin_password" name="admin_password"  value="rapyd">
            </div>

<br>
<div id="loader-login_admin"></div>
<div id="result-login_admin"></div>


                    <input type="button" id="login_btn_admin" class="btn btn-primary" value="Login as Admin Now!" />



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Admin login Modal ends -->




<script>

// customer signup starts

$(document).ready(function(){
$('#signup_btn').click(function () {

var email  = $('#emailxy_cus').val();
var password = $('#passwordxy_cus').val();
var fullname = $('#fullnamexy_cus').val();

//preparing Email for validations
                    var atemail = email.indexOf("@");
                    var dotemail = email.lastIndexOf(".");





 if(fullname==""){
alert('please Enter Customer Fullname');
}

 else if(email==""){
alert('please Enter Email Address');
}

else  if (atemail < 1 || ( dotemail - atemail < 2 )){
alert("Please enter valid email Address")
}

else if(password==""){
alert('please Enter Password');
}




else{


$("#loader-signup").fadeIn(400).html('<br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Your are being created...</div>');
var datasend = {email:email, password:password, fullname:fullname};


	
		$.ajax({
			
			type:'POST',
			url:'customer_signup.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-signup").hide();
$("#result-signup").html(msg);
setTimeout(function(){ $("#result-signup").html(''); }, 5000);


// clear all customers Data
$('#emailxy_cus').val('');		
$('#passwordxy_cus').val('');	


	
}
			
		});
		
		}

});

});

// customer signup  ends


//customer login starts

$(document).ready(function(){
$('#login_btn').click(function () {

var email  = $('#emailxy').val();
var password = $('#passwordxy').val();

//preparing Email for validations
                    var atemail = email.indexOf("@");
                    var dotemail = email.lastIndexOf(".");





 if(email==""){
alert('please Enter Email Address');
}

else  if (atemail < 1 || ( dotemail - atemail < 2 )){
alert("Please enter valid email Address")
}

else if(password==""){
alert('please Enter Password');
}




else{


$("#loader-login").fadeIn(400).html('<br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Your are being login...</div>');
var datasend = {email:email, password:password};


	
		$.ajax({
			
			type:'POST',
			url:'customer_login.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-login").hide();
$("#result-login").html(msg);
setTimeout(function(){ $("#result-login").html(''); }, 5000);


// clear all customers Data
$('#emailxy').val('');		
$('#passwordxy').val('');	


	
}
			
		});
		
		}

});

});

// login ends

</script>




<!--  customer signup Modal start -->
<div class="modal fade" id="myModal_signup_customer">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Customers Signup System</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      Customer Signup Form<br><br>

 <div class="form-group">
              <label>Fullname</label>
              <input type="text" class="col-sm-12 form-control" id="fullnamexy_cus" name="fullnamexy_cus" placeholder="Enter email" value="">
            </div>

 <div class="form-group">
              <label>Email</label>
              <input type="text" class="col-sm-12 form-control" id="emailxy_cus" name="emailxy_cus" placeholder="Enter email" value="">
            </div>
            
 
 <div class="form-group">
              <label>Password</label>
              <input type="password_cus" class="col-sm-12 form-control" id="passwordxy_cus" name="passwordxy_cus" placeholder="Enter Password" value="">
            </div>

<br>
<div id="loader-signup"></div>
<div id="result-signup"></div>


                    <input type="button" id="signup_btn" class="btn btn-primary" value="Signup as Customer Now!" />



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- customer signup Modal ends -->



<!--  customer login Modal start -->
<div class="modal fade" id="myModal_login_customer">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Customers Login System</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       If you have not signup as Buyer/Customer before, dont worry as the application will allow you to signup once your are done 
with your purchase and payments....<br>

<b>Already have an account with us before. Please Login Below to View your Purchase</b><br><br>


 <div class="form-group">
              <label>Email</label>
              <input type="text" class="col-sm-12 form-control" id="emailxy" name="emailxy" placeholder="Enter email" value="">
            </div>
 
 <div class="form-group">
              <label>Password</label>
              <input type="password" class="col-sm-12 form-control" id="passwordxy" name="passwordxy" placeholder="Enter Password" value="">
            </div>

<br>
<div id="loader-login"></div>
<div id="result-login"></div>


                    <input type="button" id="login_btn" class="btn btn-primary" value="Login as Customer Now!" />



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- customer login Modal ends -->









<!-- Contact Modal start -->
<div class="modal fade" id="myModal_contact">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Contact Us</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
 
Sites Contacts Informations Goes here<br><br>





      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- contact Modal ends -->








<!-- about Modal start -->
<div class="modal fade" id="myModal_about">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">About Us</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
 
About Us Informations Goes here<br><br>





      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- about Modal ends -->





<script>
$(document).ready(function(){
$('.btn_action_buy_login').click(function(){
//$(document).on( 'click', '.btn_action_buy', function(){ 



var id = $(this).data('id');
var title = $(this).data('title');
var identity = $(this).data('identity');
var photo = $(this).data('photo');




var image = "<span>" +
"<img src='uploads/" + photo +"'  style='width:100px;max-width:100px;height:100px;max-height:100px;border-style: solid; border-width:3px; border-color: orange;'>" +
 "</span>";

$('.p_photot').html(image);
$('.p_titlet').html(title);
$('.p_identityt').html(identity);



$('.p_identity_valuet').val(identity).value;
$('.p_id_valuet').val(id).value;


});

});






//customer login starts

$(document).ready(function(){
$('#login_btn_buy').click(function () {

var email  = $('#emailxy_buy').val();
var password = $('#passwordxy_buy').val();
var product_id = $('.p_identity_valuet').val();

//preparing Email for validations
                    var atemail = email.indexOf("@");
                    var dotemail = email.lastIndexOf(".");


//alert(product_id);


 if(email==""){
alert('please Enter Email Address');
}

else  if (atemail < 1 || ( dotemail - atemail < 2 )){
alert("Please enter valid email Address")
}

else if(password==""){
alert('please Enter Password');
}




else{


$("#loader-login_buy").fadeIn(400).html('<br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Your are being login...</div>');
var datasend = {email:email, password:password, product_id:product_id};


	
		$.ajax({
			
			type:'POST',
			url:'customer_login_buy.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-login_buy").hide();
$("#result-login_buy").html(msg);
setTimeout(function(){ $("#result-login_buy").html(''); }, 5000);


// clear all customers Data
$('#emailxy_buy').val('');		
$('#passwordxy_buy').val('');	


	
}
			
		});
		
		}

});

});

// login buy ends
</script>



<!--  customer buy login Modal start -->
<div class="modal fade" id="myModal_buy_login">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Login To Buy this Item</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>





      <!-- Modal body -->
      <div class="modal-body">
        Already have Customers Account,  Login to Purchase this Item:<br><br>
          
          <b>Product Photo: </b><span class='p_photot'></span><br>
          <b>Product Title: </b><span class='p_titlet'></span><br>
     <br><br>


 <div class="form-group">
              <label>Email</label>
              <input type="text" class="col-sm-12 form-control" id="emailxy_buy" name="emailxy_buy" placeholder="Enter email" value="">
            </div>
 
 <div class="form-group">
              <label>Password</label>
              <input type="password" class="col-sm-12 form-control" id="passwordxy_buy" name="passwordxy_buy" placeholder="Enter Password" value="">
            </div>

<input type="hidden" class="col-sm-12 form-control p_identity_valuet" id="p_identity_valuet" value="">
<br>
<div id="loader-login_buy"></div>
<div id="result-login_buy"></div>


                    <input type="button" id="login_btn_buy" class="btn btn-primary" value="Login to Buy Item!" />



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- customer buy login Modal ends -->





