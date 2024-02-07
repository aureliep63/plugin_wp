<?php

/**
 * Plugin Name: acf title
 * Description:  Rajouter un champs title automatiquement sur acf
 * Version: 1.0
 * Author: Me
 */


if (!defined('ABSPATH')) {
    exit;
}


add_action('acf/init', 'my_acf_init');

function my_acf_init()
{
    if (function_exists('acf_add_local_field_group')) :

        acf_add_local_field_group(array(
            'key' => 'group_1',
            'title' => 'Titre',
            'fields' => array(
                array(
                    'key' => 'field_1',
                    'label' => 'Ecris un titre',
                    'name' => 'sub_title',
                    'type' => 'text',
                )
            ),
            // acf permet de choisir où sera mis les champs (d'où location)
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'page',
                    ),
                ),
            ),
        ));

    endif;
}
