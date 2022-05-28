<?php
error_reporting(0);
include('rapyd_settings.php');

// Initialize session for tracking Customers Purchase

session_start();
$cart_session = $_SESSION['guest_session'];
//include ('session.php');
/*
if(!isset($_SESSION['fullname_session']) || (trim($_SESSION['fullname_session']) == '')) {
echo "<script>alert('Session Expired. Direct access to this Page Not allowed..');</script>";
		header("location: index.php");
		exit();
	}
*/

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







<h3 style='color:green'><center>Your Payments is Successful</center></h3>

Hi <b><?php echo $_SESSION['fullname_session']; ?> </b>  <?php echo $success_payments_message; ?><br>


<script>

$(document).ready(function(){


var cart_sessionx = '<?php echo $cart_session; ?>';

if(cart_sessionx ==''){
alert('something is wrong with Cart Session');
}


else{


$("#loader-load-updates").fadeIn(400).html('<br><div style="color:black;background:#ccc;padding:10px;"><img src="loader.gif">&nbsp;Please Wait, Finalizing Database updates  with your Payment Status</div>');
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
<div id="loader-load-updates"></div>
<div id="result-load-updates"></div>


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


<!--form ENDS-->






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








    <script src="bootstrap.bundle.min.js"></script>

</body>
</html>