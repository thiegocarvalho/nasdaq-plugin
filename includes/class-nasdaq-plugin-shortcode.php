<?php

class NasdaqShortcode
{
    public function register_shortcodes()
    {
        add_shortcode('nadaq', [$this, 'show_asset']);
    }

    public function show_asset($atts)
    {
        return $this->render_display(NasdaqService::get_asset($atts));
    }

    public function render_display($marketInfo)
    {
        ob_start();
        include(plugin_dir_path(__FILE__) . '../public/partials/display-block.php');
        return ob_get_clean();
    }

    public function static_bar()
    {
        echo $this->render_display(NasdaqService::get_asset(['symbol' => get_option('nadaq_static_asset')]));
    }
}