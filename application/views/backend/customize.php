<main id="main" class="main">

<section class="section dashboard">
    
    <div class="col-lg-12 p-0">
      <div class="row">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Customize Tour Requests</h5>
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
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Place</th>
                  <th scope="col">Travel Date</th>
                  <th scope="col">Tour Type</th>
                  <th scope="col">Adults</th>
                  <th scope="col">Children</th>
                  <th scope="col">Days</th>
                  <th scope="col">Nights</th>
                  <th scope="col">Budget</th>
                  <th scope="col">Other Details</th>
                  <th scope="col">Date Created</th>
                  <?php if( isset($user['user_type']) && $user['user_type'] == 'Admin' ){?>
                  <th scope="col">Action</th>  
                  <?php } ?>  
                </tr>
              </thead>
              <tbody>
                <?php foreach($records as $index => $row) {?>
                <tr>
                  <th scope="row"><?=$row['id']?></th>
                  <td><?=$row['name']?></td>
                  <td><?=$row['email']?></td>
                  <td><?=$row['phone']?></td>
                  <td><?=$row['place']?></td>
                  <td><?=$row['travel_date']?></td>
                  <td><?=$row['typeof_tour']?></td>
                  <td><?=$row['adults']?></td>
                  <td><?=$row['children']?></td>
                  <td><?=$row['howmany_days']?></td>
                  <td><?=$row['howmany_night']?></td>
                  <td><?=$row['budget']?></td>
                  <td><?=isset($row['any_other']) ? substr($row['any_other'], 0, 50).(strlen($row['any_other']) > 50 ? '...' : '') : ''?></td>
                  <td><?=$row['created_at']?></td>
               
                  <?php if( isset($user['user_type']) && $user['user_type'] == 'Admin' ){?>
                  <td><div class="d-flex justify-content-center">
                    <a title="Delete Record" href="javascript:void(0)" record-data="<?=$row['id']?>" class="delete-record fs-6 text-danger float-right mx-2"><i class="bi bi-trash-fill"></i></a>
                    <a title="View Details" href="javascript:void(0)" record-data="<?=$row['id']?>" class="view-details fs-6 text-primary float-right"><i class="bi bi-eye-fill"></i></a>
                  </div></td>
                  <?php } ?>
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

<!-- Modal for View Details -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailsModalLabel">Tour Request Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalContent">
        <!-- Content will be loaded dynamically -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</main><!-- End #main -->
<script type="text/javascript">

$(document).ready(function(){

var module_url = '<?=base_url('/admin/Booking')?>';

// Delete record
$(".delete-record").click(function (event) {
    event.preventDefault(); // Prevent default form submission

    var result = confirm("Are you sure to delete?");
    if (result==false) {
       return true;
    }     

    let id = $(this).attr('record-data');
    let url = module_url+"/deleteCustomize/"+id;
        
    $.ajax({
        url: url,
        method: 'DELETE',
        contentType: 'application/json',
        success: function(data) {
            var d = JSON.parse(data);
            if(d.error == 1) {
              $(".showalert").append("<div class='alert alert-danger mt-1 mb-0'>"+d.error_message+"</div>");
            } else {
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

// View record details
$(".view-details").click(function(event) {
    event.preventDefault();
    let id = $(this).attr('record-data');
    let url = module_url+"/viewCustomize/"+id;
    
    $.ajax({
        url: url,
        method: 'GET',
        contentType: 'application/json',
        success: function(data) {
            $("#modalContent").html(data);
            $("#detailsModal").modal('show');
        },
        error: function(request,msg,error) {
            console.log(error);
        }
    });
});

});

</script>
