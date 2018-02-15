<?php $this->start('default') ?>
    <?php foreach ([
        ['Libellum', 'http://libellum.localhost', 'https://libellum.ca', 'https://github.com/Jarzon/Libellum']
                   ] as list($name, $devUrl, $prodUrl, $repoUrl)): ?>
    <?=$name?>: <a href="<?=$devUrl?>" target="_top"><?=$devUrl?></a> - <a href="<?=$prodUrl?>" target="_top"><?=$prodUrl?></a> - <a href="<?=$repoUrl?>" target="_top"><?=$repoUrl?></a><br>
    <?php endforeach; ?>

<?php $this->end() ?>