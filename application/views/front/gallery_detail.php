<div class="breadcumb-wrapper" data-bg-src="<?=base_url()?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title"><?=$album?> - Gallery</h3>
        </div>
    </div>
</div>
<div class="overflow-hidden space" id="gallery-sec">
    <div class="container">
        <div class="title-area mb-30 text-center">
            <h2 class="sec-title"><?=$album?></h2>
        </div>
        <div class="row gy-4 gallery-row4">
            <?php if( count($gallery) > 0 ){
                foreach($gallery as $image){ 
                ?>  
            <div class="col-auto">
                <div class="gallery-box style5">
                    <div class="gallery-img global-img">
                        <img src="<?=base_url('assets/images/gallery/'.$image)?>" alt="gallery image"> 
                        <a href="<?=base_url('assets/images/gallery/'.$image)?>" class="icon-btn popup-image"><i class="fal fa-magnifying-glass-plus"></i></a>
                    </div>
                </div>
            </div>
            <?php }
            } ?>
        </div>
    </div>
</div>