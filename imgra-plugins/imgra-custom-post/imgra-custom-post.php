<?php 
/*
Plugin Name:Imgra Custom Post.

/*

/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */

function imgra_custom_slider_post() {
    $labels = array(
        'name'                  => _x( 'Sliders', 'Post type general name', 'imgra' ),
        'singular_name'         => _x( 'Slider', 'Post type singular name', 'imgra' ),
        'menu_name'             => _x( 'Sliders', 'Admin Menu text', 'imgra' ),
        'name_admin_bar'        => _x( 'Slider', 'Add New on Toolbar', 'imgra' ),
        'add_new'               => __( 'Add New', 'imgra' ),
        'add_new_item'          => __( 'Add New Slider', 'imgra' ),
        'new_item'              => __( 'New Slider', 'imgra' ),
        'edit_item'             => __( 'Edit Slider', 'imgra' ),
        'view_item'             => __( 'View Slider', 'imgra' ),
        'all_items'             => __( 'All Sliders', 'imgra' ),
        'search_items'          => __( 'Search Sliders', 'imgra' ),
        'parent_item_colon'     => __( 'Parent Sliders:', 'imgra' ),
        'not_found'             => __( 'No sliders found.', 'imgra' ),
        'not_found_in_trash'    => __( 'No sliders found in Trash.', 'imgra' ),
        'featured_image'        => _x( 'Slider Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'imgra' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'imgra' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'imgra' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'imgra' ),
        'archives'              => _x( 'Slider archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'imgra' ),
        'insert_into_item'      => _x( 'Insert into slider', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'imgra' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this slider', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'imgra' ),
        'filter_items_list'     => _x( 'Filter sliders list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'imgra' ),
        'items_list_navigation' => _x( 'Sliders list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'imgra' ),
        'items_list'            => _x( 'Sliders list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'imgra' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'slider' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );
 
    register_post_type( 'slider', $args );
}

/**
 * Register a custom service post type called "Service".
 *
 * @see get_post_type_labels() for label keys.
 */


function imgra_custom_service_post() {
    $labels = array(
        'name'                  => _x( 'Services', 'Post type general name', 'imgra' ),
        'singular_name'         => _x( 'Service', 'Post type singular name', 'imgra' ),
        'menu_name'             => _x( 'Services', 'Admin Menu text', 'imgra' ),
        'name_admin_bar'        => _x( 'Service', 'Add New on Toolbar', 'imgra' ),
        'add_new'               => __( 'Add New', 'imgra' ),
        'add_new_item'          => __( 'Add New Service', 'imgra' ),
        'new_item'              => __( 'New Service', 'imgra' ),
        'edit_item'             => __( 'Edit Service', 'imgra' ),
        'view_item'             => __( 'View Service', 'imgra' ),
        'all_items'             => __( 'All Services', 'imgra' ),
        'search_items'          => __( 'Search Services', 'imgra' ),
        'parent_item_colon'     => __( 'Parent Services:', 'imgra' ),
        'not_found'             => __( 'No services found.', 'imgra' ),
        'not_found_in_trash'    => __( 'No services found in Trash.', 'imgra' ),
        'featured_image'        => _x( 'Service Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'imgra' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'imgra' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'imgra' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'imgra' ),
        'archives'              => _x( 'Service archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'imgra' ),
        'insert_into_item'      => _x( 'Insert into service', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'imgra' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this service', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'imgra' ),
        'filter_items_list'     => _x( 'Filter services list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'imgra' ),
        'items_list_navigation' => _x( 'Services list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'imgra' ),
        'items_list'            => _x( 'Services list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'imgra' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'service' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );
 
    register_post_type( 'service', $args );
}

// Register Custom Taxanomy
add_action( 'init', 'imgra_service_category', 0 );

// create two taxonomies, genres and Works for the post type "book"
function imgra_service_category() {

    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
        'name'                       => _x( 'Categories', 'taxonomy general name', 'imgra' ),
        'singular_name'              => _x( 'Category', 'taxonomy singular name', 'imgra' ),
        'search_items'               => __( 'Search Categories', 'imgra' ),
        'popular_items'              => __( 'Popular Categories', 'imgra' ),
        'all_items'                  => __( 'All Categories', 'imgra' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Category', 'imgra' ),
        'update_item'                => __( 'Update Category', 'imgra' ),
        'add_new_item'               => __( 'Add New Category', 'imgra' ),
        'new_item_name'              => __( 'New Category Name', 'imgra' ),
        'separate_items_with_commas' => __( 'Separate Categories with commas', 'imgra' ),
        'add_or_remove_items'        => __( 'Add or remove Categories', 'imgra' ),
        'choose_from_most_used'      => __( 'Choose from the most used Categories', 'imgra' ),
        'not_found'                  => __( 'No Categories found.', 'imgra' ),
        'menu_name'                  => __( 'Categories', 'imgra' ),
    );

    $args = array(
        'hierarchical'          => true,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'category' ),
    );

    register_taxonomy( 'service_category', 'service', $args );
}


/**
 * Register a custom Consultent post type called "Service".
 *
 * @see get_post_type_labels() for label keys.
 */


function imgra_custom_consultent_post() {
    $labels = array(
        'name'                  => _x( 'Consultents', 'Post type general name', 'imgra' ),
        'singular_name'         => _x( 'Consultent', 'Post type singular name', 'imgra' ),
        'menu_name'             => _x( 'Consultents', 'Admin Menu text', 'imgra' ),
        'name_admin_bar'        => _x( 'Consultent', 'Add New on Toolbar', 'imgra' ),
        'add_new'               => __( 'Add New', 'imgra' ),
        'add_new_item'          => __( 'Add New Consultent', 'imgra' ),
        'new_item'              => __( 'New Consultent', 'imgra' ),
        'edit_item'             => __( 'Edit Consultent', 'imgra' ),
        'view_item'             => __( 'View Consultent', 'imgra' ),
        'all_items'             => __( 'All Consultents', 'imgra' ),
        'search_items'          => __( 'Search Consultents', 'imgra' ),
        'parent_item_colon'     => __( 'Parent Consultents:', 'imgra' ),
        'not_found'             => __( 'No consultents found.', 'imgra' ),
        'not_found_in_trash'    => __( 'No consultents found in Trash.', 'imgra' ),
        'featured_image'        => _x( 'Service Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'imgra' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'imgra' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'imgra' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'imgra' ),
        'archives'              => _x( 'Service archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'imgra' ),
        'insert_into_item'      => _x( 'Insert into service', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'imgra' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this service', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'imgra' ),
        'filter_items_list'     => _x( 'Filter consultents list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'imgra' ),
        'items_list_navigation' => _x( 'Consultents list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'imgra' ),
        'items_list'            => _x( 'Consultents list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'imgra' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'consultent' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
    );
 
    register_post_type( 'consultent', $args );
}
 
add_action( 'init', 'imgra_custom_slider_post' );
add_action( 'init', 'imgra_custom_service_post' );
add_action( 'init', 'imgra_custom_consultent_post' );



