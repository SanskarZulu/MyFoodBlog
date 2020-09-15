
<?php
class database
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    
    public $conn;

    public function __construct() {
        $this->host = 'localhost';
        $this->dbname = 'feedback_formdb';
        $this->username = 'sans';
        $this->password = 'vidhu16vidhu';
    }

    public function Connect(){
    
        $this->conn=mysqli_connect($this->host,$this->username,$this->password,$this->dbname);
        if(mysqli_connect_error()){
            echo "error connecting to database";
        }
        else{
            return $this->conn; 
        }
         
    }
}

?>