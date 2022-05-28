<?php
error_reporting(0);

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {

$file_content = strip_tags($_POST['file_fname']);
//$username1 = strip_tags($_POST['username']);
//$username = str_replace(' ', '', $username1);

$username='good';

$title = strip_tags($_POST['title']);
$description = strip_tags($_POST['description']);
$price = strip_tags($_POST['price']);
$shipping_rate = strip_tags($_POST['shipping_rate']);

$mt_id=rand(0000,9999);
$dt2=date("Y-m-d H:i:s");
$ipaddress = strip_tags($_SERVER['REMOTE_ADDR']);

// honey pot spambots
$emailaddress_pot =$_POST['emailaddress_pot'];
if($emailaddress_pot !=''){
//spamboot detected.
//Redirect the user to google site

echo "<script>
window.setTimeout(function() {
    window.location.href = 'https://google.com';
}, 1000);
</script><br><br>";

exit();
}


if ($file_content == ''){
echo "<div class='alert alert-danger' id='alerts_reg'><font color=red>Files Upload is empty</font></div>";
exit();
}


$ip= filter_var($ipaddress, FILTER_VALIDATE_IP);
if (!$ip){
echo "<div class='alert alert-danger' id='alerts_reg'><font color=red>IP Address is Invalid</font></div>";
exit();
}



$upload_path = "uploads/";

/* validate file names, ensures directory tranversal attack is not possible.
thus allow only alphanumeric filenames and dots

//allow alphanumeric,underscore, dot and dash
$filename_string = '../../fred_09@#H$%.exe.-png';
$fnaming = preg_replace("/[^\w-.]/", "", $filename_string);
//echo $fnaming;



//validate to ensure that it contains only aphabets or dots or both
$fstring = 'fred.png';
$fresult = preg_match("/^[a-zA-Z. ]*$/",$fstring);

if ($fresult) {
echo "good. contains only aphabets and dots<br>";
}else{
echo "bad.";
exit();
}



//validate to ensure that it contains only alphanumerics or dots or both
$fstring1 = 'fred02324.png';
$fresult1 = preg_match("/^[a-zA-Z0-9. ]*$/",$fstring1);

if ($fresult1) {
echo "good. contains only aphanumerics, dots<br>";
}else{
echo "bad.";
exit();
}


$fname1 = strip_tags($_FILES['file_content']['name']); 
$filename_string = $fname1;
$fname = preg_match("/^[a-zA-Z0-9. ]*$/",$fname1);
echo $fname;
if ($fname1) {
//echo "good. contains only aphanumerics, dots<br>";
}else{
echo "<div id='alertdata_uploadfiles' class='alerts alert-danger'>Please Rename the file. File name can be numeric, alphabetic or alphanumeric</div>";
exit();
}


*/




$filename_string = strip_tags($_FILES['file_content']['name']);
// thus check files extension names before major validations

$allowed_formats = array("PNG", "png", "gif", "GIF", "jpeg", "JPEG", "BMP", "bmp","JPG","jpg");
$exts = explode(".",$filename_string);
$ext = end($exts);

if (!in_array($ext, $allowed_formats)) { 
echo "<div id='alertdata_uploadfiles' class='alerts alert-danger'>File Formats not allowed. Only Images are allowed.<br></div>";
exit();
}




 //validate file names, ensures directory tranversal attack is not possible.
//thus replace and allowe filenames with alphanumeric dash and hy

//allow alphanumeric,underscore and dash

$fname_1= preg_replace("/[^\w-]/", "", $filename_string);

// add a new extension name to the uploaded files after stripping out its dots extension name
$new_extension = ".png";
$fname = $fname_1.$new_extension;





// for security reasons, you migh want to avoid files with more than one dot extension name
//file like fred.exe.png might contain virus. only ask the user to rename files to eg fred.png before uploads

 $fname_dot_count = substr_count($fname,".");
if($fname_dot_count >1){
echo "<div id='alertdata_uploadfiles2' class='alerts alert-danger'>
Your files <b>$filename_string</b> has <b>($fname_dot_count dot extension names)</b>
File with more than one <b>dot(.) extension name are not allowed.
you can rename and ensure it has only one dot extension eg: <b>example.png</b>
</b></div>";
exit();

}


$fsize = $_FILES['file_content']['size']; 
$ftmp = $_FILES['file_content']['tmp_name'];

//give file a random names
$filecontent_name = $username.time();
//$filecontent_name = 'fred1';


if ($fsize > 5 * 1024 * 1024) { // allow file of less than 5 mb
echo "<div id='alertdata' class='alerts alert-danger'>File greater than 5mb not allowed<br></div>";
exit();
}

// Check if file already exists
if (file_exists($upload_path . $filecontent_name.'.'.$ext)) {
echo "<div id='alertdata_uploadfiles' class='alerts alert-danger'>This uploaded File <b>$filecontent_name.$ext</b> already exist<br></div>";
exit(); 
}



$allowed_types=array(

'application/json',
'application/octet-stream',
'text/plain',
'image/gif',

    'image/jpeg',

    'image/png',

'image/jpg',



'image/GIF',

    'image/JPEG',

    'image/PNG',

'image/JPG'

);






if ( ! ( in_array($_FILES["file_content"]["type"], $allowed_types) ) ) {

  echo "<div id='alertdata_uploadfiles' class='alerts alert-danger'>Only Images are allowed bro..<br><br></div>";

exit();

}




// Calling getimagesize() function 
//$image_info = getimagesize("team1.png"); 
//print_r($image_info); 

$image_info =getimagesize($_FILES['file_content']['tmp_name']);

    $width = $image_info[0];
    $height = $image_info[1];
    $mime_image = $image_info['mime'];
/*
//validate file dimension eg 400 by 250
if ($width > "400" || $height > "250") {
       echo "<div id='alertdata_uploadfiles' class='alerts alert-danger'>file upload dimension must not be more than 400(width) by 250(height)</div>";
exit();

}
*/


// check file validation using getimagesizes
 if ($image_info === FALSE) {
           echo "<div id='alertdata_uploadfiles' class='alerts alert-danger'>cannot determine the image type</div>";
exit();
        }




if ( ! ( in_array($mime_image, $allowed_types) ) ) {

  echo "<div id='alertdata_uploadfiles' class='alerts alert-danger'>Only Image types are allowed..<br><br></div>";

exit();

}



if (($image_info[2] !== IMAGETYPE_GIF) && ($image_info[2] !== IMAGETYPE_JPEG) && ($image_info[2] !== IMAGETYPE_PNG)) {
           echo "<div id='alertdata_uploadfiles' class='alerts alert-danger'>only image format gif,jpg, png are allowed..</div>";
exit();
        }





//validate image using file info  method
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES['file_content']['tmp_name']);


