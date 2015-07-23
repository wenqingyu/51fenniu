<?php
/**
 * Created by PhpStorm.
 * User: thomasyu
 * Date: 7/22/15
 * Time: 10:39 AM
 */

$CONSUMER_KEY = "ck_49e0cc52f82d05a3b9d0effff5439cab";
$CONSUMER_SECRET = "cs_cd7dea6b8febe97966c4757575f4b2f7";


require_once('WooCommerce-REST-API-Client-Library/lib/woocommerce-api.php');

$options = array(
    'ssl_verify' => false,
);


$wooClient = "EMPTY";

try {

    $wooClient = new WC_API_Client('http://51fenniu.com', $CONSUMER_KEY, $CONSUMER_SECRET, $options);
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
