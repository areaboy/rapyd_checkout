<?php

error_reporting(0);

include('data6rst.php');

$cart_sessionx = $_POST['cart_sessionx'];

$result = $db->prepare('SELECT * FROM cart where cart_session = :cart_session');

		$result->execute(array(
			':cart_session' => $cart_sessionx
    ));
$nosofrows = $result->rowCount();
echo $nosofrows;




?>

