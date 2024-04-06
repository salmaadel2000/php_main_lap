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

<ul>
    <?php
    $id = $_GET['id'];
    $connection = new mysqli("localhost", "root", "salma77", "os44");
    $data = $connection->query("SELECT * FROM emp WHERE studentid=$id");
    $result = $data->fetch_all(MYSQLI_ASSOC);
    foreach ($result as $val) {
        foreach ($val as $key => $value) {
            echo "<li>$key: $value</li>";
        }
    }
    $connection->close();
    ?>
</ul>

</body>
</html>
