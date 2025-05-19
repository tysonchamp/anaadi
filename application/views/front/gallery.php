<div class="breadcumb-wrapper" data-bg-src="<?=base_url()?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title">Gallery</h3>
        </div>
    </div>
</div>
<div class="overflow-hidden space" id="gallery-sec">
    <div class="container">
        <div class="title-area mb-30 text-center">
            <span class="sub-title">Explore Us</span>
            <h2 class="sec-title">A truly exceptional experience</h2>
        </div>
        <div class="row gy-4 gallery-row4">
            <?php if( count($gallery) > 0 ){
                foreach($gallery as $row){ 
                    $image = explode(",",$row['images']);
                ?>  
                <div class="col-auto">
                    <div class="gallery-box style5">
                        <div class="gallery-img global-img">
                            <img src="<?=base_url('assets/images/gallery/'.$image[0])?>" alt="gallery image"> 
                            <a href="<?=base_url('Gallery/album/'.urldecode($row['album']))?>" class="icon-btn"><i class="fal fa-magnifying-glass-plus"></i></a>
                        </div>
                        <span class="d-block w-100 p-1 mt-2 m-1 text-center fs-16">
                            <a title="View Album" href="<?=base_url('Gallery/album/'.urldecode($row['album']))?>"><?=$row['album']?></a>
                        </span>
                    </div>
                </div>
            <?php }
            } ?>
        </div>
    </div>
</div>