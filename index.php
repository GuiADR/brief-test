<?php
/*
Plugin Name: Brief Test
Description: Plugin para criar uma API Rest Full para o gerenciamento de equipe interno de uma empresa
Version: 0.1.0
Author: Guilherme Rodrigues
Author URI: https://github.com/GuiADR
Text Domain: brief-test
*/

require plugin_dir_path(__FILE__) . 'vendor/autoload.php';

if (!function_exists('add_action')) {
  echo __('Desculpe, eu sou apenas um plugin e você não deveria me chamar diretamente!', 'brief-test');
  exit;
}

//  Setup
define('BRIEF_TEST_PLUGIN_URL', __FILE__);

//  Includes
include('includes/activate.php');
include('includes/init.php');
include('includes/member_contents.php');
include('routes/api.php');



//  Hooks
register_activation_hook(BRIEF_TEST_PLUGIN_URL, 'bt_activate_plugin');
add_action('rest_api_init', 'bt_create_routes');
add_action('init', 'bt_members_init');

//  Shortcodes
add_shortcode('team_members', 'bt_team_members_template');
