<div class="breadcumb-wrapper" data-bg-src="<?=base_url()?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title">Payment Successful</h3>
        </div>
    </div>
</div>
<div class="overflow-hidden space" id="success-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="payment-success-box text-center">
                    <div class="success-icon mb-4">
                        <i class="fas fa-check-circle fa-5x text-success"></i>
                    </div>
                    <h2 class="mb-3">Thank You for Your Payment!</h2>
                    <p class="mb-4">Your payment has been processed successfully. Your booking is now confirmed.</p>
                    
                    <div class="booking-details card mb-4">
                        <div class="card-body">
                            <h4>Booking Details</h4>
                            <div class="row mt-3">
                                <div class="col-md-6 text-start">
                                    <p><strong>Booking Reference:</strong> #<?= str_pad($bookingData['id'], 6, '0', STR_PAD_LEFT) ?></p>
                                    <p><strong>Tour Package:</strong> <?= $tour['title'] ?></p>
                                    <p><strong>Name:</strong> <?= $bookingData['name'] ?></p>
                                    <p><strong>Email:</strong> <?= $bookingData['email'] ?></p>
                                </div>
                                <div class="col-md-6 text-start">
                                    <p><strong>Departure Date:</strong> <?= $bookingData['departure_date'] ?></p>
                                    <p><strong>Return Date:</strong> <?= $bookingData['return_date'] ?></p>
                                    <p><strong>Adults:</strong> <?= $bookingData['adults'] ?></p>
                                    <p><strong>Amount Paid:</strong> ₹<?= $tour['price'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <p>A confirmation email has been sent to your email address. If you have any questions, please contact our customer support team.</p>
                    
                    <div class="actions mt-4">
                        <a href="<?= base_url() ?>" class="btn btn-primary">Return to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
