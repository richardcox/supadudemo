<?php

namespace supaduDemo\postTypes;

/**
 * Class news
 */
class news
{

    public static function setUpPostType()
    {
        $news = new self();
        $news->registerPostType();
        $news->registerTaxonomy();
    }

    /**
     * Function: registerPostType
     */
    private function registerPostType()
    {
        $labels = array(
            'name'                  => _x( 'News', 'Post Type General Name', 'text_domain' ),
            'singular_name'         => _x( 'News', 'Post Type Singular Name', 'text_domain' ),
            'menu_name'             => __( 'News', 'text_domain' ),
            'name_admin_bar'        => __( 'News item', 'text_domain' ),
            'archives'              => __( 'Item Archives', 'text_domain' ),
            'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
            'all_items'             => __( 'All Items', 'text_domain' ),
            'add_new_item'          => __( 'Add New Item', 'text_domain' ),
            'add_new'               => __( 'Add New', 'text_domain' ),
            'new_item'              => __( 'New Item', 'text_domain' ),
            'edit_item'             => __( 'Edit Item', 'text_domain' ),
            'update_item'           => __( 'Update Item', 'text_domain' ),
            'view_item'             => __( 'View Item', 'text_domain' ),
            'search_items'          => __( 'Search Item', 'text_domain' ),
            'not_found'             => __( 'Not found', 'text_domain' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
            'featured_image'        => __( 'Featured Image', 'text_domain' ),
            'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
            'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
            'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
            'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
            'items_list'            => __( 'Items list', 'text_domain' ),
            'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
            'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
        );
        $args = array(
            'label'                 => __( 'News cats', 'text_domain' ),
            'description'           => __( 'News item Description', 'text_domain' ),
            'labels'                => $labels,
            'supports'              => [
                                            'title',
                                            'editor',
                                            'author',
                                            'thumbnail',
                                            'revisions'
                                        ],
            'taxonomies'            => [
                                            'category',
                                            'cat_news'
                                        ],
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'news',
            'map_meta_cap'          => true
        );

        register_post_type('news', $args);
        remove_post_type_support( 'news', 'editor' );
    }

    /**
     * Function: registerTaxonomy
     * 
     */
    private function registerTaxonomy()
    {
        $labels = [
            'menu_name' => __( 'Categories', 'text_domain')
        ];

        $args = [
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true
        ];

        register_taxonomy('news', ['news'], $args);
    }
}

