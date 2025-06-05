<main id="main" class="main">
    <section class="section dashboard">
        <div class="col-lg-12 p-0">
          <div class="row">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Inclusions <button type="button" class="new-inclusion btn btn-md btn-primary float-right">Add <i class="bi bi-plus-circle ms-1"></i></button></h5>
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
                      <th scope="col">Inclusion Name</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($records as $index => $row) {?>
                    <tr>
                      <th scope="row"><?= ($index+1) ?></th>
                      <td><?=htmlspecialchars($row['name'])?></td>
                      <td>
                        <div class="d-flex justify-content-center">
                        <?php if( isset($user['user_type']) && $user['user_type'] == 'Admin' ){?>
                        <a title="Edit Record" href="javascript:void(0)" record-data="<?=$row['id']?>" class="edit-record fs-6 text-warning float-right mx-2"><i class="bi bi-pencil-fill"></i></a>
                        <a title="Delete Record" href="javascript:void(0)" record-data="<?=$row['id']?>" class="delete-record fs-6 text-danger float-right mx-2"><i class="bi bi-trash-fill"></i></a>
                        <?php } else { ?>
                          <a title="Edit Record" href="javascript:void(0)" record-data="<?=$row['id']?>" class="edit-record fs-6 text-warning float-right mx-2"><i class="bi bi-pencil-fill"></i></a>
                        <?php } ?>
                        </div>
                      </td>
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
</main>

<div class="modal fade" id="add-inclusion" tabindex="-1" data-bs-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="addinclusion" action="<?=base_url('admin/Inclusion/save_record')?>" method="POST">
          <input type="hidden" name="record_id" value="">
          <div class="modal-header">
            <h5 class="modal-title">Add Inclusion</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="col-md-10 mx-auto">
                <label for="name" class="form-label">Inclusion Name</label>
                <input type="text" maxlength="255" autocomplete="off" class="form-control" name="name" id="name" value="" required>
              </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-primary" id="submitinclusion" type="button">Submit</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    var module_url = '<?=base_url('/admin/Inclusion')?>';

    $(".new-inclusion").click(function (event) {
        event.preventDefault();
        $('#addinclusion')[0].reset();
        $('#add-inclusion input[name="record_id"]').val('');
        $("#add-inclusion").modal('show');
    });

    $(".edit-record").click(function (event) {
        event.preventDefault();
        let id = $(this).attr('record-data');
        let url = module_url+"/getRecord?id="+id;
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                var d = JSON.parse(data);
                if( d.error == 0 )
                {
                  $('#add-inclusion').modal('show');
                  $('#add-inclusion input[name="record_id"]').val(d.record.id);
                  $('#add-inclusion input[name="name"]').val(d.record.name);
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

    $("#submitinclusion").click(function (event) {
        event.preventDefault();
        let form = $("#addinclusion");
        let mbody = $("#addinclusion .modal-body");
        let url = form.attr('action');
        var name = $("#addinclusion input[name='name']").val().trim();

        if(name == "") {
            mbody.prepend("<div class='alert alert-danger mt-1 mb-2'>Please enter inclusion name</div>");
            $("#addinclusion input[name='name']").focus();
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
            data: form.serialize(),
            success: function (data) {
                var d = JSON.parse(data);
                if( d.error == 1 )
                {
                    mbody.append("<div class='alert alert-danger mt-1 mb-0'>"+d.error_message+"</div>");
                    $("#submitinclusion").prop('disabled', false);
                    $("#submitinclusion").html("Submit");
                }
                else
                {
                    mbody.append("<div class='alert alert-success mt-1 mb-0'>"+d.success_message+"</div>");
                    $("#submitinclusion").html("Success");
                    setTimeout(function(){
                        window.location.reload();
                    }, 2000);
                }
            },
            error: function (data) {
                mbody.append("<div class='alert alert-danger mt-1 mb-0'>Error Occurred. Try again later.</div>");
                $("#submitinclusion").prop('disabled', false);
                $("#submitinclusion").html("Submit");
            }
        });
    });

    $(".delete-record").click(function (event) {
        event.preventDefault();
        var result = confirm("Are you sure to delete?");
        if (result==false) {
           return true;
        }
        let id = $(this).attr('record-data');
        let url = module_url+"/deleteRecord";
        $.ajax({
            url: url,
            method: 'POST',
            data: {id: id},
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
