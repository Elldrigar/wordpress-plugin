<?php
/**
 * @package  todolist
 */

namespace Inc;

final class Init
{
    public static function get_services() {
        return [
            Pages\Admin::class
        ];
    }

    public static function register_services() 
	{
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
    }
    
    private static function instantiate( $class )
	{
		$service = new $class();
		return $service;
	}
}



// use Inc\Activate;
// use Inc\Deactivate;

// if ( !class_exists( 'ToDoListPlugin' ) ) {

// 	class ToDoListPlugin
// 	{
//         public $nameplugin;

//         function __construct() {
//             $this->nameplugin = plugin_basename( __FILE__ );
//         }

// 		function register() {
//             add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
//             add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
//             add_filter( "plugin_action_links_$this->nameplugin", array( $this, 'make_list_link' ) );  
//         }

//         public function make_list_link( $links ) {
//             $link = '<a href="admin.php?page=todolist_plugin">make a list</a>';
//             array_push( $links, $link );
//             return $links;
//         }
        
//         public function add_admin_pages() {
//             add_menu_page( 'To Do List', 'To Do List', 'manage_options', 'todolist_plugin', array( $this, 'todo_index' ), 'dashicons-list-view', 110 );
//         }

//         public function todo_index() {
// 			require_once plugin_dir_path( __FILE__ ) . 'templates/todo_list.php';
// 		}

// 		protected function create_post_type() {
// 			add_action( 'init', array( $this, 'custom_post_type' ) );
// 		}

// 		function custom_post_type() {
// 			register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
// 		}

// 		function enqueue() {
// 			// enqueue all our scripts
// 			wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ) );
// 			wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
// 		}

// 		function activate() {
// 			// require_once plugin_dir_path( __FILE__ ) . 'inc/todolist-activator.php';
// 			Activate::activate();
// 		}
// 	}

// 	$todoPlugin = new ToDoListPlugin();
// 	$todoPlugin->register();

// 	// activation
// 	register_activation_hook( __FILE__, array( $todoPlugin, 'activate' ) );

// 	// deactivation
// 	// require_once plugin_dir_path( __FILE__ ) . 'inc/todolist-deactivator.php';
// 	register_deactivation_hook( __FILE__, array( 'Deactivate', 'deactivate' ) );

// }