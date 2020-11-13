<?php 

class Db_connection {
    // declare vars
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db = 'db';
    protected $conn;
    protected static $pdo;


    // protected function connect(){
    //     $this->conn = new mysqli($this->host,$this->user, $this->password,$this->db);

    //     if($this->conn->connect_error) {
    //         die("Connection failed");
    //     }
    //     return $this->conn;
    // }
    public function connection(){
        if(!isset(self::$pdo)) {

            try{
                $dsn = 'mysql:dbname='.$this->db .';host='. $this->host;
                self::$pdo = new PDO ($dsn, $this->user, $this->password);

            }catch(PDOException $e){
                echo "Conection Failed............".$e->getMessage();
            }
        }
        return self::$pdo;
    }
}   