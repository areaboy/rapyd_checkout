<?php

error_reporting(0);
include('rapyd_settings.php');


$cart_id =  strip_tags($_GET['cart_id']);
//$cart_sess =  strip_tags($_GET['cart_session']);

// Initialize session for tracking Customers Purchase

session_start();
$_SESSION['guest_session']= $cart_id;

$cart_session = $_SESSION['guest_session'];
$cus_login_track ='';


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
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                      
                      
                    </ul>
                </div>
            </div>
        </nav>




<br><br><br><br><br>




<?php



if($cart_session != $cart_id){


echo "<div style='background:red;color:white;padding:10px;border:none'>Error: Cart Session  and CartId does not Match. Direct Page Access Not Allowed...</div>";
exit();

}


?>



<?php


if($cart_session != $cart_id){


echo "<div style='background:red;color:white;padding:10px;border:none'>Error: Cart Session  and CartId does not Match. Direct Page Access Not Allowed...</div>";
exit();

}






require('data6rst.php');

$resultx = $db->prepare('SELECT * FROM cart where cart_session = :cart_session order by id desc');
$resultx->execute(array(':cart_session' =>$cart_session));

$v1x = $resultx->fetch();
$fn = $v1x['fullname'];
$tit = $v1x['product_title'];
$pic = $v1x['product_photo'];
$pid = $v1x['product_id'];
?>


&nbsp;&nbsp;&nbsp;&nbsp;Welcome <b style='font-size:26px;color:#800000;'><?php echo $fn; ?> !!!</b><br>
<h4><center>Your Saved Cart Rapyd Payments System</center></h4>

<?php


if($cart_session != $cart_id){


echo "<div style='background:red;color:white;padding:10px;border:none'>Error: Cart Session  and CartId does not Match. Direct Page Access Not Allowed...</div>";
exit();

// Select Buyer from Database


}






?>

<script>

$(document).ready(function(){
$(".hide_unhide").hide();
});


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







// session clearance call starts

$(document).ready(function(){
$('#session_btn').click(function () {


//var qty = $('#qty').val();

var sess = 'clearance';

if(sess ==''){
alert('something is wrong');
}


else{


$("#loader-sess").fadeIn(400).html('<br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Your Session Data is being Cleared and Protected...</div>');
var datasend = {sess:sess};


	
		$.ajax({
			
			type:'POST',
			url:'session_clearance.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-sess").hide();
$("#result-sess").html(msg);
//setTimeout(function(){ $('#result-sess(''); }, 5000);	

// clear all customers info and Shipping Details
$('#email').val('');	
$('#fullname').val('');	
$('#address').val('');	
$('#postal_code').val('');	
$('#country').val('');	

	
}
			
		});
		
		}

});

});

// session clearance call ends







// signup starts

$(document).ready(function(){
$('#signup_btn').click(function () {

var email  = $('#emailx').val();
var fullname = $('#fullnamex').val();
var password = $('#passwordx').val();

//preparing Email for validations
                    var atemail = email.indexOf("@");
                    var dotemail = email.lastIndexOf(".");





 if(email==""){
alert('please Enter Email Address');
}

else  if (atemail < 1 || ( dotemail - atemail < 2 )){
alert("Please enter valid email Address")
}

else if(fullname==""){
alert('please Enter Your Fullname');
}

else if(password==""){
alert('please Enter Password');
}




else{


$("#loader-signup").fadeIn(400).html('<br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Your account is being created...</div>');
var datasend = {email:email, fullname:fullname, password:password};


	
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


// clear all customers signup data
$('#emailx').val('');	
$('#fullnamex').val('');	
$('#passwordx').val('');



// clear all customers info and Shipping Details
$('#email').val('');	
$('#fullname').val('');	
$('#address').val('');	
$('#postal_code').val('');	
$('#country').val('');		


	
}
			
		});
		
		}

});

});

// signup ends





// login starts

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


<!-- form START-->
<!--form ENDS-->




<br>


 <!-- row start 1-->
 <div class='row' style='' >
<h6>Rapyd Sandbox Testing Payments Card & Bank Payments</h6><br>

<div class='col-sm-4' style='background:#ddd'>
<h4 style='color:navy'>Master Card</h4>

      <b>Card_Type:</b> MasterCard<br/>
      <b>Card_Name:</b> Any Name Eg. John Doe <br/>
      <b>Card_No:</b> 5104 0600 0000 0008 <br/>
      <b>Exp_Date:</b> Any Date in Future Eg: 08 / 23<br/>
      <b>CVV:</b> Any Number Eg. 123
