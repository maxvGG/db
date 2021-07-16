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
}
