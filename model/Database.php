<?php 

class Database {

    private $host = "localhost";
    private $dbName = "blogdb";
    private $username = "root";
    private $password = "root";

    public function connect(){

        // Using mysqli_connect
        // $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbName);
        // if (!$this->conn){
        //     echo "Database not connected";
        // } else {
        //     echo "Database Connected!";
        // }

        // Using PDO
        $db = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username, $this->password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (!$db){
            echo "Database not conected";
        } 
        return $db;
    }

    public function demoDisplay(){
        return "Yay";
    }

    public function getArticle($lang_id){
        $sql = "SELECT * FROM article WHERE lang_id = $lang_id";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetch();
    }

}
