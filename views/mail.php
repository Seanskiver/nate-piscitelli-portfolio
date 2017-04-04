<?php 
    // Get action
    $action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';   
    
    switch ($action) {
        case 'mail':
            // if (!filter_input(INPUT_POST, "name", FILTER_VALIDATE_EMAIL)) {
            //     http_response_code(405);
            // } else {
            //     echo $_REQUEST['name'];
            // }      
            echo $_REQUEST['name'];
            break;
            
        case '': 
            break;
    }

?>