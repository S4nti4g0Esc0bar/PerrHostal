<?php
class BD {
    private $servername = "localhost";
    private $username = "hostal";
    private $password = "perro123";
    private $dbname = "perrhostal";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function getConn() {
        return $this->conn;
    }
}
?>
