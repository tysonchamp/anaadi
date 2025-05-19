  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">

        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Subscribers</h5>
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
                      <th scope="col">Email</th>
                      <th scope="col">Added On</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($records as $index => $row) {?>
                    <tr>
                      <th scope="row"><?=$row['id']?></th>
                      <td><?=$row['email']?></td>
                      <td><?=date("d-m-Y h:m A", strtotime($row['created_date']))?></td>
                      <td>
                        <?php if( isset($user['user_type']) && $user['user_type'] == 'Admin' ){?>
                        <div class="d-flex justify-content-center">
                          <a title="Delete Record" href="javascript:void(0)" record-data="<?=$row['id']?>" class="delete-record text-danger float-right mx-2"><i class="bi bi-trash-fill"></i></a>
                        </div>
                        <?php } else { ?>
                        <span class="d-inline fs-6 p-2">N/A</span>
                        <?php } ?>
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

  </main><!-- End #main -->
   <script type="text/javascript">

    $(document).ready(function(){

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