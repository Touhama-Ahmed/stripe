<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pay page</title>
    <!--CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <h2 class="my-4 text-center">Test payement [$50]</h2>
    <?php
    $attributes = array('id' => 'payment-form');
    echo form_open('pay/validate', $attributes);
    ?>
<!--    <form action="./validate" method="post" id="payment-form">-->

        <input type="text" name="prenom" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Prenom">

        <input type="text" name="nom" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Nom">

        <input type="email" name="email" class="form-control mb-3 StripeElement StripeElement--empty" placeholder="Email">

        <div class="form-row">
            <div id="card-element" class="form-control">
                <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
        </div>

        <button>Submit Payment</button>
    </form>
</div>

<!--scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="assets/js/charge.js"></script>
</body>
</html>