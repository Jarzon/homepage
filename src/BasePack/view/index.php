<?php $this->start('default') ?>
    <h1>Projects</h1>
    <?php foreach ($projects as list($name, $urls)): ?>
        <div class="item">
            <div class="preview">
                <a href="<?=$urls[0]?>" target="_top"><img src="/img/preview/<?=$name?>.png"></a>
            </div>
            <ul class="links">
                <li><a href="<?=$urls[1]?>" target="_top">Website</a></li>
                <li><a href="<?=$urls[2]?>" target="_top">GitHub repository</a></li>
            </ul>
        </div>
    <?php endforeach; ?>

    <h1>PHPUnit Coverage</h1>
    <?php foreach ($phpunit as $name): ?>
        <div class="item">
            <h3><?=$name?></h3>
            <div class="preview">
                <a href="http://localhost/phpunit/<?=$name?>" target="_top"><img src="/img/preview/<?=$name?>.png"></a>
            </div>
        </div>
<?php endforeach; ?>

<?php $this->end() ?>