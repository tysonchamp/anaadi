<div class="breadcumb-wrapper" data-bg-src="<?= base_url() ?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title">Book your Tour</h3>
        </div>
    </div>
</div>
<div class="about-area position-relative overflow-hidden overflow-hidden space" id="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 p-2 px-2">
                <div class="mt-0 title-area mb-10">
                    <h2 class="sec-title pe-xl-5 me-xl-5 heading text-end"> Book Your Tour </h2>


                    <?php //print_r($tour);
                    // print_r($tourcategory);
                    ?>
                    <?php $error = $this->session->flashdata('error');
                    if ($error) { ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } ?>
                    <?php $success = $this->session->flashdata('success');
                    if ($success) {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8">
                <form action="<?=base_url('Booktour/booknow') ?>" method="POST" class="book-form style2 ajax-book">

                    <div class="row">
                        <div id="error_div" class="col-12">
                        </div>
                      
                        <h4 class="sec-title pe-xl-5 me-xl-5 heading"> Tour Booking </h4>
                        <hr>


                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Departure City:</label>
                            <select class="form-select" id="departure_city" name="departure_city">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'GOA') ? "selected" : "" ?>>GOA</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'SHIMLA') ? "selected" : "" ?>>SHIMLA</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'Bangaluru') ? "selected" : "" ?>>Bangaluru</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'DARJEELING') ? "selected" : "" ?>>DARJEELING</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'UDAIPUR') ? "selected" : "" ?>>UDAIPUR</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'MANALI') ? "selected" : "" ?>>MANALI</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'Andaman and Nicobar') ? "selected" : "" ?>>Andaman and Nicobar</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['start_location'] == 'DELHI') ? "selected" : "" ?>>DELHI</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Arrival City:</label>
                            <select class="form-select" id="arrival_city" name="arrival_city">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'Hampi') ? "selected" : "" ?>>Hampi</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'Bangaluru') ? "selected" : "" ?>>Bangaluru</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'COORG') ? "selected" : "" ?>>COORG</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'Kuala Lumpur') ? "selected" : "" ?>>Kuala Lumpur</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'Mauritius') ? "selected" : "" ?>>Mauritius</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'Kerala') ? "selected" : "" ?>>Kerala</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'Tamil Nadu') ? "selected" : "" ?>>Tamil Nadu</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['destination_location'] == 'Rajasthan') ? "selected" : "" ?>>Rajasthan</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Days</label>
                            <select class="form-select" id="howmany_days" name="howmany_days">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_days'] == '3') ? "selected" : "" ?> value="3">3</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_days'] == '4') ? "selected" : "" ?> value="4">4</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_days'] == '5') ? "selected" : "" ?> value="5">5</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_days'] == '7') ? "selected" : "" ?> value="7">7</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Night</label>
                            <select class="form-select" id="howmany_night" name="howmany_night">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_nights'] == '2') ? "selected" : "" ?> value="2">2</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_nights'] == '3') ? "selected" : "" ?> value="3">3</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_nights'] == '4') ? "selected" : "" ?> value="4">4</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['duration_nights'] == '5') ? "selected" : "" ?> value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16" for="departure_date">Departure Date:</label>
                            <input type="datetime-local" id="departure_date" name="departure_date">
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16" for="return_date">Return Date (Optional):</label>
                            <input type="datetime-local" id="return_date" name="return_date">
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16" for="passengers">Number of Passengers:</label>
                            <input type="number" id="passengers" name="passengers" value="1" min="1">

                        </div>

                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Category</label>
                            <select class="form-select" id="tour_category" name="category">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['category_id'] == 1) ? "selected" : "" ?> value="1">India</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['category_id'] == 2) ? "selected" : "" ?> value="2">World</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2" id="continent_container" style="display: none;">
                            <label class="p-1 mb-1 fs-16">Continent</label>
                            <select class="form-select" id="continent_id" name="continent">
                                <option value="0">-Select Continent-</option>
                            </select>
                            <span class="text-danger continent-error" style="display: none;">Please select a continent</span>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Country/State</label>
                            <select class="form-select" id="tourcategory" name="tourcategory">
                                <option value="0">-Select-</option>
                                <!-- <?php if (isset($tourcategory)) {
                                    foreach ($tourcategory as $item) { ?>
                                        <option <?= (isset($tour) && count($tour) > 0 && $tour['tourcategory_id'] == $item['id']) ? "selected" : "" ?> value="<?= $item['id'] ?>"><?= $item['sub_category'] ?></option>
                                <?php }
                                } ?> -->
                            </select>
                        </div>
                        <div class="form-group col-12 mb-2">
                            <label class="p-1 mb-1 fs-16">Tour Package</label>
                            <select class="form-select" id="tour" name="tour">
                                <?php if (isset($tour) && count($tour) > 0) { ?>
                                    <option data-price="<?= $tour['price'] ?>" value="<?= $tour['id'] ?>"><?= $tour['title'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Hotel</label>
                            <select class="form-select" id="hotel" name="hotel">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 1) ? "selected" : "" ?> value="Standard">Standard</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="Deluxe">Deluxe</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="Super Deluxe">Super Deluxe</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="Luxury">Luxury</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="3 Star">3 Star</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="4 Star">4 Star</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="5 Star">5 Star</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Meals</label>
                            <select class="form-select" id="meals" name="meals">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 1) ? "selected" : "" ?> value="CP">CP</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="MAP">MAP</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="AP">AP</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Types of Transfers</label>
                            <select class="form-select" id="typeof_transfers" name="typeof_transfers">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['type_id'] == 1) ? "selected" : "" ?> value="1">Shared Transfers</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['type_id'] == 2) ? "selected" : "" ?> value="2">Private Transfers</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['type_id'] == 3) ? "selected" : "" ?> value="3">Airport Chauffeur Services</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['type_id'] == 4) ? "selected" : "" ?> value="4">Touristic Transfers</option>
                            </select>
                        </div>

                        <div class="col-6 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">No. of Adults</label>
                            <input type="number" class="form-control" name="adults" id="adults" placeholder="0">
                        </div>
                        <div class="col-6 form-group mb-4">
                            <label class="p-1 mb-1 fs-16">No. of Children</label>
                            <input type="number" class="form-control" name="children" id="children" placeholder="0">
                        </div>
                        <div class="col-6 form-group mb-2 mt-3">
                            <span class="d-flex align-items-center gap-2 p-2" style="border-radius: 8px; display:<?= (isset($tour) && count($tour) > 0) ? "block;" : "none" ?>;font-size: 16px;font-weight:600;border: 1px solid lightgrey;" class="tour_amount mb-0 p-2 text-dark shadow-sm" id="amount" placeholder="0">
                                <label class="text-danger p-0 font-bold mb-0 px-2">Amount</label>
                                <div class="d-flex gap-2 align-items-center">
                                    <?= (isset($tour) && count($tour) > 0) ? "<i class='fa fa-indian-rupee'></i>
                                    <input type='text' name= 'price' value=" . $tour['price'] . "> <span style='font-size: 13px; line-height: 16px;'>/ Per Person</span> " : "" ?>
                                </div>
                            </span>
                        </div>

                        
                    <h4 class="sec-title pe-xl-5 me-xl-5 heading">Tour Booking</h4>
                    <hr>
                        <div class="col-12 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Name</label>
                            <input type="text" class="form-control" name="name" id="name4" placeholder="">
                        </div>
                        <div class="col-6 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Email</label>
                            <input type="email" class="form-control" name="email" id="email4" placeholder="">
                        </div>
                        <div class="col-6 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Phone</label>
                            <input type="number" class="form-control" name="phone" id="phone4" placeholder="">
                        </div>
                        <div class="col-12 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Address</label>
                            <input type="text" class="form-control" name="address" id="address4" placeholder="">
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Type of Tour</label>
                            <select class="form-select" id="typeof_tour" name="typeof_tour">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 1) ? "selected" : "" ?> value="1">Sightseeing Tours</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="2">Adventure Tours</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="3">Historical & Cultural Tours</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 2) ? "selected" : "" ?> value="4">Specialty Tours</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Country</label>

                            <select class="form-select" id="country" name="country">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                            </select>

                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16"> City:</label>

                            <select class="form-select" id="city" name="city">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'GOA') ? "selected" : "" ?>>GOA</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'SHIMLA') ? "selected" : "" ?>>SHIMLA</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'COORG') ? "selected" : "" ?>>COORG</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'DARJEELING') ? "selected" : "" ?>>DARJEELING</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'UDAIPUR') ? "selected" : "" ?>>UDAIPUR</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'MANALI') ? "selected" : "" ?>>MANALI</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'Andaman and Nicobar') ? "selected" : "" ?>>Andaman and Nicobar</option>
                                <option <?= (isset($tour) && count($tour) > 0 && $tour['id'] == 'DELHI') ? "selected" : "" ?>>DELHI</option>
                            </select>
                        </div>
                        <div class="form-btn col-12 mt-24"><button id="booktour" type="submit" class="th-btn">Book Now</button></div>
                    </div>
                    <p class="form-messages mb-0 mt-3"></p>
                </form>
            </div>
        </div>
        <div class="shape-mockup movingX d-none d-xxl-block" data-top="0%" data-left="-18%"><img src="<?= base_url() ?>assets/img/shape/shape_2_1.png" alt="shape"></div>
        <div class="shape-mockup jump d-none d-xxl-block" data-top="28%" data-right="-15%"><img src="<?= base_url() ?>assets/img/shape/shape_2_2.png" alt="shape"></div>
        <div class="shape-mockup spin d-none d-xxl-block" data-bottom="18%" data-left="-112%"><img src="<?= base_url() ?>assets/img/shape/shape_2_3.png" alt="shape"></div>
        <div class="shape-mockup movixgX d-none d-xxl-block" data-bottom="18%" data-right="-12%"><img src="<?= base_url() ?>assets/img/shape/shape_2_4.png" alt="shape"></div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var baseUrl = $('meta[name="base-url"]').attr('content') || window.location.origin + '/anaadi/';

        $(".book-form select[name='category']").change(function() {
            $("#booktour").html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Please wait..");
            var params = {};
            params.category_id = $(this).val();
            var url = "<?= base_url('Tour/getTourCategory') ?>";
            if ($(this).val() == 0) {
                $(".book-form select[name='tourcategory']").empty();
                return false;
            }
            $.ajax({
                type: "POST",
                url: url,
                data: params,
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    if (data.error == 1) {
                        $("#error_div").append("<div class='alert alert-danger mb-1 py-1 px-2 small'>" + data.error_message + "</div>");
                        $("#booktour").prop('disabled', false);
                        $("#booktour").html("Submit");
                    } else {
                        $("#booktour").html("Submit");
                        var records = data.record;
                        $(".book-form select[name='tourcategory']").empty();
                        $(".book-form select[name='tourcategory']").append("<option value='0'>-Select-</option>");
                        for (var i = 0; i < records.length; i++) {
                            $(".book-form select[name='tourcategory']").append("<option value='" + records[i].id + "'>" + records[i].country + "</option>");
                        }
                    }
                },
                error: function(data) {
                    $("#error_div").append("<div class='alert alert-danger mb-1 py-1 px-2 small'>Error Occured. Try again later.</div>");
                    $("#booktour").prop('disabled', false);
                    $("#booktour").html("Submit");
                }
            });

            setTimeout(function() {
                $("#error_div").html("");
            }, 2000);
            return true;
        });

        $(".book-form select[name='tourcategory']").change(function() {
            $("#booktour").html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Please wait..");
            console.log($(this).val());
            var params = {};
            params.category_id = $(".book-form select[name='category']").val();
            params.tourcategory_id = $(this).val();
            var url = "<?= base_url('Tour/getTours') ?>";
            if ($(this).val() == 0) {
                $(".book-form select[name='tour']").empty();
                return false;
            }
            $.ajax({
                type: "POST",
                url: url,
                data: params,
                dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    if (data.error == 1) {
                        $("#error_div").append("<div class='alert alert-danger mb-1 py-1 px-2 small'>" + data.error_message + "</div>");
                        $("#booktour").prop('disabled', false);
                        $("#booktour").html("Submit");
                    } else {
                        $("#booktour").html("Submit");
                        var records = data.record;
                        $(".book-form select[name='tour']").empty();
                        $(".book-form select[name='tour']").append("<option value='0'>-Select-</option>");
                        for (var i = 0; i < records.length; i++) {
                            $(".book-form select[name='tour']").append("<option data-price='" + records[i].price + "' value='" + records[i].id + "'>" + records[i].title + "</option>");
                        }
                    }
                },
                error: function(data) {
                    $("#error_div").append("<div class='alert alert-danger mb-1 py-1 px-2 small'>Error Occured. Try again later.</div>");
                    $("#booktour").prop('disabled', false);
                    $("#booktour").html("Submit");
                }
            });

            setTimeout(function() {
                $("#error_div").html("");
            }, 2000);
            return true;
        });

        $(".book-form select[name='tour']").change(function() {
            $(".book-form .tour_amount").css('display', 'inline');

            function toCurrencyString(price) {
                price = parseInt(price);
                return price.toFixed(2).replace(/(\d)(?=(\d{3})+\b)/g, '$1,');
            }

            var price = $(this).find('option:selected').attr('data-price');
            $("#amount").html("<i class='fa fa-indian-rupee'></i>" + toCurrencyString(price) + " / Per Person");
        });

        $('#tour_category').on('change', function() {
            const categoryId = $(this).val();
            
            $('#continent_id').html('<option value="0">-Select Continent-</option>');
            $('#country').html('<option value="0">-Select-</option>');
            
            if (categoryId == 1) {
                $('#continent_container').hide();
                loadIndiaStates(categoryId);
            } else if (categoryId == 2) {
                $('#continent_container').show();
                loadContinents();
            } else {
                $('#continent_container').hide();
            }
        });
        
        $('#continent_id').on('change', function() {
            const continentId = $(this).val();
            
            $('#country').html('<option value="0">-Select-</option>');
            
            if (continentId > 0) {
                $('.continent-error').hide();
                loadCountriesByContinent(continentId);
            }
        });
        
        function loadContinents() {
            $.ajax({
                url: baseUrl + 'Customizeform/getContinents',
                type: 'POST',
                data: {
                    category_id: 2
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        let options = '<option value="0">-Select Continent-</option>';
                        
                        $.each(response.data, function(index, continent) {
                            options += '<option value="' + continent.id + '">' + continent.continent + '</option>';
                        });
                        
                        $('#continent_id').html(options);
                    }
                },
                error: function() {
                    console.error('Error fetching continents');
                }
            });
        }
        
        function loadIndiaStates(categoryId) {
            $.ajax({
                url: baseUrl + 'Customizeform/getTourCategories',
                type: 'POST',
                data: {
                    category_id: categoryId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        let options = '<option value="0">-Select-</option>';
                        
                        $.each(response.data, function(index, category) {
                            options += '<option value="' + category.id + '">' + category.country + '</option>';
                        });
                        
                        $('#tourcategory').html(options);
                    }
                },
                error: function() {
                    console.error('Error fetching tour categories');
                }
            });
        }
        
        function loadCountriesByContinent(continentId) {
            $.ajax({
                url: baseUrl + 'Customizeform/getCountriesByContinent',
                type: 'POST',
                data: {
                    continent_id: continentId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        let options = '<option value="0">-Select-</option>';
                        
                        $.each(response.data, function(index, country) {
                            options += '<option value="' + country.id + '">' + country.country + '</option>';
                        });
                        
                        $('#tourcategory').html(options);
                    }
                },
                error: function() {
                    console.error('Error fetching countries');
                }
            });
        }
        
        if ($('#tour_category').val() == 2) {
            $('#continent_container').show();
            loadContinents();
        } else if ($('#tour_category').val() == 1) {
            loadIndiaStates(1);
        }
    });
</script>