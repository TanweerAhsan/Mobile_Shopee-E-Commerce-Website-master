<?php

// require MySQL Connection
require ('database/DBController.php');

// require Product Class
require ('database/Product.php');

// require Cart Class
require ('database/Cart.php');

// require Cart Class
require ('database/SignupDatabase.php');

// require Cart Class
require ('database/LoginDatabase.php');

// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();

// Cart object
$Cart = new Cart($db);

// SignupDatabase object
$SignupDatabase = new SignupDatabase($db);

// Logindatabase object
$LoginDatabase = new LoginDatabase($db);
