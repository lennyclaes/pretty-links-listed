<?php

/**
 * Plugin name: Pretty Links Listed
 * Description: A plugin to list the URLs created by Pretty Links to Authors
 * Author: Lenny Claes
 * Version: 1.0.2
 */

add_action('admin_menu', 'pl_listed_setup_menu');

function pl_listed_setup_menu()
{
    add_menu_page('Pretty Links List', 'Pretty Links Listed', 'read_pl', 'pl_listed', 'pl_listed_init');
    // $role = get_role('Author');
    // $role->add_cap('read_pl', true);
}

add_action('admin_init', 'load_scripts');

function pl_listed_add_capabilities() {
    $role = get_role('author');
    $role->add_cap('read_pl', true);
    $role = get_role('administrator');
    $role->add_cap('read_pl', true);
}

add_action('init', 'pl_listed_add_capabilities', 11);

function load_scripts() {
    wp_register_style('main', plugins_url('app/css/main.css', __FILE__));
    wp_enqueue_style('main');
    wp_register_script('app', plugins_url('app/js/app.js', __FILE__));
    wp_enqueue_script('app');
}

function pl_listed_init() {
    require __DIR__.'/app/modules/create_page.php';
}