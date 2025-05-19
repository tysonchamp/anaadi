<div class="breadcumb-wrapper" data-bg-src="<?= base_url() ?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title">Customize Form</h3>
        </div>
    </div>
</div>

<div class="space-extra2-top space-extra2-bottom" data-bg-src="<?= base_url() ?>assets/img/bg/video_bg_1.jpg">
    <div class="container">
        <div class="row flex-row-reverse justify-content-center align-items-center">
            <div class="col-lg-6">
                <div>
                    <form action="<?= base_url('Customizeform/enquiry') ?>" method="POST" class="contact-form style2 ajax-contact">
                        <h3 class="sec-title mb-30 text-capitalize">Customize Form</h3>
                       
                        <?php 
                            $success = $this->session->flashdata('success');
                            if ($success) {
                        ?>
                            <div class="alert alert-success alert-dismissable">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item');
                            ?>
                                <div class="col-12 form-group"><input type="text" class="form-control <?php if($message['name']['value'] == "") { echo $message['name']['class']; } ?>" name="name" value="<?php echo $message['name']['value'] ?>" id="name3" placeholder="Name"> <img src="<?= base_url() ?>assets/img/icon/user.svg" alt="">
                                    <?php if($message['name']['value'] == "") { ?> <span class="text-danger"> <?php echo $message['name']['message']; ?></span><?php }else { }?>
                                </div>

                            <?php } else {
                            ?>
                                <div class="col-12 form-group"><input type="text" class="form-control" name="name" value="" id="name3" placeholder="Name"> <img src="<?= base_url() ?>assets/img/icon/user.svg" alt="">

                                </div>

                            <?php } ?>
                            
                            <!-- Date of Travel field (Compulsory) -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item');
                            ?>
                                <div class="col-12 form-group">
                                    <input type="date" class="form-control <?php if(isset($message['travel_date']) && $message['travel_date']['value'] == "") { echo $message['travel_date']['class']; } ?>" 
                                        name="travel_date" 
                                        value="<?php echo isset($message['travel_date']) ? $message['travel_date']['value'] : ''; ?>" 
                                        id="travel_date" 
                                        placeholder="Date of Travel">
                                    <?php if(isset($message['travel_date']) && $message['travel_date']['value'] == "") { ?>
                                        <span class="text-danger"><?php echo $message['travel_date']['message']; ?></span>
                                    <?php } ?>
                                </div>
                            <?php } else { ?>
                                <div class="col-12 form-group">
                                    <input type="date" class="form-control" name="travel_date" id="travel_date" placeholder="Date of Travel">
                                </div>
                            <?php } ?>
                            
                            <!-- Email field -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item');
                            ?>
                                <div class="col-12 form-group"><input type="email" class="form-control <?php if($message['email']['value'] == "") { echo $message['email']['class']; } ?>" name="email" id="email3" value="<?php echo $message['email']['value'] ?>" placeholder="Your Mail"> <img src="<?= base_url() ?>assets/img/icon/mail.svg" alt=""></div>
                                <?php if($message['email']['value'] == "") { ?><span class="text-danger"> <?php echo $message['email']['message']; ?></span><?php }?>

                            <?php } else { ?>
                                <div class="col-12 form-group"><input type="email" class="form-control" name="email" id="email3" placeholder="Your Mail"> <img src="<?= base_url() ?>assets/img/icon/mail.svg" alt=""></div>
                            <?php } ?>
                            
                            <!-- Phone field -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item');
                            ?>
                                <div class="col-12 form-group"><input type="number" class="form-control <?php if($message['phone']['value'] == "") { echo $message['phone']['class']; } ?>" name="phone" id="phone3" value="<?php echo $message['phone']['value'] ?>" placeholder="Phone"> <img style="filter: brightness(0.5) invert(1);" src="<?= base_url() ?>assets/img/icon/call.svg" alt=""></div>
                               <?php if($message['phone']['value'] == "") { ?> <span class="text-danger"> <?php echo $message['phone']['message']; ?></span><?php } ?>

                            <?php } else { ?>
                                <div class="col-12 form-group"><input type="number" class="form-control" name="phone" id="phone3" placeholder="Phone"> <img style="filter: brightness(0.5) invert(1);" src="<?= base_url() ?>assets/img/icon/call.svg" alt=""></div>
                            <?php } ?>
                            
                            <!-- Type of Tour field (Optional) -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item');
                            ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select <?php if($message['typeof_tour']['value'] == "0") { echo $message['typeof_tour']['class']; } ?>" id="typeof_tour" name="typeof_tour">
                                        <option <?= ($message['typeof_tour']['value'] == '0') ? "selected" : ""  ?> value="0">Type of Tour</option>
                                        <option <?= ($message['typeof_tour']['value'] == '1') ? "selected" : "" ?> value="1">Sightseeing Tours</option>
                                        <option <?= ($message['typeof_tour']['value'] == '2') ? "selected" : "" ?> value="2">Adventure Tours</option>
                                        <option <?= ($message['typeof_tour']['value'] == '3') ? "selected" : "" ?> value="3">Historical & Cultural Tours</option>
                                        <option <?= ($message['typeof_tour']['value'] == '4') ? "selected" : "" ?> value="4">Specialty Tours</option>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="typeof_tour" name="typeof_tour">
                                        <option value="0">Type of Tour</option>
                                        <option value="1">Sightseeing Tours</option>
                                        <option value="2">Adventure Tours</option>
                                        <option value="3">Historical & Cultural Tours</option>
                                        <option value="4">Specialty Tours</option>
                                    </select>
                                </div>
                            <?php } ?>
                            
                            <!-- Country field (Compulsory) -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item');
                            ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select  <?php if($message['country']['value'] == "0") {  echo $message['country']['class']; } ?>" id="country" name="country">
                                        <option <?= ($message['country']['value'] == "0")  ? "selected" : "" ?> value="0">Country</option>
                                        <option <?= ($message['country']['value'] == "Kenya")  ? "selected" : "" ?> value="Kenya">Kenya</option>
                                        <option <?= ($message['country']['value'] == "Mauritius")  ? "selected" : "" ?> value="Mauritius">Mauritius</option>
                                        <option <?= ($message['country']['value'] == "Morocco")  ? "selected" : "" ?> value="Morocco">Morocco</option>
                                        <option <?= ($message['country']['value'] == "South Africa")  ? "selected" : "" ?> value="South Africa">South Africa</option>
                                        <option <?= ($message['country']['value'] == "Tanzania")  ? "selected" : "" ?> value="Tanzania">Tanzania</option>
                                        <option <?= ($message['country']['value'] == "USA")  ? "selected" : "" ?> value="USA">USA</option>
                                        <option <?= ($message['country']['value'] == "Argentina")  ? "selected" : "" ?> value="Argentina">Argentina</option>
                                        <option <?= ($message['country']['value'] == "Canada")  ? "selected" : "" ?> value="Canada">Canada</option>
                                        <option <?= ($message['country']['value'] == "Brazil")  ? "selected" : "" ?> value="Brazil">Brazil</option>
                                        <option <?= ($message['country']['value'] == "Colambia")  ? "selected" : "" ?> value="Colambia">Colambia</option>
                                        <option <?= ($message['country']['value'] == "Peru")  ? "selected" : "" ?> value="Peru">Peru</option>
                                        <option <?= ($message['country']['value'] == "Cambodia")  ? "selected" : "" ?> value="Cambodia">Cambodia</option>
                                        <option <?= ($message['country']['value'] == "China")  ? "selected" : "" ?> value="China">China</option>
                                        <option <?= ($message['country']['value'] == "Hong Kong")  ? "selected" : "" ?> value="Hong Kong">Hong Kong</option>
                                        <option <?= ($message['country']['value'] == "Indonesia")  ? "selected" : "" ?> value="Indonesia">Indonesia</option>
                                        <option <?= ($message['country']['value'] == "Japan")  ? "selected" : "" ?> value="Japan">Japan</option>
                                        <option <?= ($message['country']['value'] == "Kazakhstan")  ? "selected" : "" ?> value="Kazakhstan">Kazakhstan</option>
                                        <option <?= ($message['country']['value'] == "Laos")  ? "selected" : "" ?> value="Laos">Laos</option>
                                        <option <?= ($message['country']['value'] == "Macau")  ? "selected" : "" ?> value="Macau">Macau</option>
                                        <option <?= ($message['country']['value'] == "Malaysia")  ? "selected" : "" ?> value="Malaysia">Malaysia</option>
                                        <option <?= ($message['country']['value'] == "Philippines")  ? "selected" : "" ?> value="Philippines">Philippines</option>
                                        <option <?= ($message['country']['value'] == "Singapore")  ? "selected" : "" ?> value="Singapore">Singapore</option>
                                        <option <?= ($message['country']['value'] == "Thailand")  ? "selected" : "" ?> value="Thailand">Thailand</option>
                                        <option <?= ($message['country']['value'] == "Vietnam")  ? "selected" : "" ?> value="Vietnam">Vietnam</option>
                                        <option <?= ($message['country']['value'] == "Austria")  ? "selected" : "" ?> value="Austria">Austria</option>
                                        <option <?= ($message['country']['value'] == "Azerbaijan")  ? "selected" : "" ?> value="Azerbaijan">Azerbaijan</option>
                                        <option <?= ($message['country']['value'] == "Belgium")  ? "selected" : "" ?> value="Belgium">Belgium</option>
                                        <option <?= ($message['country']['value'] == "Croatia")  ? "selected" : "" ?> value="Croatia">Croatia</option>
                                        <option <?= ($message['country']['value'] == "Czech Republic")  ? "selected" : "" ?> value="Czech Republic">Czech Republic</option>
                                        <option <?= ($message['country']['value'] == "Denmark")  ? "selected" : "" ?> value="Denmark">Denmark</option>
                                        <option <?= ($message['country']['value'] == "Estonia")  ? "selected" : "" ?> value="Estonia">Estonia</option>
                                        <option <?= ($message['country']['value'] == "Finland")  ? "selected" : "" ?> value="Finland">Finland</option>
                                        <option <?= ($message['country']['value'] == "France")  ? "selected" : "" ?> value="France">France</option>
                                        <option <?= ($message['country']['value'] == "Georgia")  ? "selected" : "" ?> value="Georgia">Georgia</option>
                                        <option <?= ($message['country']['value'] == "Germany")  ? "selected" : "" ?> value="Germany">Germany</option>
                                        <option <?= ($message['country']['value'] == "Greece")  ? "selected" : "" ?> value="Greece">Greece</option>
                                        <option <?= ($message['country']['value'] == "Hungary")  ? "selected" : "" ?> value="Hungary">Hungary</option>
                                        <option <?= ($message['country']['value'] == "Ireland")  ? "selected" : "" ?> value="Ireland">Ireland</option>
                                        <option <?= ($message['country']['value'] == "Italy")  ? "selected" : "" ?> value="Italy">Italy</option>
                                        <option <?= ($message['country']['value'] == "Latvia")  ? "selected" : "" ?> value="Latvia">Latvia</option>
                                        <option <?= ($message['country']['value'] == "Lithuania")  ? "selected" : "" ?> value="Lithuania">Lithuania</option>
                                        <option <?= ($message['country']['value'] == "Netherlands")  ? "selected" : "" ?> value="Netherlands">Netherlands</option>
                                        <option <?= ($message['country']['value'] == "Norway")  ? "selected" : "" ?> value="Norway">Norway</option>
                                        <option <?= ($message['country']['value'] == "Poland")  ? "selected" : "" ?> value="Poland">Poland</option>
                                        <option <?= ($message['country']['value'] == "Portugal")  ? "selected" : "" ?> value="Portugal">Portugal</option>
                                    </select>
                                   <?php if($message['country']['value'] == "0") {   ?> <span class="text-danger"> <?php echo $message['country']['message']; ?></span> <?php } ?>
                                </div>
                            <?php } else { ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="country" name="country">
                                        <option value="0">Country</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="USA">USA</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Colambia">Colambia</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="China">China</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                    </select>
                                </div>
                            <?php } ?>
                            
                            <!-- Places field (Compulsory) -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item');
                            ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select  <?php if($message['place']['value'] == "0") {   echo $message['place']['class']; } ?>" id="place" name="place">
                                        <option <?= ($message['place']['value'] == "0")  ? "selected" : "" ?> value="0">Place</option>
                                        <option <?= ($message['place']['value'] == "GOA")  ? "selected" : "" ?> value="GOA">GOA</option>
                                        <option <?= ($message['place']['value'] == "SHIMLA")  ? "selected" : "" ?> value="SHIMLA">SHIMLA</option>
                                        <option <?= ($message['place']['value'] == "COORG")  ? "selected" : "" ?> value="COORG">COORG</option>
                                        <option <?= ($message['place']['value'] == "DARJEELING")  ? "selected" : "" ?> value="DARJEELING">DARJEELING</option>
                                        <option <?= ($message['place']['value'] == "UDAIPUR")  ? "selected" : "" ?> value="UDAIPUR">UDAIPUR</option>
                                        <option <?= ($message['place']['value'] == "MANALI")  ? "selected" : "" ?> value="MANALI">MANALI</option>
                                        <option <?= ($message['place']['value'] == "Andaman and Nicobar")  ? "selected" : "" ?> value="Andaman and Nicobar">Andaman and Nicobar</option>
                                        <option <?= ($message['place']['value'] == "DELHI")  ? "selected" : "" ?> value="DELHI">DELHI</option>
                                    </select>
                                    <?php if($message['place']['value'] == "0") {   ?><span class="text-danger"> <?php echo $message['place']['message']; ?></span> <?php } ?>
                                </div>
                            <?php } else { ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="place" name="place">
                                        <option value="0">Place</option>
                                        <option value="GOA">GOA</option>
                                        <option value="SHIMLA">SHIMLA</option>
                                        <option value="COORG">COORG</option>
                                        <option value="DARJEELING">DARJEELING</option>
                                        <option value="UDAIPUR">UDAIPUR</option>
                                        <option value="MANALI">MANALI</option>
                                        <option value="Andaman and Nicobar">Andaman and Nicobar</option>
                                        <option value="DELHI">DELHI</option>
                                    </select>
                                </div>
                            <?php } ?>
                            
                            <!-- Number of People section -->
                            <div class="col-12 mb-2">
                                <label class="p-1 mb-1 fs-16 fw-bold">Number of People</label>
                            </div>
                            
                            <!-- Adults (Compulsory) -->
                            <div class="col-6 form-group mb-2">
                                <label class="mb-1">Adults <span class="text-danger">*</span></label>
                                <?php
                                if ($this->session->flashdata('item')) {
                                    $message = $this->session->flashdata('item');
                                ?>
                                    <input type="number" class="form-control <?php if($message['adults']['value'] == "") { echo $message['adults']['class']; } ?>" 
                                           value="<?php echo $message['adults']['value'] ?>" name="adults" id="adults">
                                    <?php if($message['adults']['value'] == "") { ?>
                                        <span class="text-danger"><?php echo $message['adults']['message']; ?></span>
                                    <?php } ?>
                                <?php } else { ?>
                                    <input type="number" class="form-control" name="adults" id="adults" value="1">
                                <?php } ?>
                            </div>
                            
                            <!-- Children with bed -->
                            <div class="col-6 form-group mb-2">
                                <label class="mb-1">> 2 &lt; 12 Years (With Bed)</label>
                                <?php
                                if ($this->session->flashdata('item')) {
                                    $message = $this->session->flashdata('item');
                                ?>
                                    <input type="number" class="form-control <?php if(isset($message['children_with_bed'])) { echo $message['children_with_bed']['class']; } ?>" 
                                           value="<?php echo isset($message['children_with_bed']) ? $message['children_with_bed']['value'] : '0'; ?>" 
                                           name="children_with_bed" id="children_with_bed">
                                <?php } else { ?>
                                    <input type="number" class="form-control" name="children_with_bed" id="children_with_bed" value="0">
                                <?php } ?>
                            </div>
                            
                            <!-- Children without bed -->
                            <div class="col-6 form-group mb-2">
                                <label class="mb-1">> 2 &lt; 12 Years (Without Bed)</label>
                                <?php
                                if ($this->session->flashdata('item')) {
                                    $message = $this->session->flashdata('item');
                                ?>
                                    <input type="number" class="form-control <?php if(isset($message['children_without_bed'])) { echo $message['children_without_bed']['class']; } ?>" 
                                           value="<?php echo isset($message['children_without_bed']) ? $message['children_without_bed']['value'] : '0'; ?>" 
                                           name="children_without_bed" id="children_without_bed">
                                <?php } else { ?>
                                    <input type="number" class="form-control" name="children_without_bed" id="children_without_bed" value="0">
                                <?php } ?>
                            </div>
                            
                            <!-- Infants -->
                            <div class="col-6 form-group mb-4">
                                <label class="mb-1">&lt; 2 Years</label>
                                <?php
                                if ($this->session->flashdata('item')) {
                                    $message = $this->session->flashdata('item');
                                ?>
                                    <input type="number" class="form-control <?php if(isset($message['infants'])) { echo $message['infants']['class']; } ?>" 
                                           value="<?php echo isset($message['infants']) ? $message['infants']['value'] : '0'; ?>" 
                                           name="infants" id="infants">
                                <?php } else { ?>
                                    <input type="number" class="form-control" name="infants" id="infants" value="0">
                                <?php } ?>
                            </div>

                            <!-- Number of Days (Compulsory) -->
                            <div class="col-12">
                                <label class="p-1 mb-1 fs-16">Number of Days</label>
                            </div>
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item');
                            ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select <?php if($message['howmany_days']['value'] == "") {  echo $message['howmany_days']['class']; } ?>" id="howmany_days" name="howmany_days">
                                        <option <?= ($message['howmany_days']['value'] == "0")  ? "selected" : "" ?> value="0">Days</option>
                                        <option <?= ($message['howmany_days']['value'] == "3")  ? "selected" : "" ?> value="3">3</option>
                                        <option <?= ($message['howmany_days']['value'] == "4")  ? "selected" : "" ?> value="4">4</option>
                                        <option <?= ($message['howmany_days']['value'] == "5")  ? "selected" : "" ?> value="5">5</option>
                                        <option <?= ($message['howmany_days']['value'] == "7")  ? "selected" : "" ?> value="7">7</option>
                                    </select>
                                </div>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select <?php  if($message['howmany_days']['value'] == "") {   echo $message['howmany_nights']['class']; } ?>" id="howmany_night" name="howmany_night">
                                        <option <?= ($message['howmany_nights']['value'] == "0")  ? "selected" : "" ?> value="0">Night</option>
                                        <option <?= ($message['howmany_nights']['value'] == "2")  ? "selected" : "" ?> value="2">2</option>
                                        <option <?= ($message['howmany_nights']['value'] == "3")  ? "selected" : "" ?> value="3">3</option>
                                        <option <?= ($message['howmany_nights']['value'] == "4")  ? "selected" : "" ?> value="4">4</option>
                                        <option <?= ($message['howmany_nights']['value'] == "5")  ? "selected" : "" ?> value="5">5</option>
                                    </select>
                                </div>
                                <?php  if($message['howmany_days']['value'] == "") {   ?><span class="text-danger"> <?php echo $message['howmany_days']['message']; ?></span> <?php } ?>
                            <?php } else { ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="howmany_days" name="howmany_days">
                                        <option value="0">Days</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="howmany_night" name="howmany_night">
                                        <option value="0">Night</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            <?php } ?>
                            
                            <!-- VISA (Optional) -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item');
                            ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="visa" name="visa">
                                        <option <?= ($message['visa']['value'] == "0")  ? "selected" : "" ?> value="0">Visa</option>
                                        <option <?= ($message['visa']['value'] == "Required")  ? "selected" : "" ?> value="Required">Required</option>
                                        <option <?= ($message['visa']['value'] == "Not Required")  ? "selected" : "" ?> value="Not Required">Not Required</option>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="visa" name="visa">
                                        <option value="0">Visa</option>
                                        <option value="Required">Required</option>
                                        <option value="Not Required">Not Required</option>
                                    </select>
                                </div>
                            <?php } ?>
                            
                            <!-- Airfare (Optional) - Fixed the "Not Included" option -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item');
                            ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="Airfare" name="Airfare">
                                        <option <?= ($message['Airfare']['value'] == "0")  ? "selected" : "" ?> value="0">Airfare</option>
                                        <option <?= ($message['Airfare']['value'] == "Included")  ? "selected" : "" ?> value="Included">Included</option>
                                        <option <?= ($message['Airfare']['value'] == "Not Included")  ? "selected" : "" ?> value="Not Included">Not Included</option>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="Airfare" name="Airfare">
                                        <option value="0">Airfare</option>
                                        <option value="Included">Included</option>
                                        <option value="Not Included">Not Included</option>
                                    </select>
                                </div>
                            <?php } ?>
                            
                            <!-- Meals (Optional) -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item');
                            ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="meals" name="meals">
                                        <option <?=($message['meals']['value'] == "0")  ? "selected" : "" ?> value="0">Meals</option>
                                        <option <?=($message['meals']['value'] == "CP")  ? "selected" : "" ?> value="CP">CP</option>
                                        <option <?=($message['meals']['value'] == "MAP")  ? "selected" : "" ?> value="MAP">MAP</option>
                                        <option <?=($message['meals']['value'] == "AP")  ? "selected" : "" ?> value="AP">AP</option>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="meals" name="meals">
                                        <option value="0">Meals</option>
                                        <option value="CP">CP</option>
                                        <option value="MAP">MAP</option>
                                        <option value="AP">AP</option>
                                    </select>
                                </div>
                            <?php } ?>
                            
                            <!-- Transfers (Optional) -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item'); ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="Transfers" name="Transfers">
                                        <option <?=($message['Transfers']['value'] == "0")  ? "selected" : "" ?> value="0">Transfers</option>
                                        <option <?=($message['Transfers']['value'] == "Private")  ? "selected" : "" ?> value="Private">Private</option>
                                        <option <?=($message['Transfers']['value'] == "SIC")  ? "selected" : "" ?> value="SIC">SIC</option>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="Transfers" name="Transfers">
                                        <option value="0">Transfers</option>
                                        <option value="Private">Private</option>
                                        <option value="SIC">SIC</option>
                                    </select>
                                </div>
                            <?php } ?>
                            
                            <!-- Hotels (Optional) -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item'); ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="Hotels" name="Hotels">
                                        <option <?= ($message['Hotels']['value'] == "0")  ? "selected" : "" ?> value="0">Hotels</option>
                                        <option <?= ($message['Hotels']['value'] == "Standard")  ? "selected" : "" ?> value="Standard">Standard</option>
                                        <option <?= ($message['Hotels']['value'] == "3 Star")  ? "selected" : "" ?> value="3 Star">3 Star</option>
                                        <option <?= ($message['Hotels']['value'] == "4 Star")  ? "selected" : "" ?> value="4 Star">4 Star</option>
                                        <option <?= ($message['Hotels']['value'] == "5 Star")  ? "selected" : "" ?> value="5 Star">5 Star</option>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="Hotels" name="Hotels">
                                        <option value="0">Hotels</option>
                                        <option value="Standard">Standard</option>
                                        <option value="3 Star">3 Star</option>
                                        <option value="4 Star">4 Star</option>
                                        <option value="5 Star">5 Star</option>
                                    </select>
                                </div>
                            <?php } ?>
                            
                            <!-- Budget (Optional) -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item'); ?>
                                <div class="col-12 form-group mb-2">
                                    <input type="text" class="form-control" value="<?php echo isset($message['budget']) ? $message['budget']['value'] : ''; ?>" name="budget" id="budget" placeholder="Budget (INR)">
                                </div>
                            <?php } else { ?>
                                <div class="col-12 form-group mb-2">
                                    <input type="text" class="form-control" name="budget" id="budget" placeholder="Budget (INR)">
                                </div>
                            <?php } ?>
                            
                            <!-- Any Other (Optional) -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item'); ?>
                                <div class="col-12 form-group">
                                    <textarea class="form-control" name="any_other" id="any_other" rows="3" placeholder="Any Other"><?php echo isset($message['any_other']) ? $message['any_other']['value'] : ''; ?></textarea>
                                </div>
                            <?php } else { ?>
                                <div class="col-12 form-group">
                                    <textarea class="form-control" name="any_other" id="any_other" rows="3" placeholder="Any Other"></textarea>
                                </div>
                            <?php } ?>

                            <div class="form-btn col-12 mt-24">
                                <button type="submit" class="th-btn style3">Enquiry <img src="<?= base_url() ?>assets/img/icon/plane.svg" alt=""></button>
                            </div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>