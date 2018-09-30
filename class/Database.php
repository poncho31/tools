<?php 

class Database
{
    /**
     * summary
     */
    protected $config;
    protected $db;
    public function __construct($dbName = 'lexique')
    {
        
        $this->getINIConfig();
        if (!$this->db) 
        {
        	try {
                $this->config['dbname'] = $dbName;
    	        $this->db = new PDO("mysql:dbname=".$this->config['dbname'].";host=".$this->config['host'].";charset=utf8", $this->config['login'], $this->config['pswd']);
    			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        		
        	} catch (PDOException $e) {
                //CLASS ERROR
        		die('<span style="color:white">Erreur :  : ' . $e->getMessage()) . '</span>';
        	}
        }
        $this->db;
    }

    public function getQuery($sql, $param = false){
        if ($param) {
            $stmt = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY)); //ATTR_CURSOR is the default attribute
            $stmt->execute($param);
        }
        else{
            $stmt = $this->db->query($sql);
        }
        return $stmt;
    }

    private function saveDB(){

    }

    private function getINIConfig(){
        $iniArrayDB = parse_ini_file('config.ini', true);
        $this->config = $iniArrayDB['database'];
        return $this->config;
    }
}