if ( ! ( in_array($mime, $allowed_types) ) ) {

  echo "<div id='alertdata_uploadfiles' class='alerts alert-danger'>Only Images are allowed...<br></div>";

exit();

}
finfo_close($finfo);


include('data6rst.php');



if (move_uploaded_file($ftmp, $upload_path . $filecontent_name.'.'.$ext)) {


//insert into database
$final_filename =  $filecontent_name.'.'.$ext;
$timer = time();
include("time/now.fn");
$created_time=strip_tags($now);
$dt2=date("Y-m-d H:i:s");


$token1= md5(uniqid());
$token2 = time();
$token = $token1.$token2;



//create table products(id int primary key auto_increment,
//title varchar(200),description varchar(100),price varchar(100),photo varchar(100),shipping_rate varchar(100),created_time varchar(100),timer1 varchar(100));

$statement = $db->prepare('INSERT INTO products

(title,description,price,photo,shipping_rate,created_time,timer1)
 
                          values
(:title,:description,:price,:photo,:shipping_rate,:created_time,:timer1)');

$statement->execute(array( 

':title' => $title,
':description' => $description,
':price' => $price,	
':photo' => $final_filename,	
':shipping_rate' => $shipping_rate,
':created_time' =>$created_time,
':timer1' => $timer

));


if($statement){
    
    echo "<script>alert('Product Successfully Added');</script>";
echo "<div id='alertdata_uploadfiles_o' class='well alerts alert-success'>Product Added Successfully. Please Add More Products or View your Shop here <a href='index.php'>View Your Shop</a><br></div>";

/*
echo "<script>
window.setTimeout(function() {
    window.location.href = 'index.php';
}, 1000);
</script><br><br>";
*/


}

                } else {
echo "<div id='alertdata_uploadfiles' class='alerts alert-danger'>Your Data cannot be submitted to database.<br></div>";
                }

}


?>



