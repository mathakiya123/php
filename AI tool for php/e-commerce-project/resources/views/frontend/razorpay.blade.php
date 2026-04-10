<!DOCTYPE html>
<html>
<head>
    <title>Pay with Razorpay</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

<script>
var options = {
    "key": "rzp_test_SbEifaZGriVt5I", // 👈 replace
    "amount": "{{ $total * 100 }}",
    "currency": "INR",
    "name": "LaraShop",
    "description": "Order Payment",
    "handler": function (response){
        window.location.href = "/payment-success?payment_id=" + response.razorpay_payment_id;
    }
};

var rzp = new Razorpay(options);
rzp.open();
</script>

</body>
</html>