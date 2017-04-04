    <!--SKILLS-->
    <div class="col-lg-12 col-md-12" id="admin-skills">
        
        <div class="col-lg-5 col-lg-offset-1 col-xs-12">
            <h2><span class="caps">P</span>ROFESSIONAL</h2>
            <table class="tbl-skills">
            <?php if ( is_null($bubbleSkills) ) : ?>
                <b style="colo:black">No skills to show</b>
            <?php else : ?>
                <?php foreach ($bubbleSkills as $bubSkill) : ?>
                    <tr>
                        <td class="skill-label"><b><?= $bubSkill['name'] ?></b></td>
                        <td>
                            <ul class="skills-bubble-lst" id="dot-rating-<?= $bubSkill['name'] ?>">
                                <?php for ($i=0;$i<10;$i++) : ?>
                                    <?php if ($i <= $bubSkill['rating']) : ?>
                                        <li class="skills-bubble-filled"></li>  
                                    <?php else : ?>
                                        <li class="skills-bubble"></li>  
                                    <?php endif ?>
                                <?php endfor; ?>
                            </ul>
                        </td>
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
                    <tr>
                        <td class="skill-label"><b><?= $barSkill['name'] ?></b></td>
                        
                        <td class="skillbar-td">
                            <div class="skillbar-container">
                                <div class="skillbar" id="skill-<?= $barSkill['name'] ?>" data-rating="<?= $barSkill['rating'] ?>">
                                </div>                            
                            </div>
                        </td>
                    </tr>                    
                <?php endforeach; ?>
                
            <?php endif; ?>
            </table>
        </div>
        <!--/PERSONAL SKILLS-->
    </div>
    <!--/ SKILLS-->