<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Payment_model
 * Payment model class to handle payment transactions
 */
class Payment_model extends CI_Model
{
    function createOrder($amount, $booking_id, $receipt_id = '')
    {
        $info = array(
            'booking_id' => $booking_id,
            'amount' => $amount,
            'receipt_id' => $receipt_id,
            'status' => 'created',
            'created_at' => date('Y-m-d H:i:s')
        );
        
        $this->db->insert('tbl_payment_orders', $info);
        return $this->db->insert_id();
    }
    
    function updatePayment($razorpay_payment_id, $razorpay_order_id, $razorpay_signature, $status, $booking_id)
    {
        $info = array(
            'razorpay_payment_id' => $razorpay_payment_id,
            'razorpay_order_id' => $razorpay_order_id,
            'razorpay_signature' => $razorpay_signature,
            'status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        );
        
        $this->db->where('booking_id', $booking_id);
        $this->db->update('tbl_payment_orders', $info);
        return true;
    }
    
    function getOrderByBookingId($booking_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_payment_orders');
        $this->db->where('booking_id', $booking_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array();
        }
    }
    
    function updateBookingPaymentStatus($booking_id, $status)
    {
        $info = array(
            'payment_status' => $status,
            'updated_at' => date('Y-m-d H:i:s')
        );
        
        $this->db->where('id', $booking_id);
        $this->db->update('tbl_booknow', $info);
        return true;
    }
}
?>
