<?php

require_once './vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_iH3QPiqdGQTV6Nh6S5tgPRBR00UdczvBvP');


$intention = \Stripe\PaymentIntent::create([
    'amount' => $totalamount*100,
    'currency' => 'eur'
]);
