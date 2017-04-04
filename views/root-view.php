<?php   
    include 'header.php'; 
    include 'banner.php';    
?>

    
    
<div class="row" id="main-wrapper">
    <?php 
        include 'views/nav.php';
        include 'views/about.php';
        include 'views/skills.php';
        include 'portfolio-book.php';
        include 'views/mailForm.php';
    ?>
</div>

<?php 
    // FOOTER INCLUDES
    include $views.'script-includes.php';
    include $views.'footer.php';
?>

