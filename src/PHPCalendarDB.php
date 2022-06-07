<?php

namespace AnySlehider\PHPCalendar;

use PDO;

class PHPCalendarDB{

    protected $host;
    protected $user;
    protected $password;
    protected $database;

    public function __construct($host, $user, $password, $database){
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->initDatabase();
    }

    public function pdo(){
        $pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->user, $this->password);
        return $pdo;
    }

    public function initDatabase(){
        $pdo = $this->pdo();
        $pdo->query('CREATE TABLE IF NOT EXISTS events_anycal (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            event_name VARCHAR(150) NOT NULL,
            event_date DATE NOT NULL
        )');
    }
}
?>