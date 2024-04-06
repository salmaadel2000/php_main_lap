<?php 
require("db.php");
$studentid = $_POST['studentid'];
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$pass = $_POST['pass'];
$db=new db();
try {
    $db->update_data("emp",$studentid,$fname,$lname,$pass);
    header('Location: form.php');
} catch (Exception $e) {
    var_dump($e->getMessage());
}

// header('Location: form.php');
?>
