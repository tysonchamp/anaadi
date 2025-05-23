<div class="breadcumb-wrapper" data-bg-src="<?=base_url()?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title">Payment Failed</h3>
        </div>
    </div>
</div>
<div class="overflow-hidden space" id="failed-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="payment-failed-box text-center">
                    <div class="failed-icon mb-4">
                        <i class="fas fa-times-circle fa-5x text-danger"></i>
                    </div>
                    <h2 class="mb-3">Payment Failed!</h2>
                    <p class="mb-4">We're sorry, but your payment could not be processed at this time.</p>
                    
                    <div class="booking-details card mb-4">
                        <div class="card-body">
                            <h4>Booking Details</h4>
                            <div class="row mt-3">
                                <div class="col-md-6 text-start">
                                    <p><strong>Reference:</strong> #<?= str_pad($bookingData['id'], 6, '0', STR_PAD_LEFT) ?></p>
                                    <p><strong>Tour Package:</strong> <?= $tour['title'] ?></p>
                                    <p><strong>Name:</strong> <?= $bookingData['name'] ?></p>
                                </div>
                                <div class="col-md-6 text-start">
                                    <p><strong>Departure Date:</strong> <?= $bookingData['departure_date'] ?></p>
                                    <p><strong>Return Date:</strong> <?= $bookingData['return_date'] ?></p>
                                    <p><strong>Amount:</strong> ₹<?= $tour['price'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <p>Possible reasons for payment failure:</p>
                    <ul class="list-unstyled">
                        <li>Insufficient funds in your account</li>
                        <li>Card details entered incorrectly</li>
                        <li>Transaction declined by your bank</li>
                        <li>Network or connectivity issues</li>
                    </ul>
                    
                    <div class="actions mt-4">
                        <a href="<?= base_url() ?>Booktour/paymentgateway/<?= $bookingData['id'] ?>" class="btn btn-primary">Try Again</a>
                        <a href="<?= base_url() ?>" class="btn btn-outline-secondary ms-2">Return to Home</a>
                    </div>
                    
                    <p class="mt-4">If you continue to face issues, please contact our customer support team for assistance.</p>
                </div>
            </div>
        </div>
    </div>
</div>
