<main id="main" class="main">

    <section class="section dashboard">
        
        <div class="col-lg-12 p-0">
          <div class="row">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Continents <button type="button" class="new-continent btn btn-md btn-primary float-right">Add <i class="bi bi-plus-circle ms-1"></i></button></h5>
                <div class="col-lg-12 showalert">
                <?php if( count($records) == 0 ){?>
                  <div class="alert alert-danger">No records found.</div>
                <?php } ?>  
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

              <?php if( count($records) > 0 ) { ?>

                <table class="table datatable table-hover table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Category</th>
                      <th scope="col">Continent</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($records as $index => $row) {?>
                    <tr>
                      <th scope="row"><?= ($index+1) ?></th>
                      <td><?=$row['category']?></td>
                      <td><?=$row['continent']?></td>
                      <td><div class="d-flex justify-content-center">
                        <?php if( isset($user['user_type']) && $user['user_type'] == 'Admin' ){?>
                        <a title="Edit Record" href="javascript:void(0)" record-data="<?=$row['id']?>" class="edit-record fs-6 text-warning float-right mx-2"><i class="bi bi-pencil-fill"></i></a>
                        <a title="Delete Record" href="javascript:void(0)" record-data="<?=$row['id']?>" class="delete-record fs-6 text-danger float-right mx-2"><i class="bi bi-trash-fill"></i></a>
                        <?php } else { ?>
                          <a title="Edit Record" href="javascript:void(0)" record-data="<?=$row['id']?>" class="edit-record fs-6 text-warning float-right mx-2"><i class="bi bi-pencil-fill"></i></a>
                        <?php } ?>
                      </div></td>
                    </tr>
                     <?php } ?>
                  </tbody>
                </table>  

              <?php } ?>
            </div>

          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

<div class="modal fade" id="add-continent" tabindex="-1" data-bs-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="addcontinent" action="<?=base_url('admin/Tourcategory/save_continent')?>" method="POST">
          <input type="hidden" name="record_id" value="">
          <div class="modal-header">
            <h5 class="modal-title">Add Continent</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="col-md-10 mx-auto mb-2">
                <label for="validationDefault01" class="form-label">Category</label>
                <select name="category" id="category_select" class="form-select" required>
                <option value="">-Select-</option>
                    <?php foreach($categories as $cat){ ?>
                      <option value="<?=$cat['id']?>"><?=$cat['category']?></option>
                    <?php } ?>
                </select>
              </div>
              
              <div class="col-md-10 mx-auto">
                <label for="continent_name" class="form-label">Continent Name</label>
                <input type="text" maxlength="100" autocomplete="off" class="form-control" name="continent" id="continent_name" value="" required>
              </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-primary" id="submitcontinent" type="button">Submit</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
      </form>
    </div>
  </div>
</div><!-- End Disabled Backdrop Modal-->

<script type="text/javascript">

  $(document).ready(function(){

    var module_url = '<?=base_url('/admin/Tourcategory')?>';

    // Open modal for new continent
    $(".new-continent").click(function (event) {
        event.preventDefault(); // Prevent default form submission
        // Reset form for a new record
        $('#addcontinent')[0].reset();
        $('#add-continent input[name="record_id"]').val('');
        $('#add-continent select[name="category"]').val('');
        $("#add-continent").modal('show');        
    });

    // Edit continent
    $(".edit-record").click(function (event) {
        event.preventDefault(); // Prevent default form submission

        let id = $(this).attr('record-data');
        let url = module_url+"/getContinent?id="+id;
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                var d = JSON.parse(data);
                if( d.error == 0 )
                {
                  $('#add-continent').modal('show');    
                  $('#add-continent input[name="record_id"]').val(d.record.id);
                  $('#add-continent select[name="category"]').val(d.record.category_id);
                  $('#add-continent input[name="continent"]').val(d.record.continent);
                }
                else
                {
                  $(".showalert").html('<div class="alert alert-danger">'+d.error_message+'</div>');
                }
            },
            error: function (data) {
                $(".showalert").html('<div class="alert alert-danger">Error Occurred</div>');
            }
        });
    });

    // Submit continent
    $("#submitcontinent").click(function (event) {
        event.preventDefault(); // Prevent default form submission
        
        let form = $("#addcontinent");
        let mbody = $("#addcontinent .modal-body");
        let url = form.attr('action');
        
        var category = $("#addcontinent select[name='category']").val();
        var continent = $("#addcontinent input[name='continent']").val().trim();
        
        // Validation
        if(category == "") {
            mbody.prepend("<div class='alert alert-danger mt-1 mb-2'>Please select a category</div>");
            return false;
        }
        
        if(continent == "") {
            mbody.prepend("<div class='alert alert-danger mt-1 mb-2'>Please enter a continent name</div>");
            $("#addcontinent input[name='continent']").focus();
            return false;
        }

        $(this).prop('disabled', true);
        $(this).html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Please wait..");
        
        mbody.find(".alert").each(function(){
            $(this).remove();
        });

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // Serialize form data
            success: function (data) {
                var d = JSON.parse(data);
                if( d.error == 1 )
                {
                    mbody.append("<div class='alert alert-danger mt-1 mb-0'>"+d.error_message+"</div>");
                    $("#submitcontinent").prop('disabled', false);
                    $("#submitcontinent").html("Submit");
                }
                else
                {
                    mbody.append("<div class='alert alert-success mt-1 mb-0'>"+d.success_message+"</div>");
                    $("#submitcontinent").html("Success");
                    setTimeout(function(){
                        window.location.reload();
                    }, 2000);
                }
            },
            error: function (data) {
                mbody.append("<div class='alert alert-danger mt-1 mb-0'>Error Occurred. Try again later.</div>");
                $("#submitcontinent").prop('disabled', false);
                $("#submitcontinent").html("Submit");
            }
        });
    });

    // Delete continent
    $(".delete-record").click(function (event) {
        event.preventDefault(); // Prevent default form submission

        var result = confirm("Are you sure to delete?");
        if (result==false) {
           return true;
        }     

        let id = $(this).attr('record-data');
        let url = module_url+"/deleteContinent/"+id;
            
        $.ajax({
            url: url,
            method: 'DELETE',
            contentType: 'application/json',
            success: function(data) {
                var d = JSON.parse(data);
                if( d.error == 1 )
                {
                    $(".showalert").append("<div class='alert alert-danger mt-1 mb-0'>"+d.error_message+"</div>");
                }
                else
                {
                    $(".showalert").append("<div class='alert alert-success mt-1 mb-0'>"+d.success_message+"</div>");
                    setTimeout(function(){
                        window.location.reload();
                    }, 500);
                }
            },
            error: function(request,msg,error) {
                console.log(error);
            }
        });
    });

  });

</script>
