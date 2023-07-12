<?php
      require_once('../CRUD/config_DB.php');

      //read operation
      $slect=$connection->prepare("SELECT * FROM users ");
      $slect->execute();
      $Result = $slect->fetchAll(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOC --> type array
                                                     //PDO::FETCH_OBJ --> type object
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Operations </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="container">
        <h1>CRUD Operations </h1>
        <a class="btn btn-primary" href="creat.php" role="button"> Add New Contact</a>
   

        <!-- Read -->
        <h2>Users</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Result as $row): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>