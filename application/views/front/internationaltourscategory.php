<div class="breadcumb-wrapper" data-bg-src="<?=base_url()?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title">International Tours</h3>
        </div>
    </div>
</div>
<section class="space">
        <div class="container">
            <div class="th-sort-bar">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-auto">
                        <div class="sorting-filter-wrap">
                            <h3>International Tours</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-xxl-12 col-lg-12 mb-10">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="tab-grid" role="tabpanel" aria-labelledby="tab-tour-grid">
                            <div class="row gy-4">
                                <?php foreach ($tourcategory as $category => $tc) { 
                                    $images = explode(",", $tc[0]['images']);
                                ?>
                                <div class="col-lg-3 col-xl-3">
                                    <div class="tour-box style5 th-ani gsap-cursor">
                                        <div class="tour-box_img global-img">
                                            <img src="<?=base_url('assets/images/tours/'.$images[0])?>" alt="<?=$category?>"></div>
                                        <div class="tour-content">
                                            <h3 class="box-title text-center w-100"><a href="<?=base_url('Domestictours/'.$category)?>"><?=$category?></a></h3>
                                            <span class="d-block w-100 text-center m-1 p-1 small"><?=count($tc)?> Listing</span>
                                            <span class="d-block w-100 text-center"><a href="<?=base_url('Domestictours/'.$category)?>" class="th-btn th-icon style4 fw-btn">Explore Tours</a></span>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 shadow mt-20 border col-lg-12" style="border-radius: 30px;">
                    <section class="cta-area p-4">
                        <div class="container">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-3 pe-xl-4 ps-xl-4">
                                    <div class="title-area fw-lg mb-2 mt-1 text-center">
                                        <h6 class="offer-title">Need Help? We Are Here To Help You</h6>
                                    </div>
                                </div>
                                <div class="col-lg-3 pe-xl-4 ps-xl-4">
                                    <div class="title-area mb-2 mt-1 text-center">
                                        <img style="height:100px;vertical-align: middle;" src="<?=base_url()?>assets/img/alogo.png" alt="Anaadi Tours & Travels">
                                    </div>
                                </div>
                                <div class="col-lg-3 pe-xl-4 ps-xl-4">
                                    <div class="title-area mb-2 mt-1 text-center">
                                        <h6 class="offer-title">You get online support</h6>
                                        <i class="fa-regular text-danger fa-phone"></i><a class="offter-num" href="tel:+91 6364328383">+91 6364328383</a>
                                    </div>    
                                </div>
                                <div class="col-lg-3 pe-xl-4 ps-xl-4 text-center">
                                    <a href="<?=base_url('Contact')?>" class="th-btn th-icon">Contact</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="shape-mockup shape1 d-none d-xxl-block" data-bottom="7%" data-right="-8%"><img src="<?=base_url()?>assets/img/shape/shape_1.png" alt="shape"></div>
            <div class="shape-mockup shape2 d-none d-xl-block" data-bottom="1%" data-right="-7%"><img src="<?=base_url()?>assets/img/shape/shape_2.png" alt="shape"></div>
            <div class="shape-mockup shape3 d-none d-xxl-block" data-bottom="-2%" data-right="-12%"><img src="<?=base_url()?>assets/img/shape/shape_3.png" alt="shape"></div>
        </div>
    </section>