<?php
include('./init.php');

$q1= $connect->prepare("SELECT * FROM `student_information` WHERE high_school_id=1");
$q1->execute();
$cer1=$q1->rowcount();

$q2= $connect->prepare("SELECT * FROM `student_information` WHERE high_school_id=2");
$q2->execute();
$cer2=$q2->rowcount();

$q3= $connect->prepare("SELECT * FROM `student_information` WHERE high_school_id=3");
$q3->execute();
$cer3=$q3->rowcount();
$page="all";
if(isset($_GET['page'])){
  $page=$_GET['page'];
}
if($page=="all"){
?>
<div class="container mt-5  pr-9">
  <div class="row">
    <div class="col-md-3 text-center">
      <div class="box ">
        <i class="fa-solid fa-user fa-2xl"></i>
        <h3 class="my-3">الثانوية العامة</h3>
        <h6><?php echo $cer1; ?></h6>
        <a href="?page=cer1" class="btn btn-success">Show</a>
      </div>
    </div>
    <div class="col-md-3 text-center">
      <div class="box ">
        <i class="fa-solid fa-magnifying-glass fa-2xl"></i>
        <h3 class="my-3">الثانوية الازهرية</h3>
        <!-- <h6>is static</h6> -->
        <h6><?php echo $cer2;?></h6>
        <a href="?page=cer2" class="btn btn-primary">Show</a>
      </div>
    </div>
    <div class="col-md-3 text-center">
      <div class="box ">
        <i class="fa-solid fa-address-card fa-2xl"></i> 
        <h3 class="my-3">STEM</h3>
        <h6><?php echo $cer3;?></h6>
        <a href="?page=cer3" class="btn btn-warning">Show</a>
      </div>
    </div>
    </div>
  </div>
 </div>


<?php
}elseif($page=='cer1'){
  ?>
  <div class="container mt-5 pt-5">
    <div class="row">
      <div class="col-md-10 m -auto">
  
      <table class="table table-dark text-center mt-10">
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
          INNER JOIN decider5_nmu ON student_information.Decider5_NMU_id = decider5_nmu.Decider5_NMU_id WHERE student_information.high_school_id=1");
          $statment->execute();
          $usercount=$statment->rowcount();
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
        <?php }?>



        </tbody>



      </table>

    </div>
  </div>
  </div>
  
  
  
  <?php
}elseif($page=='cer2'){
  ?>
  <div class="container mt-5 pt-5">
    <div class="row">
      <div class="col-md-10 m -auto">
  
      <table class="table table-dark text-center mt-10">
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
          INNER JOIN decider5_nmu ON student_information.Decider5_NMU_id = decider5_nmu.Decider5_NMU_id WHERE student_information.high_school_id=2");
          $statment->execute();
          $usercount=$statment->rowcount();
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
        <?php }?>



        </tbody>



      </table>

    </div>
  </div>
  </div>
  
  
  
  <?php
}elseif($page=='cer3'){
  ?>
  <div class="container mt-5 pt-5">
    <div class="row">
      <div class="col-md-10 m -auto">
  
      <table class="table table-dark text-center mt-10">
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
          INNER JOIN decider5_nmu ON student_information.Decider5_NMU_id = decider5_nmu.Decider5_NMU_id WHERE student_information.high_school_id=3");
          $statment->execute();
          $usercount=$statment->rowcount();
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
        <?php }?>



        </tbody>



      </table>

    </div>
  </div>
  </div>
  
  
  
  <?php
}

?>

