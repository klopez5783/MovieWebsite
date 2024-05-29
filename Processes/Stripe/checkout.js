// This is your test publishable API key.
const stripe = Stripe("pk_test_51PLUmlRsI0RHXX1kDuvmi9lJRQkZXAtF7ZMmrSznSM4flzpnC6n7HKk7LvTiIIPPocVVIH1JyS5uuQKhB6SBVKic00ddaFFbRN");

initialize();

// Create a Checkout Session
async function initialize() {
  const fetchClientSecret = async () => {
    const response = await fetch("../../Webpages/CustomerInfo.php", {
      method: "POST",
    });
    const { clientSecret } = await response.json();
    return clientSecret;
  };

  const checkout = await stripe.initEmbeddedCheckout({
    fetchClientSecret,
  });

  // Mount Checkout
  checkout.mount('#checkout');
}