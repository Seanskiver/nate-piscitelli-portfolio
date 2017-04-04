    <!--SKILLS-->
    <section class="col-lg-12 col-md-12 mainSect" style="margin-top: 60px" id="skills">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="heading-text"><span class="caps">S</span>KILLS</h1>   
        </div>

        <div class="col-lg-5 col-lg-offset-1 col-xs-12">
            <h2><span class="caps">P</span>ROFESSIONAL</h2>
            <table class="tbl-skills">
                <?php if ( is_null($bubbleSkills) ) : ?>
                    <b style="colo:black">No skills to show</b>
                <?php else : ?>
                    <?php foreach ($bubbleSkills as $bubSkill) : ?>
                        <tr class="skill-tr">
                            <td class="skill-label"><b><?= $bubSkill['name'] ?></b></td>
                            <td>
                                <ul class="skills-bubble-lst" id="dot-rating-<?= $bubSkill['name'] ?>">
                                    <?php for ($i=0;$i<10;$i++) : ?>
                                        <?php if ($i < $bubSkill['rating']) : ?>
                                            <li style="background-color: black;" class="skills-bubble"></li>  
                                        <?php else : ?>
                                            <li class="skills-bubble"></li>  
                                        <?php endif ?>
                                    <?php endfor; ?>
                                </ul>
                            </td>
                            <?php if (isset($_SESSION['user_id'])) : ?>
                                <td class="td-delete">
                                    <input 
                                        type="hidden" 
                                        data-list="dot-rating-<?= $bubSkill['name'] ?>"
                                        data-id="<?= $bubSkill['id'] ?>"
                                        value="<?= $bubSkill['rating'] ?>" 
                                        class="rating-hidden">
                                        
                                    <span 
                                        class="glyphicon glyphicon-remove-circle skill-delete"
                                        data-id="<?= $bubSkill['id'] ?>">
                                    </span>
                                    
                                </td>
                            <?php endif; ?>
                        </tr>                    
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
        </div>
        
        <!--PERSONAL SKILLS-->
        <div class="col-lg-5 col-lg-offset-1 col-xs-12">
            <h2><span class="caps">P</span>ERSONAL</h2>
            <table class="tbl-skills" id="tbl-skillbar">
                <?php if ( is_null($barSkills) ) : ?>
                    <b style="colo:black">No skills to show</b>
                <?php else : ?>
                    <?php foreach ($barSkills as $barSkill) : ?>
                        <tr class="skill-tr">
                            <td class="skill-label"><b><?= $barSkill['name'] ?></b></td>
                            
                            <td class="skillbar-td">
                                <div class="skillbar-container">
                                    <div 
                                        class="skillbar" 
                                        id="bar-rating-<?= $barSkill['name'] ?>" 
                                        data-rating="<?= $barSkill['rating'] ?>"
                                        style="width: <?= (int)$barSkill['rating'] * 10 ?>%"></div>
                                    </div>                            
                                </div>
                            </td>
                            
                            <?php if (isset($_SESSION['user_id'])) : ?>
                                <td class="td-delete">
                                    <input 
                                        type="hidden" 
                                        data-list="bar-rating-<?= $barSkill['name'] ?>" 
                                        data-id="<?= $barSkill['id'] ?>"
                                        value="<?= $barSkill['rating'] ?>" 
                                        class="rating-hidden" >
                                
                                    <span 
                                        class="glyphicon glyphicon-remove-circle skill-delete" 
                                        data-id="<?= $barSkill['id'] ?>">
                                    </span>
                                </td>
                                <!--<td class="td-delete"></td>-->
                            <?php endif; ?>
                        </tr>            
                        
                    <?php endforeach; ?>
                    
                <?php endif; ?>
            </table>
        </div>
        <!--/PERSONAL SKILLS-->
    </section>
    <!--/ SKILLS-->
    <?php if (isset($_SESSION['user_id'])) : ?>

        <div id="add-skill-container" class="add-skill col-lg-4 col-lg-offset-1">
            <b id="add-skill-bar" data-toggle="modal" data-target="#exampleModal"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add Skill</b>
        </div>
 
    <?php endif; ?>

    <!--ADD SKILL MODAL-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                    
                    <h1 class="modal-title" id="exampleModalLabel">Add Skill</h1>

                </div>
                
                <div class="modal-body">
                    <form action="." method="POST" id="add-skill-form">
                        <input type="hidden" name="action" value="add-skill">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" required/> 
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <select name="rating" class="form-control" required>
                                <?php for ($i=1;$i<11;$i++) : ?> 
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        
                        <fieldset class="form-group">
                        <legend>Display Type</legend>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="displayType" value="bubble" checked>
                                    Bubble
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="displayType" value="bar" >
                                    Bar
                                </label>
                            </div>
                        </fieldset>
                        
                        <!--<input type="submit" value="Submit" name="submit" class="btn btn-success"/>-->
                    </form>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add-skill-sub">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    