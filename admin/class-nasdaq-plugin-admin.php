<?php

/**
 * @link       https://github.com/thiegocarvalho/nadaq-plugin
 * @since      0.1.0
 *
 * @package    Nasdaq_Plugin
 * @subpackage Nasdaq_Plugin/includes
 * @author     ThiegoCarvalho <carvalho.thiego@gmail.com>
 */
class NasdaqAdmin
{

    public function register_options()
    {
        register_setting('nadaq_plugin', 'nadaq_key');
        register_setting('nadaq_plugin', 'nadaq_static_asset');
    }


    public function render_admin_page()
    {
        include_once 'partials/nasdaq-plugin-admin-display.php';
    }

    public function add_admin_page()
    {
        add_menu_page(
            __('Nadaq Settings', 'nadaq'),
            __('Nadaq Settings', 'nadaq'),
            'manage_options',
            'nadaq_plugin_page',
            [$this, 'render_admin_page']
        );
    }
}