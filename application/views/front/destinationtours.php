<div class="breadcumb-wrapper" data-bg-src="<?=base_url()?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title"><?=$destination?> Tours</h3>
        </div>
    </div>
</div>
<section class="space">
        <div class="container">
            <div class="th-sort-bar">
                <div class="row justify-content-between align-items-center">
                    <!-- <div class="col-md-4">
                        <div class="search-form-area">
                            <form class="search-form"><input type="text" placeholder="Search"> <button type="submit"><i class="fa-light fa-magnifying-glass"></i></button></form>
                        </div>
                    </div> -->
                    <div class="col-md-auto">
                        <div class="sorting-filter-wrap">
                            <div class="nav" role="tablist"><a class="active" href="#" id="tab-destination-grid" data-bs-toggle="tab" data-bs-target="#tab-grid" role="tab" aria-controls="tab-grid" aria-selected="true"><i class="fa-light fa-grid-2"></i></a> <a href="#" id="tab-destination-list" data-bs-toggle="tab" data-bs-target="#tab-list" role="tab" aria-controls="tab-list" aria-selected="false" class=""><i class="fa-solid fa-list"></i></a></div>
                            <!-- <form class="woocommerce-ordering" method="get">
                                <select name="orderby" class="orderby" aria-label="destination order">
                                    <option value="menu_order" selected="selected">Default Sorting</option>
                                    <option value="date">Sort by latest</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-8 col-lg-7">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="tab-grid" role="tabpanel" aria-labelledby="tab-tour-grid">
                            <div class="row gy-24 gx-24">
                                <?php foreach ($tours as $key => $tour) { 
                                    $images = explode(",", $tour['images']);
                                ?>
                                <div class="col-md-6">
                                    <div class="tour-box th-ani">
                                        <div class="tour-box_img global-img"><img src="<?=base_url('assets/images/tours/'.$images[0])?>" alt="<?=$tour['title']?>"></div>
                                        <div class="tour-content">
                                            <span class="h3 box-title">
                                                <a href="<?=base_url('Tour/'.$tour['url_title'])?>"><?=$tour['title']?></a>
                                            </span>
                                            <!--<h4 class="tour-box_price"><span class="currency"><?=$tour['price']?></span>/Person</h4>-->
                                            <div class="tour-action"><span><i class="fa-light fa-clock"></i><?=$tour['duration_days']?> Days</span> <a href="<?=base_url('Tour/'.$tour['url_title'])?>" class="th-btn style4">Detail View</a></div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-list" role="tabpanel" aria-labelledby="tab-tour-list">
                            <div class="row gy-30">
                                <?php foreach ($tours as $key => $tour) { 
                                    $images = explode(",", $tour['images']);
                                ?>
                                <div class="col-12">
                                    <div class="tour-box style-flex th-ani">
                                        <div class="tour-box_img global-img"><img src="<?=base_url('assets/images/tours/'.$images[0])?>" alt="<?=$tour['title']?>"></div>
                                        <div class="tour-content">
                                            <h3 class="box-title"><a href="tour-details.html"><?=$tour['title']?></a></h3>
                                            <!--<h4 class="tour-box_price"><span class="currency"><?=$tour['price']?></span>/Person</h4>-->
                                            <div class="tour-action"><span><i class="fa-light fa-clock"></i><?=$tour['duration_days']?> Days</span> <a href="<?=base_url('Tour/'.$tour['url_title'])?>" class="th-btn style4">Detail View</a></div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- <div class="th-pagination text-center mt-60">
                            <ul>
                                <li><a class="active" href="tour.html">1</a></li>
                                <li><a href="tour.html">2</a></li>
                                <li><a href="tour.html">3</a></li>
                                <li><a href="tour.html">4</a></li>
                                <li><a class="next-page" href="tour.html">Next <img src="<?=base_url()?>assets/img/icon/arrow-right4.svg" alt=""></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-5">
                    <aside class="sidebar-area">
                        <?php if( isset($tour_types) && count($tour_types) > 0 ){ ?>
                        <div class="widget widget_categories">
                            <h3 class="widget_title">Categories</h3>
                            <ul>
                                <?php foreach($tour_types as $row){?>
                                <li><a href="<?=base_url('Domestictours/'.$tourcategory.'/'.$row['type'])?>"><img src="<?=base_url()?>assets/img/theme-img/map.svg" alt=""><?=$row['type']?></a> <span>(<?=$row['count']?>)</span></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>
                        <div class="widget">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                <?php foreach($recent_tours as $tour) { 
                                    $images = explode(",", $tour['images']);
                                    ?>
                                <div class="recent-post">
                                    <div class="media-img"><a href="<?=base_url('Tour/'.$tour['url_title'])?>"><img src="<?=base_url('assets/images/tours/'.$images[0])?>" alt="<?=$tour['title']?>"></a></div>
                                    <div class="media-body">
                                        <h5 class="post-title"><a class="text-inherit" href="<?=base_url('Tour/'.$tour['url_title'])?>"><?=$tour['title']?></a></h5>
                                        <div class="recent-post-meta"><a href="<?=base_url('Tour/'.$tour['url_title'])?>"><i class="fa-regular fa-calendar"></i><?=date('d M, Y', strtotime($tour['created_date']))?></a></div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
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
                    </aside>
                </div>
            </div>
            <div class="shape-mockup shape1 d-none d-xxl-block" data-bottom="7%" data-right="-8%"><img src="<?=base_url()?>assets/img/shape/shape_1.png" alt="shape"></div>
            <div class="shape-mockup shape2 d-none d-xl-block" data-bottom="1%" data-right="-7%"><img src="<?=base_url()?>assets/img/shape/shape_2.png" alt="shape"></div>
            <div class="shape-mockup shape3 d-none d-xxl-block" data-bottom="-2%" data-right="-12%"><img src="<?=base_url()?>assets/img/shape/shape_3.png" alt="shape"></div>
        </div>
    </section>