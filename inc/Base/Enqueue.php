<?php
/**
 * @package todolist
 */

 namespace Inc\Base;

 class Enqueue {
     public function register() {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
     }

     function enqueue() {
        wp_enqueue_style( 'mypluginstyle', PLUGIN_URL . 'assets/mystyle.css' );
        wp_enqueue_style( 'mypluginstyleawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" );
        wp_enqueue_script( 'mypluginscript', PLUGIN_URL . 'assets/myscript.js' );
    }
 }