<?php

include '../classes/cart.class.php';

	$cid = $_POST['cid'];


	$pid = $_POST['pid'];
	$qty = $_POST['qty'];
	$status = $_POST['status'];

	$cart = new cart();
	$cart->addCart($cid,$pid,$qty,$status);

	header('location:../cart.php');




  ?>