<?php
    require_once ('gateway.php');
    
    class Skill {
        
        public function __construct() {
            $this->gateway = Gateway::getInstance();
        }   
        
        public function getSkills($displayType) {
            if ($displayType == 'bubble') {
                $sql = 'CALL get_skill_bubbles';
            } else if ($displayType == 'bar') {
                $sql = 'CALL get_skill_bars';
            } else {
                throw new Exception ('Invalid display type');
            }
            
            try {
                $result = $this->gateway->bindParams($sql, func_get_args());
            } catch (Exception $e) {
                echo $e->getMessage;
            }
            
            return $result;
        }
        
        public function getSkill($id) {
            $sql = 'SELECT * FROM skills WHERE id = :id';
            
            try {
                $result = $this->gateway->bindParams($sql, func_get_args());
            } catch (Exception $e) {
                echo $e->getMessage;
            }
            
            return $result;
        }
        
        public function insertSkill($name, $rating, $displayType) {
            $sql = 'CALL add_skill(:name, :rating, :displayType)';
            
            try {
                $result = $this->gateway->bindParams($sql, func_get_args());
            } catch (Exception $e) {
                echo $e->getMessage;
            }
        }
        
        public function updateSkill($id, $name, $rating, $displayType) {
            $sql = 'CALL edit_skill(:id, :name, :rating, :displayType)';
            
            try {
                $result = $this->gateway->bindParams($sql, func_get_args());
            } catch (Exception $e) {
                echo $e->getMessage;
            }
        }
        
        public function deleteSkill($id) {
            $sql = 'DELETE FROM skills WHERE id = :id';
            
            try {
                $result = $this->gateway->bindParams($sql, func_get_args());
            } catch (Exception $e) {
                echo $e->getMessage;
            }
        }
        
    }

?>