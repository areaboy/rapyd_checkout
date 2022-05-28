<?php
error_reporting(0);




// start users registrations.


if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

$username = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']);
$fullname = strip_tags($_POST['fullname']);




//hash password before sending it to database...
$options = array("cost"=>4);
$hashpass = password_hash($password,PASSWORD_BCRYPT,$options);


if ($username == ''){
echo "<div style='background:red;padding:8px;color:white;border:none;'>Username is empty</div>";
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


$resultz = $db->prepare('select * from admin');
$resultz->execute(array());
 $rowsz= $resultz->fetch();
$norowsz= $resultz->rowCount();

if($norowsz==1){
    
    echo "<script>alert('Admin Already Exist in the Database. Please Login');</script>";
 echo "<div style='background:green;padding:8px;color:white;border:none;'>Admin Already Exist in the Database. Please Login</div>";
exit();   
}


// check if user with this username already exits
$result_verified = $db->prepare('select * from admin where username=:username');
$result_verified->execute(array(':username' =>$username));
 $rows= $result_verified->fetch();
$norows= $result_verified->rowCount();

if($norows== 1){
echo "<div style='background:red;padding:8px;color:white;border:none;'>User with this username already Exist</div>";
exit();
}


/*
create table admin (id int primary key auto_increment,username varchar(100),fullname varchar(100),password varchar(100),created_time varchar(100),
timing varchar(100), rapyd_key text, rapyd_secret text);
*/


$statement = $db->prepare('INSERT INTO admin

(username,fullname,password,created_time,timing)
 
                          values
(:username,:fullname,:password,:created_time,:timing)');

$statement->execute(array( 

':username' => $username,
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



