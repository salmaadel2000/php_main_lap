<?php
class db{
    private $host="localhost";
    private $dbname="os44";
    private $user="root";
    private $pass="salma77";
    private $connection=null;
    
    function __construct(){
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    }
    
    function get_connection(){
        return $this->connection;
    }
    
    function get_data($tablename){
        return $this->connection->query("SELECT * FROM $tablename");  
    }
    
    function del_data($tablename, $id){
        return $this->connection->query("DELETE FROM $tablename WHERE studentid=$id");
    }
    
    function update_data($tablename, $id, $fname, $lname, $pass, $img = null){
        if ($img !== null) {
            return $this->connection->query("UPDATE $tablename SET first_name = '$fname', last_name = '$lname', pass='$pass', img='$img' WHERE studentid = $id");
        } else {
            return $this->connection->query("UPDATE $tablename SET first_name = '$fname', last_name = '$lname', pass='$pass' WHERE studentid = $id");
        }
    }
    function insert_data($tableName, $columns, $values){
        $columnsStr = implode(', ', $columns);
        $valuesStr = implode(', ', $values);
        return $this->connection->query("INSERT INTO $tableName ($columnsStr) VALUES ($valuesStr)");
    }
}
?>

