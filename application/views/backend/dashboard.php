<main id="main" class="main">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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

        <!-- Dashboard Cards -->
        <div class="row mt-3">
          <div class="col-md-3 mb-3">
            <div class="card bg-light text-dark border-primary">
              <div class="card-body text-center">
                <i class="bi bi-geo-alt-fill fs-1 text-primary mb-2"></i>
                <h5 class="card-title fw-bold">Tour Packages (India)</h5>
                <p class="card-text fs-3 mb-0"><?php echo $total_tours_india; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-light text-dark border-info">
              <div class="card-body text-center">
                <i class="bi bi-globe2 fs-1 text-info mb-2"></i>
                <h5 class="card-title fw-bold">Tour Packages (World)</h5>
                <p class="card-text fs-3 mb-0"><?php echo $total_tours_world; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-light text-dark border-success">
              <div class="card-body text-center">
                <i class="bi bi-cash-stack fs-1 text-success mb-2"></i>
                <h5 class="card-title fw-bold">Bookings (Paid)</h5>
                <p class="card-text fs-3 mb-0"><?php echo $total_bookings_paid; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-light text-dark border-warning">
              <div class="card-body text-center">
                <i class="bi bi-cash fs-1 text-warning mb-2"></i>
                <h5 class="card-title fw-bold">Bookings (Unpaid)</h5>
                <p class="card-text fs-3 mb-0"><?php echo $total_bookings_unpaid; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-light text-dark border-secondary">
              <div class="card-body text-center">
                <i class="bi bi-pencil-square fs-1 text-secondary mb-2"></i>
                <h5 class="card-title fw-bold">Customize Tour Requests</h5>
                <p class="card-text fs-3 mb-0"><?php echo $total_customize_requests; ?></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-light text-dark border-dark">
              <div class="card-body text-center">
                <i class="bi bi-envelope-fill fs-1 text-dark mb-2"></i>
                <h5 class="card-title fw-bold">Contact Enquiries</h5>
                <p class="card-text fs-3 mb-0"><?php echo $total_contact_enquiries; ?></p>
              </div>
            </div>
          </div>
        </div>

        <!-- Charts -->
        <div class="row mt-4">
          <div class="col-md-6 mb-4">
            <div class="card">
              <div class="card-header">Bookings (Last 6 Months)</div>
              <div class="card-body">
                <canvas id="bookingChart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card">
              <div class="card-header">Customize Tour Requests (Last 6 Months)</div>
              <div class="card-body">
                <canvas id="customizeChart"></canvas>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Booking Chart
    const bookingData = <?php echo json_encode($booking_chart); ?>;
    const bookingLabels = bookingData.map(item => item.month);
    const bookingCounts = bookingData.map(item => item.count);

    const ctxBooking = document.getElementById('bookingChart').getContext('2d');
    new Chart(ctxBooking, {
      type: 'bar',
      data: {
        labels: bookingLabels,
        datasets: [{
          label: 'Bookings',
          data: bookingCounts,
          backgroundColor: 'rgba(54, 162, 235, 0.7)'
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } }
      }
    });

    // Customize Chart
    const customizeData = <?php echo json_encode($customize_chart); ?>;
    const customizeLabels = customizeData.map(item => item.month);
    const customizeCounts = customizeData.map(item => item.count);

    const ctxCustomize = document.getElementById('customizeChart').getContext('2d');
    new Chart(ctxCustomize, {
      type: 'bar',
      data: {
        labels: customizeLabels,
        datasets: [{
          label: 'Customize Requests',
          data: customizeCounts,
          backgroundColor: 'rgba(255, 99, 132, 0.7)'
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } }
      }
    });
  </script>

