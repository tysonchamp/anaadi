<div class="breadcumb-wrapper" data-bg-src="<?=base_url()?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title">Contact Us</h3>
        </div>
    </div>
</div>
<div class="space">
        <div class="container">
            <div class="title-area text-center">
                
                <h2 class="sec-title">Our Contact Information</h2>
            </div>
            <div class="row gy-4 justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="about-contact-grid style2">
                        <div class="about-contact-icon"><img src="<?=base_url()?>assets/img/icon/location-dot2.svg" alt=""></div>
                        <div class="about-contact-details">
                            <h6 class="box-title">Our Address</h6>
                            <p class="about-contact-details-text">#4, 2nd Floor, Maruthi Complex, Thindlu-Kodigehalli Main Road, </p>
                            <p class="about-contact-details-text">Virupakshapura, Vidyaranyapura Post, Bengaluru - 560097, Karnataka, INDIA.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="about-contact-grid">
                        <div class="about-contact-icon"><img src="<?=base_url()?>assets/img/icon/call.svg" alt=""></div>
                        <div class="about-contact-details">
                            <h6 class="box-title">Phone Number</h6>
                            <p class="about-contact-details-text"><a href="tel:+91 6364328383">+91 6364328383</a></p>
                            <p class="about-contact-details-text"><a href="tel:+91 9341666060">+91 9341666060</a></p>
                            <p class="about-contact-details-text"><a href="tel:919886774543">+91 9886774543</a></p>
                            <p class="about-contact-details-text"><a href="tel:919739974193">+91 9739974193</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="about-contact-grid">
                        <div class="about-contact-icon"><img src="<?=base_url()?>assets/img/icon/mail.svg" alt=""></div>
                        <div class="about-contact-details">
                            <h6 class="box-title">Email Address</h6>
                            <p class="about-contact-details-text"><a href="mailto:toursandtravels@anaadi.co">toursandtravels@anaadi.co</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="space-extra2-top space-extra2-bottom" data-bg-src="<?=base_url()?>assets/img/bg/video_bg_1.jpg">
        <div class="container">
            <div class="row flex-row-reverse justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div>
                        <form action="<?=base_url('Contact/send_message')?>" method="POST" class="contact-form style2 ajax-contact">
                            <h3 class="sec-title mb-30 text-capitalize">Send Message</h3>
                            <?php $error = $this->session->flashdata('error');
                                  if($error) { ?>
                              <div class="alert alert-danger">
                                  <?php echo $this->session->flashdata('error'); ?>
                              </div>
                              <?php } ?>
                              <?php $success = $this->session->flashdata('success');
                                  if($success) {
                              ?>
                              <div class="alert alert-success alert-dismissable">
                                  <?php echo $this->session->flashdata('success'); ?>
                              </div>
                              <?php } ?>
                            <div class="row">
                                <div class="col-12 form-group"><input type="text" class="form-control" name="name" id="name3" placeholder="Name"> <img src="<?=base_url()?>assets/img/icon/user.svg" alt=""></div>
                                <div class="col-12 form-group"><input type="email" class="form-control" name="email" id="email3" placeholder="Your Mail"> <img src="<?=base_url()?>assets/img/icon/mail.svg" alt=""></div>
                                <div class="col-12 form-group"><input type="number" class="form-control" name="phone" id="phone3" placeholder="Phone"> <img style="filter: brightness(0.5) invert(1);" src="<?=base_url()?>assets/img/icon/call.svg" alt=""></div>
                                <div class="form-group col-12">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" >
                                </div>
                                <div class="form-group col-12"><textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Your Message"></textarea> <img src="<?=base_url()?>assets/img/icon/chat.svg" alt=""></div>
                                <div class="form-btn col-12 mt-24"><button type="submit" class="th-btn style3">Send message <img src="<?=base_url()?>assets/img/icon/plane.svg" alt=""></button></div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <div class="container-fluid">
            <div class="contact-map style2">
                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d971.6372383582382!2d77.57113926961212!3d13.064357305596577!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTPCsDAzJzUxLjciTiA3N8KwMzQnMTguNCJF!5e0!3m2!1sen!2sin!4v1744196078244!5m2!1sen!2sin" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <!-- <div class="contact-icon"><img src="<?=base_url()?>assets/img/icon/location-dot3.svg" alt=""></div> -->
            </div>
        </div>
    </div>