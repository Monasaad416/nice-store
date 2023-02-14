<x-front-layout>
     
  


    <x-slot:header>
        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Payment</h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Home</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">Payment</p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
    </x-slot:header>


    <!-- Checkout Start -->
 


        <div class="container">
                <div class="row">
                        <div class="col">
                           {{-- @include('inc.errors') --}}
        <style>

                #payment-form{
                align-self: center;
                box-shadow: 0px 0px 0px 0.5px rgba(50, 50, 93, 0.1),
                0px 2px 5px 0px rgba(50, 50, 93, 0.1), 0px 1px 1.5px 0px rgba(0, 0, 0, 0.07);
                border-radius: 7px;
                padding: 40px;
                }

                #payment-message {
                color: rgb(105, 115, 134);
                font-size: 16px;
                line-height: 20px;
                padding-top: 12px;
                text-align: center;
                }

                #payment-element {
                margin-bottom: 24px;
                }

                /* Buttons and links */
                button {
                background: #5469d4;
                font-family: Arial, sans-serif;
                color: #ffffff;
                border-radius: 4px;
                border: 0;
                padding: 12px 16px;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                display: block;
                transition: all 0.2s ease;
                box-shadow: 0px 4px 5.5px 0px rgba(0, 0, 0, 0.07);
                width: 100%;
                }
                button:hover {
                filter: contrast(115%);
                }
                button:disabled {
                opacity: 0.5;
                cursor: default;
                }

                </style>
                <form id="payment-form">

                        <div id="link-authentication-element">
                                <!--Stripe.js injects the Link Authentication Element-->
                        </div>
                        <div id="payment-element">
                                <!--Stripe.js injects the Payment Element-->
                        </div>
                        <button id="submit">
                                <div class="spinner hidden" id="spinner"></div>
                                <span id="button-text">Pay now</span>
                        </button>
                        <div id="payment-message" class="hidden"></div>
                </form>
                        </div>
                </div>
        </div>

    <!-- Checkout End -->


        @push('scripts')
            <script src="https://js.stripe.com/v3/"></script>
            <script>
            //srtipe script
                    // This is your test publishable API key.
                    const stripe = Stripe("{{config('services.stripe.publishable_key')}}");

                    // The items the customer wants to buy
                    // const items = [{ id: "xl-tshirt" }];

                    let elements;

                    initialize();
                    checkStatus();

                    document
                    .querySelector("#payment-form")
                    .addEventListener("submit", handleSubmit);

                    let emailAddress = '';
                    // Fetches a payment intent and captures the client secret
                    async function initialize() {
                        
                    const { clientSecret } = await fetch("{{route('front.order.stripe.paymentIntent',$order->id) }} ", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({
                            "_token"  : "{{ csrf_token() }}"
                            }),
                    }).then((r) => r.json());

                    elements = stripe.elements({ clientSecret });

                    const linkAuthenticationElement = elements.create("linkAuthentication");
                    linkAuthenticationElement.mount("#link-authentication-element");

                    const paymentElementOptions = {
                    layout: "tabs",
                    };

                    const paymentElement = elements.create("payment", paymentElementOptions);
                    paymentElement.mount("#payment-element");
                    }

                    async function handleSubmit(e) {
                    e.preventDefault();
                    setLoading(true);

                    const { error } = await stripe.confirmPayment({
                    elements,
                    confirmParams: {
                    // Make sure to change this to your payment completion page
                    return_url: "{{route('front.stripe.return',$order->id)}}",
                    receipt_email: emailAddress,
                    },
                    });

                    // This point will only be reached if there is an immediate error when
                    // confirming the payment. Otherwise, your customer will be redirected to
                    // your `return_url`. For some payment methods like iDEAL, your customer will
                    // be redirected to an intermediate site first to authorize the payment, then
                    // redirected to the `return_url`.
                    if (error.type === "card_error" || error.type === "validation_error") {
                    showMessage(error.message);
                    } else {
                    showMessage("An unexpected error occurred.");
                    }

                    setLoading(false);
                    }

                    // Fetches the payment intent status after payment submission
                    async function checkStatus() {
                    const clientSecret = new URLSearchParams(window.location.search).get(
                    "payment_intent_client_secret"
                    );

                    if (!clientSecret) {
                    return;
                    }

                    const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

                    switch (paymentIntent.status) {
                    case "succeeded":
                    showMessage("Payment succeeded!");
                    break;
                    case "processing":
                    showMessage("Your payment is processing.");
                    break;
                    case "requires_payment_method":
                    showMessage("Your payment was not successful, please try again.");
                    break;
                    default:
                    showMessage("Something went wrong.");
                    break;
                    }
                    }

                    // ------- UI helpers -------

                    function showMessage(messageText) {
                    const messageContainer = document.querySelector("#payment-message");

                    messageContainer.classList.remove("hidden");
                    messageContainer.textContent = messageText;

                    setTimeout(function () {
                    messageContainer.classList.add("hidden");
                    messageText.textContent = "";
                    }, 4000);
                    }

                    // Show a spinner on payment submission
                    function setLoading(isLoading) {
                    if (isLoading) {
                    // Disable the button and show a spinner
                    document.querySelector("#submit").disabled = true;
                    document.querySelector("#spinner").classList.remove("hidden");
                    document.querySelector("#button-text").classList.add("hidden");
                    } else {
                    document.querySelector("#submit").disabled = false;
                    document.querySelector("#spinner").classList.add("hidden");
                    document.querySelector("#button-text").classList.remove("hidden");
                    }
                    }


            </script>
        @endpush
</x-front-layout>
