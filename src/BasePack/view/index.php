<?php /** @var $this Prim\View */?>

<?php $this->start('default') ?>

<h2>Projects</h2>
<?php foreach ($projects as list($name, $urls)): ?>
    <div class="item">
        <div class="preview">
            <a href="<?=$urls[0]?>" target="_top"><img src="<?=$this->fileCache("/img/preview/$name.png")?>"></a>
        </div>
        <div class="links">
            <a href="<?=$urls[1]?>" target="_top">Website</a> - <a href="<?=$urls[2]?>" target="_top">GitHub repository</a>
        </div>
    </div>
<?php endforeach; ?>

<h2>PHPUnit Coverage</h2>
<?php foreach ($phpunit as $name): ?>
    <div class="item">
        <h3><?=$name?></h3>
        <div class="preview">
            <a href="http://localhost/phpunit/<?=$name?>" target="_top"><img src="<?=$this->fileCache("/img/preview/$name.png")?>"></a>
        </div>
    </div>
<?php endforeach; ?>

    <h2>Past projects</h2>
<?php foreach ($pastProjects as list($name, $urls)): ?>
    <div class="item past">
        <div class="preview">
            <a href="<?=$urls[0]?>" target="_top"><img src="<?="/img/preview/$name.png"?>"></a>
        </div>
        <div class="links">
            <a href="<?=$urls[1]?>" target="_top">GitHub repository</a>
        </div>
    </div>
<?php endforeach; ?>

<h2>Motds</h2>
<?php foreach ($motds as list($name, $urls)): ?>
    <div class="item past">
        <div class="preview">
            <a href="<?=$urls[0]?>" target="_top"><img src="<?="/img/preview/$name.png"?>"></a>
        </div>
        <div class="links">
            <a href="<?=$urls[1]?>" target="_top">GitHub repository</a>
        </div>
    </div>
<?php endforeach; ?>

<?php $this->end() ?>