<?php

/**
 * @class   Admin
 */
class Admin
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'register_menu'));
    }

    /**
     * Add menu item 
     */
    public function register_menu()
    {
        add_menu_page(
            'SoccerPress',                      // Page title
            'SoccerPress',                      // Menu title
            'manage_options',                   // Capability
            'soccer-press',                     // Menu slug
            array($this, 'view_page'),          // View Function 
            'dashicons-shield-alt',             // Icon url
            30                                  // Menu position
        );
    }

    /**
     * Init the view page
     */
    public function view_page()
    {
        include_once('html-admin.php');
    }
}
