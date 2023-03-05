var tructiepid = document.getElementById("tructiep")
var chuyenkhoanid = document.getElementById("chuyenkhoan")
var nhapsotien = document.getElementById("nhapsotien")
var nhappchuyenkhoan = document.getElementById("nhapchuyenkhoan")

var form2 = document.getElementById('payment-form');

var hiddenInput2 = document.createElement('input');
function doitructiep_chuyenkhoan() {
    hiddenInput2.setAttribute('type', 'hidden');
    hiddenInput2.setAttribute('name', 'hinhthucthanhtoan');
    hiddenInput2.setAttribute('value', 'tructiep');

    var card_element = document.getElementById('card-element');
    var card_stripe = document.getElementById('card_stripe');
    if (tructiepid.checked) {
        nhappchuyenkhoan.style.display = "none"
        nhapsotien.style.display = ""

        hiddenInput2.setAttribute('value', 'tructiep');
        if (card_element) {
            // card.destroy()
            card_element.remove();
        }
    }
    if (chuyenkhoanid.checked) {
        nhappchuyenkhoan.style.display = ""
        nhapsotien.style.display = "none"

        hiddenInput2.setAttribute('value', 'chuyenkhoan');
        if (!card_element) {
            var card_element2 = document.createElement('div');
            card_element2.setAttribute('id', 'card-element');
            card_stripe.appendChild(card_element2);
        }
        chuyenkhoan()
    }
    form2.appendChild(hiddenInput2);
}

var stripe, elements, card, form;
function chuyenkhoan() {
    // Create a Stripe client.
    stripe = Stripe('pk_test_51MhDjQLEqh448DKu5QaSXs3ZWvzFtTEetVpkbLahMSbhHZ0DkNraB9gzHWnD25rfpu3lRXsdEhiCMTrAcXMqpYhH00dBbNLjuB');
    // Create an instance of Elements.
    elements = stripe.elements();
    // Create an instance of the card Element.
    card = elements.create('card');

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.  
    form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        stripe.createToken(card).then(function (result) {
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
}

function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    console.log(hiddenInput);
    form.appendChild(hiddenInput);

    // Submit the form
    form.submit();
}