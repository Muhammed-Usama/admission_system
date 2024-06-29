<?php
// Initialize the session
session_start();
// Include database connection file

include("./profile/init.php");
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}elseif($_SESSION["isadmin"]==true){
    header("Location:admin/dashboard.php");
}elseif($_SESSION["isadmin"]==false && $_SESSION["already_registered"]==false){
    header("Location:index.php");

  }



// Get the user ID from the session
$userID = $_SESSION["id"];


// Fetch user data from the database
// $sql = "SELECT * FROM student_information WHERE student_id = ?";
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
          INNER JOIN decider5_nmu ON student_information.Decider5_NMU_id = decider5_nmu.Decider5_NMU_id WHERE User_id = ?");
$statment->execute(array($userID));
$usercount=$statment->rowcount();
$result=$statment->fetchAll();
  foreach($result as $row){
    $arabic_name = $row['arabic_name'];
    $english_name = $row['english_name'];
    $Student_ID = $row["student_id"];
    $Student_Email = $row["student_mail"];
    $Parent_Email = $row["parent_mail"];
    $Student_Phone = $row["student_phone"];
    $Parent_Phone = $row["parent_phone"];
    $Gender_Name = $row["gender_name"];
    $nationality = $row["nationality"];
    $seat_num = $row["seat_num"];
    $Governorate_name = $row["Governorate_name"];
    $date_Bairth = $row["date_Bairth"];
    $national_id = $row["national_id"];
    $publication_date = $row["publication_date"];
    $card_issuing = $row["card_issuing"];
    $Address = $row["adress"];
    $High_School_Name = $row["high_school_name"];
    $Year_Graduated = $row["year_graduated"];
    $Currently_Registered_Name = $row["currently_registered_name"];
    $University_Name = $row["name_university"];
    $Division_Name = $row["Division_name"];
    $Grades = $row["grades"];
    $GPA_Percentage = $row["gpa_percentage"];
    $Decider_NMU_Name = $row["Decider_NMU_name"];
    $Decider2_NMU_Name = $row["Decider2_NMU_name"];
    $Decider3_NMU_Name = $row["Decider3_NMU_name"];
    $Decider4_NMU_Name = $row["Decider4_NMU_name"];
    $Decider5_NMU_Name = $row["Decider5_NMU_name"];
    $Student_photo = $row["Student_photo"];
  }
  




?>


        <div class="container">
            
    
            <div class="personal-page">
                     <div>
                        <img src="./<?php echo $Student_photo; ?>" alt="الصورة" height="200px">
                     </div>
                    
                    
                    <h3>البيانات الأساسية</h3>
                    <div class="form-group">
                        <label for="arabicName">الاسم رباعى باللغة العربية</label>
                        <input type="text" id="arabicName" name="arabicName" value="<?php echo $arabic_name; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="englishName">الاسم رباعى باللغة الإنجليزية</label>
                        <input type="text" id="englishName" name="englishName" value="<?php echo $english_name; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gender">النوع</label>
                        <input type="text" id="gender" name="gender" value="<?php echo $Gender_Name; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nationality">الجنسية</label>
                        <input type="text" id="nationality" name="nationality" value="<?php echo $nationality; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="birthdate">تاريخ الميلاد</label>
                        <input type="date" id="birthdate" name="birthdate" value="<?php echo $date_Bairth; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nationalId">الرقم القومي</label>
                        <input type="text" id="nationalId" name="nationalId" value="<?php echo $national_id; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="address">العنوان</label>
                        <input type="text" id="address" name="address" value="<?php echo $Address; ?>" readonly>
                    </div>
        
                    <!-- Additional fields -->
                    <h3>بيانات الاتصال</h3>
                    <div class="form-group">
                        <label for="studentEmail">البريد الإلكتروني للطالب</label>
                        <input type="email" id="studentEmail" name="studentEmail" value="<?php echo $Student_Email; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="parentEmail">البريد الإلكترونى لولي الأمر</label>
                        <input type="email" id="parentEmail" name="parentEmail" value="<?php echo $Parent_Email; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="studentMobile">رقم موبايل الطالب</label>
                        <input type="tel" id="studentMobile" name="studentMobile" value="<?php echo $Student_Phone; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="parentMobile">رقم موبيل ولي الأمر</label>
                        <input type="tel" id="parentMobile" name="parentMobile" value="<?php echo $Parent_Phone; ?>" readonly>
                    </div>
        
                    <!-- Additional educational fields -->
                    <h3>البيانات التعليمية</h3>
                    <div class="form-group">
                        <label for="highSchoolCertificate">نوع الشهادة الثانوية الحاصل عليها</label>
                        <input type="text" id="highSchoolCertificate" name="highSchoolCertificate" value="<?php echo $High_School_Name; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="major">الشعبة</label>
                        <input type="text" id="major" name="major" value="<?php echo $Division_Name; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="totalGrade">المجموع الكلي</label>
                        <input type="text" id="totalGrade" name="totalGrade" value="<?php echo $Grades; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="percentage">النسبة المئوية</label>
                        <input type="text" id="percentage" name="percentage" value="<?php echo $GPA_Percentage; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="firstPreference">الرغبة الأولى</label>
                        <input type="text" id="firstPreference" name="firstPreference" value="<?php echo $Decider_NMU_Name; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="secondPreference">الرغبة الثانية</label>
                        <input type="text" id="secondPreference" name="secondPreference" value="<?php echo $Decider_NMU_Name; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="secondPreference">الرغبة الثالثه</label>
                        <input type="text" id="secondPreference" name="secondPreference" value="<?php echo $Decider3_NMU_Name; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="secondPreference">الرغبة الرابعه</label>
                        <input type="text" id="secondPreference" name="secondPreference" value="<?php echo $Decider4_NMU_Name; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="secondPreference">الرغبة الخامسه</label>
                        <input type="text" id="secondPreference" name="secondPreference" value="<?php echo $Decider5_NMU_Name; ?>" readonly>
                    </div>
                </div>
<?php 
include("./profile/include/temp/footer.php");
?>
