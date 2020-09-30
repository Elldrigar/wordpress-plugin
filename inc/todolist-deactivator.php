<?php
/**
 * @package todolist
 */

 class To_do_list_deactivator
 {
     public static function deactivate() {
         flush_rewrite_rules();
     }
 }