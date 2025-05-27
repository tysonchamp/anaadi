  <main id="main" class="main">

    <section class="section dashboard">
        
        <div class="col-lg-12 p-0">
          <div class="row">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Popular Destination <button type="button" class="new-category btn btn-md btn-primary float-right">Add <i class="bi bi-plus-circle ms-1"></i></button></h5>
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
              
              <?php //print_r($package); ?>

              <?php if( count($records) > 0 ) { ?>
                <table class="table datatable table-hover table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Album</th>
                       <th scope="col">Package</th>
                      <th scope="col">Images</th>
                     
                      <th scope="col">Added By</th>
                      <th scope="col">Added On</th>
                      <?php if( isset($user['user_type']) && $user['user_type'] == 'Admin' ){?>
                      <th scope="col">Action</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($records as $index => $row) {
                      $images = explode(",", $row['images']);
                    ?>
                    <tr>
                      <th scope="row"><?= ($index+1) ?></th>
                      <td><?=$row['album']?></td>
                       <td><?=$row['title']?></td>
                      <td><img style="max-width: 150px;" class="img-fluid mx-auto p-1 border rounded" src="<?=base_url('assets/images/popular/'.$images[0])?>"></td>
                      <td><?=$row['created_by']?></td>
                      <td><?=date("d-m-Y h:m A", strtotime($row['created_date']))?></td>
                      <?php if( isset($user['user_type']) && $user['user_type'] == 'Admin' ){?>
                      <td><div class="d-flex justify-content-center">
                        <a title="Edit Record" href="javascript:void(0)" record-data="<?=$row['id']?>" class="edit-record fs-6 text-warning float-right mx-2"><i class="bi bi-pencil-fill"></i></a>
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

<div class="modal fade" id="add-category" tabindex="-1" data-bs-backdrop="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="addcategory" action="<?=base_url('admin/Populardestination/save_record')?>" method="POST" encypt="multipart/data">
          <input type="hidden" name="record_id" value="">
          <div class="modal-header">
            <h5 class="modal-title">Add Album</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12 mb-2">
                <div class="col-md-10 float-left mx-auto mb-2">
                  <label for="validationDefault01" class="form-label">Album</label>
                  <input type="text" class="form-control" name="album" id="validationDefault01" value="" required>
                </div>
                <div class="col-md-10 float-left mx-auto mb-2">
                  <label for="validationDefault01" class="form-label">Package</label>
                  <select class="form-select" id="package" name="package">
                                 <option value="0">-Select-</option>
                                <?php if (isset($package) && count($package) > 0) { 
foreach($package as $index => $row){
                                ?>
                                    <option data-price="<?= $row['price'] ?>" value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                                <?php }} ?>
                            </select>
                </div>
                <div class="col-md-10 float-left mx-auto">
                  <label for="validationDefault05" class="form-label">Images</label>
                  <div id="drag-drop-area" class="upload-area">
                      <p>Drag and drop files here</p>
                      <div id="file-previews"></div>
                  </div>                  
                  <span class="p-1 small text-danger">Size less than 2MB. Min Resolution 800x500.</span>
                </div>
              </div>
              <div class="col-md-12">
                <div id="imagepreview" style="height: 250px;" class="image_preview w-100 p-2 mb-2 float-left">
                    
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
              <button class="btn btn-primary" id="submitcategory" type="button">Submit</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">

  $(document).on('dragenter', function (e) 
  {
      e.stopPropagation();
      e.preventDefault();
  });
  $(document).on('dragover', function (e) 
  {
    e.stopPropagation();
    e.preventDefault();
  });
  $(document).on('drop', function (e) 
  {
      e.stopPropagation();
      e.preventDefault();
  });

  $(document).ready(function(){

    var droppped_files = [];

    const dragDropArea = document.getElementById('drag-drop-area');
    dragDropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dragDropArea.classList.add('drag-over');
    });
    dragDropArea.addEventListener('dragleave', () => {
        dragDropArea.classList.remove('drag-over');
    });
    dragDropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dragDropArea.classList.remove('drag-over');
        const files = e.dataTransfer.files;
        for( const file of files )
        {
          droppped_files.push(file);
        }
        var uniqueCountries = [];
        var new_files = []
        console.log(droppped_files);
        $.each(droppped_files, function(i, el){
            if($.inArray(el.name, uniqueCountries) === -1) {
              uniqueCountries.push(el.name);
              new_files.push(el);
            }
        });
        droppped_files = new_files;
        handleDroppedFiles();
    });

    function deleteObj(e)
    {
      var name = e.target.getAttribute('data-title');
      var new_files = []
      $.each(droppped_files, function(i, el)
      {
          if( el.name !== name) {
            new_files.push(el);
          }
      });
      droppped_files = new_files;
      e.target.remove();
      const filePreviews = document.getElementById('file-previews');
      filePreviews.innerHTML = droppped_files.length+" files";
    }

    function handleDroppedFiles() 
    {
        const imagepreviews = document.getElementById('imagepreview');
        const filePreviews = document.getElementById('file-previews');
        filePreviews.innerHTML = droppped_files.length+" files";
        imagepreviews.innerHTML = "";
        console.log(droppped_files);
        for (const file of droppped_files) 
        {
          var div_p = document.createElement('div');
          div_p.setAttribute('class','img_obj');
          div_p.setAttribute('data-title', file.name);
          div_p.addEventListener("click", deleteObj);
          var output = document.createElement('img');
          output.classList.add('uimage');
          output.src = URL.createObjectURL(file);
          output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
          }  
          div_p.appendChild(output);
          document.getElementById("imagepreview").appendChild(div_p);
        }
    }

    var module_url = '<?=base_url('/admin/popular')?>';

    //edit customer
    $(".new-category").click(function (event) {
        event.preventDefault(); // Prevent default form submission
        $("#add-category").modal('show');       
        droppped_files = []; 
        $("#add-category .modal-title").html('Add Album');
        $("#addcategory input[name='record_id']").val("");
        $("#addcategory input[name='album']").val("");
        document.getElementById('imagepreview').innerHTML = "";
        document.getElementById('file-previews').innerHTML = "";
    });

    //edit customer
    $(".edit-record").click(function (event) {
        event.preventDefault(); // Prevent default form submission
        $("#add-category").modal('show');   
        $("#add-category .modal-title").html('Edit Album');   

        droppped_files = []; 
        document.getElementById('imagepreview').innerHTML = "";
        document.getElementById('file-previews').innerHTML = "";

        let id = $(this).attr('record-data');
        let url = module_url+"/getRecord?id="+id;
            
        $.ajax({
          url: url,
          success: function(data) 
          {
            var d = JSON.parse(data);
            if( d.error == 1 )
            {
              alert(d.error_message);
              return false;
            }
            var record = d.record;
            $("#addcategory input[name='album']").val(record.album);
            $("#addcategory input[name='record_id']").val(record.id);
            const imagepreviews = document.getElementById('imagepreview');
            var images = record.images.split(",");
            async function loadimages() 
            {
              for(var i=0; i < images.length;i++)
              {
                var file = {};
                file.name = images[i];
                console.log("call="+file.name);
                await fetch("<?=base_url('assets/images/popular/')?>"+file.name)
                .then((res) => res.blob())
                .then((myBlob) => {
                   const myFile = new File([myBlob], file.name, {type: myBlob.type});
                   myFile.name = file.name;
                   console.log(file.name);
                   droppped_files.push(myFile);
                });              
                var div_p = document.createElement('div');
                div_p.setAttribute('class','img_obj');
                div_p.setAttribute('data-title', file.name);
                div_p.addEventListener("click", deleteObj);
                var output = document.createElement('img');
                output.classList.add('uimage');
                output.src = "<?=base_url('assets/images/popular/')?>"+file.name;
                div_p.appendChild(output);
                imagepreviews.appendChild(div_p);
              }
            }
            loadimages();
            const filePreviews = document.getElementById('file-previews');
            filePreviews.innerHTML = images.length+" files";
            
          },
          error: function(request,msg,error) {
              console.log(error);
          }
        });

    });

    // submit booking
    $("#submitcategory").click(function (event) {
        event.preventDefault(); // Prevent default form submission
        
        let mbody = $("#addcategory .modal-body");
        
        let form = $("#addcategory")[0];
        var formData = new FormData(form);

        for (const file of droppped_files) {
            formData.append('images[]', file);
        }
        
        let url = $("#addcategory").attr('action');

        var service_name = $("#addcategory input[name='album']").val().trim();
        if( service_name == "" )
        {
          $("#addcategory input[name='album']").focus();
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
            data: formData, 
            contentType: false,       
            cache: false,             
            processData:false, 
            success: function (data) {
                var d = JSON.parse(data);
                if( d.error == 1 )
                {
                    mbody.append("<div class='alert alert-danger mt-1 mb-0'>"+d.error_message+"</div>");
                    $("#submitcategory").prop('disabled', false);
                    $("#submitcategory").html("Submit");
                }
                else
                {
                    mbody.append("<div class='alert alert-success mt-1 mb-0'>"+d.success_message+"</div>");
                    $("#submitcategory").html("Success");
                    $("#add-category").modal('hide');   
                    setTimeout(function(){
                        window.location.reload();
                    }, 2000);
                }
            },
            error: function (data) {
                mbody.append("<div class='alert alert-danger mt-1 mb-0'>Error Occured. Try again later.</div>");
                $("#submitcategory").prop('disabled', false);
                $("#submitcategory").html("Submit");
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
  