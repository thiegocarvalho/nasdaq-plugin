<div class="row_nasdaq">
    <div class="conteiner_nasdaq">
        <div class="column_nasdaq">
            <strong><?php echo $marketInfo['companyOverview']['Name'] . '. ' . $marketInfo['companyOverview']['AssetType']; ?></strong>
            (<?php echo $marketInfo['companyOverview']['Symbol']; ?>)
            <br>
            <small><strong><?php echo ucfirst(strtolower($marketInfo['companyOverview']['Exchange'])); ?></strong>
                listed.</small>
        </div>
        <div class="column_nasdaq" style="text-align: right;">
            <strong>$<?php echo number_format($marketInfo['quote']['Global Quote']['05. price'], 2); ?>
                <br>
                <small
                    class="<?php echo str_starts_with($marketInfo['quote']['Global Quote']['09. change'], '-') ? 'negative' : 'positive'; ?>">
                    <?php echo number_format($marketInfo['quote']['Global Quote']['09. change'], 2); ?>
                    (<?php echo substr($marketInfo['quote']['Global Quote']['10. change percent'], 0, -3); ?>%)
                </small></strong>
        </div>
    </div>
</div>