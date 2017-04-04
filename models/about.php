<?php
    require_once ('gateway.php');
    
    class About {
        public function __construct() {
            $this->gateway = Gateway::getInstance();
        }   
    
        public function getAbout() {
            $sql = 'SELECT * FROM about WHERE id = 1';
            
            
            try {
                $result = $this->gateway->bindParams($sql, func_get_args());
            } catch (Exception $e) {
                echo $e->getMessage;
            }
            
            return $result;
        }
        
        public function editAbout($body) {
            $sql = 'UPDATE about SET about = :body WHERE id = 1';
            
            try {
                $result = $this->gateway->bindParams($sql, func_get_args());
            } catch (Exception $e) {
                echo $e->getMessage;
            }
        }
    }
    

?>