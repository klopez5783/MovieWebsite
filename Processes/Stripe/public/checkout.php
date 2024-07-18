<?php

session_start();

require_once '../../../Configuration/Stripe/stripe-php-14.8.0/init.php';
require_once '../secrets.php';

$stripe = new \Stripe\StripeClient($stripeSecretKey);
header('Content-Type: application/json');

$numberOfTickets = count($_SESSION['selectedSeats']);

$ticketPrice = 100 * $_SESSION['MoviePrice'];

$productName = $stripe->products->create(['name' => 'Ticket']);

$price = $stripe->prices->create([
  'product' => $productName->id,
  'unit_amount' => $ticketPrice,
  'currency' => 'usd',
]);
//$total = $ticketPrice * $numberOfTickets;

$YOUR_DOMAIN = 'http://localhost:/MovieWebsite/Webpages';

$checkout_session = $stripe->checkout->sessions->create([
  'ui_mode' => 'embedded',
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => $price->id,
    'quantity' => $numberOfTickets,
  ]],
  'mode' => 'payment',
  'return_url' => $YOUR_DOMAIN . '/PaymentSuccess.php?session_id={CHECKOUT_SESSION_ID}',
]);

echo json_encode(array('clientSecret' => $checkout_session->client_secret));