<?php
/**
 * @package todolist
 */

 namespace Inc\Base;

 class Database {
     public function register() {
        global $wpdb;
        
        $DBP_tb_name=$wpdb->prefix ."todo_tb_name";

        $DBP_query="CREATE TABLE $DBP_tb_name(
            id int(10) NOT NULL AUTO_INCREMENT,
            title varchar (100) NOT NULL DEFAULT '',
            checked tinyint(1) NOT NULL DEFAULT 0,
            PRIMARY KEY (id)
            )";
            require_once(ABSPATH . "wp-admin/includes/upgrade.php");
            dbDelta($DBP_query);
     }
 }
