class User extends Db_connection {
    protected $link;
    protected $db;

    // make a database connection on request class user
    public function __construct()
    {
        $db = new Db_connection;
        // transfer db connection to variable link
        $this->link = $db->connect();
        return $this->link;
    }



    // create user function using pdo
    // public function createUser($username, $email, $password) {
    //     $sql = $this->link->prepare("INSERT INTO `user`(`username`, `email`, `password`) VALUES (:username, :email, :password)");
    //     $sql->execute(array('username' => $username, 'email' => $email, 'password' => md5($password)));
    //     // loop through $_POST variables to delete them after use 
    //     // foreach ($_POST as $key => $value) {
    //     //     $_POST[$key] = NULL;
    //     // }
    // }
    // public function readall() {
    //     $pdo = parent::$pdo;
    //     $stmt = $pdo->prepare("SELECT id,username,email FROM `user` ORDER BY `user`.`id`  ASC");
    //     $stmt->execute();
    //     $results = $stmt->fetchAll();
    //     return $results;
    // }
}