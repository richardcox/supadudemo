<?php

namespace supaduDemo;

use supaduDemo\resources;
use supaduDemo\postTypes\news;


/**
 * Class SupaduDemo
 *
 * @package SupaduDemo
 */

class theme {

    /**
     * [load description]
     * @return [type] [description]
     */
    public function load() {
        $this->addFilters();
        $this->addActions();
        $this->addSupport();
        $this->addOptions();
        $this->registerNavMenus();
        news::setUpPostType();
    }

    /**
     * [addFilters description]
     */
    private function addFilters() {
        add_filter( 'login_redirect', [$this, 'redirect_to_profile_edit'], 10, 3 );
    }

    
    /**
     * [addActions description]
     */
    private function addActions() {
        add_action( 'init', [$this, 'loadResources'] );
        add_action( 'login_enqueue_scripts', [$this, 'my_login_logo'] );
    }

    /**
     * [addSupport description]
     */
    private function addSupport() {
        add_theme_support( 'custom-header' );
        add_theme_support( 'menus' );
        add_theme_support( 'post-thumbnails' );
    }


    /**
     * [registerNavMenus description]
     * @return [type] [description]
     */
    private function registerNavMenus() {
        register_nav_menus(
            [
            'header-menu' => __( 'Primary header top menu navigation', '' ),
            'members-menu' => __( 'Menu that will be shown only to members', '' ),
            'footer-menu' => __( 'Footer navigation', '' )
            ]
        );
    }


    /**
     * [addOptions description]
     */
    private function addOptions() {
        if ( function_exists( 'acf_add_options_page' ) ) {

            acf_add_options_page([
                'page_title'    => 'Theme General Settings',
                'menu_title'    => 'Theme Settings',
                'menu_slug'     => 'theme-general-settings',
                'capability'    => 'edit_posts',
                'redirect'      => false
            ]);

        }
    }


    /**
     * [loadResources description]
     * @return [type] [description]
     */
    public function loadResources() {
        resources::enqueueResources();
    }


    /**
     * [my_login_logo description]
     * @return [type] [description]
     */
    public function my_login_logo() { ?>
    <style type="text/css">
        /** Login styles go here */
    </style>
    <?php }


    /**
     * [loadMenuByPosition description]
     * @param  [type] $menuPosition [description]
     * @return [type]               [description]
     */
    public static function loadMenuByPosition( $menuPosition ) {
        $locations = get_nav_menu_locations();

        if ( isset( $locations[ $menuPosition ] ) ) {
            $menuOptions = wp_get_nav_menu_items( $locations[ $menuPosition ] );

            $menuObj = [];
            $returMenuObj = [];

            foreach ( $menuOptions as $menuItem ) {
                $menuObj[$menuItem->ID]['id'] = $menuItem->ID;
                $menuObj[$menuItem->ID]['parent'] = $menuItem->menu_item_parent;
                $menuObj[$menuItem->ID]['menu_order'] = $menuItem->menu_order;
                $menuObj[$menuItem->ID]['title'] = $menuItem->title;
                $menuObj[$menuItem->ID]['url'] = $menuItem->url;
                $menuObj[$menuItem->ID]['description'] = $menuItem->description;
                $menuObj[$menuItem->ID]['target'] = $menuItem->target;
                $menuObj[$menuItem->ID]['classes'] = $menuItem->classes;
                $menuObj[$menuItem->ID]['post_status'] = $menuItem->post_status;
            }

            foreach ( $menuObj as $value ) {
                if ( $value['parent'] === '0' ) {
                    $returMenuObj[$value['id']] = $value;
                } else {
                    $returMenuObj[$value['parent']]['childs'][] = $value;
                }
            }

            return $returMenuObj;
        }
    }


    /**
     * [renderModules description]
     * @param  [type] $type [description]
     * @return [type]       [description]
     */
    public static function renderModules( $type ) {
        $repeater = get_field( $type );

        if ( !empty( $repeater ) ) {
            foreach ( $repeater as $module ) {
                include 'views/content_modules/' . $module['acf_fc_layout'] . '.php';
            }
        }
    }


    /**
     * [addClassToBody description]
     */
    public function addClassToBody() {
        add_filter( 'body_class', function( $classes ) 
        {
            return array_merge( $classes, ['class-name'] );
        });
    }


}
