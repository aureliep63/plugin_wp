<?php

/**
 * Plugin Name: Shortcode Gras
 * Description:  Mettre en gras une partie de phrase entouré par 2 shorcodes
 * Version: 1.0
 * Author: Me
 */


if (!defined('ABSPATH')) {
    exit;
}



// [b]sqskjfcnsdjknfd[/b]
add_shortcode('b', 'bold_text_shortcode');
function bold_text_shortcode($atts, $content = null)
{

    return '<strong>' . $content . '</strong>';
}
