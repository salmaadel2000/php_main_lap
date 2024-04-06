<?php
require("db.php");

if (isset($_POST['register'])) {
    try {
        $pass = validate_data($_POST['pass']);
        $studentid = validate_data($_POST['studentid']);
        $first_name = validate_data($_POST['first_name']);
        $last_name = validate_data($_POST['last_name']);
        $email = validate_data($_POST['email']);
        $img = $_FILES['img']['name'];

        $errors = []; 

        if (strlen($first_name) < 2 || empty($first_name)) {
            $errors["first_name"] = "First name must be at least 2 characters long";
        }
        if (strlen($last_name) < 2 || empty($last_name)) {
            $errors["last_name"] = "Last name must be at least 2 characters long"; 
        }
        if (strlen($pass) < 2 || empty($pass)) {
            $errors["pass"] = "Password must be at least 2 characters long"; 
        }
        if (strlen($studentid) < 1 || empty($studentid)) {
            $errors["studentid"] = "ID must be at least 1 character long"; 
        }

        if (count($errors) > 0) {
            header("Location: rgeister.php?errors=" . urlencode(json_encode($errors)));
            exit(); 
        } else {
            $db = new db();
            $result = $db->insert_data('emp', ['first_name', 'last_name', 'pass', 'studentid','img','email'], ["'$first_name'", "'$last_name'", "'$pass'", "'$studentid'","'$img'","'$email'"]);
            echo "Registration successful!";
            header("Location: form.php");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} elseif (isset($_POST['login'])) {
    try {
        $db = new db();
        $stm = $db->get_connection()->prepare("SELECT * FROM emp WHERE email=? AND pass=?");
        $stm->bind_param("ss", $_POST['email'], $_POST['password']);
        $stm->execute();
        
        $result = $stm->get_result()->fetch_assoc();
        if ($result) {
            var_dump($result);
            setcookie("first_name", $result['first_name']);
            setcookie("last_name", $result['last_name']);
            setcookie("pass", $result['pass']);
            setcookie("studentid", $result['studentid']);
            header("Location: form.php");
        } else {
            header("Location: login.php?error=1");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function validate_data($data) {
    $data = trim($data);
    $data = addslashes($data); 
    $data = htmlspecialchars($data);
    return $data;
}
?>
