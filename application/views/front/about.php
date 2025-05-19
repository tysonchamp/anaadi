<div class="breadcumb-wrapper" data-bg-src="<?=base_url()?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title">About Us</h3>
        </div>
    </div>
</div>
<div class="about-area position-relative overflow-hidden overflow-hidden space" id="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-xl-7">
                <div class="img-box3">
                    <div class="img1"><img src="<?=base_url()?>assets/img/destination/destination_5_2.jpg" alt="About"></div>
                    <div class="img2"><img src="<?=base_url()?>assets/img/destination/destination_6_1.jpg" alt="About"></div>
                    <div class="img3 movingX"><img src="<?=base_url()?>assets/img/destination/destination_8_3.jpg" alt="About"></div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="ps-xl-4">
                    <div class="title-area mb-20">
                        <span class="sub-title style1">Welcome To Anaadi</span>
                        <h3 class="sec-title mb-20 pe-xl-5 me-xl-5 heading">Your one stop solution for all your travels needs.</h3>
                    </div>
                    <p class="pe-xl-5 ">To all the globe-trotters and to all the wanderlust folks out there, we at <b class="fw-normal text-theme">Anaadi Tours and Travels</b> bring you an exciting opportunity to escape, explore and experience all the exotic locales within India and across the world.</p>
                    
                    <p class="mb-20 pe-xl-5">As a new venture established in the year 2025, we have already begun curating exceptional travel experiences and innovative packages touching upon all the <b class="fw-normal text-theme">7</b> A’s of tourism – <b class="fw-normal text-theme">attraction, accessibility, affordability, accommodation, amenities, adventure and activities</b>.</p>

                    <p class="mb-20 pe-xl-5">At <b class="fw-normal text-theme">Anaadi</b>, we provide one stop solution to all your travel requirements - <b class="fw-normal text-theme">affordable packages</b> and tie-ups with the best overseas DMCs, besides an entire gamut of additional services like <b class="fw-normal text-theme">flight booking, travel insurance, visa and hotel bookings</b>. </p>

                    <p class="mb-20 pe-xl-5">
                        At <b class="fw-normal text-theme">Anaadi</b>, optimizing <b class="fw-normal text-theme">customer satisfaction</b> is paramount, even as we endeavor to create experiences that last a lifetime. 
                    </p>

                    <p class="mb-20 pe-xl-5">
                        As the world beckons you, we invite you to embark on an <b class="fw-normal text-theme">unforgettable travel experience</b> to cherish for ages.
                    </p>
                    <!-- <div class="about-item-wrap">
                        <div class="about-item style2">
                            <div class="about-item_img"><img src="<?=base_url()?>assets/img/icon/about_1_1.svg" alt=""></div>
                            <div class="about-item_centent">
                                <h5 class="box-title">Exclusive Trip</h5>
                                <p class="about-item_text">We plan trip accordingly to customer requirement in best way to satisfy them. Also we provide unique and customized itineraries to our customers with 24/7 support.</p>
                            </div>
                        </div>
                        <div class="about-item style2">
                            <div class="about-item_img"><img src="<?=base_url()?>assets/img/icon/about_1_2.svg" alt=""></div>
                            <div class="about-item_centent">
                                <h5 class="box-title">Safety First Always</h5>
                                <p class="about-item_text">No compromise for Safety, Comfort and On time travel. We provide utmost importance for safety and comfort for clients.</p>
                            </div>
                        </div>
                        <div class="about-item style2">
                            <div class="about-item_img"><img src="<?=base_url()?>assets/img/icon/choose_3_1.svg" alt=""></div>
                            <div class="about-item_centent">
                                <h5 class="box-title">Convenience</h5>
                                <p class="about-item_text">We will provide you all type of solutions accordingly with convenience. As we are the trusted travel partner you will be offered with lot of benefits.</p>
                            </div>
                        </div>
                    </div> -->
                    <div class="mt-35"><a href="<?=base_url('/Contact')?>" class="th-btn th-icon">Contact Us</a></div>
                </div>
            </div>
        </div>
        <div class="shape-mockup movingX d-none d-xxl-block" data-top="0%" data-left="-18%"><img src="<?=base_url()?>assets/img/shape/shape_2_1.png" alt="shape"></div>
        <div class="shape-mockup jump d-none d-xxl-block" data-top="28%" data-right="-15%"><img src="<?=base_url()?>assets/img/shape/shape_2_2.png" alt="shape"></div>
        <div class="shape-mockup spin d-none d-xxl-block" data-bottom="18%" data-left="-112%"><img src="<?=base_url()?>assets/img/shape/shape_2_3.png" alt="shape"></div>
        <div class="shape-mockup movixgX d-none d-xxl-block" data-bottom="18%" data-right="-12%"><img src="<?=base_url()?>assets/img/shape/shape_2_4.png" alt="shape"></div>
    </div>
</div>
<section class="testi-area7 bg-smoke overflow-hidden space" id="testi-sec" data-bg-src="<?=base_url()?>assets/img/bg/map.png">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="title-area mb-40">
                    <span class="sub-title">Testimonial</span>
                    <h2 class="sec-title">What Our Clients Think</h2>
                </div>
                <div class="swiper th-slider testiSlide5" id="testiSlide7" data-slider-options='{"effect":"slide","loop":false,"thumbs":{"swiper":".testi-grid2-thumb"}}'>
                    <div class="swiper-wrapper">
                        <?php foreach($testimonial as $row){?>
                        <div class="swiper-slide">
                            <div class="testi-grid2">
                                <div class="box-content">
                                    <p class="box-text">“<?=$row['testimonial']?>”</p>
                                    <h6 class="box-title"><?=$row['name']?></h6>
                                    <span class="box-desig"><?=$row['sub_title']?></span>
                                    <div class="box-review"><i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i></div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="swiper th-slider testi-grid2-thumb style2" data-slider-options='{"effect":"slide","slidesPerView":"6","spaceBetween":7,"loop":false}'>
                    <div class="icon-box"><button data-slider-prev="#testiSlide7" class="slider-arrow default"><img src="<?=base_url()?>assets/img/icon/right-arrow2.svg" alt=""></button> <button data-slider-next="#testiSlide7" class="slider-arrow default"><img src="<?=base_url()?>assets/img/icon/left-arrow2.svg" alt=""></button></div>
                    <div class="swiper-wrapper">
                        <?php foreach($testimonial as $row){?>
                        <div class="swiper-slide">
                            <div class="box-img"><img src="<?=base_url('assets/images/testimonial/'.$row['image'])?>" alt="<?=$row['name']?>"></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="testi-image-wrapp2">
                    <div class="testi-img" data-mask-src="<?=base_url()?>assets/img/testimonial/testi_shape_1.png"><img src="<?=base_url()?>assets/img/testimonial/testi-img1.jpg" alt=""></div>
                    <div class="testi-shape2"><img src="<?=base_url()?>assets/img/testimonial/testi_shape_1.png" alt=""></div>
                    <div class="testi-img2"><img src="<?=base_url()?>assets/img/testimonial/testi-img2.jpg" alt=""></div>
                    <div class="testi-shape"><img src="<?=base_url()?>assets/img/testimonial/testi_shape_2.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-mockup z-index-3 d-none d-xl-block" data-bottom="0%" data-right="0%"><img src="<?=base_url()?>assets/img/shape/shape_21.png" alt="shape"></div>
</section>
