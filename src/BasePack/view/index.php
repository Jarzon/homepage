<?php /** @var $this Prim\View */?>

<?php $this->start('default') ?>

<h2>Projects</h2>
<?php foreach ($projects as $name => $infos): ?>
    <div class="item">
        <div class="preview">
            <a href="<?=$infos['dev']?>" target="_top"><img src="<?=$this->fileCache("/img/preview/$name.png")?>"></a>
        </div>
        <div class="links">
            <?php if(isset($infos['prod'])):?>
                <a href="<?=$infos['prod']?>" target="_top">Website</a> -
            <?php endif ?>
            <a href="/<?=$name?>" target="_top">PHPStorm</a> -
            <a href="<?=$infos['github']?>" target="_top">GitHub</a>
        </div>
    </div>
<?php endforeach; ?>

<?php $this->end() ?>