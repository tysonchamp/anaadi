# Razorpay Integration for Anaadi Tours

## Installation Instructions

### 1. Install Razorpay via Composer

Run the following command in your project root:

```bash
composer require razorpay/razorpay:2.*
```

### 2. If you don't have Composer installed:

#### A. Install Composer
Download and install from https://getcomposer.org/download/

#### B. Manual Installation
If you can't use Composer, download the latest release from:
https://github.com/razorpay/razorpay-php/releases

Extract the files to `/var/www/html/anaadi/application/third_party/razorpay/`

### 3. Verify Installation

After installation, ensure the following files exist:
- `/var/www/html/anaadi/application/third_party/razorpay/Razorpay.php`
- Razorpay API classes in subdirectories

## Configuration

1. Update your config file with your Razorpay API keys:
   - Edit `/var/www/html/anaadi/application/config/config.php`
   - Add your Razorpay keys at the bottom:
   ```php
   $config['razorpay_key_id'] = 'YOUR_KEY_ID';
   $config['razorpay_key_secret'] = 'YOUR_KEY_SECRET';
   ```

2. Create the required database tables:
   - Run the SQL script at `/var/www/html/anaadi/application/sql/razorpay_tables.sql`

## Usage

The integration is already set up in:
- `/var/www/html/anaadi/application/controllers/Booktour.php`
- `/var/www/html/anaadi/application/views/front/gateway.php`

## Getting Razorpay API Keys

1. Sign up or Log in to your Razorpay Dashboard: https://dashboard.razorpay.com/
2. Go to Settings > API Keys
3. Generate Test/Live Keys as needed
4. Use these keys in your config file
