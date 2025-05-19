<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login - Anaadi Tours & Travels</title>
  <link rel="icon" type="image/x-icon" href="<?=base_url()?>assets/img/favicons/favicon.ico">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url()?>assets/admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url()?>assets/admin/assets/css/style.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/admin/assets/css/custom.css" rel="stylesheet">
</head>

<body style="background-image: url('<?=base_url()?>assets/admin/assets/img/bgadmin.png');background-repeat: no-repeat;background-size: cover;">

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-0">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center bg-white border rounded-3">
                <div class="d-block p-2">
                    <img class="img-fluid w-25 float-left" src="<?=base_url()?>assets/admin/assets/img/alogo.png" alt="">
                    <span class="bold text-theme d-block h2 w-75 font-bold float-left px-2">Anaadi</span>
                    <span class="bold text-theme d-block float-left font-bold h3 w-75 px-2">Tours & Travels</span>
                </div>
              <div class="card mb-3 shadow-none">
                <div class="card-body mh-100">
                  <div class="pt-1 pb-1">
                    <h5 class="card-title text-dark text-center pb-0">Adminstrator Login</h5>
                  </div>
                  <?php
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                        ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>                    
                        </div>
                    <?php }
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                        ?>
                        <div class="alert alert-success">
                            <?php echo $success; ?>                    
                        </div>
                    <?php } ?>
                  <form class="row g-3 needs-validation" action="<?=base_url('admin/login/loginMe')?>" method="POST">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?=base_url()?>assets/admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?=base_url()?>assets/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>assets/admin/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?=base_url()?>assets/admin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?=base_url()?>assets/admin/assets/vendor/quill/quill.js"></script>
  <script src="<?=base_url()?>assets/admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?=base_url()?>assets/admin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?=base_url()?>assets/admin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url()?>assets/admin/assets/js/main.js"></script>

</body>

</html>