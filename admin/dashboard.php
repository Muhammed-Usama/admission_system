<?php 
include('./init.php');

$q1= $connect->prepare("SELECT * FROM `users`");
$q1->execute();
$usercount=$q1->rowcount();

// $q2= $connect->prepare("SELECT * FROM `categories`");
// $q2->execute();
// $categorycount=$q2->rowcount();

$q3= $connect->prepare("SELECT * FROM `student_information`");
$q3->execute();
$postcount=$q3->rowcount();

$q4= $connect->prepare("SELECT * FROM `high_school`");
$q4->execute();
$certificatescount=$q4->rowcount();
?>
 <div class="container mt-5 pr-5">
  <div class="row">
    <div class="col-md-3 text-center">
      <div class="box ">
        <i class="fa-solid fa-user fa-2xl"></i>
        <h3 class="my-3">Users</h3>
        <h6><?php echo $usercount; ?></h6>
        <a href="users.php" class="btn btn-success">Show</a>
      </div>
    </div>
    <div class="col-md-3 text-center">
      <div class="box ">
        <i class="fa-solid fa-magnifying-glass fa-2xl"></i>
        <h3 class="my-3">Search</h3>
        <h6>is static</h6>
        <!-- <h6><?php echo $categorycount;?></h6> -->
        <a href="search.php" class="btn btn-primary">Show</a>
      </div>
    </div>
    <div class="col-md-3 text-center">
      <div class="box ">
        <i class="fa-solid fa-address-card fa-2xl"></i> 
        <h3 class="my-3">Students</h3>
        <h6><?php echo $postcount;?></h6>
        <a href="students.php" class="btn btn-warning">Show</a>
      </div>
    </div>
    <div class="col-md-3 text-center">
      <div class="box ">
        <i class="fa-solid fa-certificate fa-2xl"></i>
        <h3 class="my-3">certificates</h3>
        <!-- <h6>is static</h6> -->
        <h6><?php echo $certificatescount;?></h6>
        <a href="certificates.php" class="btn btn-danger">Show</a>
      </div>
    </div>
  </div>
 </div>

<?php
include('./include/temp/footer.php');

?>