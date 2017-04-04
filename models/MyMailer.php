<?php 
    require ($_SERVER['DOCUMENT_ROOT'].'/models/PHPMailer/PHPMailerAutoload.php');
    
    // class MyMailer {
    //     public function __construct() {
    //         // Load email configuration file
    //         $this->conf = $_SERVER['DOCUMENT_ROOT'].'/conf/mail.ini';
    //         $this->conf = parse_ini_file($this->conf);
            
    //         // New instance of Mailer
    //         $this->mailer = new PHPMailer;
            
    //         // Setup Mailer with config options
    //         $this->mailer->isSMTP();
    //         $this->mailer->SMTPAuth   = $this->conf['smtpAuth'];
    //         $this->mailer->Host       = $this->conf['host'];
    //         $this->mailer->Port       = $this->conf['port'];
    //         $this->mailer->Username   = $this->conf['username'];
    //         $this->mailer->Password   = $this->conf['password'];
    //         $this->mailer->SMTPSecure = $this->conf['smtpSecure'];
    //         $this->mailer->isHTML     = $this->conf['isHTML'];
    //     }
        
    //     // For sending email
    //     public function sendMail($first, $last, $messsage, $returnAddress) {
    //         $subject = 'Message from Portfolio';
            
    //         $body = "From: $first $last";
    //         $body .= "Email: $returnAddress";
    //         $body .= "<br><br>";
            
    //         $body .= "<p>";
    //         $body .= nl2br($message);
    //         $body .= "</p>";
            
    //         $this->mailer->setFrom($this->conf['username']);
    //         $this->mailer->addAddress($this->conf['sendTo']);
    //         $this->mailer->Subject = $subject;
    //         $this->mailer->Body = $body;
            
    //         if (!$this->mailer->send()) {
    //             echo $this->mailer->ErrorInfo;
    //             //throw new Exception($this->mailer->ErrorInfo);
    //         } else {
    //             return true;
    //         }
    //     }
    // }
    

    // $mail = new PHPMailer;
    
    // $mail->isSMTP();                                      // Set mailer to use SMTP
    // $mail->Host = 'smtp.zoho.com';  // Specify main and backup SMTP servers
    // $mail->SMTPAuth = true;                               // Enable SMTP authentication
    // $mail->Username = "natepiscitelli@natepiscitelli.me";                 // SMTP username
    // $mail->Password = "Canada!!1";                           // SMTP password
    // $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    // $mail->Port = 465;  
    
    // $mail->setFrom("natepiscitelli@natepiscitelli.me");
    // $mail->addAddress("natepiscitelli@natepiscitelli.me");
    // $mail->Subject = 'Test';
    // $mail->Body = 'THis is my message';
    
    
    // if(!$mail->send()) {
    //     echo 'Message could not be sent.';
    //     echo 'Mailer Error: ' . $mail->ErrorInfo;
    // } else {
    //     echo 'Message has been sent';
    // }    
    


   error_reporting(E_ALL);
   ini_set('display_errors', 'On');

   $mail = new PHPMailer;

   $mail->Body = 'this is a test';

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
      echo 'Message has been sent';
   }



?>
