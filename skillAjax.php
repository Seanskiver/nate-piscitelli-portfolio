<?php 

    include 'models/skill.php';
    // Get action
    $action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';   
    
    $skills = new Skill();
    
    switch($action) {
        case 'changeRating':
            $id = (int)$_REQUEST['id'];
            $rating = (int)$_REQUEST['rating'];
            
            $skill = $skills->getSkill($id)[0];
            $skills->updateSkill($id, $skill['name'], $rating, $skill['displayType']);            
            break;
            
        case 'deleteSkill':
            $id = (int)$_REQUEST['id'];
            $skills->deleteSkill($id);
            break;
    }

?>