</div>

<div class='col-sm-4' style='background:#ddd'>
<h4 style='color:navy'>Visa Card </h4>
      <b>Card_Type:</b> Visa<br/> 
      <b>Card_Name:</b> Any Name Eg. Fred Cool <br/>
      <b>Card_No:</b> 4111 1111 1111 1111<br/>
      <b>Exp_Date:</b> Any Date in Eg. Eg: 08 / 23<br/>
      <b>CVV:</b> Any Number  Eg. 123
      
</div>

<div class='col-sm-3' style='background:#ddd'>
    <h4 style='color:navy'>Bank Payments</h4>
  <b>Username:</b> rapyd <br/>
      <b>Password:</b> success
</div>

</div><br>
 <!-- row ends -->
 
 

 <!-- row start -->
<div class='row' >

<div class='col-sm-5' style='background:#ddd'>
    <div id="loader-load-cart"></div>
<div id="result-load-cart"></div>
</div>

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








        <div class="container col-sm-6">
            
<div id="loader-payment"></div>

            <!-- Feedback -->
            <div class="row justify-content-center">
                <div class="col text-center my-4" style="display: none" id="feedback">
                    <img src="" id="image" alt="" height="120" class="mt-2">
                    <h3 id="title" class="my-4" style='color:green'></h3>
                    <p id="message"></p>
                    <a style='display:none;' role="button" class="btn btn-custom mt-2" href="" id="action"></a>
                    
                    
                    <div id="loader-load-updates2"></div>
<div id="result-load-updates2"></div>
                    
                    <div id="loader-load-updates"></div>
<div id="result-load-updates"></div>


<div id="loader-load-updates_email"></div>
<div id="result-load-updates_email"></div>


<div id="loader-load-updates_emaile"></div>
<div id="result-load-updates_emaile"></div>

<div class='continue_box'></div>
<div class ='create_accountx'></div>
                </div>
            </div>

            <!-- iframe -->
            <div class="row justify-content-center">
                <div class="col" style="max-width: 500px;" id="rapyd-checkout"></div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center text-center border-top py-2">
                <span>&copy;2022. Rapyd Checkout Toolkit Integration demo site.</span>
            </div>
        </div>
    </div>


</div>
 <!-- row ends -->
<br>
    <!-- code to display the iframe -->
    <script src="https://sandboxcheckouttoolkit.rapyd.net"></script>
    <script>
        window.onload = function () {

$("#loader-payment").fadeIn(1000).html('<br><br><br><br><br><div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif"><center>Please Wait.. Loading Rapyd Payments System...</center></div>');


            let checkout = new RapydCheckoutToolkit({
                pay_button_text: "Pay Now",
                pay_button_color: "#4BB4D2",
                id: "<?php echo $checkout_pageid; ?>", // your checkout page id goes here
                style: {
                    submit: {
                        base: {
                            color: "white"
                        }
                    }
                }
            });
            checkout.displayCheckout();




//$("#loader-payment").hide();
setTimeout(function(){ $('#loader-payment').html(''); }, 4000);	

        }
        window.addEventListener('onCheckoutPaymentSuccess', function (event) {
            console.log(event.detail);
            feedback(event);
        });
        window.addEventListener('onCheckoutFailure', function (event) {
            console.log(event.detail.error);
            feedback(event);
        });
        window.addEventListener('onCheckoutPaymentFailure', (event)=> {
            console.log(event.detail.error);
            feedback(event);
        })


        // display information to the user
        function feedback(event){
            if (event.detail.error){
                var fnx='<?php echo $fn; ?>';
                document.getElementById('title').textContent = "Whoops! ("+fnx+")";
                document.getElementById('message').innerHTML = "We cannot process your   payment:<br/>" + 
                    event.detail.error;
                document.getElementById('image').src = "img/logox.png";
                document.getElementById('action').textContent = "Try again";
            }
            else {
                var orderx='<?php echo $cart_session; ?>';
                var fnx='<?php echo $fn; ?>';
                document.getElementById('title').textContent = "Payment Successful...! ("+fnx+")";
                document.getElementById('message').innerHTML = "Thank you! "+fnx+" Your product Details is sent to Your Email....!" + 
                    "<br>";
                    "Order: " + orderx;
                document.getElementById('image').src = "img/logox.png";
                //document.getElementById('action').textContent = "Home";
                
				//alert('Payments successfully initialized....');
			//	window.location='<?php echo $payment_redirect_url; ?>';
			
			alert('Your Patyments is successful.  Database & Email Updates in Progress.');
			
	
	//updating cart checkout status 
$(document).ready(function(){		
var cart_sessionx2 = '<?php echo $cart_session; ?>';

if(cart_sessionx2 ==''){
alert('something is wrong with Cart Session');
}


else{


$("#loader-load-updates2").fadeIn(400).html('<br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Updating your Cart Checkout Status.</div>');
var datasend = {cart_sessionx:cart_sessionx2};


	
		$.ajax({
			
			type:'POST',
			url:'payment_db_update.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-load-updates2").hide();
$("#result-load-updates2").html(msg);
//setTimeout(function(){ $('#result-load-updates2(''); }, 5000);				

//location.reload();	
}
			
		});
		
		}

});



// Updating cart checkout status db Ends
			
			
			
			
			
	//updating Payments starts
	
	
	
$(document).ready(function(){


var cart_sessionx = '<?php echo $cart_session; ?>';

if(cart_sessionx ==''){
alert('something is wrong with Cart Session');
}


else{


$("#loader-load-updates").fadeIn(400).html('<br><div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Retreving Checkout Page and Updating Payments Status via Rapyd API Call</div>');
var datasend = {cart_sessionx:cart_sessionx};


	
		$.ajax({
			
			type:'POST',
			url:'payment_complete_update.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-load-updates").hide();
$("#result-load-updates").html(msg);
//setTimeout(function(){ $('#result-load-updates(''); }, 5000);				

//location.reload();	
}
			
		});
		
		}

});



