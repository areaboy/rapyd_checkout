<?php
error_reporting(0);
include('rapyd_settings.php');

// Initialize session for tracking Customers Purchase

session_start();
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







<h3><center><b style='color:red'>Your Payments Failed.</b></center></h3>

Hi <b><?php echo $_SESSION['fullname_session']; ?> </b>  <?php echo $failed_payments_message; ?><br>


<script>

$(document).ready(function(){


var cart_sessionx = '<?php echo $cart_session; ?>';
/*
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
*/
});


</script>


<!-- form START-->
<div id="loader-load-cart"></div>
<div id="result-load-cart"></div>




<!--form ENDS-->



            <?php


include('data6rst.php');

$result = $db->prepare('SELECT * FROM sales where cart_session = :cart_session order by id desc');
$result->execute(array(':cart_session' =>$cart_session));
$nosofrows = $result->rowCount();

$rec_List1 = $nosofrows;


if($rec_List1  == 0){

echo "<div style='background:red;color:white;padding:10px;border:none'>You have not added anything to your Cart Yet.</div>";
}

$v1 = $result->fetch();
$id = $v1['id'];
 $checkout_pageid = $v1['checkout_pageid'];
 $payment_redirect_url = $v1['payment_redirect_url'];



            ?>








    <script src="bootstrap.bundle.min.js"></script>

</body>
</html>