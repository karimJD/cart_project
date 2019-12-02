<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
include './classes/cart.class.php';
$cart = new cart();
$c = $cart->loadAllCart();
while ($carts = $c->fetch()) {
	echo '<ul>
  			<li>pid : '.$carts['nom'].'</li>
  			<li>cid : '.$carts['description'].'</li>
  			<li>qty : '.$carts['qty'].'</li>
  			<li>status : '.$carts['status'].'</lcid

		</ul>';
}

 ?>


</body>
</html>