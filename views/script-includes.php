<!--JQUERY-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/scripts/jquerypp.custom.js"></script>
<script src="/scripts/jquery.bookblock.js"></script>
<script src="/tinymce/tinymce.min.js"></script>
<!--BOOTSTRAP-->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<?php
    $scriptDirs = array();
    // Includes all scripts from /scripts directory
    
    $docRoot = $_SERVER['DOCUMENT_ROOT'];
    $scripts = scandir($docRoot.'/scripts/');

?>


    <?php foreach ($scripts as $s) : ?>
        <?php if (is_dir($s)) { continue; } ?> 
        
        <?php if ($s != '.' && $s != '..') : ?>
            <script src="<?= '/scripts/'.$s ?>"></script>
        <?php endif; ?>
    <?php endforeach;  ?>
    
<?php include 'dots.php'; ?>