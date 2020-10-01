<?php
/**
 * @package todolist
 */ 

namespace Inc\Pages;

class Admin {

    public function register() {
        add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
    }

    public function add_admin_pages() {
        add_menu_page( 'To Do List', 'To Do List', 'manage_options', 'todolist_plugin', array( $this, 'todo_index' ), 'dashicons-list-view', 110 );
    }
        
    public function todo_index() {
        require_once PLUGIN_PATH . 'templates/todo_list.php';
    }
}