// Set the connected Stripe Account to collect payments on behalf of that account
var stripe = Stripe('pk_test_51H01UmCzQGljWAqJCE3LZvSY0JN4xWKwrPxCeb2SwGA3EOru6rTPnTR7FDC24cXs7UIw0dMskktTTGiUFLfm0IDD00stVTv7ME'
    , {
        stripeAccount: "acct_1H0SnXBzzr6tYjTO"
    }
);
//secret client
var response = fetch('/secret').then(function(response) {
    return response.json();
}).then(function(responseJson) {
    var clientSecret = responseJson.client_secret;
    // Call stripe.confirmCardPayment() with the client secret.
});

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
    base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
            color: '#aab7c4'
        }
    },
    invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
    }
};
// Style button with BS
document.querySelector('#payment-form button').classList='btn btn-primary btn-block mt-4';

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
        displayError.textContent = event.error.message;
    } else {
        displayError.textContent = '';
    }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
    event.preventDefault();

    stripe.createToken(card).then(function(result) {
        if (result.error) {
            // Inform the user if there was an error.
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // Send the token to your server.
            stripeTokenHandler(result.token);
        }
    });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
}

var response = fetch('/secret').then(function(response) {
    return response.json();
}).then(function(responseJson) {
    var clientSecret = responseJson.client_secret;
    // Call stripe.confirmCardPayment() with the client secret.
});