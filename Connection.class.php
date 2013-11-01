<?php
class Connection {
	private $dsn = "mysql:dbname=RDAFNQTS;host=localhost";
	private $username = "root";
	private $password = "lilac";
	private $options = null;  
    protected static $instance; 

	//connection to the database
	protected function __construct() 
    { 
        if(!isset(self::$instance)) 
        { 
            try 
            { 
                self::$instance = new PDO($this->dsn, $this->username, $this->password, $this->options); 
            } 
            catch(PDOException $e) 
            { 
                echo 'Connection failed: ' . $this->e->getMessage(); 
            } 
        } 
        return self::$instance; 
    } 
     
    /** 
     * To avoid copies 
     */ 
    protected function __clone(){} 	
	
	public function beginTransaction() 
    { 
        return self::$instance->beginTransaction(); 
    } 
     
    public function commit() 
    { 
        return self::$instance->commit(); 
    } 
     
    public function exec($query) 
    { 
        return self::$instance->exec($query); 
    } 
     
    public function rollBack() 
    { 
        return self::$instance->rollBack(); 
    } 
     
    public function query($query) 
    { 
        return self::$instance->query($query); 
    } 
     
    public function lastInsertId($seqname) 
    { 
        return self::$instance->lastInsertId($seqname); 
    } 
}
?>
