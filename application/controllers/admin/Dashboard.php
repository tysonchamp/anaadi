<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 */
class Dashboard extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tours_model');
        $this->load->model('Booking_model');
        $this->load->model('Customizeform_model');
        $this->load->model('Contact_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE){
            redirect('admin');
        }else{
            $data['user'] = $this->session->userdata();
            $data['page_title'] = "Dashboard";

            // Total tour packages
            $data['total_tours_india'] = count($this->Tours_model->getIndia());
            $data['total_tours_world'] = count($this->Tours_model->getWorld());

            // Total bookings
            $all_bookings = $this->Booking_model->getAll();
            $data['total_bookings'] = count($all_bookings);
            $data['total_bookings_paid'] = 0;
            $data['total_bookings_unpaid'] = 0;
            foreach($all_bookings as $b) {
                if(isset($b['payment_status']) && strtolower($b['payment_status']) == 'paid') {
                    $data['total_bookings_paid']++;
                } else {
                    $data['total_bookings_unpaid']++;
                }
            }

            // Customized tour requests
            $data['total_customize_requests'] = count($this->Customizeform_model->getAll());

            // Contact enquiry form submits
            $data['total_contact_enquiries'] = count($this->Contact_model->getAll());

            // Chart data: Bookings per month (last 6 months)
            $data['booking_chart'] = $this->getMonthlyCounts('tbl_booknow', 'created_at', 6);
            // Chart data: Customize requests per month (last 6 months)
            $data['customize_chart'] = $this->getMonthlyCounts('tbl_customize', 'created_at', 6);

            $this->load->view('layout_admin/header', $data);
            $this->load->view('backend/dashboard', $data);
            $this->load->view('layout_admin/footer');
        }
    }

    // Helper to get monthly counts for charts
    private function getMonthlyCounts($table, $date_field, $months = 6) {
        $result = array();
        $this->db->select("DATE_FORMAT($date_field, '%Y-%m') as month, COUNT(*) as count");
        $this->db->from($table);
        $this->db->where("$date_field >=", date('Y-m-01', strtotime("-" . ($months-1) . " months")));
        $this->db->group_by("month");
        $this->db->order_by("month", "ASC");
        $query = $this->db->get();
        $months_arr = [];
        $counts_arr = [];
        $period = new DatePeriod(
            new DateTime(date('Y-m-01', strtotime("-" . ($months-1) . " months"))),
            new DateInterval('P1M'),
            new DateTime(date('Y-m-01', strtotime("+1 month")))
        );
        foreach ($period as $dt) {
            $months_arr[$dt->format("Y-m")] = 0;
        }
        foreach ($query->result_array() as $row) {
            $months_arr[$row['month']] = (int)$row['count'];
        }
        foreach ($months_arr as $m => $c) {
            $counts_arr[] = ['month' => $m, 'count' => $c];
        }
        return $counts_arr;
    }
}

?>