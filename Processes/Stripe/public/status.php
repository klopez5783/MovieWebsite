<?php
session_start();

require_once '../../../Configuration/Stripe/stripe-php-14.8.0/init.php';
require_once '../secrets.php';

$stripe = new \Stripe\StripeClient($stripeSecretKey);
header('Content-Type: application/json');

try {
  // retrieve JSON from POST body
  $jsonStr = file_get_contents('php://input');
  $jsonObj = json_decode($jsonStr);

  $session = $stripe->checkout->sessions->retrieve($jsonObj->session_id);

  // Set session variables for the receipt
  $_SESSION['Receipt'] = [
    'status' => $session->status,
    'customer_email' => $session->customer_details->email,
    'amount_total' => $session->amount_total / 100, // Convert cents to dollars
    'currency' => strtoupper($session->currency),
    'session_id' => $jsonObj->session_id,
  ];

  echo json_encode(['status' => $session->status, 'customer_email' => $session->customer_details->email]);
  http_response_code(200);
} catch (Error $e) {
  http_response_code(500);
  echo json_encode(['error' => $e->getMessage()]);
}