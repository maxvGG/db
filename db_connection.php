<?php 

class Db_connection {
    // declare vars
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $db = 'db';
    protected $conn;
    protected static $pdo;

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
