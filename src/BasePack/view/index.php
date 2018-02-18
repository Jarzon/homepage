<?php $this->start('default') ?>
    <?php foreach ($projects as list($name, $urls)): ?>
        <div class="item">
            <ul>
                <li><?=$name?></li>
                <li><img src="/img/preview/<?=$name?>.png"></li>
                <?php foreach ($urls as list($url)): ?>
                    <li><a href="<?=$url?>" target="_top"><?=$url?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endforeach; ?>

<?php $this->end() ?>