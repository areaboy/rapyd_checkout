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







<h3><center><b style='color:'>Manage Your Registered Customers. Easily Send Email Campaign about your Products</b></center></h3>

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
  padding-right: 180px;

  float: right;

display: flex;
  flex-direction: column;
  justify-content: center;
margin-right:1px;

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



$res= $db->prepare("SELECT count(*) as totalcount FROM users");
$res->execute(array());
$t_row = $res->fetch();
$totalcount = $t_row['totalcount'];

if($totalcount == 0){
echo "<div style='background:red;color:white;padding:10px;border:none;'>You have no Registered Customer Yet.<b></b></div>";
//exit();
}

$result = $db->prepare("SELECT * FROM users order by id desc limit :row1, :rowpage");
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
<th> <font face="Arial">Customer Email</font> </th> 
<th> <font face="Arial">Send Email Campaign</font> </th> 
<th> <font face="Arial">Time</font> </th> 
</tr>';


while($row = $result->fetch()){
                $id= $row['id'];
                $postid = $row['id'];
                $email = $row['email'];
                $timing = $row['timing'];
                $timer2= $row['timing'];
                $fullname =$row['fullname'];
                



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
var email = $(this).data('email');
var fullname = $(this).data('fullname');

$('.p_email').html(email);
$('.p_fullname').html(fullname);

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

                  
                  <td>
<button title='Send Email Campaign' class="email_css email_btn btn_action" data-bs-toggle="modal" data-bs-target="#myModal_carto" 
 data-id='<?php echo $id; ?>' 
data-email='<?php echo $email; ?>'
data-fullname='<?php echo $fullname; ?>'

>
 Send Email Campaign</button>
 <div class="loader-broadcast_<?php echo $id; ?>"></div>
   <div class="result-broadcast_<?php echo $id; ?>"></div></td>



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
        <h4 class="modal-title">Customers Email Campaign</h4>
        <button type="button" class="btn-close modal_close_btn" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body starts-->
      <div class="modal-body">


<br><br>
<script>



$(document).ready(function(){
$('#email_btn').click(function(){
		
var email_reminder = $('#email_reminder').val();
var email = $('.p_email_value').val();
var fullname = $('.p_fullname_value').val();


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


$('#loader_rec').fadeIn(400).html('<br><div style="color:black;background:#ddd;padding:10px;"><img src="loader.gif" style="font-size:20px"> &nbsp;Please Wait, Eamil Products Campaign is being sent to your Customers.</div>');
var datasend = {email_reminder:email_reminder,email:email,fullname:fullname};


$.ajax({
			
			type:'POST',
			url:'customers_email_campaign.php',
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






<input type="hidden" class="p_email_value"  value="">
<input type="hidden" class="p_fullname_value"  value="">


<div class='row'>
<div class='col-sm-12' style='background:#ddd;'>

<h4>Customers Info</h4>


<b>Customer Name: </b><span class='p_fullname'></span><br>
<b>Customer Email: </b><span class='p_email'></span><br>


               </div>


</div>


<br>

<h4> 
Easily Manage and send Email Campaign about Your Products to registered Customers........</h4>



 <div class="form-group">
           
              <textarea class="col-sm-12 form-control" id="email_reminder" name="email_reminder" >Hi <?php echo $fullname; ?>, This Email is to tell you to 
about our New Products and Services. Please patronize Us soonest. Thanks... </textarea>

            </div>

<div class='reminder_alert mydata_empty'></div>






<div class="form-group">
<div id="loader_rec" ></div>

<div id="result_rec" class='mydata_empty'></div>
<br />

<button type="button" id="email_btn" class="btn btn-primary" title='Send Email Reminders'>Send Email Campaign</button>
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

