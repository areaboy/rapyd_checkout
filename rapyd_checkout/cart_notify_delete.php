<?php
error_reporting(0);
include('data6rst.php');

$id=strip_tags($_POST['id']);

$del = $db->prepare('DELETE FROM cart where id = :id');

		$del->execute(array(
			':id' => $id
    ));


if($del){

echo 1;
}else{

echo 0;
}









?>


