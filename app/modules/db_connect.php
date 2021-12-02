<?php

function pl_listed_load_data() {
    global $wpdb;
    $rows = $wpdb->get_results("SELECT url, slug FROM wp_prli_links");
    return $rows;
}

?>