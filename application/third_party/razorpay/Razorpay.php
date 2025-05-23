<?php
// This file serves as a bridge to the Razorpay SDK installed via Composer
// or manually placed in this directory

// Check if using Composer autoload
if (file_exists(FCPATH . 'vendor/autoload.php')) {
    // If using Composer, it's already autoloaded in CodeIgniter's index.php
    // or you need to require the autoloader here
    if (!class_exists('Razorpay\Api\Api')) {
        require_once FCPATH . 'vendor/autoload.php';
    }
} else {
    // Manual installation directory structure
    // Check if Razorpay is manually installed in this directory
    $razorpay_dir = __DIR__;
    
    if (file_exists($razorpay_dir . '/src/Api.php')) {
        // If manual release is unpacked here
        require_once $razorpay_dir . '/src/Api.php';
        // Load all required Razorpay files
        foreach (glob($razorpay_dir . '/src/*.php') as $filename) {
            require_once $filename;
        }
        // Also load subdirectories
        foreach (glob($razorpay_dir . '/src/*', GLOB_ONLYDIR) as $dir) {
            foreach (glob($dir . '/*.php') as $filename) {
                require_once $filename;
            }
        }
    } else {
        // Show a helpful error message
        trigger_error('Razorpay SDK not found. Please install via Composer or manually copy the SDK files.', E_USER_ERROR);
    }
}
