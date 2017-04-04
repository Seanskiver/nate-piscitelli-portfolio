<section class="col-lg-12 col-md-12 col-xs-12 mainSect" style="margin-top: 30px" id="about-container">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <!--ABOUT PARAGRAPH-->
        <h1 id="about" class="heading-text"><span class="caps">A</span>BOUT</h1>
        <?php if (isset($_SESSION['user_id'])) : ?>
            <form method="POST" action="." id="form_about">
                <input type="hidden" name="action" value="edit_about"/>
                <textarea id="about_editor" name="about"><?= stripslashes($aboutParagraph[0]['about']); ?></textarea>    
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        <?php endif; ?>
        
    </div>


    <div class="col-lg-9 col-lg-offset-1 col-xs-12" id="about-p">
        <?= stripslashes($aboutParagraph[0]['about']); ?>
    </div>
    
    
</section