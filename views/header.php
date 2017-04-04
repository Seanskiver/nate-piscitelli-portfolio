<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nate Piscitelli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" />
    <!--FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
        // Includes all css files from /css directory
        $docRoot = $_SERVER['DOCUMENT_ROOT'];
        $styles = scandir($docRoot.'/css/');
    ?>
    
    <?php foreach ($styles as $s) : ?>
        <?php if ($s != '.' && $s != '..') : ?>
            <link rel='stylesheet' href="<?= '/css/'.$s ?>" type="text/css">
        <?php endif; ?>
    <?php endforeach;  ?>
	<script src="/scripts/modernizr.custom.js"></script>
</head>
<body>

    