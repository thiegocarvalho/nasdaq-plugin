<?php

/**
 * @link              https://github.com/thiegocarvalho/nasdaq-plugin/
 * @since             0.1.0
 * @package           NasdaqPlugin
 *
 * @wordpress-plugin
 * Plugin Name:       Nasdaq
 * Plugin URI:        https://github.com/thiegocarvalho/nasdaq-plugin/
 * Description:       implementação da API para exibição de ativos.
 * Version:           0.1.0
 * Author:            ThiegoCarvalho
 * Author URI:        https://github.com/thiegocarvalho
 * GitHub Plugin URI: https://github.com/thiegocarvalho/nasdaq-plugin/
 * Primary Branch:    main
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nasdaq-plugin
 * Domain Path:       /languages
 */

if (!defined('WPINC')) {
    die;
}

define('NASDAQ_VERSION', '0.1.0');

require plugin_dir_path(__FILE__) . 'includes/class-nasdaq-plugin.php';
function run_nasdaq_plugin()
{
    $plugin = new NasdaqPlugin();
    $plugin->run();
}

run_nasdaq_plugin();