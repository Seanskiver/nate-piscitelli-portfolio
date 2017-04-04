<?php 
session_start();
class Gateway {
    public $dbh;
    private static $instance;
    
    private function __construct() {
        $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/db.ini');
        $connString = 'mysql:'.'host='.$config['host'].';'.'dbname='.$config['db_name'];

        $user = $config['user'];
        $password = $config['pass'];
        
        try {
            $this->dbh = new PDO($connString, $user, $password);    
        } catch (PDOException $e) {
            echo "There was an error connecting to the database. Please check back later.";
        }
    }
    
    public static function getInstance() {
        if (!isset(self::$instance)) {
            $obj = __CLASS__;
            // Instantiate an instance of this class
            self::$instance = new $obj;
        }
        // return instance of self
        return self::$instance;
    }
    
    public function bindParams($sql, $params) {
        $gateway = Gateway::getInstance();
        $stmt = $gateway->dbh->prepare($sql);
        
        preg_match_all('/:[a-zA-Z0-9]*/', $sql, $matches);
        
        $boundParams = Array();
        
        $matches = $matches[0];
        

        for ($i = 0; $i<sizeof($matches);$i++) {
            $boundParams[$matches[$i]] = $params[$i];
            
            if ($matches[$i] == null || $params[$i] == null) {
                throw new Exception('bindParams Error: Array length mismatch');
            }
        }            

    
        foreach ($boundParams as $p => &$v) $stmt->bindParam($p, $v);
        
        try { $stmt->execute(); } 
        catch (PDOException $e) { throw new Exception($e->getMessage()); }
        
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        
        if (!empty($result)) {
            return $result;
        }
    }    
}


?>