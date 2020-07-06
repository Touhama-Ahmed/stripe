<?php


	class Pay extends CI_Controller{

		public function index(){
            $this->load->view('stripe/index');
		}

        public function validate(){

            require_once('vendor/autoload.php');
           \Stripe\Stripe::setApiKey('sk_test_51H1rhZIb3MvN5ZfV1cCdPlVSdQcpuSNttuQYIBUlYheclHB3NjGXjB7BW05ihV3Q0jKeu0hUCLxxccCg2PEHbVKv00NGGfVmqI');
            $stripe = new \Stripe\StripeClient(
                'sk_test_51H1rhZIb3MvN5ZfV1cCdPlVSdQcpuSNttuQYIBUlYheclHB3NjGXjB7BW05ihV3Q0jKeu0hUCLxxccCg2PEHbVKv00NGGfVmqI'
            );
            // sanitize  post array
            $POST =  filter_var_array($_POST, FILTER_SANITIZE_STRING);

            $prenom = $POST['prenom'];
            $nom    = $POST['nom'];
            $email  = $POST['email'];
            $token  = $POST['stripeToken'];
           // echo $prenom.'<br>'.$nom.'<br>'.$email.'<br>'.$token.'<br>success';

             // Create Customer In Stripe
//            $customer = \Stripe\Customer::create(array(
//               "email"  => $email,
//               "source" => $token
//            ));
            $customer = $stripe->customers->create([
                'description' => 'My First Test Customer (created for API docs)',
                "email"  => $email,
                "source" => $token,
            ]);
            print_r($customer);

            /*// Create card
            $card = $stripe->customers->createSource(
                $customer->id,
                array('source' => $token)
            );
            print_r($card);


            // payment
            $intent = \Stripe\PaymentIntent::create(array(
                'payment_method_types' => array('card'),
                "amount"      => 8000,
                "currency"    => "usd",
                "description" => "test2",
                "payment_method" => $card->id,
                "application_fee_amount" => 1000
            ),
                array(
                    'stripe_account' => 'acct_1H0SnXBzzr6tYjTO'
                )
                );

//            print_r($charge);
            /*$intent = $stripe->paymentIntents->create(array(
                'amount' => 5000,
                'currency' => 'usd',
                'description' => 'Test payement',

            ), array("stripe_account" => "acct_1H0SnXBzzr6tYjTO"));
            print_r($intent);*/

            /*$data['tid'] = $charge->id;
            $data['product'] = $charge->description;
            if (!empty($data['tid']) && !empty($data['product'])) {
                $this->load->view('success.php', $data);
            } else {
                $this->load->view('stripe/index');
            }*/

        }
    }