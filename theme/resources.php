<?php

namespace supaduDemo;

/**
 * Class SupaduDemo
 *
 * @package SupaduDemo
 */

class resources {

    private $classes;


    /**
     *
     */
    public static function enqueueConditional( $classes ) {
        $resource = new self();
        $resource->classes = $classes;
        $resource->conditionalStyles( $resource->classes );
        $resource->conditionalScripts( $resource->classes );
    }


    /**
     * Function: conditionalStyles
     *
     * Enqueue styles sheets if a file name matching one the body classes exists
     */
    public static function conditionalStyles( $classes ) {
        $absPath = ABSPATH . 'wp-content/themes/supadu-demo/assets/css/templates/';
        $url = get_template_directory_uri() . '/assets/css/templates/';
        $page_template_names = $classes;

        $customTemplate = get_field( 'page_template' );
        if ( !empty( $customTemplate ) ) {
            array_push( $page_template_names, $customTemplate );
        }

        foreach ( $page_template_names as $template ) {
            if ( is_readable( $absPath . $template . '.css' ) ) {
                wp_enqueue_style( $template . '_css', $url . $template . '.css', [], '0.1.0', 'all' );
            }
        }
    }


    /**
     * Function: conditionalStyles
     *
     * Enqueue styles sheets if a file name matching one the body classes exists
     */
    public static function conditionalScripts( $classes ) {
        
        $absPath = ABSPATH . 'wp-content/themes/supadu-demo/assets/js/templates/';
        $url = get_template_directory_uri() . '/assets/js/templates/';
        $page_template_names = $classes;

        $customTemplate = get_field( 'page_template' );

        if ( !empty( $customTemplate ) ) {
            array_push( $page_template_names, $customTemplate );
        }

        foreach ( $page_template_names as $template ) {
            if ( is_readable( $absPath . $template . '.js' ) ) {
                wp_register_script( $template . '_js', $url . $template . '.js', ['jquery'] , true );
                wp_enqueue_script( $template . '_js');
            }
        }
    }


    /**
     * Function: enqueueResources
     *
     *   return description
     */
    public static function enqueueResources() {
        $resource = new self();
        $resource->enqueueStyles();
        $resource->enqueueAdminResources();
    }


    /**
     * Function: enqueueAdminResources
     * 
     * description
     * 
     * Returns:
     * 
     *   return description
     */
    public function enqueueAdminResources() {
        add_action( 'admin_enqueue_scripts', [new self(), 'enqueueAdminStyles']);
        add_action( 'admin_enqueue_scripts', [new self(), 'enqueueAdminScripts']);
    }


    /**
     * [enqueueAdminStyles description]
     * @param  [type] $hook [description]
     * @return [type]       [description]
     */
    public function enqueueAdminStyles($hook) {
        if( 'profile.php' != $hook && 'user-edit.php' != $hook) {
            return;   
        } else {
            wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/assets/css/templates/admin.css', false, '1.0.0' ); 
        } 
    }


    /**
     * [enqueueAdminScripts description]
     * @param  [type] $hook [description]
     * @return [type]       [description]
     */
    public function enqueueAdminScripts($hook) {
        if( 'profile.php' != $hook && 'user-edit.php' != $hook) {
            return;   
        } else {
            wp_enqueue_script( 'iscls-admin-js', get_template_directory_uri() . '/assets/js/templates/admin.js', '', '' , true ); 
        }   
    }


    /** [enqueueStyles description] */
    private function enqueueStyles() {
        // Enqueue on non-admin pages
        if ( !is_admin() ) {
            // Foundation
            wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/assets/css/foundation.min.css', [], '', '');
            wp_enqueue_style( 'motion-ui-css', get_template_directory_uri() . '/assets/css/motion-ui.min.css', [], '', '');
        }
    }


}
