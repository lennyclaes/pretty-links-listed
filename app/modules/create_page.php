<?php
require __DIR__.'/db_connect.php';

function get_protocol() {
    $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === 0 ? 'https://' : 'http://';
    return $protocol;
}

function get_icons() {
    return '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z"/></svg>';
}

function pr_listed_redirects_to($slug) {
    return get_protocol().$_SERVER["HTTP_HOST"]."/".$slug;
}
?>

<div class="wrap">
    <div class="wp-test">
        <div class='pl_listed_row'>
            <div class='pl_listed_cell'>
                Pretty Links URL
            </div>
            <div class='pl_listed_cell'>
                Redirects to
            </div>
        </div>
        <div>
            <?php
            $rows = pl_listed_load();
            foreach ($rows as $row) {
                $redirect_link = pr_listed_redirects_to($row->slug);
                $launch_icon = get_icons();
                $url = $row->url;
                echo "<div class='pl_listed_row'>
                    <div class='pl_listed_cell'>
                        <div class='pl_listed_url'>{$redirect_link}</div>
                        <div class='pl_listed_actions'>
                            <a class='pl_listed_actions-link' href='{$redirect_link}' target='_blank' rel='noopener'>{$launch_icon}</a>
                        </div>
                    </div>
                    <div class='pl_listed_cell'>
                        <div class='pl_listed_url'>{$url}</div>
                        <div class='pl_listed_actions'>
                            <a class='pl_listed_actions-link' href='{$url}' target='_blank' rel='noopener'>{$launch_icon}</a>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>
</div>