// Updating Payments Ends
			
			
			
// updating Customer Email about Payments starts

$(document).ready(function(){


var cart_sessionxy = '<?php echo $cart_session; ?>';

if(cart_sessionxy ==''){
alert('something is wrong with Cart Session');
}


else{


$("#loader-load-updates_email").fadeIn(400).html('<br><br><div style="color:white;background:#800000;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Sending Your Items and Payments to Customers Email</div>');
var datasend = {cart_sessionx:cart_sessionxy};


	
		$.ajax({
			
			type:'POST',
			url:'payment_complete_update_email.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-load-updates_email").hide();
$("#result-load-updates_email").html(msg);
//setTimeout(function(){ $('#result-load-updates_email(''); }, 5000);				

//location.reload();	
}
			
		});
		
		}

});

//updating Customer Email about payments ends





// updating Seller Email about Payments starts

$(document).ready(function(){


var cart_sessionxye = '<?php echo $cart_session; ?>';

if(cart_sessionxye ==''){
alert('something is wrong with Cart Session');
}


else{


$("#loader-load-updates_emaile").fadeIn(400).html('<br><br><div style="color:white;background:fuchsia;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Updating Admin or Seller about New Payments to his Email</div>');
var datasend = {cart_sessionx:cart_sessionxye};


	
		$.ajax({
			
			type:'POST',
			url:'payment_complete_update_email_seller.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){

$("#loader-load-updates_emaile").hide();
$("#result-load-updates_emaile").html(msg);
//setTimeout(function(){ $('#result-load-updates_emaile(''); }, 5000);				

//location.reload();	
}
			
		});
		
		}

});

//updating Saller Email about payments ends


// login to customers dashboard 
var clt = '<?php echo $cus_login_track; ?>';
if(clt != ''){
   // window.location='dashboard_customer.php';
   $(".hide_unhide").hide();
    $(".continue_box").html("<br><div style='background:navy;color:white;padding:20px;border:none;border-radius:20%;'><a style='color:white;' href='dashboard_customer.php'>Go To Your Dashboard to View Your Purchase</a></div>");
   
   
}

// signup form

$(document).ready(function(){
//$(".hide_unhide").show();

var cltx = '<?php echo $cus_login_track; ?>';
if(cltx == ''){
 //$(".hide_unhide").show();
 
  $(document).ready(function(){
         $(".create_accountx").html('<br><br><div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal_create_account" style="background:#ddd;color:black;padding:20px;border:none;border-radius:20%;cursor:pointer" >Click to Create An Account with Us(Optional) Or  Clear Your Session</div>');
        });
  
}

});


			
			
            }

            document.getElementById('action').href = "index.php";
            document.getElementById('feedback').style.display = "block";

        }
    </script>
    
    

<!--  Create an account Modal start -->
<div class="modal fade" id="myModal_create_account">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Customers Signup System(Optional)</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       Create an Account with Us....<br>
    <!--form starts-->
    <div class='hide_unhidex'>
    
