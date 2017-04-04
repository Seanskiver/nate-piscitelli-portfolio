<?php 
    session_start();
    $views = $_SERVER['DOCUMENT_ROOT'].'/admin/views/';

    spl_autoload_register(function($class_name) {
        include strtolower($_SERVER['DOCUMENT_ROOT'].'/models/'.$class_name . '.php');
    });
    
    // Models
    $user = new User();
    $skills = new Skill();

    $action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';   
    
    // If not logged in or trying to log in 
    if (!isset($_SESSION['user_id']) && $action != 'login') {
        $action= 'login-form';
    }
    
    switch ($action) {
        case '':
            header ('location: ..');
            break;
        
        case 'login-form':
            include 'admin-views/login.php';
            break;
            
        case 'login':
            $username = (string)filter_input(INPUT_POST, 'username');
            $password =  (string)filter_input(INPUT_POST, 'password');

            try {
                $user->login($username, $password);    
            } catch(Exception $e) {
                echo $e->getMessage();
            }
            
            header('location: .');
            break;
            
        case 'logout':
            session_destroy();
            header ('location: ..');
            break;
        
        case 'add-skill-form':
            include 'admin-views/add-skill.php';
            break;
            
        case 'add-skill':
            $name = (string)filter_input(INPUT_POST, 'name');
            $rating = filter_input(INPUT_POST, 'rating');
            $displayType = (string)filter_input(INPUT_POST, 'displayType');

            try {
                $skill->insertSkill($name, $rating, $displayType);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            
            header ('location: ..');
            break;
        
    }
    
?>