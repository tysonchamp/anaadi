<?php if( count($homeslider) > 0 ){ ?>
<div class="th-hero-wrapper hero-1" id="hero">
	<div class="swiper th-slider hero-slider-1" id="heroSlide1" data-slider-options='{"effect":"fade","menu": ["", "", ""],"heroSlide1": {"swiper-container": {"pagination": {"el": ".swiper-pagination", "clickable": true }}}}'>
		<div class="swiper-wrapper">
			<?php foreach ($homeslider as $tour_category => $slider) { ?>
			<div class="swiper-slide">
				<div class="hero-inner">
					<div class="th-hero-bg" data-bg-src="<?=base_url('assets/images/homeslider/'.$slider['image'])?>"></div>
					<div class="container">
						<div class="hero-style1">
							<span class="sub-title style1" data-ani="slideinup" data-ani-delay="0.2s"><?=$slider['sub_title']?></span>
							<h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.4s"><?=$slider['title']?></h1>
							<div class="btn-group" data-ani="slideinup" data-ani-delay="0.6s">
								<a href="<?=base_url('Booktour')?>" class="th-btn th-icon">Book your Tour</a> 
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>
<?php } ?>
<div class="about-area position-relative overflow-hidden space" id="about-sec">
	<div class="container">
		<div class="row">
			<div class="col-xl-6">
				<div class="img-box6">
					<div class="img1">
						<img src="<?=base_url()?>assets/img/normal/about_1_1.jpg" alt="About">
					</div>
					<div class="img2">
						<img src="<?=base_url()?>assets/img/normal/about_1_2.jpg" alt="About">
					</div>
					<div class="img3">
						<img src="<?=base_url()?>assets/img/category/category_1_5.jpg" alt="About">
					</div>
				</div>
			</div>
			<div class="col-xl-6">
				<div class="ps-xl-5 ms-xl-3">
					<div class="title-area mb-10">
						<span class="sub-title fs-2 style1">Welcome to Anaadi Tours & Travels</span>
						<h3 class="sec-title mb-20">Begin Your Travel Story with Us</h3>
						
						<p class="sec-text mb-20">To all the globe-trotters and to all the wanderlust folks out there, we at <b>Anaadi Tours and Travels</b> bring you an exciting opportunity to escape, explore and experience all the exotic locales within India and across the world.</p>

						<p class="sec-text mb-20">As a new venture established in the year 2025, we have already begun curating exceptional travel experiences and innovative packages touching upon all the 7 A’s of tourism – <b>attraction, accessibility, affordability, accommodation, amenities, adventure and activities</b>.</p>
						
						<p class="sec-text mb-20">At Anaadi, we provide one stop solution to all your travel requirements - <b>affordable packages</b> and tie-ups with the best overseas DMCs, besides an entire gamut of additional services like <b>flight booking, travel insurance, visa and hotel bookings</b>. </p>

					</div>
					<div class="mt-30"><a href="<?=base_url('/About')?>" class="th-btn th-icon">Read More</a></div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if( count($domestic_tours) > 0 ){ ?>
<section class="category-area3 bg-smoke space" data-bg-src="<?=base_url()?>assets/img/bg/line-pattern3.png">
	<div class="container th-container">
		<div class="title-area text-center">
			<span class="sub-title">Wornderful Place For You</span>
			<h2 class="sec-title">Domestic Tours</h2>
		</div>
		<div class="slider-area">
			<div class="swiper th-slider has-shadow category-slider3" id="categorySlider3" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"},"1400":{"slidesPerView":"5"}}}'>
				<div class="swiper-wrapper">
					<?php foreach ($domestic_tours as $tour_category => $tours) { 
						$images = explode(",", $tours[0]['images']);
					?>
					<div class="swiper-slide">
						<div class="category-card single2">
							<div class="box-img global-img shadow"><img class="shadow" src="<?=base_url('assets/images/tours/'.$images[0])?>" alt="<?=$tour_category?> Tours"></div>
							<h3 class="box-title"><a href="<?=base_url('Domestictours/'.$tour_category)?>"><?=$tour_category?></a></h3>
							<a class="line-btn" href="<?=base_url('Domestictours/'.$tour_category)?>">See more</a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<?php if( count($international_tours) > 0 ){ ?>
<section class="category-area3 bg-smoke space pt-0" data-bg-src="<?=base_url()?>assets/img/bg/line-pattern3.png">
	<div class="container th-container">
		<div class="title-area text-center">
			<span class="sub-title">Wornderful Place For You</span>
			<h2 class="sec-title">International Tours</h2>
		</div>
		<div class="slider-area">
			<div class="swiper th-slider has-shadow category-slider3" id="categorySlider3" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"},"1400":{"slidesPerView":"5"}}}'>
				<div class="swiper-wrapper">
					<?php foreach ($international_tours as $tour_category => $tours) { 
						$images = explode(",", $tours[0]['images']);
					?>
					<div class="swiper-slide">
						<div class="category-card single2">
							<div class="box-img global-img"><img src="<?=base_url('assets/images/tours/'.$images[0])?>" alt="<?=$tour_category?> Tours"></div>
							<h3 class="box-title"><a href="<?=base_url('Internationaltours/'.$tour_category)?>"><?=$tour_category?></a></h3>
							<a class="line-btn" href="<?=base_url('Internationaltours/'.$tour_category)?>">See more</a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>	
<?php } ?>

<?php if(isset($destination_tours) && count($destination_tours) > 0 ) { ?>
<div class="destination-area position-relative overflow-hidden space mt-0">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title">Top Destination</span>
            <h2 class="sec-title">Popular Destination</h2>
        </div>
        <div class="swiper th-slider destination-slider slider-drag-wrap" id="aboutSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}},"effect":"coverflow","coverflowEffect":{"rotate":"0","stretch":"95","depth":"212","modifier":"1"},"centeredSlides":"true"}'>
            <div class="swiper-wrapper">
                <?php foreach($destination_tours as $tours){
                	$images = explode(",", $tours['images']);
                ?>
                <div class="swiper-slide">
                    <div class="destination-box gsap-cursor">
                        <div class="destination-img">
                            <img src="<?=base_url('assets/images/tours/'.$images[0])?>" alt="<?=$tours['destination_location']?>">
                            <div class="destination-content">
                                <div class="media-left">
                                    <h4 class="box-title"><a href="<?=base_url('Destination/'.$tours['destination_location'])?>"><?=$tours['destination_location']?></a></h4>
                                    <span class="destination-subtitle"><?=$tours['count']?> Listing</span>
                                </div>
                                <div class=""><a href="<?=base_url('Destination/'.$tours['destination_location'])?>" class="th-btn style2 th-icon">View All</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            	<?php } ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- <div class="position-relative overflow-hidden space">
    <div class="cta-sec6 bg-title position-relative overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="cta-area6 space">
                        <div class="title-area mb-30">
                            <h2 class="sec-title cta-title2 text-white mt-n3">Grab up to <span class="sec-title2">35% off</span><span class="d-block"> on your favorite </span>Destination</h2>
                            <p class="text-white">Limited time offer, don't miss the opportunity</p>
                        </div>
                        <div class="btn-group"><a href="<?=base_url('Contact')?>" class="th-btn th-icon">Book Now</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-mockup" data-bottom="0%" data-right="-2%"><img src="<?=base_url()?>assets/img/normal/cta-img-6.jpg" alt=""></div>
    </div>
</div> -->
<div class="bg-smoke overflow-hidden space">
    <div class="container">
        <div class="row gy-4 align-items-center">
            <div class="col-lg-6">
                <div class="title-area">
                    <span class="sub-title style1">Why Choose Us</span>
                    <h2 class="sec-title">Why Choose Us for Your Tour?</h2>
                </div>
                <div class="choose-about wow fadeInUp">
                    <div class="choose-about_icon"><img src="<?=base_url()?>assets/img/icon/choose_1_1.svg" alt="image"></div>
                    <div class="media-body">
                        <h3 class="box-title">Safety First</h3>
                        <p class="choose-about_text">We provide utmost importance for safety and comfort for clients.</p>
                    </div>
                </div>
                <div class="choose-about wow fadeInUp">
                    <div class="choose-about_icon"><img src="<?=base_url()?>assets/img/icon/choose_1_2.svg" alt="image"></div>
                    <div class="media-body">
                        <h3 class="box-title">Budget Efficiency</h3>
                        <p class="choose-about_text">Anaadi offers a travel experience designed to minimize costs while still allowing for exploration and enjoyment.</p>
                    </div>
                </div>
                <div class="choose-about wow fadeInUp">
                    <div class="choose-about_icon"><img src="<?=base_url()?>assets/img/icon/guide.svg" alt="image"></div>
                    <div class="media-body">
                        <h3 class="box-title">Best Guide</h3>
                        <p class="choose-about_text">Anaadi leads visitors on tours, providing information and guidance about a specific location, its history, culture, and attractions.</p>
                    </div>
                </div>
                <div class="choose-about wow fadeInUp">
                    <div class="choose-about_icon"><img src="<?=base_url()?>assets/img/icon/guide.svg" alt="image"></div>
                    <div class="media-body">
                        <h3 class="box-title">Reliability</h3>
                        <p class="choose-about_text">Anaadi leads visitors on tours, providing information and guidance about a specific location, its history, culture, and attractions.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="choose-wrapp">
                    <div class="img1 global-img"><img src="<?=base_url()?>assets/img/normal/choose_1.jpg" alt="Choose"></div>
                    <div class="img1 global-img"><img src="<?=base_url()?>assets/img/normal/choose_2.jpg" alt="Choose"></div>
                    <div class="img1 global-img"><img src="<?=base_url()?>assets/img/normal/choose_3.jpg" alt="Choose"></div>
                    <div class="img1 global-img"><img src="<?=base_url()?>assets/img/normal/choose_4.jpg" alt="Choose"></div>
                </div>
            </div>
        </div>
        <div class="shape-mockup d-none d-xxl-block" data-top="5%" data-right="-20%"><img src="<?=base_url()?>assets/img/shape/shape_19.png" alt=""></div>
        <div class="shape-mockup d-none d-xxl-block" data-bottom="-17%" data-left="-20%"><img src="<?=base_url()?>assets/img/shape/shape_20.png" alt=""></div>
    </div>
</div>
<section class="tour-area3 position-relative bg-top-center overflow-hidden space" id="service-sec">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="title-area text-center">
					<span class="sub-title">Best Experience</span>
					<h2 class="sec-title">Amazing Travel Experience</h2>
				</div>
			</div>
		</div>
		<div class="nav nav-tabs tour-tabs" id="nav-tab" role="tablist">
			<button class="nav-link active" id="nav-step1-tab" data-bs-toggle="tab" data-bs-target="#nav-step1" type="button"><img src="<?=base_url()?>assets/img/icon/tour_icon_1.svg" alt="">Domestic Tour Packages</button> 
			<button class="nav-link" id="nav-step2-tab" data-bs-toggle="tab" data-bs-target="#nav-step2" type="button"><img src="<?=base_url()?>assets/img/icon/tour_icon_1.svg" alt="">International Tour Packages</button> 
		</div>
		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade active show" id="nav-step1" role="tabpanel">
				<div class="slider-area tour-slider slider-drag-wrap">
					<div class="swiper th-slider has-shadow" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"},"1400":{"slidesPerView":"4"}}}'>
						<div class="swiper-wrapper">
							<?php foreach ($domestic_tour_packages as $i => $tours) { 
								$images = explode(",", $tours['images']);
							?>
							<div class="swiper-slide">
								<div class="tour-box th-ani gsap-cursor">
									<div class="tour-box_img global-img">
										<img src="<?=base_url('assets/images/tours/'.$images[0])?>" alt="image">
									</div>
									<div class="tour-content">
										<h3 class="box-title fs-16"><a title="View Tour Itinerary" href="<?=base_url('Tour/'.$tours['url_title'])?>"><?=$tours['title']?></a></h3>
										<h4 class="tour-box_price">
											<span class="currency"><i class="fa-solid fa-indian-rupee-sign me-1"></i><?=$tours['price']?></span> / Person
										</h4>
										<div class="tour-action"><span><i class="fa-light fa-clock"></i><?=$tours['duration_days']?> Days</span><a href="<?=base_url('Booktour/'.$tours['url_title'])?>" class="th-btn style4 th-icon">Book Now</a></div>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="slider-pagination"></div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="nav-step2" role="tabpanel">
				<div class="slider-area tour-slider slider-drag-wrap">
					<div class="swiper th-slider has-shadow" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"},"1400":{"slidesPerView":"4"}}}'>
						<div class="swiper-wrapper">
							<?php foreach ($international_tour_packages as $i => $tours) { 
								$images = explode(",", $tours['images']);
							?>
							<div class="swiper-slide">
								<div class="tour-box th-ani gsap-cursor">
									<div class="tour-box_img global-img">
										<img src="<?=base_url('assets/images/tours/'.$images[0])?>" alt="image">
									</div>
									<div class="tour-content">
										<h3 class="box-title fs-16"><a title="View Tour Itinerary" href="<?=base_url('Tour/'.$tours['url_title'])?>"><?=$tours['title']?></a></h3>
										<h4 class="tour-box_price">
											<span class="currency"><i class="fa-solid fa-indian-rupee-sign me-1"></i><?=$tours['price']?></span> / Person
										</h4>
										<div class="tour-action"><span><i class="fa-light fa-clock"></i><?=$tours['duration_days']?> Days</span><a href="<?=base_url('Booktour/'.$tours['url_title'])?>" class="th-btn style4 th-icon">Book Now</a></div>
									</div>
								</div>
							</div>
							<?php } ?>							
						</div>
						<div class="slider-pagination"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- <div class="counter-sec2 space">
    <div class="container">
        <div class="row gy-4 align-items-center justify-content-center">
            <div class="col-md-6 col-xl-3">
                <div class="counter-card style3">
                    <div class="counter-shape"><span></span></div>
                    <div class="media-body">
                        <h3 class="box-number"><span class="counter-number">12</span></h3>
                        <h6 class="counter-title">Years Experience</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="counter-card style3">
                    <div class="counter-shape"><span></span></div>
                    <div class="media-body">
                        <h3 class="box-number"><span class="counter-number">8</span>k</h3>
                        <h6 class="counter-title">Tour Completed</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="counter-card style3">
                    <div class="counter-shape"><span></span></div>
                    <div class="media-body">
                        <h3 class="box-number"><span class="counter-number">19</span>k</h3>
                        <h6 class="counter-title">Happy Travellers</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-mockup shape1 d-none d-xl-block" data-top="40%" data-left="-17%"><img src="<?=base_url()?>assets/img/shape/shape_1.png" alt="shape"></div>
        <div class="shape-mockup shape2 d-none d-xl-block" data-top="55%" data-left="-18%"><img src="<?=base_url()?>assets/img/shape/shape_2.png" alt="shape"></div>
        <div class="shape-mockup shape3 d-none d-xl-block" data-top="47%" data-left="-10%"><img src="<?=base_url()?>assets/img/shape/shape_3.png" alt="shape"></div>
        <div class="shape-mockup spin d-none d-xl-block" data-bottom="-15%" data-left="-15%"><img src="<?=base_url()?>assets/img/shape/shape_2_3.png" alt="shape"></div>
        <div class="shape-mockup jump d-none d-xl-block" data-top="30%" data-right="-14%"><img src="<?=base_url()?>assets/img/shape/shape_2_2.png" alt="shape"></div>
        <div class="shape-mockup spin d-none d-xl-block" data-bottom="-10%" data-right="-14%"><img src="<?=base_url()?>assets/img/shape/shape_2_5.png" alt="shape"></div>
    </div>
</div> -->
<div class="overflow-hidden bg-smoke space">
	<div class="container">
		<div class="title-area text-center">
			<span class="sub-title">Make Your Tour More Pleasure</span>
			<h2 class="sec-title">Recent Gallery</h2>
		</div>
		<div class="row gy-24 gx-24 justify-content-center">
			<?php if( count($gallery) > 0 ){
                foreach($gallery as $i => $row) { 
                	if( $i == 8 ) { 
                		break; 
              		}
              		$images = explode(",", $row['images']);
             ?>  
			<div class="col-lg-3">
				<div class="gallery-box style2">
					<div class="gallery-img global-img">
						<a href="<?=base_url('assets/images/gallery/'.$images[0])?>" class="popup-image">
							<div class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></div>
							<img style="height: 200px;" src="<?=base_url('assets/images/gallery/'.$images[0])?>" alt="gallery image">
						</a>
					</div>
				</div>
			</div>
			<?php } } ?>
		</div>
		<div class="row gy-24 gx-24 justify-content-center">
			<div class="col-auto">
				<a href="<?=base_url('Gallery')?>" class="th-btn th-icon">View More Gallery</a>
			</div>
		</div>
		<div class="shape-mockup d-none d-xxl-block" data-top="5%" data-right="-20%"><img src="<?=base_url()?>assets/img/shape/shape_19.png" alt=""></div>
	</div>
</div>



<?php if(isset($destination_package) && count($destination_package) > 0 ) { ?>
<div class="destination-area position-relative overflow-hidden space mt-0">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title">Popular </span> 
            <h2 class="sec-title">Packages </h2>
        </div>
        <!-- <div class="swiper th-slider destination-slider slider-drag-wrap" id="aboutSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}},"effect":"coverflow","coverflowEffect":{"rotate":"0","stretch":"95","depth":"212","modifier":"1"},"centeredSlides":"true"}'> -->
            
			<!-- Slider -->
			 <div class="slider-area">
                <div class="swiper th-slider destination-slider13 slider-drag-wrap" id="destiSlider13"
                    data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}},"effect":"coverflow","coverflowEffect":{"rotate":"35","stretch":"0","depth":"100","modifier":"1","slideShadows":"false"},"centeredSlides":"true"}'>
                    <div class="swiper-wrapper">

						<?php foreach($destination_package as $tours){
							$images = explode(",", $tours['images']);
						?>
							<div class="swiper-slide">
								<div class="destination-box3">
									<a href="<?=base_url('assets/images/popular/'.$images[0])?>" data-lightbox="image-1" data-title="My caption" class="overlay-lightbox">
											<!-- <a href="destination-details.html" class="th-btn style2">24 Places</a> -->
									</a>
									<div class="destination-img"><img src="<?=base_url('assets/images/popular/'.$images[0])?>" alt="destination image"></div>
								</div>
							</div>
						<?php } ?>
						
                    </div>
                </div>
                <!-- <div class="icon-box mt-60 text-center"><button data-slider-prev="#destiSlider1"
                        class="slider-arrow style6 default"><img src="assets/img/icon/right-arrow2.svg" alt=""></button>
                    <button data-slider-next="#destiSlider1" class="slider-arrow style6 default"><img
                            src="assets/img/icon/left-arrow2.svg" alt=""></button></div> -->
            </div>

        <!-- </div> -->
    </div>
</div>
<?php } ?>

 <section class="testi-area7 bg-smoke overflow-hidden space" id="testi-sec" data-bg-src="<?=base_url()?>assets/img/bg/map.png">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="title-area mb-40">
                    <span class="sub-title">Testimonial</span>
                    <h2 class="sec-title">What Our Customers are Saying</h2>
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
