<style>
@media print {
  body * {
    visibility: hidden;
  }
  #booking-summary, #booking-summary * {
    visibility: visible;
  }
  #booking-summary {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
  }
  #booking-btns {
    display: none !important;
  }
}
</style>
<div class="breadcumb-wrapper" data-bg-src="<?=base_url()?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title">Booking Summary</h3>
        </div>
    </div>
</div>
<div class="overflow-hidden space" id="gallery-sec">
    <div class="container">
        <div class="title-area mb-30 text-center">
            <span class="sub-title">Thank You For Booking with Us</span>
            <h2 class="sec-title">Booking Summary</h2>
        </div>
        <div class="row gy-4">
            <div class="col-lg-8 offset-lg-2">
                <div class="card" id="booking-summary">
                    <div class="card-body">
                        <div class="booking-details mb-4">
                            <h4 class="mb-3"><?= $tour['title'] ?></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Name:</strong> <?= $bookingData['name'] ?></p>
                                    <p><strong>Email:</strong> <?= $bookingData['email'] ?></p>
                                    <p><strong>Phone:</strong> <?= $bookingData['phone'] ?></p>
                                    <p><strong>Departure Date:</strong> <?= $bookingData['departure_date'] ?></p>
                                    <!-- <p><strong>Return Date:</strong> <?= $bookingData['return_date'] ?></p> -->
                                </div>
                                <div class="col-md-6">
                                    <!-- <p><strong>Duration:</strong> <?= $bookingData['howmany_days'] ?> Days, <?= $bookingData['howmany_night'] ?> Nights</p> -->
                                    <p><strong>Adults:</strong> <?= $bookingData['adults'] ?></p>
                                    <p><strong>Children (With Bed):</strong> <?= $bookingData['children_withbed'] ?></p>
                                    <p><strong>Children (Without Bed):</strong> <?= $bookingData['children'] ?></p>
                                    <!-- <p><strong>Hotel:</strong> <?= $bookingData['hotel'] ?></p> -->
                                    <p><strong>Meals:</strong> <?= $bookingData['meals'] ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="payment-section mt-4">
                            <div class="price-details mb-4">
                                <h5>Payment Details</h5>
                                <!-- <div class="d-flex justify-content-between">
                                    <p>Tour Price:</p>
                                    <p>₹<?= $bookingData['price'] ?></p>
                                </div> -->
                                <div class="d-flex justify-content-between">
                                    <p><strong>Tour Package Cost:</strong></p>
                                    <p><strong>₹<?= $bookingData['price'] ?></strong></p>
                                </div>
                            </div>
                            
                            <div class="text-center" id="booking-btns">
                                <button id="rzp-button1" class="btn btn-primary">Pay Now</button>
                                <a href="<?= base_url() ?>Booktour/thankyou/paylater" class="btn btn-secondary">Pay Later</a>
                            </div>

                            <!-- Hidden form for payment verification -->
                            <form name="razorpay-form" id="razorpay-form" action="<?= base_url() ?>Booktour/payment_callback" method="POST">
                                <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                                <input type="hidden" name="razorpay_order_id" id="razorpay_order_id" value="<?= $order_id ?>">
                                <input type="hidden" name="razorpay_signature" id="razorpay_signature">
                                <input type="hidden" name="booking_id" id="booking_id" value="<?= $bookingData['id'] ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "<?= $razorpay_key ?>", // Enter the Key ID generated from the Dashboard
    "amount": "<?= $amount ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Anaadi Tours & Travels",
    "description": "<?= $tour['title'] ?> - Tour Package",
    "image": "<?= base_url() ?>assets/img/logo.png",
    "order_id": "<?= $order_id ?>", // This is a sample Order ID. Pass the `id` obtained in the response
    "handler": function (response){
        // Set form values and submit
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.getElementById('razorpay-form').submit();
    },
    "prefill": {
        "name": "<?= $bookingData['name'] ?>",
        "email": "<?= $bookingData['email'] ?>",
        "contact": "<?= $bookingData['phone'] ?>"
    },
    "notes": {
        "booking_id": "<?= $bookingData['id'] ?>"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}

document.getElementById('print-button').onclick = function() {
    window.print();
};

</script>