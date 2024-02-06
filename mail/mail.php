<?php

/*
Plugin Name: Plugin mail
Description: Exercice pages ajout 
Version: 1.0
Author: Romain Aurélie Sabrina Emeline
*/

if (!defined('ABSPATH')) {
    exit;
}


// hook woo-commerce (non WP)
add_action('woocommerce_created_customer', 'admin_email_on_registration');
function admin_email_on_registration($customer_id)
{
    wp_mail($admin_email, $subject, $message);
}
