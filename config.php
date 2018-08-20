<?php require_once('public/stripe/init.php');
$stripe = array(  "secret_key"      => "sk_test_6j1YMLMFpEQTJMZWYSCD2tDL",  "publishable_key" => "pk_test_Q09LlObaBEFvYbbFwCq41LPm" );
\Stripe\Stripe::setApiKey($stripe['secret_key']); ?>
