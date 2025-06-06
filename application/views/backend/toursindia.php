<main id="main" class="main">

<section class="section dashboard">
    
    <div class="col-lg-12 p-0">
      <div class="row">
      <?php $category = $records[0]['category']; ?>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tours <a type="button" href="<?=base_url('admin/Tours/addtour/'.$category)?>" class="new-tour btn btn-sm btn-primary float-right">Add Tour <i class="bi bi-plus-circle ms-1"></i></a></h5>
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
                  <th scope="col">Tour Category</th>
                  <th scope="col">Title</th>
                  <th scope="col">Duration</th>
                  <th scope="col">Price</th>
                  <th scope="col">Start</th>
                  <th scope="col">Destination</th>
                  <th scope="col">Images</th>
                  <th scope="col">Added By</th>
                  <th scope="col">Added On</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($records as $index => $row) {

                  $img = explode(",", $row['images']);
                ?>
                <tr>
                  <th scope="row"><?= ($index+1) ?></th>
                  <td><?=$row['category']?></td>
                  <td>
                    <?=$row['tourcategory']?>
                  </td>
                  <td><?=$row['title']?></td>
                  <td><?=$row['duration_nights']?> Nights, <?=$row['duration_days']?> Days</td>
                  <td><?=$row['price']?></td>
                  <td><?=$row['start_location']?></td>
                  <td><?=$row['destination_location']?></td>
                  <td><img class="thumb_image img-fluid" src="<?=base_url('assets/images/tours/'.$img[0])?>"></td>
                  <td><?=$row['created_by']?></td>
                  <td><?=date("d-m-Y h:m A", strtotime($row['created_date']))?></td>
                  <td><div class="d-flex justify-content-center">
                    <?php if( isset($user['user_type']) && $user['user_type'] == 'Admin' ){?>
                    <a title="Edit Record" href="<?=base_url('admin/Tours/edittour/'.$row['id'])?>" class="fs-6 text-warning float-right mx-2"><i class="bi bi-pencil-fill"></i></a>
                    <a title="Delete Record" href="javascript:void(0)" record-data="<?=$row['id']?>" class="delete-inrecord fs-6 text-danger float-right mx-2"><i class="bi bi-trash-fill"></i></a>
                    <?php } else { ?>
                      <a title="Edit Record" href="javascript:void(0)" record-data="<?=$row['id']?>" class="fs-6 text-warning float-right mx-2"><i class="bi bi-pencil-fill"></i></a>
                    <?php } ?>
                  </div></td>
                </tr>
                 <?php } ?>
              </tbody>
            </table>  

          <?php } ?>

        </div>

      </div>
    </div><!-- End Left side columns -->

  </div>
</section>

</main><!-- End #main -->

<script>
  $(document).ready(function() {
    
    //delete manaufacturer
    $(".delete-inrecord").click(function (event) {
        event.preventDefault(); // Prevent default form submission

        var result = confirm("Are you sure to delete?");
		if (result==false) {
		   return true;
		} 		

		let id = $(this).attr('record-data');
        let url = "<?php echo base_url('admin/Tours')?>/deleteRecord/"+id;
        
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
