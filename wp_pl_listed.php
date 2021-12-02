<?php

/**
 * Plugin name: Pretty Links Listed
 * Description: A plugin to list the URLs created by Pretty Links to Authors
 * Author: Lenny Claes
 * Version: 1.0.0
 */

add_action('admin_menu', 'pl_listed_setup_menu');

function pl_listed_setup_menu()
{
    add_menu_page('Pretty Links List', 'Pretty Links Listed', 'manage_options', 'pl_listed', 'pl_listed_init');
}

add_action('admin_init', 'load_scripts');

function load_scripts() {
    wp_register_style('main', plugins_url('app/css/main.css', __FILE__));
    wp_enqueue_style('main');
    wp_register_script('app', plugins_url('app/js/app.js', __FILE__));
    wp_enqueue_script('app');
}

function pl_listed_init() {
    require __DIR__.'/app/modules/create_page.php';
}