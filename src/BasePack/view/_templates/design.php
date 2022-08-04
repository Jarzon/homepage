<?php /** @var \Prim\View $this  */?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
		<title>Homepage</title>
		<meta name="description" content="">

        <link rel="icon" type="image/png" href="/img/icon.png">
        <link href="<?=$this->fileCache('/css/main.css') ?>" rel="stylesheet">
        <?= $this->section('css') ?>
	</head>
	<body>

        <main>
            <?= $this->section('default') ?>
        </main>

        <script src="/js/main.js"></script>
        <?= $this->section('js') ?>
	</body>
</html>