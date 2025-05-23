<?php
// This file should only be accessed via CLI for testing your installation
// Example usage: php test.php

// Check if being run from command line
if (php_sapi_name() !== 'cli') {
    die("This script can only be run from command line");
}

echo "Testing Razorpay Installation\n";
echo "-----------------------------\n\n";

// Define the BASEPATH constant required by CodeIgniter
if (!defined('BASEPATH')) {
    define('BASEPATH', dirname(dirname(dirname(__FILE__))));
    define('FCPATH', dirname(dirname(dirname(dirname(__FILE__)))) . '/');
}

// Try to load the Razorpay SDK
try {
    require_once __DIR__ . '/Razorpay.php';
    
    // Try to instantiate the Razorpay API class
    // Use dummy values for testing
    $api = new Razorpay\Api\Api('rzp_test_dummy_key_id', 'rzp_test_dummy_key_secret');
    
    echo "✅ Razorpay SDK loaded successfully!\n\n";
    echo "Class loaded: " . get_class($api) . "\n";
    echo "SDK Version: " . Razorpay\Api\Api::VERSION . "\n\n";
    echo "Your installation is working correctly.\n";
    echo "Now make sure to update your API keys in your config file.\n";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "Please check your installation.\n";
    
    // Check common issues
    if (!file_exists(FCPATH . 'vendor/autoload.php')) {
        echo "\nComposer autoload file not found. Have you run 'composer require razorpay/razorpay:2.*'?\n";
    }
    
    if (!file_exists(__DIR__ . '/src/Api.php')) {
        echo "\nRazorpay SDK files not found in the expected location.\n";
        echo "Please either use Composer or manually download the SDK.\n";
    }
}
