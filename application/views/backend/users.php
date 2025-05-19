  <main id="main" class="main">
    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Users <button type="button" id="add_user" class="btn btn-sm btn-primary float-right">Add <i class="bi bi-plus-circle ms-1"></i></button></h5>
                <div class="d-inline showalert">
                  <?php if( count($records) == 0 ) { ?>
                  <div class="alert alert-danger m-2">No Records found.</div>
                  <?php } else { 

                   $error = $this->session->flashdata('error');
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
                <table class="table datatable table-hover table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Username</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Type</th>
                      <th scope="col">Added On</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($records as $index => $row) {?>
                    <tr>
                      <th scope="row"><?=$row['userId']?></th>
                      <td><?=$row['username']?></td>
                      <td><?=$row['name']?></td>
                      <td><?=$row['email']?></td>
                      <td><?=$row['phone']?></td>
                      <td><?=$row['user_type']?></td>
                      <td><?=date("d-m-Y h:m A", strtotime($row['created_date']))?></td>
                      <td><div class="d-flex justify-content-center">
                        <a title="Edit Record" href="javascript:void(0)" record-data="<?=$row['userId']?>" class="edit-user-record text-warning float-right mx-2"><i class="bi bi-pencil-fill"></i></a>
                        <a title="Delete Record" href="javascript:void(0)" record-data="<?=$row['userId']?>" class="delete-record text-danger float-right mx-2"><i class="bi bi-trash-fill"></i></a>
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

  <div class="modal fade" id="add-user" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="adduser" action="<?=base_url('admin/Users/save_record')?>" method="POST">
            <input type="hidden" name="record_id" value="">
            <div class="modal-header">
              <h5 class="modal-title">Add User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="validationDefault01" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" id="validationDefault01" value="" required>
                    </div>
                    <div class="col-md-6">
                      <label for="validationDefault02" class="form-label">Email</label>
                      <input type="text" class="form-control" name="email" id="validationDefault02" value="" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 mt-4">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="validationDefault03" class="form-label">Phone</label>
                      <input type="number" maxlength="10" class="form-control" name="phone" id="validationDefault03" value="" required>
                    </div>
                    <div class="col-md-6">
                      <label for="validationDefault07" class="form-label">User Type</label>
                      <select name="user_type" class="form-select">
                        <option value="" selected>-Select-</option>
                        <option value="Admin">Admin</option>
                        <option value="Staff">Staff</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-12 mt-4">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="validationDefault04" class="form-label">Username</label>
                      <input type="text" class="form-control" autocomplete="off" name="username" id="validationDefault04" value="" required>
                    </div>
                    <div class="col-md-6">
                      <label for="validationDefault05" class="form-label">Password</label>
                      <input type="password" class="form-control" autocomplete="off" name="current_password" id="validationDefault05" value="" required>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="submituser" type="button">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
      </div>
    </div>
  </div><!-- End Disabled Backdrop Modal-->

  <script type="text/javascript">

    $(document).ready(function(){

      $("#add_user").click(function(){
          $("#add-user").modal('show');
          $("#add-user .modal-title").html('Add User');
          $("#submituser").html('Submit');
          $('#add-user input[name="current_password"]').parent().show();
          $('#add-user input[name="current_password"]').show();
          $("#add-user").find("input[type=text], select").val("");
      });

      //edit user
    $(".edit-user-record").click(function (event) {
        event.preventDefault(); // Prevent default form submission

        let id = $(this).attr('record-data');
        let url = window.location.href+"/getRecord?id="+id;
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                var d = JSON.parse(data);
                $('#add-user').modal('show');
                $("#add-user .modal-title").html('Edit User');
                $("#submituser").html('Update');    
                $('#add-user input[name="record_id"]').val(d.userId);
                $('#add-user select[name="user_type"]').val(d.user_type);
                $('#add-user input[name="name"]').val(d.name);
                $('#add-user input[name="email"]').val(d.email);

                $('#add-user input[name="phone"]').val(d.phone);
                $('#add-user input[name="username"]').val(d.username);
                $('#add-user input[name="current_password"]').hide();
                $('#add-user input[name="current_password"]').parent().hide();
            },
            error: function (data) {
                console.log("Error occured");
            }
        });
    });

      //add user
      $("#submituser").click(function (event) {
          event.preventDefault(); // Prevent default form submission

          $(this).prop('disabled', true);
          $(this).html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Please wait..");

          let form = $("#adduser");
          let mbody = $("#adduser .modal-body");
          let url = form.attr('action');

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
                      $("#submituser").prop('disabled', false);
                      $("#submituser").html("Submit");
                  }
                  else
                  {
                      mbody.append("<div class='alert alert-success mt-1 mb-0'>"+d.success_message+"</div>");
                      $("#submituser").html("Success");
                      setTimeout(function(){
                          window.location.reload();
                      }, 2000);
                  }
              },
              error: function (data) {
                  mbody.append("<div class='alert alert-danger mt-1 mb-0'>Error Occured. Try again later.</div>");
                  $("#submituser").prop('disabled', false);
                  $("#submituser").html("Submit");
              }
          });
      });

      //delete manaufacturer
      $(".delete-record").click(function (event) {
          event.preventDefault(); // Prevent default form submission

          var result = confirm("Are you sure to delete?");
          if (result==false) {
             return true;
          }     

          let id = $(this).attr('record-data');
              let url = window.location.href+"/deleteRecord/"+id;
              
              $.ajax({
              url: url,
              method: 'DELETE',
              contentType: 'application/json',
              success: function(data) {
                  var d = JSON.parse(data);
                      //console.log(d);
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