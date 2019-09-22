<?php
/*
Plugin Name: SoccerPress
Description: SoccerPress ist ein Plugin für deutsche Fußballvereine um Ergebnisse der letzten Spiele anzuzeigen.
Version: 1.0
Author: Bogdan Schreiber
Author URI: https://devcraft.de
*/

/**
 * Exit if ABSOLUTE PATH is not defined to WordPress installation in wp-config.php file.
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Main SoccerPress Class
 * 
 * @class SoccerPress
 */
class SoccerPress
{
    /**
     * Constructor
     */
    public function __construct()
    {
        add_action('init', array($this, 'init'));
        add_action('admin_enqueue_scripts', array($this, 'load_admin_scripts'));

        // Include required files
        $this->includes();
    }

    /**
     * Init when WordPress initialises.
     */
    public function init()
    {
        new Admin();   // Admin class
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
    public function load_admin_scripts()
    {
        // Enqueue styles
        wp_enqueue_style('soccerpress', plugins_url('assets/css/soccerpress.css', __FILE__), array(), '1.0.0', false);
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
$plugin = new SoccerPress();
