<?php
/**
 * Created by PhpStorm.
 * User: thomasyu
 * Date: 7/22/15
 * Time: 10:39 AM
 */

$CONSUMER_KEY = "ck_eda573b39cbb9684317b2dace2f63acc1f09cd19";
$CONSUMER_SECRET = "cs_e931180e14a78bda43e7e99744202b7218637101";


require_once('WooCommerce-REST-API-Client-Library/lib/woocommerce-api.php');

$options = array(
	'debug'           => true,
	'return_as_array' => false,
	'validate_url'    => false,
	'timeout'         => 30,
	'ssl_verify'      => false,
);


$client = "EMPTY";

try {

    $client = new WC_API_Client('http://121.40.182.178/51fenniu/', $CONSUMER_KEY, $CONSUMER_SECRET, $options);
    echo "<br>connect woo api success!<br>";
    print_r($client);
    echo "<br><br><br><br>";
    

} catch (WC_API_Client_Exception $e) {

    echo "<br>connect woo api failed!<br>";

    echo $e->getMessage() . PHP_EOL;
    echo $e->getCode() . PHP_EOL;

    if ($e instanceof WC_API_Client_HTTP_Exception) {

        print_r($e->get_request());
        print_r($e->get_response());
    }

}
