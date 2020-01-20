<?php


use PayPal\Api\Payer;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;


require 'db.php';

$sum = $_SESSION['sum'];
$tax = 2.00;
$total = $sum+$tax;

$payer = new Payer();
$details = new Details();
$amount = new Amount();
$transaction = new Transaction();
$payment = new Payment();
$redirectUrls = new RedirectUrls();

$payer->setPaymentMethod('PayPal');

$details->setShipping($tax)
        ->setTax('0.00')
        ->setSubtotal($sum);

$amount->setCurrency('EUR')
       ->setTotal($total)
       ->setDetails($details);
       
$transaction->setAmount($amount)
        ->setDescription('Complete');

$payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions([$transaction]);

$redirectUrls->setReturnUrl('http://localhost/oglasv/paypal/pay.php?approved=true')
            ->setCancelUrl('http://localhost/oglasv/pay.php?approved=false');

$payment->setRedirectUrls($redirectUrls);



try{

     $payment->create($api);

     $hash = md5($payment->getId());
     $_SESSION['paypal_hash'] = $hash;

     $store = $db->prepare("
     INSERT INTO transactions_paypal (user_id,payment_id,hash,complete)
     VALUES (:user_id,:payment_id,:hash,0)
     ");

     $store ->execute([
         'user_id' => $_SESSION['user_id'],
         'payment_id' => $payment->getId(),
        'hash' => $hash
       

         ]);
   
}catch(PayPal\Exception\PayPalConnectionException $e){

    var_dump($e);
    exit();
    header('Location: paypal/error.php');

}

foreach($payment->getLinks() as $link){
    if($link->getRel() == 'approval_url'){
        $redirectUrls = $link->getHref();
    }
}

header('Location: ' . $redirectUrls);it();

