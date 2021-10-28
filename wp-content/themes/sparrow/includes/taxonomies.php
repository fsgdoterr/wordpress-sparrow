<?php

add_action('init', function() {

    register_taxonomy( 'project_skill', ['portfolio_projects'], array( 
        'labels'                 => array( 
            'name'               => __('Project skills'),
            'singular_name'      => __('Project skill'),
            'search_items'       => __('Search by skills'),
            'all_items'          => __('All Skills'),
            'view_item'          => __('View Skill'),
            'edit_item'          => __('Edit skill'),
            'update_item'        => __('Update skill'),
            'add_new_item'       => __('Add new skill'),
            'new_item_name'      => __('Add new skill name'),
            'menu_name'          => __('Project Skills'),
         ),  
         'public'                => true,
         'show_in_menu'          => true,
         'show_ui'               => true, 
         'show_in_rest'          => true,                  
     ) );
    register_taxonomy( 'project_category', ['portfolio_projects'], array( 
        'labels'                 => array( 
            'name'               => __('Project categories'),
            'singular_name'      => __('Project category'),
            'search_items'       => __('Search by categories'),
            'all_items'          => __('All categories'),
            'view_item'          => __('View category'),
            'edit_item'          => __('Edit category'),
            'update_item'        => __('Update category'),
            'add_new_item'       => __('Add new category'),
            'new_item_name'      => __('Add new category name'),
            'menu_name'          => __('Project categories'),
         ),  
         'hierarchical'          => true,
         'public'                => true,
         'show_in_menu'          => true,
         'show_ui'               => true, 
         'show_in_rest'          => true,                  
     ) );

    register_post_type( 'portfolio_projects', array( 
        'label'  => null,
        'labels' => array( 
            'name'               => __('Portfolio projects'),
            'singular_name'      => __('Portfolio project'),
            'add_new'            => __('Add new project to portfolio'),
            'add_new_item'       => __('Add title project'),
            'edit_item'          => __('Edit project'),
            'new_item'           => __('Add project description'),
            'view_item'          => __('Look a project'),
            'search_items'       => __('Search projects'),
            'not_found'          => __('Not found project'),
            'not_found_in_trash' => __('Not found project in busket'),
            'parent_item_colon'  => '', 
            'menu_name'          => __('Portfolio'), 
         ),
         'description'           => '',
         'public'                => true,
         'show_in_menu'          => true,
         'show_in_rest'          => true,
         'hierarchical'          => false,
         'supports'              => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'project_skill' ],
         'taxonomies'            => [],
     ) );

});