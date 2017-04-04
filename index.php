<?php 
    $views = $_SERVER['DOCUMENT_ROOT'].'/views/';
    require_once('models/skill.php');
    require_once('models/about.php');
    // Get action
    $action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';   

    $skills = new Skill();
    $about = new About();
    
    switch ($action) {
        case '': 

            $bubbleSkills = $skills->getSkills('bubble');
            $barSkills = $skills->getSkills('bar');
            $aboutParagraph = $about->getAbout();
            
            include './views/root-view.php';

            break;
            
        case 'port':
            include './views/images.php';
            break;
            
            
        case 'add-skill':
            $name = (string)filter_input(INPUT_POST, 'name');
            $rating = filter_input(INPUT_POST, 'rating');
            $displayType = (string)filter_input(INPUT_POST, 'displayType');

            try {
                $skills->insertSkill($name, $rating, $displayType);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
            header ('location: .');
            break;
            
        case 'edit_about':
            $body = $_POST['about'];

            try {
                $about->editAbout(addslashes($body));
            } catch (Exception $e) {
                echo $e->getMessage();
            }
                        
            header ('location: .');

            break;
    }
    



?>

