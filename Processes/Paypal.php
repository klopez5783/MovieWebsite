<?php


define('PAYPAL_SANDBOX',TRUE);
define('PAYPAL_SANDBOX_CLIENT_ID','AdVTeCnLLvbdzBX3zakchwRFbHEAySjqdohqLfVStLSxwpS439eYytj2JuPpHcXmugcmXkcTUzkgsQ2v');
define('PAYPAL_SANDBOX_CLIENT_SECRET','EOpZMnJEQzr7jWfIpjp43P729yb5JuSSSmciYM5B5-MbgtwrMP7-O79MQtgF-ps7QLC8RJIVxuzNoz2Y');



//NEW CODE

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;


// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'email' => 'lkristopher289@gmail.com',
    'return_url' => '../Webpages/PaymentSuccess.php',
    'cancel_url' => '../Webpages/CustomerInfo.php',
    'notify_url' => ''
];

$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';

// Product being purchased.
$itemName = 'MovieTicket';
$itemAmount = 5.00;


// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])) {

    // Grab the post data so that we can set up the query string for PayPal.
    // Ideally we'd use a whitelist here to check nothing is being injected into
    // our post data.
    $data = [];
    foreach ($_POST as $key => $value) {
        $data[$key] = stripslashes($value);
    }

    // Set the PayPal account.
    $data['business'] = $paypalConfig['email'];

    // Set the PayPal return addresses.
    $data['return'] = stripslashes($paypalConfig['return_url']);
    $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
    $data['notify_url'] = stripslashes($paypalConfig['notify_url']);

    // Set the details about the product being purchased, including the amount
    // and currency so that these aren't overridden by the form data.
    $data['item_name'] = $itemName;
    $data['amount'] = $itemAmount;
    $data['currency_code'] = 'GBP';

    // Add any custom fields for the query string.
    //$data['custom'] = USERID;

    // Build the query string from the data.
    $queryString = http_build_query($data);

    // Redirect to paypal IPN
   // header('location:' . $paypalUrl . '?' . $queryString);
    //exit();

} else {
    // Handle the PayPal response.
}
?>