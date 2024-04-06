<!DOCTYPE html>
<html>
<head>
    <style>
        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        li {
            padding: 8px;
            background-color: #f2f2f2;
            margin-bottom: 5px;
        }
        li:nth-child(odd) {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>


    <?php
    $id = $_GET['id'];
    $connection = new mysqli("localhost", "root", "salma77", "os44");
    $data = $connection->query("SELECT * FROM emp WHERE studentid=$id");
    $result = $data->fetch_all(MYSQLI_ASSOC);
    foreach ($result as $val) {
        
    }
    $connection->close();
    ?>

<form  method="POST" action="update.php">
    <label for="studentid">ID:</label>
    <input type="text" id="studentid" name="studentid" value="<?=$val['studentid']?>"><br><br>

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?=$val['first_name']?>"><br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="<?=$val['last_name']?>"><br><br>

    <label for="pass">pass</label>
    <input type="text" id="pass" name="pass" value="<?=$val['pass']?>"><br><br>

     <button >update</button>
</form>

</body>