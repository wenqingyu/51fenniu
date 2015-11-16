<?php

header("Content-Type:text/html;charset=UTF-8");
echo "getProductInfo";

require_once('../../config.php');

global $wooClient;

//print_r($wooClient);

//print_r($wooClient->customers->get());

echo "<br> product count: <br>";
print_r($wooClient->products->get_count());

echo "<br> Product: <br>";
print_r($wooClient->products->get());

echo "<br> Orders: <br>";
print_r($wooClient->orders->get());


