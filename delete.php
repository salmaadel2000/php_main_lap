<?php
require("db.php");
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $db=new db();
     $db-> del_data("emp",$id);
    header('Location: form.php');
    $connection->close();
}
?>
