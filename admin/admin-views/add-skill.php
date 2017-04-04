<?php include $_SERVER['DOCUMENT_ROOT'].'/views/header.php'; ?>

<div class="row">
    <div class="col-lg-4 col-lg-offset-4" id="form-container">
        <h1 id="add-skill-header">Add Skill</h1>
        <form action="." method="POST" id="add-skill-form">
            <input type="hidden" name="action" value="add-skill">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control"/> 
            </div>
            <div class="form-group">
                <label for="rating">Rating</label>
                <select name="rating" class="form-control">
                    <?php for ($i=1;$i<11;$i++) : ?> 
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            
            <fieldset class="form-group">
            <legend>Display Type</legend>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="displayType" value="bubble">
                        Bubble
                    </label>
                </div>
                
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="displayType" value="bar">
                        Bar
                    </label>
                </div>
            </fieldset>
            
            

            
            <input type="submit" value="Submit" name="submit" class="btn btn-success"/>
        </form>
    </div>
</div>

