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
                <a href="<?=$project->prod?>" target="_top">Website</a>
            <?php endif ?>
            <?php if(isset($project->github)):?>
                <a href="<?=$project->github?>" target="_top">GitHub</a>
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