<?php
class Database{
private $server='localhost';
private $user='root';
private $pass='';
private $dbname='brief6';

private $con;
private $stmt;



public function __construct(){
    $dsn= 'mysql:host='.$this->server.';dbname='.$this->dbname;
    $options=array(
        PDO::ATTR_PERSISTENT=>true,
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, 
    );
    try {
       $this->con=new PDO($dsn,$this->user,$this->pass,$options);
    } catch (PDOException $e) {
        $this->error=$e->getMessage();
        print_r( $e );

    }
}
public function query($query){
    $this->stmt=$this->con->prepare($query);
}
public function bind($param,$value,$type=null){
    if (is_null($type)) {
        switch ($value) {
            case is_int($value):
                $type=PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type=PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type=PDO::PARAM_NULL;      
                break;
            default:
               $type=PDO::PARAM_STR; 
                
        }
    }
    $this->stmt->bindValue($param,$value,$type);
}
public function execute(){
    return $this->stmt->execute();
}
public function getResult(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
}
public function getSingleResult(){
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
}

public function getRowCount(){
  
    return $this->stmt->rowCount();

}


}


?>