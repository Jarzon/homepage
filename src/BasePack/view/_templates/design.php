<?php /** @var \Prim\View $this  */?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
		<title>Projects</title>
		<meta name="description" content="">

        <link rel="icon" type="image/png" href="/img/icon.png">
        <link href="<?=$this->fileCache('/css/main.css') ?>" rel="stylesheet">
        <?= $this->section('css') ?>
	</head>
	<body>

        <nav>
            
        </nav>

        <main>
            <?= $this->section('default') ?>
        </main>

        <footer>

        </footer>

        <script src="/js/main.js"></script>
        <?= $this->section('js') ?>
	</body>
</html>