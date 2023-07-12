
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <?php 
        require_once('../CRUD/config_DB.php');
           
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $id = $_GET['id'];
    
            $stmt = $connection->prepare("SELECT * FROM users WHERE id = :id");
            $stmt->bindParam("id",$id);
            $stmt->execute();
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($record) {
                
            ?>
        <form method="POST" action="edit.php">
            <input type="hidden" name="id" value="<?php echo $record['id']; ?> ">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control" value=" <?php echo $record['firstname'];?>" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lastname" class="form-control" value=" <?php echo $record['lastname'];?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value=" <?php echo $record['email'];?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
        <?php 
            }else{
                echo "User not found.";
            }
        
        }elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $id = $_POST['id'];
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $email = $_POST['email'];
                
                    $stmt = $connection->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname , email=:email WHERE id = :id");
                    $stmt->bindParam(':firstname', $firstname);
                    $stmt->bindParam(':lastname', $lastname);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();
                        // Record updated successfully
                        header('Location: index.php'); 
            }
        
            ?>
    </div>
</body>
</html>