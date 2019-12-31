<?php
/**
 * @var $this Prim\View
 * @var $projects object[]
 */
$this->start('default');
?>

<?php foreach ($projects as $name => $project): ?>
    <div class="item">
        <h3><a href="<?=$project->dev?>" target="_top"><?=$project->name?></a></h3>
        <div class="preview">
            <iframe src="<?=$project->dev?>"></iframe>
        </div>
        <div class="links">
            <?php if(isset($project->prod)):?>
                <a href="<?=$project->prod?>" target="_top">Website</a>
            <?php endif ?>
            <?php if(isset($project->github)):?>
                <a href="<?=$project->github?>" target="_top">GitHub</a>
            <?php endif ?>
            <?php if(isset($project->phpunit)):?>
                <a href="<?=$project->phpunit?>" target="_top">PHPUnit</a>
            <?php endif ?>
            <?php if(isset($project->location)):?>
                <a href="/open/<?=$project->name?>" onclick="bgRequest(this); return false;">Open</a>
            <?php endif ?>
        </div>
    </div>
<?php endforeach; ?>

<script>
    function reqListener () {
        console.log(this.responseText);
    }

    function bgRequest(link) {
        var oReq = new XMLHttpRequest();
        oReq.addEventListener("load", reqListener);
        oReq.open("GET", link.href);
        oReq.send();
    }
</script>

<?php $this->end() ?>
