<?php

/**
 * Plugin Name: Plugin IT seo
 * Plugin URI: https://www.polaris-pulse.fr
 * Description: Mon premier plugin
 * Version 1.0
 * Author: Aurélie
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit;
}


// on veut récupérer le title et les métadonnées, dans un champs de formulaire affiché sur la page
// il faudra 1_Afficher sur la page
// back offiche 2_créer un formulaire
//              3_sauvegarder quand on clique sur publier et mettre à jour
//              4_remplacement des données 



//  2_créer un formulaire
add_action('add_meta_box', 'seo_add_form');

function seo_add_form()
{
    add_meta_box(
        'my-meta-box',
        __('My Meta Box'),
        'render_my-meta-box',
        'page',
        'normal',
        'default'
    );
}

function render_my_meta_box($post)
{
    $title = get_post_meta(
        $post->ID,
        'seo_title',
        true
    );
    $meta_description = get_post_meta(
        $post->ID,
        'seo_meta_description',
        true
    );
    echo '<label for="seo_title"> Titre de la page </label>
<input type="text" name="seo_title" placeholder="titre de la page" value="' . $title . '"> <br>
<label for="meta_description"> Meta description de la page</label>
<input type="text" name="seo_meta_description" placeholder="meta description" value="' . $meta_description . '">';
}


//3_sauvegarder quand on clique sur publier et mettre à jour
//4_remplacement des données 

add_action('save_post', 'seo_save_form');

function seo_save_form($post_id)
{
    if (isset($_POST['seo_title'])) {
        update_post_meta(
            $post_id,
            'seo_title',
            $_POST['seo_title'] // nouvelle donnée
        );
    }

    if (isset($_POST['seo_meta_description'])) {
        update_post_meta(
            $post_id,
            'seo_meta_description',
            $_POST['seo_meta_description'] // nouvelle donnée
        );
    }
}

// il faudra 1_Afficher sur la page

// changer le titre
add_filter('pre_get_document_title', 'seo_change_title');
function seo_change_title()
{
    $id = get_the_ID();

    $title = get_post_meta(
        $id,
        'seo_title',
        true
    );
    return $title;
}

// changer la meta_description
add_action('wp_head', 'seo_change_meta_description');

function seo_change_meta_description()
{
    $id = get_the_ID();
    $meta_description = get_post_meta(
        $id,
        'seo_meta_description',
        true
    );

    echo '<meta name="description" content="' . $meta_description . '">';
}
