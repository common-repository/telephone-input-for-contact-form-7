<?php 
/**
* Plugin Name: Telephone Input For Contact form 7
* Description: This plugin allows quickly search and select a country Telephone from a responsive, mobile-friendly flag dropdown.
* Version: 1.0
* Copyright: 2023
* Text Domain: telephone-input-for-contact-form-7
*/


if (!defined('ABSPATH')) {
    die('-1');
}


// define for base name
define('TIFCF7_BASE_NAME', plugin_basename(__FILE__));

// define for plugin file
define('tifcf7_plugin_file', __FILE__);

// define for plugin dir path

if (!defined('TIFCF7_PLUGIN_DIR')) {
    define('TIFCF7_PLUGIN_DIR', plugin_dir_path(__FILE__));
}
if (!defined('TIFCF7_PLUGIN_URL')) {
  define('TIFCF7_PLUGIN_URL',plugins_url('', __FILE__));
}


// Include function files
include_once(TIFCF7_PLUGIN_DIR.'includes/frontend.php');
include_once(TIFCF7_PLUGIN_DIR.'includes/admin.php');


// [telephone_input telephone_input-516 enable_dropdown]
function TIFCF7_load_script_style(){
    wp_enqueue_script( 'jquery-telephone', TIFCF7_PLUGIN_URL . '/public/js/intlTelInput.js', array('jquery'), '2.0');
    wp_enqueue_script( 'jquery-telephones', TIFCF7_PLUGIN_URL. '/public/js/design.js', array(), '1.0');

    wp_localize_script( 'jquery-telephones', 'telephone_ajax', array( 'ajax_urla' => TIFCF7_PLUGIN_URL) );

    wp_enqueue_style( 'jquery-telephones-style', TIFCF7_PLUGIN_URL. '/public/css/intlTelInput.css', '', '3.0' );
}
add_action( 'wp_enqueue_scripts', 'TIFCF7_load_script_style' );

?>