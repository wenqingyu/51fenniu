<?php

header("Content-Type:text/html;charset=UTF-8");
echo "getProductInfo";

require_once('../../config.php');

global $client;

//print_r($wooClient);

//print_r($wooClient->customers->get());

echo "<br> product count: <br>";
print_r($client->products->get_count());

echo "<br> Product: <br>";
print_r($client->products->get());

echo "<br> Orders: <br>";
print_r($client->orders->get());


