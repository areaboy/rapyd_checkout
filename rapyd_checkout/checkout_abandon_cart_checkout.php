<?php
error_reporting(0);
//include('rapyd_settings.php');


$cart_id =  strip_tags($_GET['cart_id']);
//$cart_sess =  strip_tags($_GET['cart_session']);

// Initialize session for tracking Customers Purchase

session_start();
$_SESSION['guest_session']= $cart_id;

$cart_session = $_SESSION['guest_session'];

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
                            <a class="nav-link" href="index.php">Shop</a>
                        </li>
                      
                    </ul>
                </div>
            </div>
        </nav>




<br><br><br><br><br>




<h3><center>Your Abandon Shopping Cart Payments System</center></h3>

<?php



if($cart_id ==''){


echo "<div style='background:red;color:white;padding:10px;border:none'>Error:  Direct Page Access Not Allowed...</div>";
exit();

}

?>

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
			url:'checkout_load.php',
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


</script>


<!-- form START-->
<div id="loader-load-cart"></div>
<div id="result-load-cart"></div>



<div id="loader-payment"></div>

<!--form ENDS-->



   


<script>
// Checkout nowPage Creation


$(document).ready(function(){

$('.checkout_now_btnx').click(function(){
var discount_status = 'Timer-Active';
//alert(discount_status);
var id = $(this).data('id');
var cart_session = $(this).data('cart_session');

//alert(id);
//alert(cart_session);


$(".loader-checkout_nowx").fadeIn(400).html('<br><div style="color:black;background:white;padding:10px;"><img src="loader.gif"> Creating Your Checkout Page</div>');
var datasend = {discount_status:discount_status, id:id, cart_session:cart_session};

	
		$.ajax({
			
			type:'POST',
			url:'checkout_page_create_abandon.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

//alert(msg);

$(".loader-checkout_nowx").hide();
$(".result-checkout_nowx").html(msg);
//setTimeout(function(){ $('.result-checkout_nowx').html(''); }, 2000);	


			
	
}
			
		});

		
		
});
});



</script>


<style>
    
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

<br>
<center>
<button class=' col-sm-5 post-css-now checkout_now_btnx' title='Checkout Now' data-id='1' data-cart_session='<?php echo $cart_session; ?>'>Checkout  Now!!!</button>
   <div class="loader-checkout_nowx"></div>
   <div class="result-checkout_nowx"></div>

</center>
<br><br><br><br>
   

    <script src="bootstrap.bundle.min.js"></script>

</body>
</html>