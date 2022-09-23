<?php

/**
 * The post type functionality of the plugin.
 *
 * @link       https://avrotech.net
 * @since      1.0.0
 *
 * @package    Avro_Plugin
 * @subpackage Avro_Plugin/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 *
 * @package    Avro_Plugin
 * @subpackage Avro_Plugin/public
 * @author     t.i.rony <touhid_rony@yahoo.com>
 */
class Avro_Plugin_Post_types {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

  public function init()
  {
    $this-> register_cpt_book();
    $this-> register_book_genre();
  }
  public function register_cpt_book(){
    $labels = array(
      'name'                  => _x( 'Books', 'Post type general name', 'textdomain' ),
      'singular_name'         => _x( 'Book', 'Post type singular name', 'textdomain' ),
      'menu_name'             => _x( 'Books', 'Admin Menu text', 'textdomain' ),
      'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'textdomain' ),
      'add_new'               => __( 'Add New', 'textdomain' ),
      'add_new_item'          => __( 'Add New Book', 'textdomain' ),
      'new_item'              => __( 'New Book', 'textdomain' ),
      'edit_item'             => __( 'Edit Book', 'textdomain' ),
      'view_item'             => __( 'View Book', 'textdomain' ),
      'all_items'             => __( 'All Books', 'textdomain' ),
      'search_items'          => __( 'Search Books', 'textdomain' ),
      'parent_item_colon'     => __( 'Parent Books:', 'textdomain' ),
      'not_found'             => __( 'No books found.', 'textdomain' ),
      'not_found_in_trash'    => __( 'No books found in Trash.', 'textdomain' ),
      'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
      'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
      'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
      'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
      'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
      'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
      'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
      'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
      'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
      'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );

    $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'book' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'menu_icon' =>'dashicons-book',
      'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );

    register_post_type( 'book', $args );
  }

  public function register_book_genre(){
    $labels = array(
      'name'              => _x( 'Genres', 'taxonomy general name', 'textdomain' ),
      'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'textdomain' ),
      'search_items'      => __( 'Search Genres', 'textdomain' ),
      'all_items'         => __( 'All Genres', 'textdomain' ),
      'parent_item'       => __( 'Parent Genre', 'textdomain' ),
      'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ),
      'edit_item'         => __( 'Edit Genre', 'textdomain' ),
      'update_item'       => __( 'Update Genre', 'textdomain' ),
      'add_new_item'      => __( 'Add New Genre', 'textdomain' ),
      'new_item_name'     => __( 'New Genre Name', 'textdomain' ),
      'menu_name'         => __( 'Genre', 'textdomain' ),
    );

    $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'genre' ),
    );

    register_taxonomy( 'genre', array( 'book' ), $args );
}


}
