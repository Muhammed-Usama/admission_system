<?php 
include("init.php");
$main="all";
if(isset($_GET['main'])){
  $main=$_GET['main'];
}
if($main=="all"){ 
?>
        <div class="container">
          <div class="row">
            <div class="col-md-10 m-auto">
            <form action="?main=search" method="POST">
              <label>الكليه</label>
              <select name="faculty" class="form-control md-3">
                <option value="0"> الكليه المراد اظهارها</option>
                <?php 
                  $statment=$connect->prepare("SELECT * FROM  `faculty`");
                  $statment->execute();
                  $usercount=$statment->rowcount();
                  $result=$statment->fetchAll();
                  foreach($result as $row){
                    echo '<option value="'.$row['FacultyID'].'">'.$row['FacultyName'].'</option>';
                  }
                ?>
                
             </select>
              <label>الرغبه</label>
              <select name="desire" class="form-control md-3">

                <option value="0"> الرغبه المراد اظهارها</option>
                <option value="1">الرغبه الأولي</option>
                <option value="2">الرغبه التانيه</option>
                <option value="3">الرغبه الثالثه</option>
                <option value="4">الرغبه الرابعه</option>
                <option value="5">الرغبه الخامسه</option>
             </select>
              <input type="submit" class="btn btn-danger btn-block mt-3" value="أظهار">
            </form>

            </div>
          </div>
        </div> 
 <?php }elseif($main=="search"){
  if($_SERVER['REQUEST_METHOD']=="POST"){
    $desire=$_POST['desire'];
    $faculty=$_POST['faculty'];
    if($desire!=1){
    $num_desider = "Decider" . $desire . "_NMU_id";
    $name_desider = "Decider" . $desire . "_NMU_name";
    $x="decider".$desire."_nmu";
    $statment=$connect->prepare("SELECT * FROM student_information 
          INNER JOIN gander ON student_information.gender_id = gander.gender_id
          INNER JOIN governorate ON student_information.Governorate_id = governorate.Governorate_id
          INNER JOIN high_school ON student_information.high_school_id = high_school.high_school_id
          INNER JOIN currently_registered ON student_information.currently_registered_id = currently_registered.currently_registered_id 
          INNER JOIN division ON student_information.Division_id = division.Division_id
          INNER JOIN $x ON student_information.$num_desider = $x.$num_desider WHERE $x.faculty_id = ?");
          $statment->execute(array($faculty));
          $usercount=$statment->rowcount();
          $result=$statment->fetchAll();?>
          <div class="d-flex justify-content-center align-items-center">
          <h3 class="my-3 text-center">Table Of Students:<?php  echo $usercount?></h3>
          </div>
          <table class="table table-dark text-center">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Desire</th>
          <th>operation</th>
        </tr>
        </thead>
        <tbody>
          <?php
          foreach($result as $row){
          ?>
        <tr>
          <td><?php echo $row['student_id']?> </td>
          <td><?php echo $row['english_name']?></td>
          <td><?php echo $row['student_mail']?></td>
          <td><?php echo $row['student_phone']?></td>
          <td><?php echo $row[$name_desider]?></td>
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
        }}elseif($desire==1){
          $statment=$connect->prepare("SELECT * FROM student_information 
          INNER JOIN gander ON student_information.gender_id = gander.gender_id
          INNER JOIN governorate ON student_information.Governorate_id = governorate.Governorate_id
          INNER JOIN high_school ON student_information.high_school_id = high_school.high_school_id
          INNER JOIN currently_registered ON student_information.currently_registered_id = currently_registered.currently_registered_id 
          INNER JOIN division ON student_information.Division_id = division.Division_id
          INNER JOIN decider_nmu ON student_information.Decider1_NMU_id = decider_nmu.Decider_NMU_id WHERE decider_nmu.faculty_id = ?");
          $statment->execute(array($faculty));
          $usercount=$statment->rowcount();
          $result=$statment->fetchAll();?>

          <div class="d-flex justify-content-center align-items-center">
          <h3 class="my-3 text-center">Table Of Students:<?php  echo $usercount?></h3>
          </div>
          <table class="table table-dark text-center">
        <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Desire</th>
          <th>operation</th>
        </tr>
        </thead>
        <tbody>
          <?php
          foreach($result as $row){
          ?>
        <tr>
          <td><?php echo $row['student_id']?> </td>
          <td><?php echo $row['english_name']?></td>
          <td><?php echo $row['student_mail']?></td>
          <td><?php echo $row['student_phone']?></td>
          <td><?php echo $row["Decider_NMU_name"]?></td>
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
          <?php }}}}
          ?>