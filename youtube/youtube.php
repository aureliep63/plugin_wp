<?php

/**
 * Plugin Name: Plugin IT Youtube
 * Plugin URI: https://www.polaris-pulse.fr
 * Description: Mon premier plugin
 * Version 1.0
 * Author: Aurélie
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit;
}


// je veux ajouter une action dans init avec le nom youtube_init_shortcode
add_action('init', 'youtube_init_shortcode');

// fonction
function youtube_init_shortcode()
{
    add_shortcode('video', 'youtube_do_shortcode');
}



// [video source="iJd1tbcLR8U"]
function youtube_do_shortcode($attrs)
{

    $output = '';
    // on vérifie bien que source existe et n'est pas vide (soit: [video])
    if (!isset($attrs['source']) or empty($attrs['source'])) {
        // on dit qu'il faut retourner une vidéo
        return 'Veuillez spécifier une vidéo';
    }

    //  si hauteur est vide et n'est pas null
    if (!isset($attrs['hauteur']) or empty($attrs['hauteur'])) {
    } else {
        // on attribut la valeur dans le shortcode
        $hg = $attrs['hauteur'];
    }
    //  si largeur est vide et n'est pas null
    if (!isset($attrs['largeur']) or empty($attrs['largeur'])) {
    } else {
        // on attribut la valeur dans le shortcode
        $wd = $attrs['largeur'];
    }

    $youtube_url = "https://www.youtube.com/embed/";
    $daily_url = "https://www.dailymotion.com/video/";
    if (!isset($attrs['plateforme']) or empty($attrs['plateforme']) or $attrs['plateforme'] == 'youtube') {
        $url = $youtube_url . $attrs['source'];
    } else if ($attrs['plateforme'] == 'dailymotion') {
        $url = $daily_url . $attrs['source'];
    } else {
        return $output;
    }



    if (!isset($attrs['controles']) or empty($attrs['controles'])) {
        $controls = "?controls=0";
    } else {
        $controls = "";
    }

    // on prend l'url et on concatène à l'url la chaine de caractères
    // dans le shortcode, on aura source=' attrs'
    $output .= '<iframe src="' . $url . $controls . '" width="' . $wd . '" height="' . $hg . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    return $output;
}
