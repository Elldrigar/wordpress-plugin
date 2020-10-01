<?php

/**
 * @package  todolist
 */

class To_do_list_activator
{
	public static function activate()
	{
		flush_rewrite_rules();
	}
}
