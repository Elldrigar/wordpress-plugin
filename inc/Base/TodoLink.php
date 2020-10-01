<?php

/**
 * @package todolist
 */
namespace Inc\Base;

class TodoLink
{
	public function register() 
	{
		add_filter( "plugin_action_links_" . PLUGIN_NAME, array( $this, 'todo_link' ) );
	}

	public function todo_link( $links ) 
	{
		$settings_link = '<a href="admin.php?page=todolist_plugin">Make a List</a>';
		array_push( $links, $settings_link );
		return $links;
	}
}
