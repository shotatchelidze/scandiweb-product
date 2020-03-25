<?php
class Database{

    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbName = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $ex) {
            $this->error = $ex->getMessage();
            echo $this->error;
        }
    }

    // Prepare query
    public function query($sql){

        $this->stmt = $this->dbh->prepare($sql);

    }

    // Bind value
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;
                case is_string($value):
                    $type = PDO::PARAM_STR;
                break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break;
                default:
                $type = PDO::PARAM_NULL;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // Execute statement
    public function executeStatement(){
        return $this->stmt->execute();
    }

    // Set as array of object
    public function resultSet(){
        $this->executeStatement();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as object
    public function single(){
        $this->executeStatement();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowsCount(){
        return $this->stmt->rowCount();
    }
    
}