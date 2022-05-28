<?php
error_reporting(0);

// unset and destroy all customers cart session data first
session_start();
unset($_SESSION["guest_session"]);
unset($_SESSION["email_session"]);
unset($_SESSION["fullname_session"]);

session_destroy();



// start users registrations.


if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);
$fullname = strip_tags($_POST['fullname']);




//hash password before sending it to database...
$options = array("cost"=>4);
$hashpass = password_hash($password,PASSWORD_BCRYPT,$options);


if ($email == ''){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Email is empty</div>";
exit();
}



//insert into database

$timer = time();
include("time/now.fn");
$created_time=strip_tags($now);
$dt2=date("Y-m-d H:i:s");


$token1= md5(uniqid());
$token2 = time();
$token = $token1.$token2;

include('data6rst.php');



// check if user with this email already exits
$result_verified = $db->prepare('select * from users where email=:email');
$result_verified->execute(array(':email' =>$email));
 $rows= $result_verified->fetch();
$norows= $result_verified->rowCount();

if($norows== 1){
echo "<div style='background:red;padding:8px;color:white;border:none;'>User with this Email Address already Exist</div>";
exit();
}





$statement = $db->prepare('INSERT INTO users

(email,fullname,password,created_time,timing)
 
                          values
(:email,:fullname,:password,:created_time,:timing)');

$statement->execute(array( 

':email' => $email,
':fullname' => $fullname,
':password' => $hashpass,		
':created_time' => $created_time,
':timing' => $timer

));


if($statement){
echo  "<script>alert('Account Successfully Created. You can Login Now');</script>";
echo "<div style='background:green;padding:8px;color:white;border:none;'>Account Successfully Created. You can Login Now...</div>";

}

              else {
echo "<div style='background:red;padding:8px;color:white;border:none;'>Account Creation Failed. Ensure there is internet connections...</div>";
                }

}


?>



