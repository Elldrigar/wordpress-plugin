<?php

/**
 * @package todolist
 */
/*

Plugin Name: To Do List
Plugin URI: http://gawron.me/plugin
Description: To Do list is a part of the recruitment process for a my dream job ❤️
Version: 0.1.0
Author: Artur Gawron
Author URI: https://gawron.me
License: GPLv2 or later
Text Domain: todolist-plugin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2020 Artur Gawron.
*/

defined('ABSPATH') or die('Hey! No direct access!');

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

use Inc\Activate;

if ( !class_exists( 'ToDoListPlugin' ) ) {

	class ToDoListPlugin
	{
        public $nameplugin;

        function __construct() {
            $this->nameplugin = plugin_basename( __FILE__ );
        }

		function register() {
            add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
            add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
            add_filter( "plugin_action_links_$this->nameplugin", array( $this, 'make_list_link' ) );  
        }

        public function make_list_link( $links ) {
            $link = '<a href="admin.php?page=todolist_plugin">make a list</a>';
            array_push( $links, $link );
            return $links;
        }
        
        public function add_admin_pages() {
            add_menu_page( 'To Do List', 'To Do List', 'manage_options', 'todolist_plugin', array( $this, 'todo_index' ), 'dashicons-list-view', 110 );
        }

        public function todo_index() {
			require_once plugin_dir_path( __FILE__ ) . 'templates/todo_list.php';
		}

		protected function create_post_type() {
			add_action( 'init', array( $this, 'custom_post_type' ) );
		}

		function custom_post_type() {
			register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
		}

		function enqueue() {
			// enqueue all our scripts
			wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ) );
			wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
		}

		function activate() {
			// require_once plugin_dir_path( __FILE__ ) . 'inc/todolist-activator.php';
			Activate::activate();
		}
	}

	$todoPlugin = new ToDoListPlugin();
	$todoPlugin->register();

	// activation
	register_activation_hook( __FILE__, array( $todoPlugin, 'activate' ) );

	// deactivation
	require_once plugin_dir_path( __FILE__ ) . 'inc/todolist-deactivator.php';
	register_deactivation_hook( __FILE__, array( 'To_do_list_deactivator', 'deactivate' ) );

}
