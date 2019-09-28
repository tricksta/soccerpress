<?php
/*
Plugin Name: FuPa Widgets
Description: Mit diesem Plugin können Sie Live Tabellen von FuPa einfach auf Ihre Webseite über Shortcodes einbinden.
Author: Bogdan Schreiber
Author URI: https://devcraft.de
Version: 1.0
*/

/**
 * Exit if ABSOLUTE PATH is not defined to WordPress installation in wp-config.php file.
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Main FuPaWidgets Class
 * 
 * @class FuPaWidgets
 */
class FuPaWidgets
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('init', array($this, 'init'));
        add_action('admin_enqueue_scripts', array($this, 'load_admin_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'load_frontend_scripts'));

        // Include required files
        $this->includes();
    }

    /**
     * Init when WordPress initialises.
     */
    public function init()
    {
        // Shortcodes
        require_once('includes/shortcodes.php');

        // Register post types
        require_once('includes/post-types/teams.php');
    }

    /**
     * Include files
     */
    public function includes()
    {
        include_once($this->plugin_path() . 'includes/admin/class-admin.php');
    }

    /**
     * Register styles and scripts
     */
    public function load_frontend_scripts()
    {
        // Enqueue styles
        wp_enqueue_style('styles', plugins_url('assets/css/styles.css', __FILE__), array(), '1.0.0', false);
    }

    public function load_admin_scripts()
    {
        // Enqueue styles
        wp_enqueue_style('bootstrap-css', plugins_url('assets/css/bootstrap.min.css', __FILE__), array(), '4.3.1', false);


        // Enqueue scripts
        wp_register_script('bootstrap-js', plugins_url('assets/js/bootstrap.min.js', __FILE__), array(), '4.3.1', false);
    }

    /**
     * Get the plugin path.
     *
     * @return string
     */
    public function plugin_path()
    {
        return plugin_dir_path(__FILE__);
    }
}

/**
 * Begins execution of the plugin.
 */
$plugin = new FuPaWidgets();
