<?php
// Desativa temporariamente a verificação do certificado SSL
stream_context_set_default(['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]);

require_once '../../../vendor/autoload.php';

$access_token = "";
MercadoPago\SDK::setAccessToken($access_token);
$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->title = 'Camiseta Santástico';
$item->quantity = 1;
$item->unit_price = (double)75.00;
$preference->items  = array($item);


$preference->back_urls =
array(
    "success" => "https://seusite.com/success",
    "failure" => "https://seusite.com/failure",
    "pending" => "https://seusite.com/pending"

);
  
$preference->notification_url = 'https://seusite.com/notification.php';
$preference->external_reference = 4545;
$preference->save();


$link = $preference->init_point;
echo $link;

?>