<?php 


    // Get action
    $action = (isset($_REQUEST['action'])) ? $_REQUEST['action'] : '';   
    
    switch ($action) {
        case 'mail':
            $first = htmlspecialchars($_POST['first']);
            $last = htmlspecialchars($_REQUEST['last']);
            $message = htmlspecialchars($_REQUEST['message']);
            
            $errors = array();  
            $isError = false;
            
            // validation
            if ($first == null) {
                $errors['first'] = 'Please enter your first name';  
                $isError = true;    
            }
            
            if ($last == null) {
                $errors['last'] = 'Please enter your last name';  
                $isError = true;    
            }       
            
            if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL) || $_REQUEST['email'] == null) {
                $errors['email'] = 'Please enter a valid email address';  
                $isError = true;                    
            } else {
                $email =  $_REQUEST['email'];
            }
            
            if ($message == null) {
                $errors['message'] = 'Please enter your message';
                $isError = true;
            }
            
            if ($isError == true) {
                http_response_code(400);
                echo json_encode($errors);	
            } else {
                
                require($_SERVER['DOCUMENT_ROOT'].'/models/PHPMailer/PHPMailerAutoload.php');

                $body = '';
                $body .= 'From: '.$first.' '.$last."\r\n";
                $body .= 'Email: '. $email;
                $body .= "\r\n";
                $body .= $message;
                
                
                try {
                    $mail = new PHPMailer;
                    
                    $mail->Body = $body;
                    
                    $mail->isSMTP();
                    $mail->SMTPAuth = true;
                    $mail->Host = 'smtp.zoho.com';
                    $mail->Port =  465;
                    
                    $mail->Username = 'natepiscitelli@natepiscitelli.me';
                    $mail->Password = 'Canada!!1';
                    $mail->SMTPSecure = 'ssl';
                    
                    
                    $mail->setFrom('natepiscitelli@natepiscitelli.me');
                    $mail->addAddress('seanskiver@gmail.com');
                    $mail->Subject = 'Test email';
                    
                    if (!$mail->send()) {
                      echo 'Message could not be sent';
                      echo 'Mailer error: <br>' . $mail->ErrorInfo;
                    } else {
                      http_response_code(200);
		      echo 'sucesss';
                    }   
                } catch (Exception $e) {
                    http_response_code(400);    
                    json_encode(
                        array('mailErr'=>'Error sending mail. Please try again later, or mail your message to <b>Piscitna@alfredstate.edu</b>')
                    );
                    echo $e->getMessage;
                }
            }
            
            break;
    }
?>
