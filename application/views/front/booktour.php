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
                      
                        
                        <h4 class="sec-title pe-xl-5 me-xl-5 heading mt-3">Customer Information</h4>
                        <hr>
                        <div class="col-12 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Name</label>
                            <input type="text" class="form-control" name="name" id="name4" placeholder="" required>
                        </div>
                        <div class="col-6 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Email</label>
                            <input type="email" class="form-control" name="email" id="email4" placeholder="" required>
                        </div>
                        <div class="col-6 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Phone</label>
                            <input type="number" class="form-control" name="phone" id="phone4" placeholder="" required>
                        </div>
                        <div class="col-12 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Address</label>
                            <input type="text" class="form-control" name="address" id="address4" placeholder="">
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">State</label>
                            <select class="form-select" name="country">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <?php if(!empty($india_states)): ?>
                                    <?php foreach($india_states as $state): ?>
                                        <option value="<?= $state['id'] ?>"><?= $state['country'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16"> City:</label>
                            <input type="text" name="city" id="city" value="" placeholder="Enter city name" class="form-control mt-3">
                        </div>

                        <h4 class="sec-title pe-xl-5 me-xl-5 heading mt-3"> Tour Information </h4>
                        <hr>

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
                                <?php if (isset($tourcategory)) {
                                    foreach ($tourcategory as $item) { ?>
                                        <option <?= (isset($tour) && count($tour) > 0 && $tour['tourcategory_id'] == $item['id']) ? "selected" : "" ?> value="<?= $item['id'] ?>"><?= $item['country'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-12 mb-2">
                            <label class="p-1 mb-1 fs-16">Tour Package</label>
                            <select class="form-select" id="tour" name="tour">
                                <?php if (isset($tour) && count($tour) > 0) { ?>
                                    <option 
                                        data-price="<?= $tour['price'] ?>" 
                                        data-childprice="<?= $tour['price_child_without_bed'] ?>" 
                                        data-childpricebed="<?= $tour['price_child_with_bed'] ?>" 
                                        data-gst_rate_per="<?= $tour['gst_id'] ?>" 
                                        data-tcs_rate_per="<?= $tour['tcs_id'] ?>" 
                                        data-fixed_dates="<?= isset($tour['fixed_dates']) ? htmlspecialchars(urlencode($tour['fixed_dates'])) : '' ?>"
                                        value="<?= $tour['id'] ?>"
                                    >
                                        <?= $tour['title'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <input type="hidden" id="tour_price" value="0" >
                            <input type="hidden" id="price_child_with_bed" value="0" >
                            <input type="hidden" id="price_child_without_bed" value="0" >
                            <input type="hidden" id="gst_rate_per" value="0" >
                            <input type="hidden" id="tcs_rate_per" value="0" >
                        </div>

                        <?php
                        $fixed_dates = [];
                        if (isset($tour['fixed_dates']) && !empty($tour['fixed_dates'])) {
                            $decoded = json_decode($tour['fixed_dates'], true);
                            if (is_array($decoded) && count($decoded) > 0) {
                                $fixed_dates = $decoded;
                            }
                        }
                        ?>

                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16" for="departure_date">Start Date:</label>
                            <?php if (!empty($fixed_dates)) { ?>
                                <select id="departure_date" name="departure_date" class="form-select">
                                    <option value="">-Select Date-</option>
                                    <?php foreach ($fixed_dates as $date): ?>
                                        <option value="<?= htmlspecialchars($date) ?>"><?= htmlspecialchars($date) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php } else { ?>
                                <input type="datetime-local" id="departure_date" name="departure_date">
                            <?php } ?>
                        </div>
                        <!-- <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16" for="return_date">Return Date (Optional):</label>
                            <input type="datetime-local" id="return_date" name="return_date">
                        </div> -->

                        <!-- <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Meals</label>
                            <select class="form-select" id="meals" name="meals">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <?php foreach ($meals as $meal): ?>
                                    <option value="<?= $meal['name'] ?>" <?= (isset($tour) && count($tour) > 0 && $tour['meal_id'] == $meal['name']) ? "selected" : "" ?>><?= $meal['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div> -->

                        <div class="col-6 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">No. of Adults</label>
                            <input type="number" class="form-control" name="adults" id="adults" placeholder="Min: 2 Person" min="2">
                        </div>
                        <div class="col-6 form-group mb-4">
                            <label class="p-1 mb-1 fs-16">2 &lt; 12 Years (Without Bed)</label>
                            <input type="number" class="form-control" name="children" id="children" placeholder="0">
                        </div>
                        <div class="col-6 form-group mb-4">
                            <label class="p-1 mb-1 fs-16">2 &lt; 12 Years (With Bed)</label>
                            <input type="number" class="form-control" name="children_withbed" id="children_withbed" placeholder="0">
                        </div>
                        <div class="col-12 form-group mb-2 mt-3">
                            <span class="d-flex align-items-center gap-2 p-2" style="border-radius: 8px; display:<?= (isset($tour) && count($tour) > 0) ? "block;" : "none" ?>;font-size: 16px;font-weight:600;border: 1px solid lightgrey;" class="tour_amount mb-0 p-2 text-dark shadow-sm" id="amount" placeholder="0">
                                <label class="text-danger p-0 font-bold mb-0 px-2">Amount</label>
                                <div class="d-flex gap-2 align-items-center">
                                    <?= (isset($tour) && count($tour) > 0) ? "<i class='fa fa-indian-rupee'></i>
                                    <input type='text' name= 'price' value=" . $tour['price'] . "> <span style='font-size: 13px; line-height: 16px;'>/ Per Person</span> " : "" ?>
                                </div>
                            </span>
                        </div>

                        
                        <!-- <h4 class="sec-title pe-xl-5 me-xl-5 heading mt-3">Basic Information</h4>
                        <hr> -->
                        <!-- <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Type of Tour</label>
                            <select class="form-select" id="typeof_tour" name="typeof_tour">
                                <option <?= (isset($tour) && count($tour) > 0) ? "" : "selected" ?> value="0">-Select-</option>
                                <?php if(!empty($tour_types)): ?>
                                    <?php foreach($tour_types as $type): ?>
                                        <option value="<?= $type['id'] ?>"><?= $type['type'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div> -->
                        <div class="form-btn col-12 mt-24"><button id="booktour" type="button" class="th-btn">Book Now</button></div>
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
                            $(".book-form select[name='tour']").append(
                                "<option " +
                                    "data-price='" + records[i].price + "' " +
                                    "data-childprice='" + records[i].price_child_without_bed + "' " +
                                    "data-childpricebed='" + records[i].price_child_with_bed + "' " +
                                    "data-gst_rate_per='" + records[i].gst_id + "' " +
                                    "data-tcs_rate_per='" + records[i].tcs_id + "' " +
                                    "data-fixed_dates='" + (records[i].fixed_dates ? encodeURIComponent(JSON.stringify(records[i].fixed_dates)) : "") + "' " +
                                    "value='" + records[i].id + "'>" +
                                    records[i].title +
                                "</option>"
                            );
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

        // Helper to update departure date input based on fixed_dates
        function updateDepartureDateInput(fixedDates) {
            var $container = $("#departure_date").closest(".form-group");
            if (!Array.isArray(fixedDates)) {
                try { fixedDates = JSON.parse(fixedDates); } catch(e) { fixedDates = []; }
            }
            if (fixedDates && fixedDates.length > 0) {
                var selectHtml = '<select id="departure_date" name="departure_date" class="form-select">';
                selectHtml += '<option value="">-Select Date-</option>';
                for (var i = 0; i < fixedDates.length; i++) {
                    var date = fixedDates[i];
                    selectHtml += '<option value="' + $('<div>').text(date).html() + '">' + $('<div>').text(date).html() + '</option>';
                }
                selectHtml += '</select>';
                $container.find("#departure_date").replaceWith(selectHtml);
            } else {
                var inputHtml = '<input type="datetime-local" id="departure_date" name="departure_date">';
                $container.find("#departure_date").replaceWith(inputHtml);
            }
        }

        $(".book-form select[name='tour']").change(function() {
            $(".book-form .tour_amount").css('display', 'inline');

            function toCurrencyString(price) {
                price = parseInt(price);
                return price.toFixed(2).replace(/(\d)(?=(\d{3})+\b)/g, '$1,');
            }

            var price = $(this).find('option:selected').attr('data-price');
            var childPrice = $(this).find('option:selected').attr('data-childprice');
            var childPriceWithBed = $(this).find('option:selected').attr('data-childpricebed');
            var gstRate = $(this).find('option:selected').attr('data-gst_rate_per');
            var tcsRate = $(this).find('option:selected').attr('data-tcs_rate_per');

            $("#tour_price").val(price);
            $("#price_child_with_bed").val(childPriceWithBed);
            $("#price_child_without_bed").val(childPrice);
            $("#gst_rate_per").val(gstRate);
            $("#tcs_rate_per").val(tcsRate);
            $("#amount").html("<i class='fa fa-indian-rupee'></i>" + toCurrencyString(price) + " / Per Person");
            
            // Calculate initial amount based on current values
            calculateAmount();

            // Handle fixed_dates for departure_date input
            var selectedOption = $(this).find('option:selected');
            var fixedDatesRaw = selectedOption.attr('data-fixed_dates');
            var fixedDates = [];
            if (fixedDatesRaw) {
                try {
                    fixedDates = JSON.parse(decodeURIComponent(fixedDatesRaw));
                } catch (e) { fixedDates = []; }
            }
            updateDepartureDateInput(fixedDates);
        });

        // Initialize price fields on page load if a tour is pre-selected
        if ($(".book-form select[name='tour'] option:selected").val() > 0) {
            var selectedOption = $(".book-form select[name='tour'] option:selected");
            var price = selectedOption.attr('data-price');
            var childPrice = selectedOption.attr('data-childprice');
            var childPriceWithBed = selectedOption.attr('data-childpricebed');
            var gstRate = selectedOption.attr('data-gst_rate_per');
            var tcsRate = selectedOption.attr('data-tcs_rate_per');
            
            // Update hidden fields
            $("#tour_price").val(price);
            $("#price_child_with_bed").val(childPriceWithBed);
            $("#price_child_without_bed").val(childPrice);
            $("#gst_rate_per").val(gstRate);
            $("#tcs_rate_per").val(tcsRate);

            // fixed_dates
            var fixedDatesRaw = selectedOption.attr('data-fixed_dates');
            var fixedDates = [];
            if (fixedDatesRaw) {
                try {
                    fixedDates = JSON.parse(decodeURIComponent(fixedDatesRaw));
                } catch (e) { fixedDates = []; }
            }
            updateDepartureDateInput(fixedDates);
            
            // Show the tour price
            $(".book-form .tour_amount").css('display', 'block');
            
            function toCurrencyString(price) {
                price = parseInt(price);
                return price.toFixed(2).replace(/(\d)(?=(\d{3})+\b)/g, '$1,');
            }
            
            $("#amount").html("<label class='text-danger p-0 font-bold mb-0 px-2'>Amount</label><div>" +
                "<i class='fa fa-indian-rupee'></i>" + toCurrencyString(price) + " / Per Person</div>");
                
            // Calculate amount if any quantities are already entered
            calculateAmount();
        }

        // Initialize the amount display
        // Add event listeners for quantity inputs
        $("#adults, #children, #children_withbed").on('change keyup', function() {
            calculateAmount();
        });

        function calculateAmount() {
            // Get prices from hidden fields
            var adultPrice = parseFloat($("#tour_price").val()) || 0;
            var childPriceWithoutBed = parseFloat($("#price_child_without_bed").val()) || 0;
            var childPriceWithBed = parseFloat($("#price_child_with_bed").val()) || 0;
            var gstRate = parseFloat($("#gst_rate_per").val()) || 0;
            var tcsRate = parseFloat($("#tcs_rate_per").val()) || 0;
            
            // Get quantities
            var adultsQty = parseInt($("#adults").val()) || 0;
            var childrenQty = parseInt($("#children").val()) || 0;
            var childrenWithBedQty = parseInt($("#children_withbed").val()) || 0;
            
            // Calculate totals
            var adultTotal = adultPrice * adultsQty;
            var childWithoutBedTotal = childPriceWithoutBed * childrenQty;
            var childWithBedTotal = childPriceWithBed * childrenWithBedQty;
            
            // Calculate grand total
            var grandTotal = adultTotal + childWithoutBedTotal + childWithBedTotal;

            // Update the display
            function toCurrencyString(price) {
                return price.toFixed(2).replace(/(\d)(?=(\d{3})+\b)/g, '$1,');
            }
            
            // Create breakdown of the price
            var breakdown = "";
            if (adultsQty > 0) {
                breakdown += "<div>Adults: " + adultsQty + " × ₹" + toCurrencyString(adultPrice) + " = ₹" + toCurrencyString(adultTotal) + "</div>";
            }
            if (childrenQty > 0) {
                breakdown += "<div>Children (Without Bed): " + childrenQty + " × ₹" + toCurrencyString(childPriceWithoutBed) + " = ₹" + toCurrencyString(childWithoutBedTotal) + "</div>";
            }
            if (childrenWithBedQty > 0) {
                breakdown += "<div>Children (With Bed): " + childrenWithBedQty + " × ₹" + toCurrencyString(childPriceWithBed) + " = ₹" + toCurrencyString(childWithBedTotal) + "</div>";
            }
            
            // Add GST and TCS to the breakdown
            // var gstRate = 18; // GST rate in percentage
            // var tcsRate = 5; // TCS rate in percentage
            var gstAmount = grandTotal * (gstRate / 100);
            var tcsAmount = grandTotal * (tcsRate / 100);
            breakdown += "<div>GST (" + gstRate + "%): ₹" + toCurrencyString(gstAmount) + "</div>";
            breakdown += "<div>TCS (" + tcsRate + "%): ₹" + toCurrencyString(tcsAmount) + "</div>";
            // var totalWithGSTAndTCS = grandTotal + gstAmount + tcsAmount;
            // breakdown += "<div>Total with GST and TCS: ₹" + toCurrencyString(totalWithGSTAndTCS) + "</div>";
            
            // Calculate GST and TCS
            var gstAmount = grandTotal * (gstRate / 100);
            var tcsAmount = grandTotal * (tcsRate / 100);
            grandTotal += gstAmount + tcsAmount;
            
            if (breakdown !== "") {
                breakdown += "<div class='fw-bold mt-2'>Total: ₹" + toCurrencyString(grandTotal) + "</div>";
            }
            
            // Display the breakdown or just the adult price if no quantities yet
            if (adultsQty > 0 || childrenQty > 0 || childrenWithBedQty > 0) {
                $("#amount").html("<label class='text-danger p-0 font-bold mb-0 px-2'>Amount</label><div class='price-breakdown'>" + breakdown + "</div>");
            } else {
                // If no quantities entered yet, just show per person price
                $("#amount").html("<i class='fa fa-indian-rupee'></i>" + toCurrencyString(adultPrice) + " / Per Person");
            }
            
            // Add hidden input with the total price for form submission
            if ($("#total_amount").length === 0) {
                $("<input>").attr({
                    type: "hidden",
                    id: "total_amount",
                    name: "price",
                    value: grandTotal
                }).appendTo(".book-form");
            } else {
                $("#total_amount").val(grandTotal);
            }
        }

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
            // loadIndiaStates(1);
        }
    });

    $("#booktour").click(function(e) {
        e.preventDefault(); // Prevent default button action

        // Perform any client-side validation if needed here before confirm

        if (confirm("Are you sure you want to book this tour?")) {
            // If confirmed, submit the form
            $("form.ajax-book").submit();
        }
    });

</script>