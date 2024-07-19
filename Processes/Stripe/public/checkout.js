// This is a public sample test API key.
// Don’t submit any personally identifiable information in requests made with this key.
// Sign in to see your own test API key embedded in code samples.
const stripe = Stripe("pk_test_51PLUmlRsI0RHXX1kDuvmi9lJRQkZXAtF7ZMmrSznSM4flzpnC6n7HKk7LvTiIIPPocVVIH1JyS5uuQKhB6SBVKic00ddaFFbRN");

initialize();

// Create a Checkout Session
async function initialize() {
  const fetchClientSecret = async () => {
    const response = await fetch("../Processes/Stripe/public/checkout.php", {
      method: "POST",
    });
    const { clientSecret } = await response.json();
    return clientSecret;
  };

  const checkout = await stripe.initEmbeddedCheckout({
    fetchClientSecret,
  });

  // Mount Checkout
  checkout.mount('#StripCheckout');
}