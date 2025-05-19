<div class="breadcumb-wrapper" data-bg-src="<?=base_url()?>assets/img/bg/subscribe_bg_1.png">
    <div class="container">
        <div class="breadcumb-content">
            <h3 class="breadcumb-title">Book your Tour</h3>
        </div>
    </div>
</div>
<div class="about-area position-relative overflow-hidden overflow-hidden space" id="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 p-2 px-2">
                <div class="mt-0 title-area mb-10">
                    <h4 class="sec-title pe-xl-5 me-xl-5 heading">Book your Tour</h4>
                </div>
            </div>  
        </div>
        <div class="row">
            <div class="col-xl-8">
                <form action="<?=base_url('Booktour/booknow')?>" method="POST" class="book-form style2">
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
                    <div class="row">
                        <div id="error_div" class="col-12">
                        </div>
                        <div class="col-12 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Name</label>
                            <input type="text" class="form-control" name="name" id="name3" placeholder="">
                        </div>
                        <div class="col-6 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Email</label>
                            <input type="email" class="form-control" name="email" id="email3" placeholder="">
                        </div>
                        <div class="col-6 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Phone</label>
                            <input type="number" class="form-control" name="phone" id="phone" placeholder="">
                        </div>
                        <div class="col-12 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="">
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Category</label>
                            <select class="form-select" name="category">
                                <option <?=(isset($tour) && count($tour) > 0)?"":"selected"?> value="0">-Select-</option>
                                <option <?=(isset($tour) && count($tour) > 0 && $tour['category_id']==1)?"selected":""?> value="1">Domestic Tours</option>
                                <option <?=(isset($tour) && count($tour) > 0 && $tour['category_id']==2)?"selected":""?> value="2">International Tours</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-2">
                            <label class="p-1 mb-1 fs-16">Tour Category</label>
                            <select class="form-select" name="tourcategory">
                                <option value="0">-Select-</option>
                                <?php if(isset($tourcategory)){ foreach($tourcategory as $item){?>
                                <option <?=(isset($tour) && count($tour) > 0 && $tour['tourcategory_id']==$item['id'])?"selected":""?> value="<?=$item['id']?>"><?=$item['sub_category']?></option>
                                <?php } } ?>
                            </select>
                        </div>
                        <div class="form-group col-12 mb-2">
                            <label class="p-1 mb-1 fs-16">Tour</label>
                            <select class="form-select border-warning" name="tour">
                                <?php if(isset($tour) && count($tour) > 0){ ?>
                                <option data-price="<?=$tour['price']?>"  value="<?=$tour['id']?>"><?=$tour['title']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-6 form-group mb-2">
                            <label class="p-1 mb-1 fs-16">No. of Adults</label>
                            <input type="number" class="form-control" name="adults" id="adults" placeholder="1">
                        </div>
                        <div class="col-6 form-group mb-4">
                            <label class="p-1 mb-1 fs-16">No. of Children</label>
                            <input type="number" class="form-control" name="children" id="children" placeholder="0">
                        </div>
                        <div class="col-6 form-group mb-2">
                            <label class="text-danger p-2 font-bold">Amount</label>
                            <span style="display:<?=(isset($tour) && count($tour) > 0 ) ? "inline;":"none"?>;font-size: 20px;font-weight:600;border: 1px solid lightgrey;" class="tour_amount mb-0 p-2 text-dark shadow-sm" id="amount" placeholder="0">
                                <?=(isset($tour) && count($tour) > 0 ) ? "<i class='fa fa-indian-rupee'></i>".$tour['price']." / Per Person":""?>
                            </span>
                        </div>
                        <div class="form-btn col-12 mt-24"><button id="booktour" type="button" class="th-btn">Book Now</button></div>
                    </div>
                    <p class="form-messages mb-0 mt-3"></p>
                </form>
            </div>
        </div>
        <div class="shape-mockup movingX d-none d-xxl-block" data-top="0%" data-left="-18%"><img src="<?=base_url()?>assets/img/shape/shape_2_1.png" alt="shape"></div>
        <div class="shape-mockup jump d-none d-xxl-block" data-top="28%" data-right="-15%"><img src="<?=base_url()?>assets/img/shape/shape_2_2.png" alt="shape"></div>
        <div class="shape-mockup spin d-none d-xxl-block" data-bottom="18%" data-left="-112%"><img src="<?=base_url()?>assets/img/shape/shape_2_3.png" alt="shape"></div>
        <div class="shape-mockup movixgX d-none d-xxl-block" data-bottom="18%" data-right="-12%"><img src="<?=base_url()?>assets/img/shape/shape_2_4.png" alt="shape"></div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function(){

        $(".book-form select[name='category']").change(function(){
            $("#booktour").html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Please wait..");
            var params = {};
            params.category_id = $(this).val();
            var url = "<?=base_url('Tour/getTourCategory')?>";
            if( $(this).val() == 0 )
            {
              $(".book-form select[name='tourcategory']").empty();
              return false;
            }
            $.ajax({
                type: "POST",
                url: url,
                data: params,
                dataType:'JSON', 
                success: function (data) {
                    console.log(data);
                    if( data.error == 1 )
                    {
                        $("#error_div").append("<div class='alert alert-danger mb-1 py-1 px-2 small'>"+data.error_message+"</div>");
                        $("#booktour").prop('disabled', false);
                        $("#booktour").html("Submit");
                    }
                    else
                    {
                        $("#booktour").html("Submit");
                        var records = data.record;
                        $(".book-form select[name='tourcategory']").empty();
                        $(".book-form select[name='tourcategory']").append("<option value='0'>-Select-</option>");
                        for(var i=0; i< records.length;i++)
                        {
                          $(".book-form select[name='tourcategory']").append("<option value='"+records[i].id+"'>"+records[i].sub_category+"</option>");
                        }
                    }
                },
                error: function (data) {
                    $("#error_div").append("<div class='alert alert-danger mb-1 py-1 px-2 small'>Error Occured. Try again later.</div>");
                    $("#booktour").prop('disabled', false);
                    $("#booktour").html("Submit");
                }
            });

            setTimeout(function(){
                $("#error_div").html("");
            }, 2000);
            return true;
        });

        $(".book-form select[name='tourcategory']").change(function(){
            $("#booktour").html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span> Please wait..");
            var params = {};
            params.category_id = $(".book-form select[name='category']").val();
            params.tourcategory_id = $(this).val();
            var url = "<?=base_url('Tour/getTours')?>";
            if( $(this).val() == 0 )
            {
              $(".book-form select[name='tourcategory']").empty();
              return false;
            }
            $.ajax({
                type: "POST",
                url: url,
                data: params,
                dataType:'JSON', 
                success: function (data) {
                    console.log(data);
                    if( data.error == 1 )
                    {
                        $("#error_div").append("<div class='alert alert-danger mb-1 py-1 px-2 small'>"+data.error_message+"</div>");
                        $("#booktour").prop('disabled', false);
                        $("#booktour").html("Submit");
                    }
                    else
                    {
                        $("#booktour").html("Submit");
                        var records = data.record;
                        $(".book-form select[name='tour']").empty();
                        $(".book-form select[name='tour']").append("<option value='0'>-Select-</option>");
                        for(var i=0; i< records.length;i++)
                        {
                          $(".book-form select[name='tour']").append("<option data-price='"+records[i].price+"' value='"+records[i].id+"'>"+records[i].title+"</option>");
                        }
                    }
                },
                error: function (data) {
                    $("#error_div").append("<div class='alert alert-danger mb-1 py-1 px-2 small'>Error Occured. Try again later.</div>");
                    $("#booktour").prop('disabled', false);
                    $("#booktour").html("Submit");
                }
            });

            setTimeout(function(){
                $("#error_div").html("");
            }, 2000);
            return true;
        });

        $(".book-form select[name='tour']").change(function()
        {
            $(".book-form .tour_amount").css('display', 'inline');
            function toCurrencyString(price)
            {
                price = parseInt(price);
                return price.toFixed(2).replace(/(\d)(?=(\d{3})+\b)/g, '$1,');
            }

            var price = $(this).find('option:selected').attr('data-price');
            $("#amount").html("<i class='fa fa-indian-rupee'></i>"+toCurrencyString(price)+" / Per Person");
        });

    });

</script>