<div class="breadcumb-wrapper" data-bg-src="<?=base_url()?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title">Services</h3>
        </div>
    </div>
</div>
<section class="position-relative overflow-hidden space" id="destination-sec">
    <div class="container">
        <div class="row gy-4 gx-4">
            <?php foreach ($services as $key => $row) { ?>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="destination-item th-ani">
                    <div class="destination-item_img global-img" style="height:200px;">
                        <img class="img-fluid" src="<?=base_url('assets/images/services/'.$row['image'])?>" alt="image">
                    </div>
                    <div class="destination-content">
                        <h3 class="box-title"><a href="<?=base_url()?>#"><?=$row['service_name']?></a></h3>
                        <span class="w-100 d-block p-2 text-left small m-2"><?=$row['description']?></span>
                        <a href="<?=base_url('Contact')?>" class="th-btn style4 th-icon">Book Now</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="shape-mockup shape1 d-none d-xxl-block" data-bottom="17%" data-right="-9%"><img src="assets/img/shape/shape_1.png" alt="shape"></div>
        <div class="shape-mockup shape2 d-none d-xl-block" data-bottom="8%" data-right="-8%"><img src="assets/img/shape/shape_2.png" alt="shape"></div>
        <div class="shape-mockup shape3 d-none d-xxl-block" data-bottom="15%" data-right="-4%"><img src="assets/img/shape/shape_3.png" alt="shape"></div>
    </div>
    </section>