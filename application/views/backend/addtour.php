<main id="main" class="main">
    <section class="section dashboard">
        <div class="col-lg-12 p-0">
          <div class="row">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?=(isset($record))?"Edit Tour":"Add Tour"?> <a href="<?=base_url('admin/Tours')?>" class="back btn btn-md btn-secondary float-right">Back <i class="bi bi-arrow-left ms-1"></i></a></h5>
                <div class="col-lg-12 showalert">
              
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
              </div>
              
                  <form id="addtour" method="POST" enctype="multipart/form-data" action="<?=base_url('admin/Tours/save_record')?>">
                    <input type="hidden" name="record_id" value="<?=(isset($record))?$record['id']:''?>">
                    <input type="hidden" name="category_id" id="category_id" value="<?=(isset($record))?$record['category_id']:(isset($categoryid)?$categoryid:'')?>">
                    <div class="row g-3">
                      <div class="col-md-4" id="continent_container" style="display:<?=(isset($categoryid) && $categoryid == 1) ? 'none' : 'block'?>;">
                        <label class="form-label">Continent</label>
                        <select name="continent_id" id="continent_id" class="form-select">
                          <option value="0">-Select-</option>
                          <?php if(isset($continents)){ foreach($continents as $row){ ?>
                            <option value="<?=$row['id']?>" <?=isset($record)&&isset($record['continent_id'])&&$record['continent_id']==$row['id']?'selected':''?>><?=$row['continent']?></option>
                          <?php }} ?>
                        </select>
                      </div>
                      <div class="col-md-4" id="state_container">
                        <label class="form-label" id="location_label"><?=(isset($categoryid) && $categoryid == 1) ? 'State' : 'Country'?></label>
                        <select name="tourcategory_id" class="form-select">
                          <option value="0">-Select-</option>
                          <?php if(isset($tourcategory)) { foreach($tourcategory as $row) { ?>
                            <option value="<?=$row['id']?>" <?=(isset($record) && $record['tourcategory_id'] == $row['id'])?'selected':''?>><?=$row['country']?></option>
                          <?php }} ?>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Tour Type</label>
                        <select name="type_id" class="form-select">
                          <option value="0">-Select-</option>
                          <?php if(isset($tour_types)) { foreach($tour_types as $row) { ?>
                            <option value="<?=$row['id']?>" <?=(isset($record) && $record['type_id'] == $row['id'])?'selected':''?>><?=$row['type']?></option>
                          <?php }} ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" value="<?=(isset($record))?$record['title']:''?>" class="form-control" required maxlength="255">
                      </div>
                      <div class="col-md-3">
                        <label class="form-label">Days</label>
                        <input type="number" name="duration_days" value="<?=(isset($record))?$record['duration_days']:''?>" class="form-control" min="1" required>
                      </div>
                      <div class="col-md-3">
                        <label class="form-label">Nights</label>
                        <input type="number" name="duration_nights" value="<?=(isset($record))?$record['duration_nights']:''?>" class="form-control" min="1" required>
                      </div>
                      <div class="col-md-3">
                        <label class="form-label">Min. Adults</label>
                        <input type="number" name="min_adults" value="<?=(isset($record))?$record['min_adults']:1?>" class="form-control" min="1">
                      </div>
                      <div class="col-md-3">
                        <label class="form-label">Price Per Adult</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="<?=(isset($record))?$record['price']:''?>" required>
                      </div>
                      <div class="col-md-3">
                        <label class="form-label">Child Price (with bed)</label>
                        <input type="number" step="0.01" name="price_child_with_bed" class="form-control" value="<?=(isset($record))?$record['price_child_with_bed']:''?>">
                      </div>
                      <div class="col-md-3">
                        <label class="form-label">Child Price (without bed)</label>
                        <input type="number" step="0.01" name="price_child_without_bed" class="form-control" value="<?=(isset($record))?$record['price_child_without_bed']:''?>">
                      </div>
                      <div class="col-md-3">
                        <label class="form-label">Infant Price (without bed)</label>
                        <input type="number" step="0.01" name="price_infant_without_bed" class="form-control" value="<?=(isset($record))?$record['price_infant_without_bed']:''?>">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Start Location</label>
                        <select name="start_location" class="form-select select2">
                          <option value="">-Select-</option>
                          <?php if(isset($places_list)) { foreach($places_list as $row) { ?>
                            <option value="<?=$row['name']?>" <?=(isset($record) && $record['start_location'] == $row['name'])?'selected':''?>><?=$row['name']?></option>
                          <?php }} ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Arrival Location</label>
                        <select name="arrival_location" class="form-select select2">
                          <option value="">-Select-</option>
                          <?php if(isset($places_list)) { foreach($places_list as $row) { ?>
                            <option value="<?=$row['name']?>" <?=(isset($record) && $record['arrival_location'] == $row['name'])?'selected':''?>><?=$row['name']?></option>
                          <?php }} ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Destination Location</label>
                        <input type="text" name="destination_location" class="form-control" value="<?=(isset($record))?$record['destination_location']:''?>" maxlength="255">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Tour Starts (Place)</label>
                        <input type="text" name="tour_start_place" class="form-control" value="<?=(isset($record))?$record['tour_start_place']:''?>" maxlength="255">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Tour Ends (Place)</label>
                        <input type="text" name="tour_end_place" class="form-control" value="<?=(isset($record))?$record['tour_end_place']:''?>" maxlength="255">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Covered Locations</label>
                        <input type="text" name="covered_locations" class="form-control" value="<?=(isset($record))?$record['covered_locations']:''?>" maxlength="500">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Accommodations</label>
                        <select name="accomodations" class="form-select select2">
                          <option value="">-Select-</option>
                          <?php if(isset($accomodation_list)) { foreach($accomodation_list as $row) { ?>
                            <option value="<?=$row['name']?>" <?=(isset($record) && $record['accomodations'] == $row['name'])?'selected':''?>><?=$row['name']?></option>
                          <?php }} ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Meals</label>
                        <select name="meals" class="form-select select2">
                          <option value="">-Select-</option>
                          <?php if(isset($meals_list)) { foreach($meals_list as $row) { ?>
                            <option value="<?=$row['name']?>" <?=(isset($record) && $record['meals'] == $row['name'])?'selected':''?>><?=$row['name']?></option>
                          <?php }} ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Transfers</label>
                        <input type="text" name="transfers" class="form-control" value="<?=(isset($record))?$record['transfers']:''?>" maxlength="255">
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">VISA</label>
                        <input type="text" name="visa" class="form-control" value="<?=(isset($record))?$record['visa']:''?>" maxlength="255">
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Air Ticket</label>
                        <input type="text" name="air_ticket" class="form-control" value="<?=(isset($record))?$record['air_ticket']:''?>" maxlength="255">
                      </div>
                      <div class="col-md-4">
                        <label class="form-label">Travel Insurance</label>
                        <input type="text" name="travel_insurance" class="form-control" value="<?=(isset($record))?$record['travel_insurance']:''?>" maxlength="255">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">GST</label>
                        <select name="gst_id" class="form-select">
                          <option value="">-Select-</option>
                          <?php if(isset($gst)) { foreach($gst as $row) { ?>
                            <option value="<?=$row['id']?>" <?=(isset($record) && $record['gst_id'] == $row['id'])?'selected':''?>><?=$row['title']?> (<?=$row['tax_percentage']?>%)</option>
                          <?php }} ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">TCS</label>
                        <select name="tcs_id" class="form-select">
                          <option value="">-Select-</option>
                          <?php if(isset($tcs)) { foreach($tcs as $row) { ?>
                            <option value="<?=$row['id']?>" <?=(isset($record) && $record['tcs_id'] == $row['id'])?'selected':''?>><?=$row['title']?> (<?=$row['tcs_percentage']?>%)</option>
                          <?php }} ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Inclusions</label>
                        <select name="inclusions[]" id="inclusions" class="form-select select2" multiple="multiple">
                          <?php if(isset($inclusion_list)) { foreach($inclusion_list as $row) { ?>
                            <option value="<?=$row['id']?>" <?php if(isset($record) && isset($record['inclusions']) && in_array($row['id'], is_array($record['inclusions']) ? $record['inclusions'] : json_decode($record['inclusions'],true))) echo 'selected'; ?>><?=$row['name']?></option>
                          <?php }} ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Exclusions</label>
                        <select name="exclusions[]" id="exclusions" class="form-select select2" multiple="multiple">
                          <?php if(isset($exclusion_list)) { foreach($exclusion_list as $row) { ?>
                            <option value="<?=$row['id']?>" <?php if(isset($record) && isset($record['exclusions']) && in_array($row['id'], is_array($record['exclusions']) ? $record['exclusions'] : json_decode($record['exclusions'],true))) echo 'selected'; ?>><?=$row['name']?></option>
                          <?php }} ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Booking Validity From</label>
                        <input type="date" name="booking_validity_from" class="form-control" value="<?=(isset($record))?$record['booking_validity_from']:''?>">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Booking Validity To</label>
                        <input type="date" name="booking_validity_to" class="form-control" value="<?=(isset($record))?$record['booking_validity_to']:''?>">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Package Validity From</label>
                        <input type="date" name="package_validity_from" class="form-control" value="<?=(isset($record))?$record['package_validity_from']:''?>">
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Package Validity To</label>
                        <input type="date" name="package_validity_to" class="form-control" value="<?=(isset($record))?$record['package_validity_to']:''?>">
                      </div>
                      <div class="col-md-12">
                        <label class="form-label">Fixed Date Tours (comma separated)</label>
                        <input type="text" name="fixed_dates" class="form-control" value="<?=(isset($record))?$record['fixed_dates']:''?>" maxlength="500">
                      </div>
                      <div class="col-md-12">
                        <label class="form-label">Tour Images</label>
                        <input type="file" onchange="loadFile(event)" multiple class="form-control" name="tour_images[]" />
                        <div id="imagepreview" class="d-flex flex-wrap gap-2 mt-2">
                          <?php if(isset($record)){
                            $images = explode(",", $record['images']);
                            foreach($images as $img){ ?>
                              <img src="<?=base_url('assets/images/tours/'.$img)?>" class="img-thumbnail" style="max-width:100px;max-height:100px;" />
                          <?php } } ?>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <label class="form-label">Tour Description / Itinerary</label>
                        <!-- <textarea name="tour_description" class="form-control" rows="4"><?=(isset($record))?$record['tour_description']:''?></textarea> -->
                         <div class="quill-editor-default" style="height:200px;overflow: auto;">
                            <?=(isset($record))?$record['itinerary']:""?>
                          </div>
                      </div>
                      <div class="col-12 text-end mt-4">
                        <button type="submit" id="savetour" class="btn btn-primary px-5 py-2">Save Tour</button>
                      </div>
                      <div id="error_div" class="col-12 mt-2"></div>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->
  <script type="text/javascript">
    var loadFile = function(event) {
      document.getElementById("imagepreview").innerHTML = "";
      var files = event.target.files;
      for(var i=0; i< files.length;i++) {
        var output = document.createElement('img');
        output.src = URL.createObjectURL(files[i]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }
        document.getElementById("imagepreview").appendChild(output);
      }
    };

    $(document).ready(function(){
      // Initialize form based on category_id
      initFormByCategory();
      
      function initFormByCategory() {
        var currentCategory = $("#category_id").val();
        if(currentCategory == 2) {
          $("#continent_container").show();
          $("#state_container").show();
          $("#location_label").text("Country");
          <?php if(isset($record) && $record['category_id'] == 2): ?>
          fetchContinentFromTourCategory(<?php echo $record['tourcategory_id']; ?>);
          <?php endif; ?>
        } else if(currentCategory == 1) {
          $("#continent_container").hide();
          $("#state_container").show();
          $("#location_label").text("State");
          if ($("select[name='tourcategory_id'] option").length <= 1) {
            fetchTourCategories(currentCategory);
          }
        } else {
          $("#continent_container").hide();
          $("#state_container").show();
          $("#location_label").text("State/Country");
        }
      }
      
      // Handle continent change
      $("#continent_id").change(function(){
        var continent_id = $(this).val();
        if(continent_id > 0) {
          // Fetch tour categories based on continent
          fetchTourCategoriesByContinent(continent_id);
        } else {
          $("select[name='tourcategory_id']").empty().append("<option value='0'>-Select-</option>");
        }
      });
      
      function fetchTourCategories(category_id) {
        var params = {category_id: category_id};
        var url = "<?=base_url('admin/Tours/getTourCategory')?>";
        
        $.ajax({
            type: "POST",
            url: url,
            data: params,
            dataType:'json', 
            success: function (data) {
                if(data.error == 1) {
                    $("#error_div").append("<div class='alert alert-danger mt-1 mb-0'>"+data.error_message+"</div>");
                } else {
                    var records = data.record;
                    $("select[name='tourcategory_id']").empty().append("<option value='0'>-Select-</option>");
                    for(var i=0; i < records.length; i++) {
                        $("select[name='tourcategory_id']").append("<option value='"+records[i].id+"'>"+records[i].country+"</option>");
                    }
                }
            },
            error: function (data) {
                $("#error_div").append("<div class='alert alert-danger mt-1 mb-0'>Error Occurred. Try again later.</div>");
            }
        });
      }
      
      function fetchTourCategoriesByContinent(continent_id) {
        var params = {continent_id: continent_id};
        var url = "<?=base_url('admin/Tours/getTourCategoryByContinent')?>";
        
        $.ajax({
            type: "POST",
            url: url,
            data: params,
            dataType:'json', 
            success: function (data) {
                if(data.error == 1) {
                    $("#error_div").append("<div class='alert alert-danger mt-1 mb-0'>"+data.error_message+"</div>");
                } else {
                    var records = data.record;
                    $("select[name='tourcategory_id']").empty().append("<option value='0'>-Select-</option>");
                    for(var i=0; i < records.length; i++) {
                        $("select[name='tourcategory_id']").append("<option value='"+records[i].id+"'>"+records[i].country+"</option>");
                    }
                }
            },
            error: function (data) {
                $("#error_div").append("<div class='alert alert-danger mt-1 mb-0'>Error Occurred. Try again later.</div>");
            }
        });
      }
      
      function fetchContinentFromTourCategory(tourCategoryId) {
        var params = {tourcategory_id: tourCategoryId};
        var url = "<?=base_url('admin/Tours/getContinentFromTourCategory')?>";
        
        $.ajax({
            type: "POST",
            url: url,
            data: params,
            dataType:'json', 
            success: function (data) {
                if(data.error == 0 && data.continent_id) {
                    // Set the continent dropdown value
                    $("#continent_id").val(data.continent_id);
                }
            }
        });
      }

      // Auto set nights when days is changed
      $("input[name='duration_days']").on('input', function() {
        var days = parseInt($(this).val());
        if (!isNaN(days) && days > 0) {
          $("input[name='duration_nights']").val(days - 1);
        }
      });

      $('.select2').select2({
        width: '100%',
        placeholder: 'Select options',
        allowClear: true
      });
    });
  </script>