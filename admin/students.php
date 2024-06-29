<?php 
session_start();
include('init.php');
$page="all";
$statment=$connect->prepare("SELECT * FROM student_information 
          INNER JOIN gander ON student_information.gender_id = gander.gender_id
          INNER JOIN governorate ON student_information.Governorate_id = governorate.Governorate_id
          INNER JOIN high_school ON student_information.high_school_id = high_school.high_school_id
          INNER JOIN currently_registered ON student_information.currently_registered_id = currently_registered.currently_registered_id 
          INNER JOIN division ON student_information.Division_id = division.Division_id
          INNER JOIN decider_nmu ON student_information.Decider1_NMU_id = decider_nmu.Decider_NMU_id 
          INNER JOIN decider2_nmu ON student_information.Decider2_NMU_id = decider2_nmu.Decider2_NMU_id 
          INNER JOIN decider3_nmu ON student_information.Decider3_NMU_id = decider3_nmu.Decider3_NMU_id 
          INNER JOIN decider4_nmu ON student_information.Decider4_NMU_id = decider4_nmu.Decider4_NMU_id
          INNER JOIN decider5_nmu ON student_information.Decider5_NMU_id = decider5_nmu.Decider5_NMU_id");
$statment->execute();
$usercount=$statment->rowcount();
$result=$statment->fetchAll();
if(isset($_GET['main'])){
  $page=$_GET['main'];
}
?>

<div class="container mt-5 pt-5"></div>
  <div class="row">
    <div class="col-md-10 m-auto">
      <?php if(isset($_SESSION['message'])){
        echo "<h4 class='alert alert-success text-center'>".$_SESSION['message']."</h4>";
        unset($_SESSION['message']);
        header("Refresh:2;url=students.php");
        }?>
      <h3 class="my-3 text-center"><?php changeh($page,$usercount)?></h3>
      <table class="table table-dark text-center">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Desire1</th>
          <th>Desire2</th>
          <th>Desire3</th>
          <th>Desire4</th>
          <th>Desire5</th>
          <th>operation</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($page=="all"){

        foreach($result as $row){
          ?>
        <tr>
          <td><?php echo $row['student_id']?> </td>
          <td><?php echo $row['english_name']?></td>
          <td><?php echo $row['student_mail']?></td>
          <td><?php echo $row['student_phone']?></td>
          <td><?php echo $row['Decider_NMU_name']?></td>
          <td><?php echo $row['Decider2_NMU_name']?></td>
          <td><?php echo $row['Decider3_NMU_name']?></td>
          <td><?php echo $row['Decider4_NMU_name']?></td>
          <td><?php echo $row['Decider5_NMU_name']?></td>
          <td>
            <a href="?main=show&user_id=<?php echo $row['student_id']?>" class="btn btn-success">
              <i class="fa-solid fa-eye">
              </i>
            </a>
          </td>

          <td>
            <a href="#" class="btn btn-primary">
              <i class="fa-solid fa-pen-to-square">
              </i>
            </a>
          </td>

          <td>
            <a href="?main=delete&user_id=<?php echo $row['student_id']?>" class="btn btn-danger">
              <i class="fa-solid fa-trash">
              </i>
            </a>
          </td>
        </tr>
         <?php 
        }
      }else if($page=="show"){
        $user_id=$_GET['user_id'];
        $statment=$connect->prepare("SELECT * FROM student_information 
          INNER JOIN gander ON student_information.gender_id = gander.gender_id
          INNER JOIN governorate ON student_information.Governorate_id = governorate.Governorate_id
          INNER JOIN high_school ON student_information.high_school_id = high_school.high_school_id
          INNER JOIN currently_registered ON student_information.currently_registered_id = currently_registered.currently_registered_id 
          INNER JOIN division ON student_information.Division_id = division.Division_id
          INNER JOIN decider_nmu ON student_information.Decider1_NMU_id = decider_nmu.Decider_NMU_id 
          INNER JOIN decider2_nmu ON student_information.Decider2_NMU_id = decider2_nmu.Decider2_NMU_id 
          INNER JOIN decider3_nmu ON student_information.Decider3_NMU_id = decider3_nmu.Decider3_NMU_id 
          INNER JOIN decider4_nmu ON student_information.Decider4_NMU_id = decider4_nmu.Decider4_NMU_id
          INNER JOIN decider5_nmu ON student_information.Decider5_NMU_id = decider5_nmu.Decider5_NMU_id WHERE student_id=?");
        $statment->execute(array($user_id));
        $result=$statment->fetchAll();

        foreach($result as $row){
          ?>
          
          
          <tr>
          <td><?php echo $row['student_id']?> </td>
          <td><?php echo $row['english_name']?></td>
          <td><?php echo $row['student_mail']?></td>
          <td><?php echo $row['student_phone']?></td>
          <td><?php echo $row['Decider_NMU_name']?></td>
          <td><?php echo $row['Decider2_NMU_name']?></td>
          <td><?php echo $row['Decider3_NMU_name']?></td>
          <td><?php echo $row['Decider4_NMU_name']?></td>
          <td><?php echo $row['Decider5_NMU_name']?></td>
          <td>
            <a href="students.php" class="btn btn-success">
              <i class="fa-solid fa-house"></i>
            </a>
          </td>
          <?php
          
        }
      }elseif($page=="delete"){
        $user_id=$_GET['user_id'];
        $_SESSION['message']="Delete Seccessfully";
        $statment=$connect->prepare("DELETE FROM student_information WHERE student_id=?");
        $statment->execute(array($user_id));
        $result=$statment->fetchAll();
        header('location:students.php');
      }   
        ?>
        </tbody>
      </table>

      
    </div>
  </div>
</div>




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