<br>Now that Your Payments is Successful, <b>Optionally</b> Will You like to <b>create an account</b> with us so that you can view and track your purchases anytime any day by choosing 
<b>Option A</b> or you can choose <b>Option B</b> which will allows us to clear all your session data on the browser for security purposes...
<br>
<br>
<div class="row">

<div class="col-sm-5" style='background:#ccc;'><h3>Option A</h3>
Yes I want to create an account. Your Session Data is also secured and protected...<br><br>

<h4>Signup Form</h4>
 <div class="form-group">
              <label>Email</label>
              <input type="text" class="col-sm-12 form-control" id="emailx" name="emailx" placeholder="Enter email" value="<?php echo $_SESSION["email_session"]; ?>">
            </div>
 <div class="form-group">
              <label>Fullname</label>
              <input type="text" class="col-sm-12 form-control" id="fullnamex" name="fullnamex" placeholder="Enter Fullname" value="<?php echo $_SESSION["fullname_session"]; ?>">
            </div>

 <div class="form-group">
              <label>Password</label>
              <input type="password" class="col-sm-12 form-control" id="passwordx" name="passwordx" placeholder="Enter Password" value="">
            </div>

<br>
<div id="loader-signup"></div>
<div id="result-signup"></div>


                    <input type="button" id="signup_btn" class="btn btn-primary" value="Signup Now!" /> &nbsp;&nbsp;&nbsp;&nbsp; Already have an Account, 
<a style='color:#800000;cursor:pointer;' title='Login' data-bs-toggle="modal" data-bs-target="#myModal_login"><b>Login Here</b></a>

<br><br>


</div>
<div class="col-sm-2"><h1><center>OR</center></h2></div>

<div class="col-sm-5" style='background:#ddd;'><h3>Option B</h3>

No I don't want to create an account, Just clear my session Data for security purposes.<br><br>


<div id="loader-sess"></div>
<div id="result-sess"></div>


                    <input type="button" id="session_btn" class="btn btn-primary" value="Clear & Secure My Session Data Now!" />
<br><br>
</div>
<br>

</div>


</div>
<!--form ENDS-->


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- create account Modal ends -->







<!--  login Modal start -->
<div class="modal fade" id="myModal_login">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Customers Login System</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       Customers Login System....<br>


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


                    <input type="button" id="login_btn" class="btn btn-primary" value="Login Now!" />



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- login Modal ends -->






    <!-- social media ads Modal start -->
<div class="modal fade" id="myModal_social">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Share This Products on Social Networks</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
Now that your Purchase and Payments is Successful.<br>
Please Help us spread good news about this Products. Share it on Social Media..<br><br>
<h4>Product Title: <?php echo $tit; ?></h4>
<img src="uploads/<?php echo $pic; ?>" style="min-width:100px;max-width:100px;min-height:100px;max-height:100px;"><br><br>
<center><a target='_blank' href='
https://wordpress.com/press-this.php?u=https://<?php echo $site_url; ?>/product_share.php?id=<?php echo $pid; ?>&t=<?php echo $tit; ?>
' title='Wordpress'><i style='font-size:40px;color:black;' class="fa fa-wordpress" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a target='_blank' href='https://pinterest.com/pin/create/bookmarklet/?url=https://<?php echo $site_url; ?>/product_share.php?id=<?php echo $pid; ?>&description=<?php echo $tit; ?>
' title='Pinterest'><i style='font-size:40px;color:red;' class="fa fa-pinterest" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a target='_blank' href='https://twitter.com/share?url=https://<?php echo $site_url; ?>/product_share.php?id=<?php echo $pid; ?>&text=<?php echo $tit; ?>
' title='Twitter'><i style='font-size:40px;color:#00acee;' class="fa fa-twitter" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a target='_blank' href='
https://www.facebook.com/sharer.php?u=https://<?php echo $site_url; ?>/product_share.php?id=<?php echo $pid; ?>
' title='Facebook'><i style='font-size:40px;color:#3b5998;' class="fa fa-facebook-square" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a target='_blank' href='
https://api.whatsapp.com/send?text=<?php echo $tit; ?> https://<?php echo $site_url; ?>/product_share.php?id=<?php echo $pid; ?>' title='whatsapp'><i style='font-size:40px;color:green;' class="fa fa-whatsapp" aria-hidden="true"></i></a>

</center>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- social Media Modal ends -->



    <script src="bootstrap.bundle.min.js"></script>

</body>
</html>