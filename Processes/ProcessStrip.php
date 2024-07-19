<?php
require_once '../Configuration/Stripe/stripe-php-14.8.0/init.php';

$stripe_secret_key = "sk_test_51PLUmlRsI0RHXX1kciOFp96C9ZpTp6RxhsUaXhwPsRdRokgV7tlK7gCrsKEsYbEjSCveqRisF6eQ7PJY9jPEdrAx00sSobaQxP";
//Globally setting api key


\Stripe\Stripe::setApiKey($stripe_secret_key);


$stripe = new \Stripe\StripeClient($stripe_secret_key);

// $checkout_session = \Stripe\Checkout\Session::create([
//     "mode" => "payment",
//     "success_url"=> "http://localhost/MovieWebsite/Webpages/stipeSuccess.php",
//     "line_items" => [
//         [
//             "quantity"=> 1,
//             "price_data"=> [
//                 "currency" => "usd",
//                 "unit_amount" => 2000,
//                 "product_data"=> [
//                     "name"=> "AdultTicket"
//                 ]
//             ]
//         ]
//     ]
// ]);


$YOUR_DOMAIN = 'http://localhost/MovieWebsite/Webpages/stipeSuccess.php';

$checkout_session = $stripe->checkout->sessions->create([
    'ui_mode' => 'embedded',
    'line_items' => [[
        # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
        'price' => 'price_1PLWmwRsI0RHXX1kHnuwTtFh',
        'quantity' => 1,
      ]],
    'mode' => 'payment',
    'return_url' => $YOUR_DOMAIN . '/return.html?session_id={CHECKOUT_SESSION_ID}',
  ]);
http_response_code(303);
header("Location: " . $checkout_session->url);

//$test = $stripe->checkout->sessions->create();


?>