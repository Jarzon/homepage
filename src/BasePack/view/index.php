<?php
/**
 * @var $this Prim\View
 * @var $projects object[]
 */
$this->start('default');
?>

<h1>
    <a href="https://www.paypal.com/signin">PayPal</a> |
    <a href="https://ca.ovh.com/auth/">OVH servers</a> |
    <a href="https://domains.google.com/registrar/">Google domains</a> |
    <a href="https://www.google.com/webmasters/tools/home">Google webmaster</a> |
    <a href="https://mail.libellum.ca/iredadmin/">Emails</a> |
    <a href="https://account.mapbox.com/">Mapbox API</a>
</h1>

<h1>
    <a href="https://tweetdeck.twitter.com/">Twitter</a> |
    <a href="https://youtube.com/">YouTube</a> |
    <a href="https://funimation.com/">Funimation</a>
</h1>

<?php foreach ($projects as $name => $project): ?>
    <div class="item">
        <h3><a href="<?=$project->dev?>" target="_top"><?=$project->name?></a></h3>
        <?php if($project->dev !== null): ?>
            <div class="preview">
                <iframe scrolling="no" src="<?=$project->dev?>"></iframe><a href="<?=$project->dev?>"><div class="overlay"></div></a>
            </div>
        <?php endif; ?>

        <div class="links">
            <?php if(isset($project->prod)):?>
                <a href="<?=$project->prod?>" target="_top">Website</a>
            <?php endif ?>
            <?php if(isset($project->github)):?>
                <a href="<?=$project->github?>" target="_top">GitHub</a>
            <?php endif ?>
            <?php /*if(isset($project->phpunit)):?>
                <a href="<?=$project->phpunit?>" target="_top">PHPUnit</a>
            <?php endif ?>
            <?php if(isset($project->location)):?>
                <a href="/open/<?=$project->name?>" onclick="bgRequest(this); return false;">Open</a>
            <?php endif*/ ?>
        </div>
    </div>
<?php endforeach; ?>

<?php $this->end() ?>
