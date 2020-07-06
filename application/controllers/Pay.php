<?php


	class Pay extends CI_Controller{

		public function index(){
            $this->load->view('stripe/index');
		}

        public function validate(){

            require_once('vendor/autoload.php');
           \Stripe\Stripe::setApiKey('sk_test_51H0SnXBzzr6tYjTOFwKgB8G2SPHXMFrspc1LdLsSlsH23vgSnEIY7rMqlYrP4OTIIDuvkDPt20I0bphEljgx4h7D00DWkj3Ded');
            $stripe = new \Stripe\StripeClient(
                'sk_test_51H0SnXBzzr6tYjTOFwKgB8G2SPHXMFrspc1LdLsSlsH23vgSnEIY7rMqlYrP4OTIIDuvkDPt20I0bphEljgx4h7D00DWkj3Ded'
            );
            // sanitize  post array
            $POST =  filter_var_array($_POST, FILTER_SANITIZE_STRING);

            $prenom = $POST['prenom'];
            $nom    = $POST['nom'];
            $email  = $POST['email'];
            $token  = $POST['stripeToken'];
            //echo $prenom.'<br>'.$nom.'<br>'.$email.'<br>'.$token.'<br>success';

             // Create Customer In Stripe
            $customer = \Stripe\Customer::create(array(
                "email"  => $email,
                "source" => $token
            ));
            print_r($customer);

           /* $customer = $stripe->customers->create(array(
                'description' => 'Customer test',
                "email"  => $email,
                //"source" => $token
            ));
            print_r($customer);
*/
            // Create card
            $card = $stripe->customers->createSource(
                $customer->id,
                array('source' => $token)
            );
            //print_r($card);


            // payment
            $intent = \Stripe\PaymentIntent::create(array(
                "amount"      => 16000,
                "currency"    => "usd",
                'payment_method_types' => array('card'),
                "description" => "test2",
                "application_fee_amount" => 7000,
            ),
                array(
                    'stripe_account' => 'acct_1H01UmCzQGljWAqJ'
                )
                );
            print_r($intent);

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