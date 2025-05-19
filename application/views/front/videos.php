<div class="breadcumb-wrapper" data-bg-src="<?=base_url()?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Videos</h1>
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
            <?php if( count($videos) > 0 ){
                foreach($videos as $row){ 

                    $vid = explode("v=", $row['url']);
                    $img = "https://img.youtube.com/vi/".$vid[1]."/hq720.jpg";

                ?>  
            <div class="col-auto">
                <div class="gallery-box style5 shadow rounded">
                    <div class="video-box4 gallery-img global-img" style="height:250px">
                        <img src="<?=$img?>" class="border" alt="gallery image" /> 
                        <a href="<?=$row['url']?>" class="mx-auto play-btn popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>
                    </div>
                    <div class="">
                        <span class="w-100 d-block p-2 text-center fw-bold text-theme"><?=$row['title']?></span>
                        <span class="w-100 d-block p-2 text-left small text-dark"><?=$row['description']?></span>
                    </div>
                </div>
            </div>
            <!-- <div class="col-auto">
                <div class=" style2"> 
                </div>
            </div> -->
            <?php }
            } ?>
        </div>
    </div>
</div>