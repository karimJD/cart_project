<?php


	class dbconnect
	{
		private $servername = "localhost";
	 	private $username = "root";
	    private $password = "";
	    public  $db;
	    private $dbname='resto';
   
    public function connect() {
    	$this->db=null;
		try {
		    $this->db = new PDO('mysql:host='.$this->servername.';dbname='.$this->dbname, $this->username, $this->password);
		    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    echo "Connected successfully";
		}catch(PDOException $e){
		    echo "Connection failed: " . $e->getMessage();
		}
		return $this->db;
	}
}

?>