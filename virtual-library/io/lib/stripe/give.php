<?php
// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account/apikeys

$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data


require_once('stripe-php-3.6.0/init.php');

\Stripe\Stripe::setApiKey("sk_test_wtCrhfNzMKJamroFKd9dyTI2"); //testing
//\Stripe\Stripe::setApiKey("sk_live_jT1RhCH636Q9WX6bakA0LB2T"); live

// Get the credit card details submitted by the form
$token = $_POST['stripeToken'];
$amount = $_POST['amount'];
if (empty($_POST['stripeToken']))
    $errors['stripeToken'] = 'No Stripe Token.';

// Create the charge on Stripe's servers - this will charge the user's card
try {
    // Create a Customer
    $customer = \Stripe\Customer::create(array(
        "source" => $token,
        "description" => "Website Donor")
    );

    // Charge the Customer instead of the card
    \Stripe\Charge::create(array(
        "amount" => $amount, // amount in cents, again
        "currency" => "usd",
        "customer" => $customer->id)
    );    
    $data['success'] = true;
    $data['message'] = 'Success!';
    $data['amount'] = '$'.($amount/100);
} catch(\Stripe\Error\Card $e) {
    $data['success'] = false;
    $data['message'] = 'Bad Stuff!';
}
header('Content-Type: application/json');
echo json_encode($data);
