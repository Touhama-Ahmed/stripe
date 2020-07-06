<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Thank you</title>
    <!--CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h2>Thank you for purchasing <?php echo $product;?></h2>
        <hr>
        <p>Your transaction ID  is <?php echo $tid?></p>
        <p>Check your email for more information</p>
        <p><a href="/stripe" class="btn btn-light mt-2">Go Back</a></p>

    </div>

</body>
</html>