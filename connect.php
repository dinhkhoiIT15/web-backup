<?php
class Connect
{
    public $server;
    public $dbName;
    public $username;
    public $password;

    public function __construct()
    {
        $this->server = 'localhost';
        $this->dbName = 'atn_shop';
        $this->username = 'root';
        $this->password = '';
    }

    //Option 1: mySQL
    function connectToMySQL(): mysqli
    {
        $conn = new mysqli(
            $this->server,
            $this->username, $this->password, $this->dbName
        );

        if ($conn->connect_error) {
            die("Failed " . $conn->connect_error);
        } else {
            //echo "Connect!";
        }
        return $conn;
    }

    //Option 2: PDO
    function connectToPDO(): PDO
    {
        try {
            $conn = new PDO("mysql:host=$this->server;dbname=$this->dbName", $this->username, $this->password);
            //echo "Connect! PDO";
        } catch (PDOException $e) {
            die("Failed " . $e);
        }
        return $conn;
    }
}
?>