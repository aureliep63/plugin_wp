<?php

/**
 * Plugin Name: Plugin IT Chouquette
 * Plugin URI: https://www.polaris-pulse.fr
 * Description: Mon premier plugin
 * Version 1.0
 * Author: Aurélie
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit;
}

add_filter('document_title_parts', 'chouquette');

function chouquette($title)
{
    $title[] = "| Chouquette ";
    return  $title;
}
