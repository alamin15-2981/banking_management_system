<?php
class Database {
    private $host;
    private $dbUserName;
    private $dbUserPassword;
    private $dbName;

    public function __construct(){
        $this->host = "localhost";
        $this->dbUserName = "root";
        $this->dbUserPassword = "";
        $this->dbName = "banking_management_system";
    }

    public function connection(){
        $connect = new mysqli($this->host,$this->dbUserName,$this->dbUserPassword,$this->dbName);
        return $connect;
    }
}
?>