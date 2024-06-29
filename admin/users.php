<?php 
session_start();
include('init.php');
$main="all";
$statment=$connect->prepare("SELECT * FROM  `users`");
$statment->execute();
$usercount=$statment->rowcount();
$result=$statment->fetchAll();
if(isset($_GET['main'])){
  $main=$_GET['main'];
}
?>

<div class="container mt-5 pt-5"></div>
  <div class="row">
    <div class="col-md-10 m-auto">
      <?php if(isset($_SESSION['message'])){
        echo "<h4 class='alert alert-success text-center'>".$_SESSION['message']."</h4>";
        unset($_SESSION['message']);
        header("Refresh:3;url=users.php");
        }?>
    
        <?php
        if($main=="all"){
        ?>
            <div class="d-flex justify-content-center align-items-center">
      <h3 class="my-3 text-center"><?php changeh($main,$usercount)?></h3>
      <a href="?main=create" class="btn btn-success ml-3">Add New User</a>
        </div>
      <table class="table table-dark text-center">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Is Admin</th>
          <th>operation</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($result as $row){
          ?>
          
        <tr>
          <td><?php echo $row['id']?> </td>
          <td><?php echo $row['name']?></td>
          <td><?php echo $row['username']?></td>
          <td><?php echo $row['isadmin']?></td>
          <td>
            <a href="?main=show&user_id=<?php echo $row['id']?>" class="btn btn-success">
              <i class="fa-solid fa-eye">
              </i>
            </a>
          </td>

          <td>
            <a href="?main=edit&user_id=<?php echo $row['id']?>" class="btn btn-primary">
              <i class="fa-solid fa-pen-to-square">
              </i>
            </a>
          </td>

          <td>
            <a href="?main=delete&user_id=<?php echo $row['id']?>" class="btn btn-danger">
              <i class="fa-solid fa-trash">
              </i>
            </a>
          </td>
        </tr>
         <?php 
        }
      }else if($main=="show"){
        $user_id=$_GET['user_id'];
        $statment=$connect->prepare("SELECT * FROM `users` WHERE id=?");
        $statment->execute(array($user_id));
        $result=$statment->fetchAll();
        ?>

        <div class="d-flex justify-content-center align-items-center">
      <h3 class="my-3 text-center"><?php changeh($main,$usercount)?></h3>
        </div>
      <table class="table table-dark text-center">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Is Admin</th>
          <th>operation</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach($result as $row){
          ?>
          
          
          <tr>
          <td><?php echo $row['id']?> </td>
          <td><?php echo $row['name']?></td>
          <td><?php echo $row['username']?></td>
          <td><?php echo $row['isadmin']?></td>
          <td>
            <a href="users.php?main=all" class="btn btn-success">
              <i class="fa-solid fa-house"></i>
            </a>
          </td>
          <?php
          
        }
      }elseif($main=="delete"){
        $user_id=$_GET['user_id'];
        $_SESSION['message']="Delete Seccessfully";
        $statment=$connect->prepare("DELETE FROM users WHERE id=?");
        $statment->execute(array($user_id));
        $result=$statment->fetchAll();
        header('location:users.php');
      }elseif($main=="create"){
        ?>
        <div class="container">
          <div class="row">
            <div class="col-md-10 m-auto">
            <form action="?main=save" method="POST">
              <label>ID</label>
              <input type="text" name="id" class="form-control md-3" placeholder="<?php if (isset($_SESSION['id_error'])){ echo $_SESSION['id_error'];}?>">
              <label>User Name</label>
              <input type="text" name="usr" class="form-control md-3" value="<?php if (isset($_SESSION['id_error'])){echo $_SESSION['name_error'] ;}?>">
              <label>Name</label>
              <input type="text" name="name" class="form-control md-3" value="<?php if (isset($_SESSION['id_error'])){echo $_SESSION['email_error'];}?>">
              <label>password</label>
              <input type="password" name="password" class="form-control md-3">
              <label>Role</label>
              <select name="role" class="form-control md-3">
                <option value="0">User</option>
                <option value="1">Admin</option>
             </select>
              <input type="submit" class="btn btn-success btn-block mt-3" value="Create New User">
            </form>

            </div>
          </div>
        </div>  
       
        </tbody>
      </table>

      
    </div>
  </div>
</div>

<?php
      }elseif($main=="save"){
        if($_SERVER['REQUEST_METHOD']=="POST"){
          $id=$_POST['id'];
          $usr=$_POST['usr'];
          $name=$_POST['name'];
          $password=$_POST['password'];
          $isadmin=$_POST['role'];
          $password_hashed = password_hash($password, PASSWORD_BCRYPT);

          try{
          $statment=$connect->prepare("INSERT INTO users (id, username, `name`, `password`, `isadmin`) VALUES (?, ?, ?, ?, ?)");
          $statment->execute(array($id,$usr,$name,$password_hashed,$isadmin));

          $_SESSION['message']="Seccessful Add";
          header("location:users.php");
          $_SESSION['id_error']="";
            $_SESSION['name_error']="";
            $_SESSION['email_error']="";
        }
          catch(PDOException $e){
            // echo $e->getMessage();
            echo "<h3 class='alert alert-danger text-center'>Duplicate Id</h3>";
            $_SESSION['id_error']="Enter anthor ID";
            $_SESSION['name_error']=$usr;
            $_SESSION['email_error']=$name;
            header("Refresh:2;url=users.php?page=create");
          }
        }
      }elseif($main=="edit"){
        $user_id=$_GET['user_id'];
        $statment=$connect->prepare("SELECT * FROM users WHERE id=?");
        $statment->execute(array($user_id));
        $result=$statment->fetch();

        
        ?>
        <div class="container">
          <div class="row">
            <div class="col-md-10 m-auto">
            <form action="?main=update" method="POST">
              <input type="hidden" name="old_id" value="<?php echo $result['id'] ?>"> <!--to send the id -->
              <label>ID</label>
              <input type="text" name="id" class="form-control md-3" value="<?php echo $result['id'] ?>" >
              <label>User Name</label>
              <input type="text" name="usr" class="form-control md-3" value="<?php echo $result['username'] ?>">
              <label>Name</label>
              <input type="text" name="name" class="form-control md-3" value="<?php echo $result['name'] ?>">
            
              <label>Role</label>
              <select name="role" class="form-control md-3">
                <?php 
                if($result['isadmin']=='0'){
                  echo'<option value="0" selected>User</option>';
                  echo'<option value="1">Admin</option>';
                }elseif($result['isadmin']=="1"){
                  echo'<option value="0" >User</option>';
                  echo'<option value="1"selected>Admin</option>';
                }
                ?>
                
                
             </select>
              <input type="submit" class="btn btn-success btn-block mt-3" value="Update">
            </form>

            </div>
          </div>
        </div>
      
      <?php
      
      
      
       }elseif($main=="update"){
        try{
         if($_SERVER['REQUEST_METHOD']=="POST"){
          $old_id=$_POST['old_id'];
          $id=$_POST['id'];
          $usr=$_POST['usr'];
          $name=$_POST['name'];
          $isadmin=$_POST['role'];
          $statement = $connect->prepare("UPDATE users SET id=?, username=?, `name`=?, `isadmin`=? WHERE id=?");
          $statement->execute(array($id,$usr, $name, $isadmin, $old_id));
          $_SESSION['message']="Update Seccessful";
          header("location:users.php");
         }
        }catch(PDOException $e){
            echo $e->getMessage();
            echo "<h3 class='alert alert-danger text-center'>Duplicate Id</h3>";
            header("Refresh:2;url=users.php?main=edit&user_id=$old_id");
         }

      }
 
 ?>




<?php 

function changeh($x,$usercount){
  if($x=="all"){
    echo 'Table Of Users:'.$usercount;
  }else if ($x=="show"){
    echo 'Details Record 1';
  }
}
include('./include/temp/footer.php');

?>