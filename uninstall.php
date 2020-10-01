<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

global $wpdb;
$wpdb->query( "DELETE FROM `wp_todo_tb_name` WHERE 0" );