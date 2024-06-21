<?php

require_once '../../../Configuration/Stripe/stripe-php-14.8.0/init.php';
require_once '../secrets.php';

$stripe = new \Stripe\StripeClient($stripeSecretKey);
header('Content-Type: application/json');

//$numberOfTickets = count($_SESSION['selectedSeats']);

$productName = $stripe->products->create(['name' => 'Ticket']);

$price = $stripe->prices->create([
  'product' => $productName->id,
  'unit_amount' => 500,
  'currency' => 'usd',
]);
//$total = 5 * $numberOfTickets;

$YOUR_DOMAIN = 'http://localhost:/MovieWebsite/Webpages';

$checkout_session = $stripe->checkout->sessions->create([
  'ui_mode' => 'embedded',
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => $price->id,
    'quantity' => 5,
  ]],
  'mode' => 'payment',
  'return_url' => $YOUR_DOMAIN . '/PaymentSuccess.php?session_id={CHECKOUT_SESSION_ID}',
]);

  echo json_encode(array('clientSecret' => $checkout_session->client_secret));