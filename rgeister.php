<?php
$errors = [];
if (isset($_GET['errors'])) {
    $errors = json_decode($_GET['errors'], true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simple Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    
    .container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    h2 {
        text-align: center;
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }
    
    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    
    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<div class="container">
        <!-- Your form -->
        <form action="controller.php" method="post" enctype='multipart/form-data'>
            <div class="form-group">
                <label for="studentid">id:</label>
                <input type="text" id="studentid" name="studentid" required>
                <?php if(isset($errors['studentid'])): ?>
                    <span class="error"><?php echo $errors['studentid']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="first_name">first:</label>
                <input type="text" id="first_name" name="first_name" required>
                <?php if(isset($errors['first_name'])): ?>
                    <span class="error"><?php echo $errors['first_name']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="last_name">last:</label>
                <input type="text" id="last_name" name="last_name" required>
                <?php if(isset($errors['last_name'])): ?>
                    <span class="error"><?php echo $errors['last_name']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" id="email" name="email" required>
                <?php if(isset($errors['email'])): ?>
                    <span class="error"><?php echo $errors['email']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="pass">pass:</label>
                <input type="text" id="pass" name="pass" required>
                <?php if(isset($errors['pass'])): ?>
                    <span class="error"><?php echo $errors['pass']; ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="img">your img:</label>
                <input type="file" id="img" name="img" />
                </div>
            <input type="submit" value="Submit" name="register">
        </form>
    </div>

</body>

</html>

