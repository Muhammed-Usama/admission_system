<?php
include("init.php");
$page="all";

function countdesider($x){
  global $connect;
  $column = "Decider" . $x . "_NMU_id";
  $statement = $connect->prepare("SELECT * FROM student_information WHERE $column IS NOT NULL");
  $statement->execute();
  $count = $statement->rowCount();
  return $count;
}

function showdesider($x){ //x->رقم الرغبات
  global $connect;
  if($x==1){
    $statement=$connect->prepare("SELECT * FROM student_information INNER JOIN decider_nmu ON student_information.Decider1_NMU_id = decider_nmu.Decider_NMU_id ");
    $statement->execute();
    $result=$statement->fetchALL();
    foreach($result as $row){
      ?>
      <tr>
          <td><?php echo $row['student_id']?></td>
          <td><?php echo $row['english_name']?></td>
          <td><?php echo $row['student_mail']?></td>
          <td><?php echo $row['student_phone']?></td>
          <td><?php echo $row['Decider_NMU_name']?></td>
           <td> <a href="?page=show&user_id=<?php echo $row['student_id']?>" class="btn btn-success">
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
            <a href="?page=delete&user_id=<?php echo $row['student_id']?>" class="btn btn-danger">
              <i class="fa-solid fa-trash">
              </i>
            </a>
          </td>
        </tr>
      <?php
    }
    }else{
    $column = "decider" . $x . "_nmu";
    $column1 = "Decider" . $x . "_NMU_id";
    $decider= "Decider".$x."_NMU_name";
    $statement=$connect->prepare("SELECT * FROM student_information INNER JOIN $column ON student_information.$column1 = $column.$column1");
    $statement->execute();
    $result=$statement->fetchALL();
    foreach($result as $row){
      ?>
      <tr>
          <td><?php echo $row['student_id']?> </td>
          <td><?php echo $row['english_name']?></td>
          <td><?php echo $row['student_mail']?></td>
          <td><?php echo $row['student_phone']?></td>
          <td><?php echo $row[$decider]?></td>
          <td>
            <a href="?page=show&user_id=<?php echo $row['student_id']?>" class="btn btn-success">
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
            <a href="?page=delete&user_id=<?php echo $row['student_id']?>" class="btn btn-danger">
              <i class="fa-solid fa-trash">
              </i>
            </a>
          </td>
        </tr>
        
      <?php
    }
  }
}
//الشعبه
//الرغبات
function get_NMUDecider($nmuber_ofdecider){
 global $connect;
  $statment=$connect->prepare("SELECT * FROM decider_nmu order by Decider_NMU_id");
  $statment->execute();
  $result = $statment->fetchAll();

  foreach($result as $row){
        echo '<option value="'.$row["Decider_NMU_id"].'" name="Decider'.$nmuber_ofdecider.'_NMU">'.$row["Decider_NMU_name"].'</option>';
  }
  }
  if(isset($_GET['page'])){
  $page=$_GET['page'];
}
if($page=="all"){ 
?>
<div class="container mt-5 pr-5">
  <div class="row">
    <div class="col-md-3 text-center">
      <div class="box ">
        <i class="fa-solid fa-layer-group fa-2xl"></i>
        <h3 class="my-3">Desiders</h3>
        <a href="?page=desider" class="btn btn-success mt-3">Show</a>
      </div>
    </div>
    <div class="col-md-3 text-center">
      <div class="box ">
        <i class="fa-solid fa-shapes fa-2xl"></i>
        <h3 class="my-3">Divisions</h3>
        <a href="?page=divsion" class="btn btn-primary mt-3">Show</a>
      </div>
    </div>
    <div class="col-md-3 text-center">
      <div class="box ">
        <i class="fa-solid fa-shapes fa-2xl"></i>
        <h3 class="my-3">Faculties</h3>
        <a href="faculty.php" class="btn btn-danger mt-3">Show</a>
      </div>
    </div>
  </div>
 </div>
<?php 
}elseif($page=="desider"){?>
<div class="container mt-5 pr-5">
  <div class="row">
    <div class="col-md-3 text-center">
      <div class="box ">
        <i class="fa-solid fa-layer-group fa-2xl"></i>
        <h3 class="my-3">Desider1</h3>
        <h6><?php echo countdesider(1);?></h6>
        <a href="?page=result&id=1" class="btn btn-primary mt-3">Show</a>
      </div>
    </div>
    <div class="col-md-3 text-center">
      <div class="box ">
        <i class="fa-solid fa-layer-group fa-2xl"></i>
        <h3 class="my-3">Desider2</h3>
        <h6><?php echo countdesider(2);?></h6>
        <a href="?page=result&id=2" class="btn btn-primary mt-3">Show</a>
      </div>
    </div>
    <div class="col-md-3 text-center">
      <div class="box ">
        <i class="fa-solid fa-layer-group fa-2xl"></i>
        <h3 class="my-3">Desider3</h3>
        <h6><?php echo countdesider(3);?></h6>
        <a href="?page=result&id=3" class="btn btn-primary mt-3">Show</a>
      </div>
    </div>
    <div class="col-md-3 text-center">
      <div class="box ">
        <i class="fa-solid fa-layer-group fa-2xl"></i>
        <h3 class="my-3">Desider4</h3>
        <h6><?php echo countdesider(4);?></h6>
        <a href="?page=result&id=4" class="btn btn-primary mt-3">Show</a>
      </div>
    </div>
    <div class="col-md-3 text-center mt-3">
      <div class="box ">
        <i class="fa-solid fa-layer-group fa-2xl"></i>
        <h3 class="my-3">Desider5</h3>
        <h6><?php echo countdesider(5);?></h6>
        <a href="?page=result&id=5" class="btn btn-primary mt-3">Show</a>
      </div>
    </div>
  </div>
 </div>



<?php }elseif($page=="result"){
  $id=$_GET['id'];
  ?>
  <div class="container mt-5 pt-5"></div>
  <div class="row">
    <div class="col-md-10 m-auto">
  <table class="table table-dark text-center mt-5">
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
    </div>
  </div>
        <?php
  
    ?>
    <?php
    showdesider($id);
  }elseif($page=="divsion"){
    $q1= $connect->prepare("SELECT * FROM `student_information` WHERE high_school_id=1");
    $q1->execute();
    $cer1=$q1->rowcount();

    $q2= $connect->prepare("SELECT * FROM `student_information` WHERE high_school_id=2");
    $q2->execute();
    $cer2=$q2->rowcount();

    $q3= $connect->prepare("SELECT * FROM `student_information` WHERE high_school_id=3");
    $q3->execute();
    $cer3=$q3->rowcount();
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
  }

?>