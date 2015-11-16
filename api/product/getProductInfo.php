<?php

header("Content-Type:text/html;charset=UTF-8");
echo "getProductInfo";

require_once('../../config.php');

global $client;

// print_r($client);

// print_r($client->customers->get());

// echo "<br> product count: <br>";
// print_r($client->products->get_count());

echo "<br> Product: <br>";
print_r($client->products->get_by_sku('001'));

// echo "<br> Orders: <br>";
// print_r($client->orders->get());


