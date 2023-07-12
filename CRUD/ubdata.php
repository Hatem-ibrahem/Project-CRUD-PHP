<?php
   require_once('../CRUD/config_DB.php');
  
 
?>


<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit page</title>
</head>
<body>
    <div class="container">
        <h2>Edit Data</h2>
        <?php
        if($_SERVER['REQUEST_METHOD']==="GET"){
        $ID=$_GET['id'];
        $edit=$connection->prepare("SELECT * FROM users WHERE id=:id");
        $edit->bindParam("id",$ID);
        $edit->execute();
        $obj= $edit->fetchAll(PDO::FETCH_OBJ);
        }
        ?>
        <form method="POST">
        <input type="hidden" name="id" value="<?php echo $obj->id; ?>">
        firstname:<input  type="text" name="firstname" value="<?= $obj->firstname ?>" class="form-control"/><br>

        lastname:<input type="text" name="lastname" value="<?= $obj->lastname ?>" class="form-control"/><br>

        email:<input  type="email" name="email" value="<?= $obj->email ?>" class="form-control"/><br>

        <button class="btn btn-secondary" type="submit" name ="Edit">Edit</button>
    </form>
    </div>
    
</body>
</html>