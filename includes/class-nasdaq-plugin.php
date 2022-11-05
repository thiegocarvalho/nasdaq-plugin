<?php

/**
 * @link       https://github.com/thiegocarvalho/nadaq-plugin
 * @since      0.1.0
 *
 * @package    NasdaqPlugin
 * @subpackage NasdaqPlugin/includes
 * @author     ThiegoCarvalho <carvalho.thiego@gmail.com>
 */
class NasdaqPlugin
{
    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct()
    {
        $this->version = NASDAQ_VERSION;
        $this->plugin_name = 'nasdaq-plugin';

        $this->load_dependencies();
        $this->set_shortcodes();
        $this->show_static_content_bar();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-nasdaq-plugin-loader.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-nasdaq-plugin-shortcode.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-nasdaq-plugin-service.php';
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-nasdaq-plugin-admin.php';

        $this->loader = new NasdaqPluginLoader();
    }

    private function set_shortcodes()
    {
        $plugin_shortcode = new NasdaqShortcode();

        $this->loader->add_action('init', $plugin_shortcode, 'register_shortcodes');
    }

    private function show_static_content_bar()
    {
        if (get_option('nadaq_static_asset')) {
            $plugin_shortcode = new NasdaqShortcode();
            $this->loader->add_action('wp_body_open', $plugin_shortcode, 'static_bar');
        }
    }

    private function define_admin_hooks()
    {
        $plugin_admin = new NasdaqAdmin();
        $this->loader->add_action('admin_menu', $plugin_admin, 'add_admin_page');
        $this->loader->add_action('admin_init', $plugin_admin, 'register_options');
    }

    private function define_public_hooks()
    {
        wp_enqueue_style(
            $this->get_plugin_name(),
            plugin_dir_url(__FILE__) . '../public/css/nasdaq-style.css',
            array(),
            $this->get_version(),
            'all'
        );
    }

    public function get_loader()
    {
        return $this->loader;
    }

    public function get_plugin_name()
    {
        return $this->plugin_name;
    }
    public function get_version()
    {
        return $this->version;
    }

    public function run()
    {
        $this->loader->run();
    }
}