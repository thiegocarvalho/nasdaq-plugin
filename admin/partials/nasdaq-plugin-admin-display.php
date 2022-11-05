<div class="card" style="width: 100%; display: block; margin: auto; margin-top: 50px;">

    <div class="card-body">

        <h2 class="card-title"><?php esc_html_e('Api Key:', 'Nasdaq'); ?></h2>
        <form method="post" action="options.php">
            <?php settings_fields('nadaq_plugin'); ?>
            <input type="text" name="nadaq_key" value="<?php echo get_option('nadaq_key') ?>" id="nadaq_key"
                style="width: 100%;">
            <p>Precisa de uma API key? <a href="https://www.alphavantage.co/" target="_blank">Clique aqui</a></p>
            <hr>
            <h2 class="card-title"><?php esc_html_e('Exibição Fixa', 'Nasdaq'); ?></h2>
            <p><?php esc_html_e('Utilize essa opção exibir de maneira fixa um ativo no topo do seu site', 'Nasdaq'); ?>
            </p>
            <input type="text" name="nadaq_static_asset" value="<?php echo get_option('nadaq_static_asset') ?>"
                id="nadaq_static_asset" style="width: 100%;">
            <p>Exemplo "AAPL"</p>
            <?php submit_button(); ?>
        </form>

    </div>
</div>

<div class="card" style="width: 100%; display: block; margin: auto; margin-top: 50px;">
    <div class="card-body">
        <h2 class="card-title"><?php esc_html_e('Como usar o Shortcode', 'Nasdaq'); ?></h2>
        <hr>
        <p>Adicione ao conteúdo:</p>
        <code>[nadaq symbol="SIMBOLO DO ATIVO"]</code>
        <p> Exemplo [nadaq symbol=AAPL]</p>
        <?php if (get_option('nadaq_key')) echo do_shortcode("[nadaq symbol=AAPL]"); ?>

    </div>
</div>