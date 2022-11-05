<?php

/**
 * @link       https://github.com/thiegocarvalho/nadaq-plugin
 * @since      0.1.0
 *
 * @package    Nasdaq_Plugin
 * @subpackage Nasdaq_Plugin/includes
 * @author     ThiegoCarvalho <carvalho.thiego@gmail.com>
 */
class NasdaqService
{
    public static function get_asset($atts)
    {
        $key = get_option('nadaq_key');

        if ($key) {
            $urlQuote = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$atts['symbol']}&apikey={$key}";
            $urlCompanyOverview = "https://www.alphavantage.co/query?function=OVERVIEW&symbol={$atts['symbol']}&apikey={$key}";
        }

        $requestQuote = wp_remote_get($urlQuote);
        $requestCompanyOverview = wp_remote_get($urlCompanyOverview);

        if (
            wp_remote_retrieve_response_code($requestQuote) == 200
            && wp_remote_retrieve_response_code($requestCompanyOverview) == 200
        ) {

            return [
                'quote' => json_decode(wp_remote_retrieve_body($requestQuote), true),
                'companyOverview' => json_decode(wp_remote_retrieve_body($requestCompanyOverview), true),
            ];
        }
    }
}