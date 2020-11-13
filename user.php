<?php 
// include db_connection class
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once 'db_connection.php';
class User extends Db_connection {
    protected $link;
    protected $db;

    // make a database connection on request class user
    public function __construct()
    {
        $db = new Db_connection;
        // transfer db connection to variable link
        $this->link = $db->connection();
        return $this->link;
    }


    // create user function using pdo
    public function createUser($username, $email, $password) {
        $sql = $this->link->prepare("INSERT INTO `user`(`username`, `email`, `password`) VALUES (:username, :email, :password)");
        $sql->execute(array('username' => $username, 'email' => $email, 'password' => md5($password)));
    }
    public function readall() {
        $pdo = parent::$pdo;
        $stmt = $pdo->prepare("SELECT id,username,email FROM `user`");
        $stmt->execute();
        $count = $stmt->rowCount();
        $results = $stmt->fetchAll();
        $valueperresult= [1,2,3];
        $i = 0;
        $rowcount = 0;
        $num = $results->num_rows;
        if($num >0){
            $users_arr= array();

            while($row = $results->fetch_assoc()){
                extract($row);

                $users_data=array(
                    "id" => $id,
                    'username'=> $naam,
                    'email'=> $email
                );
                array_push($users_arr, $users_data);
            }
            http_response_code(200);
        }


        foreach($results as $a){
            if($count < $rowcount){
                array_push($valueperresult, $i);
            } else {
                foreach($valueperresult as $count){
                    if($count < $rowcount) {
                        exit;
                    }
                    echo '<tr>';
                    // foreach($results as $result){
                    //     if($i > 1){
                    //         $i = 0;
                    //     }
                    //     echo '<td>'. $result[$i] . '<td>';
                    //     var_dump($result);
                    //     $i++;
                    // }
                    foreach($results as $result){                                       
                        
                        if($i > 2){
                            $i = 0;
                            echo '</tr>';
                            echo '<tr>';
                        }
                        echo '<td>' . $result[$i] . '</td>';
                        $i++;
                    }
                    echo '</tr>';
                }
                $rowcount = count($valueperresult);
            }
        }
    }
    
}
