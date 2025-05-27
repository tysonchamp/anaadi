<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$page_title?></title>
    <!-- Favicons -->
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
  <script src="<?php echo base_url();?>/assets/admin/assets/js/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="<?=base_url()?>assets/admin/assets/css/style.css" rel="stylesheet">
  <link href="<?=base_url()?>assets/admin/assets/css/custom.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?=base_url()?>" class="logo d-flex align-items-center">
        <img src="<?=base_url()?>assets/admin/assets/img/alogo.png" alt="">
        <span class="d-none d-lg-block">Anaadi Tours & Travels</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">

      <ul class="d-flex align-items-center me-2">   

        <li class="nav-item dropdown pe-4">
          <a class="nav-link nav-profile <?=($user['user_type']=="Admin")?"text-danger":"text-info"?> d-flex align-items-center pe-0" href="#">
            <i class="bi bi-circle-fill align-middle mt-1"></i>
            <span class="d-none d-md-block  fw-bold ps-1"><?=$user['user_type']?></span>
          </a>
        </li>

        <li class="nav-item dropdown pe-1">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-person align-middle mt-1"></i>
            <span class="d-none d-md-block dropdown-toggle ps-1"><?=$user['name']?></span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url('admin/Myprofile')?>">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
         
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?=base_url('admin/Logout')?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('admin/Dashboard')?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Tours</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url('admin/Tours/getIndia')?>">
              <i class="bi bi-list"></i><span>India</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('admin/Tours')?>">
              <i class="bi bi-list"></i><span>World</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('admin/Tourcategory/continents')?>">
              <i class="bi bi-list"></i><span>Tour Continents</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('admin/Tourcategory')?>">
              <i class="bi bi-list"></i><span>Tour Category</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('admin/Tourtypes')?>">
              <i class="bi bi-list"></i><span>Tour Types</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('admin/Services')?>">
              <i class="bi bi-list"></i><span>Services</span>
            </a>
          </li>
          <!-- <li>
            <a href="<?=base_url('admin/Customers')?>">
              <i class="bi bi-people"></i><span>Customers</span>
            </a>
          </li> -->
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-modules" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Modules</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-modules" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url('admin/Homeslider')?>">
              <i class="bi bi-list"></i><span>Homeslider</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('admin/Gallery')?>">
              <i class="bi bi-list"></i><span>Gallery</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('admin/Populardestination')?>">
              <i class="bi bi-list"></i><span>Popular Destination</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('admin/Videos')?>">
              <i class="bi bi-list"></i><span>Videos</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url('admin/Testimonial')?>">
              <i class="bi bi-list"></i><span>Testimonial</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Booking Information</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          
          <li>
            <a href="<?=base_url('admin/Booking')?>">
              <i class="bi bi-person-lines-fill"></i><span>Package Booked</span>
            </a>
          </li>
         
          
          <li>
            <a href="<?=base_url('admin/Booking/customize')?>">
              <i class="bi bi-person-lines-fill"></i><span>Customize Tour Requests</span>
            </a>
          </li>
         
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <!-- <li>
            <a href="<?=base_url('admin/Settings')?>">
              <i class="bi bi-gear-fill"></i><span>Settings</span>
            </a>
          </li> -->
          <?php if( isset($user['user_type']) && $user['user_type'] == 'Admin' ){?>
          <li>
            <a href="<?=base_url('admin/Users')?>">
              <i class="bi bi-people"></i><span>Users</span>
            </a>
          </li>
          <?php } ?>
          
          <li>
            <a href="<?=base_url('admin/Contact')?>">
              <i class="bi bi-person-lines-fill"></i><span>Contact</span>
            </a>
          </li>
          <!-- <li>
            <a href="<?=base_url('admin/Subscribers')?>">
              <i class="bi bi-person-lines-fill"></i><span>Subscribers</span>
            </a>
          </li> -->
        </ul>
      </li><!-- End Tables Nav -->
    </ul>

  </aside><!-- End Sidebar-->