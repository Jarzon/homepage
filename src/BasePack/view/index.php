<?php
/** @var $this Prim\View */
$this->start('default');
?>

<h2>Projects</h2>
<?php foreach ($projects as $name => $project): ?>
    <div class="item">
        <div class="preview">
            <a href="<?=$project->dev?>" target="_top"><img src="<?=$this->fileCache("/img/preview/$name.png")?>"></a>
        </div>
        <div class="links">
            <?php if(isset($project->prod)):?>
                <a href="<?=$project->prod?>" target="_top">Website</a> -
            <?php endif ?>
            <?php if(isset($project->github)):?>
                <a href="<?=$project->github?>" target="_top">GitHub</a>
            <?php endif ?>
        </div>
    </div>
<?php endforeach; ?>

<?php $this->end() ?>