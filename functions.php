<?php
/** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
*
* Add a menu location
*/
register_nav_menu('main', 'The Main menu' );


/** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
*
* Add theme support for automatic title tags and featured images
*/
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('post-formats');


/** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
*
* add a custom image resize upon upload
*/
add_image_size('grid_thumbnail', 300, 300, true);
add_image_size('post_thumbnail', 300, 300, true);
add_image_size('single_large', 660, 400, true);



/** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
*
* add a custom post type for cars
*/
$post_args = array(
        'public'              => true, // bool (default is FALSE)
        'menu_position'       => 5, // int (defaults to 25 - below comments)
        'menu_icon'           => 'dashicons-format-aside', // string (defaults to use the post icon)
        'hierarchical'        => false, // bool (defaults to FALSE)
        'has_archive'         => 'project', // bool|string (defaults to FALSE)
        'capability_type'     => 'post', // string|array (defaults to 'post')
        'map_meta_cap'        => true, // bool (defaults to FALSE)
        'rewrite' => TRUE,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
        ),
        'taxonomies'            => array( 'project_type', ' project_skills' ),
        'label'                 => 'Project'
    );

register_post_type( 'project', $post_args );


/** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
*
* add custom taxonomies for the cars: brand and features
*/
 $project_type_args = array(
   'label'                     => 'Project type',
   'hierarchical'               => true,
   'public'                     => true,
   'show_ui'                    => true,
   'show_admin_column'          => true,
   'show_in_nav_menus'          => true,
 );
 register_taxonomy( 'project_type', 'project', $project_type_args );
 // register_taxonomy( taxonomy_name, available_for_which_post_type, Settings )
 $project_skill_args = array(
   'label'                     => 'Project skills',
   'hierarchical'               => true,
   'public'                     => true,
   'show_ui'                    => true,
   'show_admin_column'          => true,
   'show_in_nav_menus'          => true,
 );
 register_taxonomy( 'project_skills', 'project', $project_skill_args );
 // register_taxonomy( taxonomy_name, available_for_which_post_type, Settings )


 /** - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
 *
 * add a widget area to Dashboard - Appearance - Widgets
 */
 $widget_args = array(
   'id'            => 'page-sidebar',
   'name'          => 'page-sidebar',
 );
  $another_widget_args = array(
   'id'            => 'project-sidebar',
   'name'          => 'project-sidebar',
 );
 register_sidebar( $widget_args );
 register_sidebar( $another_widget_args );
?>
