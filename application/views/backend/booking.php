<main id="main" class="main">

<section class="section dashboard">
    
    <div class="col-lg-12 p-0">
      <div class="row">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Booked Details</h5>
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
                  <th scope="col">Customer Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Address</th>
                  <th scope="col">Country</th>
                  <th scope="col">Departure city</th>
                  <th scope="col">Arrival city</th>
                  <th scope="col">How Many days/Night</th>
                  <th scope="col">Departure Date</th>
                  <th scope="col">Return Date</th>
                  <th scope="col">No Of Passengers</th>
                  <th scope="col">Hotel</th>
                  <th scope="col">Transfers</th>
                  <th scope="col">Meals</th>
                  <th scope="col">Price</th>
                  <?php if( isset($user['user_type']) && $user['user_type'] == 'Admin' ){?>
                  <th scope="col">Action</th>  
                  <?php } ?>  
                </tr>
              </thead>
              <tbody>
                <?php foreach($records as $index => $row) {?>
                <tr>
                  <th scope="row"><?= ($index+1) ?></th>
                  <td><?=$row['name']?></td>
                  <td><?=$row['email']?></td>
                  <td><?=$row['phone']?></td>
                  <td><?=$row['address']?></td>
                  <td><?=$row['country']?></td>
                  <td><?=$row['category']?></td>
                  <td><?=$row['tour_category']?></td>
                  <td><?=$row['howmany_days']?></td>
                  <td><?=$row['departure_date']?></td>
                  <td><?=$row['return_date']?></td>
                  <td><?=$row['no_passenger']?></td>
                  <td><?=$row['country']?></td>
                  <td><?=$row['tour_package']?></td>
                  <td><?=$row['hotel']?></td>
                  <td><?=$row['typeof_tranfers']?></td>
                  <td><?=$row['meals']?></td>
                  <td><?=$row['price']?></td>
               
                  <?php if( isset($user['user_type']) && $user['user_type'] == 'Admin' ){?>
                  <td><div class="d-flex justify-content-center">
                    <a title="Delete Record" href="javascript:void(0)" record-data="<?=$row['id']?>" class="delete-record fs-6 text-danger float-right mx-2"><i class="bi bi-trash-fill"></i></a>
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

</main><!-- End #main -->
<script type="text/javascript">

var loadFile = function(event) 
{
var output = document.getElementById("imagepreview");
output.src = URL.createObjectURL(event.target.files[0]);
output.onload = function() {
  URL.revokeObjectURL(output.src) // free memory
}      
};

$(document).ready(function(){

var module_url = '<?=base_url('/admin/Booking')?>';

//delete manaufacturer
$(".delete-record").click(function (event) {
    event.preventDefault(); // Prevent default form submission

    var result = confirm("Are you sure to delete?");
    if (result==false) {
       return true;
    }     

    let id = $(this).attr('record-data');
        let url = module_url+"/deleteRecord/"+id;
        
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