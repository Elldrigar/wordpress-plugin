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

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN_NAME', plugin_basename( __FILE__ ) );

use Inc\Base\Activate;
use Inc\Base\Deactivate;

function activate_todo_plugin() {
	Activate::activate();
}

function deactivate_todo_plugin() {
	Deactivate::deactivate();
}

register_activation_hook( __FILE__, 'activate_todo_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_todo_plugin' );


if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}