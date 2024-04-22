<?php

class DB
{
    //Class instance defined 
    private static $instance = null;

    //Database Credentials 
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $portnumber;

    private $pdo;

    //Constructor with default parameters
    public function __construct($host = "localhost", $username = "u832343216_iahmedwael", $password = "2x-2x=4X", $dbname = "u832343216_course_catalog", $portnumber = "3306")
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->portnumber = $portnumber;

        //Initialize and call connection of PDO database
        $this->connect();
    }

    //Connection to data
    public function connect()
    {
        //Data source variable 
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};port={$this->portnumber}";

        try {
            //initialize database connection
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            //if error in connection, catch the error and display it
            echo "Connection failed" . $e->getMessage();
            die();
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(){
        return $this->pdo;
    }
}
