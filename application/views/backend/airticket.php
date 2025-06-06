<main id="main" class="main">
    <section class="section dashboard">
        <div class="col-lg-12 p-0">
          <div class="row">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Air Ticket <button type="button" class="new-airticket btn btn-md btn-primary float-right">Add <i class="bi bi-plus-circle ms-1"></i></button></h5>
                <div class="col-lg-12 showalert">
                <?php if( count($records) == 0 ){?>
                  <div class="alert alert-danger">No records found.</div>
                <?php } ?>
                <?php $error = $this->session->flashdata('error');
                      if($error) { ?>
                  <div class="alert alert-danger">
                  </div>
                  <?php } ?>
              </div>

              <?php if( count($records) > 0 ) { ?>
                <table class="table datatable table-hover table-sm">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; foreach($records as $row) { ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= htmlspecialchars($row['title']); ?></td>
                      <td>
                        <button class="btn btn-sm btn-info edit-record" record-data="<?= $row['id']; ?>" title="Edit"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-sm btn-danger delete-record" record-data="<?= $row['id']; ?>" title="Delete"><i class="bi bi-trash"></i></button>
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

<div class="modal fade" id="add-airticket" tabindex="-1" data-bs-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="addairticket" action="<?=base_url('admin/Airticket/save_record')?>" method="POST">
          <input type="hidden" name="record_id" value="">
          <div class="modal-header">
            <h5 class="modal-title">Add Air Ticket</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="col-md-10 mx-auto">
                <label for="title" class="form-label">Air Ticket Title</label>
                <input type="text" maxlength="255" autocomplete="off" class="form-control" name="title" id="title" value="" required>
              </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-primary" id="submitairticket" type="button">Submit</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    var module_url = '<?=base_url('/admin/Airticket')?>';

    $(".new-airticket").click(function (event) {
        event.preventDefault();
        $('#addairticket')[0].reset();
        $('#add-airticket input[name="record_id"]').val('');
        $("#add-airticket").modal('show');
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
                  $('#add-airticket').modal('show');
                  $('#add-airticket input[name="record_id"]').val(d.record.id);
                  $('#add-airticket input[name="title"]').val(d.record.title);
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

    $("#submitairticket").click(function (event) {
        event.preventDefault();
        let form = $("#addairticket");
        let mbody = $("#addairticket .modal-body");
        let url = form.attr('action');
        var title = $("#addairticket input[name='title']").val().trim();

        if(title == "") {
            mbody.prepend("<div class='alert alert-danger mt-1 mb-2'>Please enter air ticket title</div>");
            $("#addairticket input[name='title']").focus();
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
                    $("#submitairticket").prop('disabled', false);
                    $("#submitairticket").html("Submit");
                }
                else
                {
                    mbody.append("<div class='alert alert-success mt-1 mb-0'>"+d.success_message+"</div>");
                    $("#submitairticket").html("Success");
                    setTimeout(function(){
                        window.location.reload();
                    }, 2000);
                }
            },
            error: function (data) {
                mbody.append("<div class='alert alert-danger mt-1 mb-0'>Error Occurred. Try again later.</div>");
                $("#submitairticket").prop('disabled', false);
                $("#submitairticket").html("Submit");
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
