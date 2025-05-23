-- Create payment orders table
CREATE TABLE `tbl_payment_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `receipt_id` varchar(255) DEFAULT NULL,
  `razorpay_order_id` varchar(255) DEFAULT NULL,
  `razorpay_payment_id` varchar(255) DEFAULT NULL,
  `razorpay_signature` text DEFAULT NULL,
  `status` enum('created','paid','failed') NOT NULL DEFAULT 'created',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_id` (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Add payment_status column to tbl_booknow
ALTER TABLE `tbl_booknow` 
ADD COLUMN `payment_status` enum('pending','paid','failed') NOT NULL DEFAULT 'pending',
ADD COLUMN `updated_at` datetime DEFAULT NULL;
