
<?php
   require_once('../CRUD/config_DB.php');
    if($_SERVER['REQUEST_METHOD']==="POST"){

        $checkemail = $_POST['email'];

        $check=$connection->prepare("SELECT * FROM users WHERE email = :email" );

        $check->bindParam("email",$checkemail);

        $check->execute();

        if($check->rowCount()>0){
            echo '<div class="alert alert-danger" role="alert">
            This email already exists
          </div>';
        }else{
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
           
    
            $insert_db=$connection->prepare("INSERT INTO users (firstname , lastname , email, password ) 
            VALUE (:firstname , :lastname , :email, :password  )");
            $insert_db->bindParam("firstname",$firstname);
            $insert_db->bindParam("lastname",$lastname);
            $insert_db->bindParam("email",$email);
            $insert_db->bindParam("password",$password);
            
    
           if( $insert_db->execute()){
                header("Location:index.php");
           }else{
            echo "Error".$insert_db->errorInfo()[2] ;
           }

        }

       
    }

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<div class="container">
     <!-- Create -->
     <h2>Create User</h2>
        <form method="POST">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="firstname" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lastname" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="create" class="btn btn-primary">Create</button>
        </form>
</div>