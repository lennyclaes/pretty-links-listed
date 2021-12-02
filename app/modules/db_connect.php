<?php

function pl_listed_get_data() {
    // global $wpdb;
    $first_link = $wpdb->get_var("SELECT url FROM wp_prli_links LIMIT 1");
    return $first_link;
}

function pl_listed_load() {
    global $wpdb;
    $rows = $wpdb->get_results("SELECT url, slug FROM wp_prli_links");
    return $rows;
}

?>