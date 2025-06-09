<div class="breadcumb-wrapper" data-bg-src="<?=base_url()?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title"><?=$tour['title']?></h3>
        </div>
    </div>
</div>
<div class="about-area position-relative overflow-hidden overflow-hidden space" id="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 p-2 px-4">
                <div class="mt-0 title-area mb-20">
                    <h4 class="sec-title mb-20 pe-xl-5 me-xl-5 heading"><?=$tour['title']?></h4>
                </div>
                <div class="slider-area">
                    <div class="swiper th-slider" data-slider-options='{"centeredSlides":true,"centeredSlidesBounds":true,"spaceBetween":20,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"1"},"1200":{"slidesPerView":"1"}}}'>
                        <div class="swiper-wrapper">
                            <?php $images = explode(",", $tour['images']);
                                foreach($images as $i => $img){?>
                            <div class="swiper-slide">
                                <div class="testi-card3">
                                    <div class="box-img">
                                        <img class="border rounded" src="<?=base_url('assets/images/tours/'.$img)?>" alt="">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="widget widget_offer">
                    <div class="offer-banner">
                        <div class="offer">
                            <h6 class="box-title">Need Help? We Are Here To Help You</h6>
                            <div class="banner-logo"><img src="<?=base_url()?>assets/img/alogo.png" alt="Anaadi Tours & Travels"></div>
                            <div class="offer">
                                <h6 class="offer-title">You Get Online support</h6>
                                <a class="offter-num" href="tel:+91 6364328383">+91 6364328383</a>
                            </div>
                            <a href="<?=base_url('Contact')?>" class="th-btn th-icon">Contact</a>
                        </div>
                    </div>
                </div>
                <!-- <form class="row p-2 px-4 border rounded" name="tour_contact" method="POST" action="<?=base_url('Tour/contact')?>">
                    <div class="col-12">
                        <h5 class="mt-1">Contact Us</h5>
                    </div>
                    <div class="col-12 mb-2">
                        <input type="text" placeholder="Name" name="contact_name" value="" class="form-control p-1 px-2">
                    </div>
                    <div class="col-12 mb-2">
                        <input type="number" placeholder="Mobile" name="contact_phone" value="" class="form-control p-1 px-2">
                    </div>
                    <div class="col-12 mb-2">
                        <input type="email" placeholder="Email" name="contact_phone" value="" class="form-control p-1 px-2">
                    </div>  
                    <div class="col-12 mb-2">
                        <input type="text" placeholder="Your Location" name="contact_location" value="" class="form-control p-1 px-2">
                    </div>
                    <div class="col-12 text-center">
                        <button type="button" class="th-btn mt-2">Submit</button>
                    </div>
                </form> -->
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <div class="ps-xl-2">
                    <div class="mt-4 title-area mb-20">
                        <span class="sub-title style1">Tour Details</span>
                        <h4 class="sec-title mb-20 pe-xl-5 me-xl-5 heading"><?=$tour['title']?></h4>
                    </div>
                    <div class="about-item-wrap position-relative">
                        <?php if(!empty($tour['start_location'])) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>Starting Location:</b> <?=$tour['start_location']?></span>
                        <?php } ?>
                        <?php if(!empty($tour['arrival_location'])) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>Arrival Location:</b> <?=$tour['arrival_location']?></span>
                        <?php } ?>
                        <?php if(!empty($tour['destination_location'])) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>Destination Location:</b> <?=$tour['destination_location']?></span>
                        <?php } ?>
                        <?php if(!empty($tour['tour_start_place'])) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>Tour Starts (Place):</b> <?=$tour['tour_start_place']?></span>
                        <?php } ?>
                        <?php if(!empty($tour['tour_end_place'])) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>Tour Ends (Place):</b> <?=$tour['tour_end_place']?></span>
                        <?php } ?>
                        <?php if(!empty($tour['covered_locations'])) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>Covered Locations:</b> <?=$tour['covered_locations']?></span>
                        <?php } ?>
                        <?php if(!empty($tour['duration_days']) || !empty($tour['duration_nights'])) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>Duration:</b> 
                                <?php if(!empty($tour['duration_days'])) { echo $tour['duration_days'] . ' Days'; } ?>
                                <?php if(!empty($tour['duration_days']) && !empty($tour['duration_nights'])) { echo ' / '; } ?>
                                <?php if(!empty($tour['duration_nights'])) { echo $tour['duration_nights'] . ' Nights'; } ?>
                            </span>
                        <?php } ?>
                        <?php if(!empty($tour['min_adults'])) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>Min. Adults:</b> <?=$tour['min_adults']?></span>
                        <?php } ?>
                        <?php
                        $acc = [];
                        if (!empty($tour['accomodations'])) {
                            $acc = json_decode($tour['accomodations'], true);
                            if (!is_array($acc)) {
                                $acc = [$tour['accomodations']];
                            }
                        }
                        if (!empty($acc)) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>Accommodations:</b> <?=implode(', ', $acc)?></span>
                        <?php } ?>
                        <?php if(!empty($tour['meals'])) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>Meals:</b> <?=$tour['meals']?></span>
                        <?php } ?>
                        <?php if(!empty($tour['transfers'])) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>Transfers:</b> <?=$tour['transfers']?></span>
                        <?php } ?>
                        <?php if(!empty($tour['visa'])) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>VISA:</b> <?=$tour['visa']?></span>
                        <?php } ?>
                        <?php if(!empty($tour['air_ticket'])) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>Air Ticket:</b> <?=$tour['air_ticket']?></span>
                        <?php } ?>
                        <?php if(!empty($tour['travel_insurance'])) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>Travel Insurance:</b> <?=$tour['travel_insurance']?></span>
                        <?php } ?>
                        <?php if(!empty($tour['booking_validity_from']) && !empty($tour['booking_validity_to'])) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>Booking Validity:</b> <?=$tour['booking_validity_from']?> to <?=$tour['booking_validity_to']?></span>
                        <?php } ?>
                        <?php if(!empty($tour['package_validity_from']) && !empty($tour['package_validity_to'])) { ?>
                            <span class="d-block w-100 fs-16 text-dark"><b>Package Validity:</b> <?=$tour['package_validity_from']?> to <?=$tour['package_validity_to']?></span>
                        <?php } ?>
                        <?php if(!empty($tour['price'])) { ?>
                            <span class="price_block shadow"><i class="fa-solid fa-indian-rupee-sign me-1"></i><?=$tour['price']?> / Per Person</span>
                        <?php } ?>
                    </div>
                    <div class="itinerary mb-2 mt-4 fs-16 text-dark text-left w-100">
                        <?=$tour['itinerary']?>
                    </div>
                    <div class="w-100 mt-4">
                        <h2 class="box-title">Included</h2>
                        <?php
                        // Provide a default valid JSON array string if the tour data is empty or not set
                        $inclusions_json = !empty($tour['inclusions']) ? $tour['inclusions'] : '[]';
                        $exclusions_json = !empty($tour['exclusions']) ? $tour['exclusions'] : '[]';

                        $inclusions = json_decode($inclusions_json, true);
                        $exclusions = json_decode($exclusions_json, true);

                        // Ensure $inclusions and $exclusions are arrays, even if json_decode fails
                        if (!is_array($inclusions)) {
                            $inclusions = [];
                        }
                        if (!is_array($exclusions)) {
                            $exclusions = [];
                        }
                        ?>

                        <div class="destination-checklist">
                            <div class="checklist style4">
                                <ul>
                                    <?php foreach($inclusions as $item){?>
                                    <li><?=$item?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-100 mt-4">
                        <h2 class="box-title">Excluded</h2>
                        <div class="destination-checklist">
                            <div class="checklist style5">
                                <ul>
                                    <?php foreach($exclusions as $item){?>
                                    <li><?=$item?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-35"><a href="<?=base_url('/Booktour/'.$tour['url_title'])?>" class="th-btn th-icon">Book Now</a></div>
                </div>
            </div>
            <div class="col-xl-4">
                
            </div>
        </div>
        <?php if( isset($related_tours) && count($related_tours) > 0) { ?>
        <section class="tour-area position-relative bg-top-center overflow-hidden space" id="service-sec" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="title-area text-left">
                            <span class="h4">Related Tours</span>
                        </div>
                    </div>
                </div>
                <div class="slider-area tour-slider">
                    <div class="swiper th-slider has-shadow slider-drag-wrap" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"},"1300":{"slidesPerView":"4"}}}'>
                        <div class="swiper-wrapper">
                            <?php foreach($related_tours as $tour){
                                $images = explode(",", $tour['images']);
                            ?>
                            <div class="swiper-slide">
                                <div class="tour-box th-ani gsap-cursor">
                                    <div class="tour-box_img global-img">
                                        <img src="<?=base_url('assets/images/tours/'.$images[0])?>" alt="<?=$tour['title']?>">
                                    </div>
                                    <div class="tour-content">
                                        <h3 class="box-title mb-1"><a href="<?=base_url('Tour/'.$tour['url_title'])?>"><?=$tour['title']?></a></h3>
                                        <!-- <h4 class="tour-box_price"><span class="currency"><?=$tour['price']?></span>/Person</h4> -->
                                        <div class="tour-action"><span><i class="fa-light fa-clock"></i><?=$tour['duration_days']?> Days</span> 
                                            <a href="<?=base_url('Contact')?>" class="th-btn style4 th-icon">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
        <div class="shape-mockup movingX d-none d-xxl-block" data-top="0%" data-left="-18%"><img src="<?=base_url()?>assets/img/shape/shape_2_1.png" alt="shape"></div>
        <div class="shape-mockup jump d-none d-xxl-block" data-top="28%" data-right="-15%"><img src="<?=base_url()?>assets/img/shape/shape_2_2.png" alt="shape"></div>
        <div class="shape-mockup spin d-none d-xxl-block" data-bottom="18%" data-left="-112%"><img src="<?=base_url()?>assets/img/shape/shape_2_3.png" alt="shape"></div>
        <div class="shape-mockup movixgX d-none d-xxl-block" data-bottom="18%" data-right="-12%"><img src="<?=base_url()?>assets/img/shape/shape_2_4.png" alt="shape"></div>
    </div>
</div>