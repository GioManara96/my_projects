<?php
require "vendor/autoload.php";
use classi\Prodotto;
use contenitori\Carrello;

$cart = new Carrello;
for($i = 0; $i < 5; $i++){
    $p = new Prodotto("pr00".$i+1, "Test1", $i+10, $i+2, ".jpeg");
    $cart->addProdotto($p);
}
$cart->removeProdotto($p);
$cart->clear();
print_r($cart);