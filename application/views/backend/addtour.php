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
              <div class="row gap-1">
                  <form id="addtour" class="col-lg-12" method="POST" encypt="multipart/data" action="<?=base_url('admin/Tours/save_record')?>">
                      <input type="hidden" name="record_id" value="<?=(isset($record))?$record['id']:""?>">
                      <div class="row justify-content-left">
                        <div class="col-lg-6 px-4 py-2">
                          
                          <!-- Hidden category_id field -->
                          <input type="hidden" name="category_id" id="category_id" value="<?=(isset($record))?$record['category_id']:(isset($categoryid)?$categoryid:"")?>">

                          <div class="form-group w-50 mb-2" id="continent_container">
                            <label>Continent</label>
                            <select name="continent_id" id="continent_id" class="form-select">
                                <option value="0">-Select-</option>
                                <?php if(isset($continents)){ 
                                  foreach($continents as $row){ ?>
                                    <option value="<?=$row['id']?>"><?=$row['continent']?></option>
                                  <?php }
                                } ?>
                            </select>
                          </div>
                          
                          <div class="form-group w-50 mb-2" id="state_container">
                            <label id="location_label">State</label>
                            <select name="tourcategory_id" class="form-select">
                              <option value="0">-Select-</option>
                              <?php if( isset($tourcategory)) { 
                                foreach($tourcategory as $row) { ?>
                                  <option <?=(isset($record) && $record['tourcategory_id'] == $row['id'] )?"selected":""?>  value="<?=$row['id']?>"><?=$row['country']?></option>
                                <?php }
                              } ?>
                            </select>
                          </div>
                          
                          <div class="form-group w-50 mb-2">
                            <label>Tour Type</label>
                            <select name="type_id" class="form-select">
                              <option value="0">-Select-</option>
                              <?php if( isset($tour_types)) { 
                                foreach($tour_types as $row) { ?>
                                  <option <?=(isset($record) && $record['type_id'] == $row['id'])?"selected":""?>  value="<?=$row['id']?>"><?=$row['type']?></option>
                                <?php }
                              } ?>
                            </select>
                          </div>
                          
                          <div class="form-group w-100 mb-2">
                            <label>Title</label>
                            <input type="text" name="title" value="<?=(isset($record))?$record['title']:""?>" class="form-control" required maxlength="250">
                          </div>

                          <div class="form-group w-50 mb-2">
                            <label class="w-100">Duration</label>
                            <input type="text" name="nights" value="<?=(isset($record))?$record['duration_nights']:""?>" class="w-30 d-inline form-control" required maxlength="10"> <label class="d-inline">Nights &nbsp;</label>
                            <input type="text" name="days" class="w-30 d-inline form-control" value="<?=(isset($record))?$record['duration_days']:""?>" required maxlength="10"> <label class="d-inline">Days</label>
                          </div>

                          <div class="form-group w-45 mb-2">
                            <label>Starting Price / Per Person</label>
                            <input type="text" name="price" class="form-control" value="<?=(isset($record))?$record['price']:""?>" required maxlength="10">
                          </div>
                          
                          <!-- <div class="row"> -->
                            <div class="form-group w-50 mb-2">
                              <label>Child Price (2-12 yrs with bed)</label>
                              <input type="text" name="price_child_with_bed" class="form-control" value="<?=(isset($record))?$record['price_child_with_bed']:""?>" required maxlength="10">
                            </div>

                            <div class="form-group w-50 mb-2">
                              <label>Child Price (2-12 yrs without bed)</label>
                              <input type="text" name="price_child_without_bed" class="form-control" value="<?=(isset($record))?$record['price_child_without_bed']:""?>" required maxlength="10">
                            </div>
                          <!-- </div> -->

                          <div class="form-group w-50 mb-2">
                            <label>Start Location</label>
                            <input type="text" name="start_location" class="form-control" value="<?=(isset($record))?$record['start_location']:""?>" required maxlength="250">
                          </div>

                          <div class="form-group w-45 mb-2">
                            <label>Destination Location</label>
                            <input type="text" name="destination_location" class="form-control" value="<?=(isset($record))?$record['destination_location']:""?>" required maxlength="250">
                          </div> 

                          <div class="form-group w-100 mb-2">
                            <label>Covered Locations</label>
                            <input type="text" name="covered_locations" class="form-control" value="<?=(isset($record))?$record['covered_locations']:""?>" required maxlength="250">
                          </div>

                          <div class="form-group w-100 mb-2">
                            <label>Accomodations</label>
                            <input type="text" name="accomodations" class="form-control" value="<?=(isset($record))?$record['accomodations']:""?>" required maxlength="250">
                          </div>

                          <div class="form-group w-100 mb-2">
                            <label>Activities</label>
                            <input type="text" name="activities" class="form-control" value="<?=(isset($record))?$record['activities']:""?>" required maxlength="250">
                          </div>

                        </div>

                        <div class="col-lg-6 px-4 py-2">
                          <div class="form-group w-100 mt-2 mb-4 px-2">
                            <label>Tour Images</label>
                            <input type="file" onchange="loadFile(event)" multiple class="form-control" name="tour_images[]" value="" />
                          </div>
                          <div id="imagepreview" class="imagepreview w-100 px-4 mb-4 float-left">
                            <?php if(isset($record)){
                              $images = explode(",", $record['images']);
                              foreach($images as $img){
                              ?>
                              <img src="<?=base_url('assets/images/tours/'.$img)?>" />
                            <?php } } ?>
                          </div>
                        </div>

                      </div>
                      
                      <div class="row justify-content-left">
                        <div class="col-lg-10 px-4 py-2">
                          <div class="w-100 form-group mb-2">
                            <div class="card">
                              <div class="card-body">
                                <h5 class="card-title text-dark">Tour Description / Itinerary</h5>
                                <div class="quill-editor-default" style="height:200px;overflow: auto;">
                                  <?=(isset($record))?$record['itinerary']:""?>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row justify-content-left">
                        <div class="col-lg-6 px-4 py-2">
                          <div class="w-100 form-group mb-2">
                              <label>Inclusions</label>
                              <input type="text" class="w-90 form-control" name="inclusions" id="inclusions" maxlength="250" value="">                            
                              <span class="text-sm text-warning">Add multiple items. Type and press enter.</span>
                          </div>
                          <div class="w-100 form-group mb-2">
                              <ul class="inclusions_block d-block">
                                <?php if(isset($record)) {
                                $ins = json_decode($record['inclusions']);
                                foreach($ins as $i => $txt){ ?>
                                <li id='lirow_<?=$i?>'><span class='d-inline small h-100 w-90 p-0 m-0 mb-0 overflow-hidden'><?=$txt?></span><a onclick='deleteli("lirow_<?=$i?>")' class='closeli d-block float-right text-danger'><i class='ri-close-circle-line'></i></a></li>  
                                <?php } 
                                } else { ?>
                                <p>No Items</p>
                                <?php } ?>
                              </ul>
                          </div>
                        </div>

                        <div class="col-lg-6 px-4 py-2">
                          <div class="w-100 form-group mb-2">
                              <label>Exclusions</label>
                              <input type="text" class="w-90 form-control" name="exclusions" id="exclusions" maxlength="250" value="">                            
                              <span class="text-sm text-warning">Add multiple items. Type and press enter.</span>
                          </div>
                          <div class="w-100 form-group mb-2">
                              <ul class="exclusions_block d-block">
                                <?php if(isset($record)) {
                                $ins = json_decode($record['exclusions']);
                                foreach($ins as $i => $txt){ ?>
                                <li id='lirow1_<?=$i?>'><span class='d-inline small h-100 w-90 p-0 m-0 mb-0 overflow-hidden'><?=$txt?></span><a onclick='deleteli1("lirow1_<?=$i?>")' class='closeli d-block float-right text-danger'><i class='ri-close-circle-line'></i></a></li>  
                                <?php } 
                                } else { ?>
                                <p>No Items</p>
                                <?php } ?>
                              </ul>
                          </div>
                        </div>
                      </div>

                      <div class="row justify-content-left">
                        <div class="col-lg-4 px-4 py-2">
                          <button id="savetour" class="btn btn-primary"><?=(isset($record))?"Update":"Submit"?></button>
                        </div>
                        <div id="error_div" class="col-lg-6 px-4 py-2 text-left">
                          
                        </div>
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

    var loadFile = function(event) 
    {
      document.getElementById("imagepreview").innerHTML = "";
      var files = event.target.files;
      for(var i=0; i< files.length;i++)
      {
        var output = document.createElement('img');
        output.src = URL.createObjectURL(files[i]);
        output.onload = function() {
          URL.revokeObjectURL(output.src) // free memory
        }  
        document.getElementById("imagepreview").appendChild(output);
      }
      
    };

    function deleteli(id) 
    {
      $("#"+id).remove();
    }

    function deleteli1(id) 
    {
      $("#"+id).remove();
    }

    $(document).ready(function(){
      // Initialize form based on category_id
      initFormByCategory();
      
      function initFormByCategory() {
        var currentCategory = $("#category_id").val();
        
        if(currentCategory == 2) {
          // International/World Tours - show continent dropdown
          $("#continent_container").show();
          $("#location_label").text("Country");
          
          <?php if(isset($record) && $record['category_id'] == 2): ?>
          // For edit mode, pre-select the continent based on tour category
          fetchContinentFromTourCategory(<?php echo $record['tourcategory_id']; ?>);
          <?php endif; ?>
        } else if(currentCategory == 1) {
          // India Tours - hide continent dropdown
          $("#continent_container").hide();
          $("#location_label").text("State");
          
          // Make sure we have tour categories loaded
          if ($("select[name='tourcategory_id'] option").length <= 1) {
            fetchTourCategories(currentCategory);
          }
        } else {
          // Default case or no category selected yet
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
        var params = {};
        params.category_id = category_id;
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
        var params = {};
        params.continent_id = continent_id;
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
        var params = {};
        params.tourcategory_id = tourCategoryId;
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

      $(document).on('keyup keypress', 'form input[type="text"]', function(e) {
        if(e.keyCode == 13) {
          e.preventDefault();
          return false;
        }
      });

      $("#savetour").click(function(e){
        e.preventDefault();

        $("#error_div").html("");
        var btn_txt = "Submit";
        var record_id = $("#addtour input[name='record_id']").val();
        if( record_id !== "" ){
          btn_txt = "Update";
        }


        let form = $("#addtour")[0];
        var formData = new FormData(form);
        let url = $("#addtour").attr('action');
        console.log(formData);

        var inclusions = new Array();
        $(".inclusions_block").find('li').each(function(){
          var span_txt = $(this).find('span').eq(0);
          inclusions.push(span_txt.html().trim());
        });

        var exclusions = new Array();
        $(".exclusions_block").find('li').each(function(){
          var span_txt = $(this).find('span').eq(0);
          exclusions.push(span_txt.html().trim());
        });

        console.log(inclusions);
        console.log(exclusions);

        var itinerary = $("#addtour .ql-editor").html();

        formData.append('inclusions', JSON.stringify(inclusions));
        formData.append('exclusions', JSON.stringify(exclusions));
        formData.append('itinerary', itinerary);

        $(this).prop('disabled', true);
        $(this).html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Please wait..");

        $.ajax({
            type: "POST",
            url: url,
            data: formData, 
            contentType: false,       
            cache: false,             
            processData:false, 
            success: function (data) {
                var d = JSON.parse(data);
                console.log(d);
                if( d.error == 1 )
                {
                    $("#error_div").append("<div class='alert alert-danger mt-1 mb-0'>"+d.error_message+"</div>");
                    $("#savetour").prop('disabled', false);
                    $("#savetour").html(btn_txt);
                }
                else
                {
                    $("#error_div").append("<div class='alert alert-success mt-1 mb-0'>"+d.success_message+"</div>");
                    $("#savetour").html("Success");
                    setTimeout(function(){
                        $("#savetour").html(btn_txt);
                        window.location.href = "<?=base_url('admin/Tours')?>";
                    }, 2000);
                }
            },
            error: function (data) {
                $("#error_div").append("<div class='alert alert-danger mt-1 mb-0'>Error Occured. Try again later.</div>");
                $("#savetour").prop('disabled', false);
                $("#savetour").html(btn_txt);
            }
        });

        setTimeout(function(){
            $("#error_div").html("");
        }, 2000);

      });


      $("#inclusions").keydown(function(event)
      { 
        if( event.which == 13 && $(this).val().trim() != "" )
        {
          var len = $(".inclusions_block").find('li').length;
          var txt = $(this).val().trim();
          txt = txt.replace(/\s+/g," ");
          if( txt == "" )
          {
            return false;
          }
          if( len == 0 ){
            $(".inclusions_block").html("<li id='lirow_"+len+"'><span class='d-inline small h-100 w-90 p-0 m-0 mb-0 overflow-hidden'>"+txt+"</span><a onclick='deleteli(\"lirow_"+len+"\")' class='closeli d-block float-right text-danger'><i class='ri-close-circle-line'></i></a></li>");
          }else{
            $(".inclusions_block").append("<li id='lirow_"+len+"'><span class='d-inline small h-100 w-90 p-0 m-0 mb-0 overflow-hidden'>"+txt+"</span><a onclick='deleteli(\"lirow_"+len+"\")' class='closeli d-block float-right text-danger'><i class='ri-close-circle-line'></i></a></li>");
          }
          $(this).val("");
        }
        return true;

      });

      $("#exclusions").keydown(function(event)
      { 
        if( event.which == 13 && $(this).val().trim() != "" )
        {
          var len = $(".exclusions_block").find('li').length;
          var txt = $(this).val().trim();
          txt = txt.replace(/\s+/g," ");
          if( txt == "" )
          {
            return false;
          }
          if( len == 0 ){
            $(".exclusions_block").html("<li id='lirow1_"+len+"'><span class='d-inline small h-100 w-90 p-0 m-0 mb-0 overflow-hidden'>"+txt+"</span><a onclick='deleteli1(\"lirow1_"+len+"\")' class='closeli d-block float-right text-danger'><i class='ri-close-circle-line'></i></a></li>");
          }else{
            $(".exclusions_block").append("<li id='lirow1_"+len+"'><span class='d-inline small h-100 w-90 p-0 m-0 mb-0 overflow-hidden'>"+txt+"</span><a onclick='deleteli1(\"lirow1_"+len+"\")' class='closeli d-block float-right text-danger'><i class='ri-close-circle-line'></i></a></li>");
          }
          $(this).val("");
        }
        return true;

      });

    });

  </script>