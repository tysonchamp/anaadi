  <main id="main" class="main">

    <section class="section dashboard">
      <div class="row">
        <div class="d-inline showalert">
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
        
        <div class="col-lg-12 p-0">
          <div class="row">
            <h4>Dashboard</h4>
          </div>
        </div><!-- End Left side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  