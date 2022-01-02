<?php

class database {

    private $conn;
    private $host;
    private $user;
    private $password;
    private $baseName;

    function __construct() {

        $this->host = 'localhost';//hostname
        $this->user = 'root';//username
        $this->password = '';//password
        $this->baseName = 'newsportal2021';//database name!!!!
        $this->connect();//метод - функция соединение с БД
    }

    function __destruct() {
        $this->disconnect();// метод - функция разрыв соединения
    }

    function connect() {
        try {
            $this->conn = new PDO(
                    'mysql:host='.$this->host.''
                    .';dbname='.$this->baseName.'',
                    $this->user, 
                    $this->password, 
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        } catch (Exception $e) {
            die('Connection failed : '.$e->getMessage());
        }

        return $this->conn;
    }

    function disconnect() {
        if ($this->conn) {
            $this->conn = null;
        }
    }
	//запрос получение одной записи по условию
    function getOne($query) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $response = $stmt->fetch();
        return $response;
    }
	// запрос получение списка - массив записей
    function getAll($query) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $response = $stmt->fetchAll();
        return $response;
    }
	//запросы действия INSERT, UPDATE, DELETE
    function executeRun($query) {
        $response = $this->conn->exec($query);
        return $response;
    }
	//получение id последней добавленной записи
    function getLastId() {
        $lastId = $this->conn->lastInsertId();
        return $lastId;
    }
}//end class

?>