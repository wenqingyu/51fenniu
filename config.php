<?php
/**
 * Created by PhpStorm.
 * User: thomasyu
 * Date: 7/22/15
 * Time: 10:39 AM
 */

$CONSUMER_KEY = "ck_1394e280a4ce2f9197dd87d814102caaf70f40b2";
$CONSUMER_SECRET = "cs_0ebb6ce4abb2ae09b925022e20e3da1b4cadf24b";


require_once('WooCommerce-REST-API-Client-Library/lib/woocommerce-api.php');

$options = array(
    'ssl_verify' => false,
);


$client = "EMPTY";

try {

    $client = new WC_API_Client('http://121.40.182.178', $CONSUMER_KEY, $CONSUMER_SECRET, $options);
    echo "<br>connect woo api success!<br>";
    

} catch (WC_API_Client_Exception $e) {

    echo "<br>connect woo api failed!<br>";

    echo $e->getMessage() . PHP_EOL;
    echo $e->getCode() . PHP_EOL;

    if ($e instanceof WC_API_Client_HTTP_Exception) {

        print_r($e->get_request());
        print_r($e->get_response());
    }

}
