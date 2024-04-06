<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .frist{
            width:100%;
        }
    </style>
    <?php
    echo "<h2> Welcome Back , ".$_COOKIE['first_name']."</h2>" ;
    ?>
</head>
<body>

<table>
    <tr class="frist" >
        <th>id</th>
        <th>frist name</th>
        <th>last name</th>
        <th>pass</th>
        <th>img</th>
        <th>Email</th>
    </tr>
    <?php
    require("db.php");
    $db=new db();
    $result = $db->get_data("emp");
    $data = $result->fetch_all(MYSQLI_ASSOC);
    foreach ($data as $key=>$row){
        echo "<tr>";
        foreach ($row as $key=>$val) {
            echo "<td>{$val}</td>";
            if($key == "img"){
                echo"<td>"."<img src='./img/$val' width='50' height='50'>"."</td>";
            }
        }
    
        echo "<td> <a href='view.php?id={$row['studentid']}'> view</a> </td>";
        echo "<td> <a href='edit.php?id={$row['studentid']}'>edit</a> </td>";
        echo "<td> <a href='delete.php?id={$row['studentid']}'>delete</a> </td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
