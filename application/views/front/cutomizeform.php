<div class="breadcumb-wrapper" data-bg-src="<?= base_url() ?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title">Customize Tour Request</h3>
        </div>
    </div>
</div>

<div class="space-extra2-top space-extra2-bottom" data-bg-src="<?= base_url() ?>assets/img/bg/video_bg_1.jpg">
    <div class="container">
        <div class="row flex-row-reverse justify-content-center align-items-center">
            <div class="col-lg-6">
                <div>
                    <form action="<?= base_url('Customizeform/enquiry') ?>" method="POST" class="contact-form style2 ajax-contact">
                        <h3 class="sec-title mb-30 text-capitalize">Customize Tour Request</h3>
                       
                        <?php 
                            $success = $this->session->flashdata('success');
                            if ($success) {
                        ?>
                            <div class="alert alert-success alert-dismissable">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } ?>
                        <div class="row">
                            
                            <!-- Category field (Compulsory) -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item');
                            ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select <?php if(isset($message['category']) && $message['category']['value'] == "0") { echo $message['category']['class']; } ?>" id="tour_category" name="category">
                                        <option <?= (isset($message['category']) && $message['category']['value'] == "0") ? "selected" : "" ?> value="0">Category</option>
                                        <option <?= (isset($message['category']) && $message['category']['value'] == "1") ? "selected" : "" ?> value="1">India</option>
                                        <option <?= (isset($message['category']) && $message['category']['value'] == "2") ? "selected" : "" ?> value="2">World</option>
                                    </select>
                                    <?php if(isset($message['category']) && $message['category']['value'] == "0") { ?>
                                        <span class="text-danger"><?php echo $message['category']['message']; ?></span>
                                    <?php } ?>
                                </div>
                            <?php } else { ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="tour_category" name="category">
                                        <option value="0">Category</option>
                                        <option value="1">India</option>
                                        <option value="2">World</option>
                                    </select>
                                </div>
                            <?php } ?>

                            <!-- Continent field (shows only when International is selected) -->
                            <div class="form-group col-6 mb-2" id="continent_container" style="display: none;">
                                <select class="form-select" id="continent_id" name="continent">
                                    <option value="0">Select Continent</option>
                                    <!-- Continent options will be loaded via AJAX -->
                                </select>
                                <span class="text-danger continent-error" style="display: none;">Please select a continent</span>
                            </div>
                            
                            <!-- Country field (Compulsory) - Will be populated based on category/continent -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item');
                            ?>
                                <div class="form-group col-6 mb-2" id="country_container">
                                    <select class="form-select <?php if($message['country']['value'] == "0") { echo $message['country']['class']; } ?>" id="country" name="country">
                                        <option <?= ($message['country']['value'] == "0") ? "selected" : "" ?> value="0">Country/State</option>
                                        <!-- Options will be loaded dynamically -->
                                    </select>
                                   <?php if($message['country']['value'] == "0") { ?> <span class="text-danger"> <?php echo $message['country']['message']; ?></span> <?php } ?>
                                </div>
                            <?php } else { ?>
                                <div class="form-group col-6 mb-2" id="country_container">
                                    <select class="form-select" id="country" name="country">
                                        <option value="0">Country/State</option>
                                        <!-- Options will be loaded dynamically -->
                                    </select>
                                </div>
                            <?php } ?>
                            
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
                                    <label for="travel_date">Date of Travel <span class="text-danger">*</span></label>
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
                                    <label for="travel_date">Date of Travel <span class="text-danger">*</span></label>
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
                                        <?php if(isset($tour_types) && !empty($tour_types)): ?>
                                            <?php foreach($tour_types as $type): ?>
                                                <option <?= ($message['typeof_tour']['value'] == $type['id']) ? "selected" : "" ?> value="<?= $type['id'] ?>"><?= $type['type'] ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="form-group col-6 mb-2">
                                    <select class="form-select" id="typeof_tour" name="typeof_tour">
                                        <option value="0">Type of Tour</option>
                                        <?php if(isset($tour_types) && !empty($tour_types)): ?>
                                            <?php foreach($tour_types as $type): ?>
                                                <option value="<?= $type['id'] ?>"><?= $type['type'] ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            <?php } ?>
                            
                            <!-- Places field (Compulsory) -->
                            <?php
                            if ($this->session->flashdata('item')) {
                                $message = $this->session->flashdata('item');
                            ?>
                                <div class="form-group col-6 mb-2">
                                    <input type="text" class="form-control <?php if($message['place']['value'] == "") {   echo $message['place']['class']; } ?>" 
                                           id="place" name="place" placeholder="Place" 
                                           value="<?php echo $message['place']['value'] != '0' ? $message['place']['value'] : ''; ?>">
                                    <?php if($message['place']['value'] == "0" || $message['place']['value'] == "") { ?>
                                        <span class="text-danger"><?php echo $message['place']['message']; ?></span>
                                    <?php } ?>
                                </div>
                            <?php } else { ?>
                                <div class="form-group col-6 mb-2">
                                    <input type="text" class="form-control" id="place" name="place" placeholder="Place">
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
                                    <input type="number" class="form-control <?php echo isset($message['children_with_bed']) && isset($message['children_with_bed']['class']) ? $message['children_with_bed']['class'] : ''; ?>" 
                                           value="<?php echo isset($message['children_with_bed']) && isset($message['children_with_bed']['value']) ? $message['children_with_bed']['value'] : '0'; ?>" 
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
                                    <input type="number" class="form-control <?php echo isset($message['children_without_bed']) && isset($message['children_without_bed']['class']) ? $message['children_without_bed']['class'] : ''; ?>" 
                                           value="<?php echo isset($message['children_without_bed']) && isset($message['children_without_bed']['value']) ? $message['children_without_bed']['value'] : '0'; ?>" 
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
                                    <input type="number" class="form-control <?php echo isset($message['infants']) && isset($message['infants']['class']) ? $message['infants']['class'] : ''; ?>" 
                                           value="<?php echo isset($message['infants']) && isset($message['infants']['value']) ? $message['infants']['value'] : '0'; ?>" 
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
                                    <input type="number" min="0" class="form-control <?php if($message['howmany_days']['value'] == "") { echo $message['howmany_days']['class']; } ?>" 
                                           id="howmany_days" name="howmany_days" placeholder="Days" 
                                           value="<?php echo isset($message['howmany_days']['value']) ? $message['howmany_days']['value'] : '0'; ?>">
                                </div>
                                <div class="form-group col-6 mb-2">
                                    <input type="number" min="0" class="form-control <?php if($message['howmany_days']['value'] == "") { echo $message['howmany_nights']['class']; } ?>" 
                                           id="howmany_night" name="howmany_night" placeholder="Nights" 
                                           value="<?php echo isset($message['howmany_nights']['value']) ? $message['howmany_nights']['value'] : '0'; ?>">
                                </div>
                                <?php if($message['howmany_days']['value'] == "") { ?>
                                    <span class="text-danger"><?php echo $message['howmany_days']['message']; ?></span>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="form-group col-6 mb-2">
                                    <input type="number" min="0" class="form-control" id="howmany_days" name="howmany_days" placeholder="Days" value="0">
                                </div>
                                <div class="form-group col-6 mb-2">
                                    <input type="number" min="0" class="form-control" id="howmany_night" name="howmany_night" placeholder="Nights" value="0">
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
                                    <input type="text" class="form-control <?php echo isset($message['budget']) && isset($message['budget']['class']) ? $message['budget']['class'] : ''; ?>" 
                                           value="<?php echo isset($message['budget']) && isset($message['budget']['value']) ? $message['budget']['value'] : ''; ?>" 
                                           name="budget" id="budget" placeholder="Budget (INR)">
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
                                    <textarea class="form-control <?php echo isset($message['any_other']) && isset($message['any_other']['class']) ? $message['any_other']['class'] : ''; ?>" 
                                              name="any_other" id="any_other" rows="3" 
                                              placeholder="Any Other"><?php echo isset($message['any_other']) && isset($message['any_other']['value']) ? $message['any_other']['value'] : ''; ?></textarea>
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

<script>
$(document).ready(function() {
    // Form validation
    $("form.ajax-contact").submit(function(e) {
        let isValid = true;
        
        // Validate required fields
        if ($("#name3").val() === "") {
            $("#name3").addClass("border border-danger");
            isValid = false;
        } else {
            $("#name3").removeClass("border border-danger");
        }
        
        if ($("#email3").val() === "") {
            $("#email3").addClass("border border-danger");
            isValid = false;
        } else {
            $("#email3").removeClass("border border-danger");
        }
        
        if ($("#phone3").val() === "") {
            $("#phone3").addClass("border border-danger");
            isValid = false;
        } else {
            $("#phone3").removeClass("border border-danger");
        }

        if ($("#travel_date").val() === "") {
            $("#travel_date").addClass("border border-danger");
            isValid = false;
        } else {
            $("#travel_date").removeClass("border border-danger");
        }
        
        if ($("#tour_category").val() === "0") {
            $("#tour_category").addClass("border border-danger");
            isValid = false;
        } else {
            $("#tour_category").removeClass("border border-danger");
        }
        
        if ($("#country").val() === "0") {
            $("#country").addClass("border border-danger");
            isValid = false;
        } else {
            $("#country").removeClass("border border-danger");
        }
        
        if ($("#place").val() === "0") {
            $("#place").addClass("border border-danger");
            isValid = false;
        } else {
            $("#place").removeClass("border border-danger");
        }
        
        if ($("#adults").val() === "" || $("#adults").val() === "0") {
            $("#adults").addClass("border border-danger");
            isValid = false;
        } else {
            $("#adults").removeClass("border border-danger");
        }
        
        if ($("#howmany_days").val() === "0") {
            $("#howmany_days").addClass("border border-danger");
            isValid = false;
        } else {
            $("#howmany_days").removeClass("border border-danger");
        }
        
        if ($("#howmany_night").val() === "0") {
            $("#howmany_night").addClass("border border-danger");
            isValid = false;
        } else {
            $("#howmany_night").removeClass("border border-danger");
        }
        
        // Check if category is international and continent is required
        if ($("#tour_category").val() === "2" && $("#continent_id").val() === "0") {
            $("#continent_id").addClass("border border-danger");
            $(".continent-error").show();
            isValid = false;
        } else {
            $("#continent_id").removeClass("border border-danger");
            $(".continent-error").hide();
        }
        
        if (!isValid) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $(".alert-danger").offset().top - 100
            }, 500);
        }
    });
    
    // Smooth scroll to success message if present
    <?php if ($this->session->flashdata('success')) : ?>
    $('html, body').animate({
        scrollTop: $(".alert-success").offset().top - 100
    }, 500);
    
    // Auto-hide success message after 5 seconds
    setTimeout(function() {
        $(".alert-success").fadeOut("slow");
    }, 5000);
    <?php endif; ?>
});
</script>