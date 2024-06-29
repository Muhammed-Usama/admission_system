
<?php
// Initialize the session
session_start();
include("init.php");
$page="all";
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}elseif($_SESSION["isadmin"]==1){
    header("Location:admin/dashboard.php");
  }elseif($_SESSION["already_registered"]==1){

    header("Location:profile.php");

  }

 function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}
function get_NMUDecider($nmuber_ofdecider){
  // require_once("connection.php");
  global $con; // Add this line to access $con variable inside the function
  if(isset($_SESSION['Division_id'])){
    $division_id = $_SESSION['Division_id'];
    $sql = "SELECT * FROM decider_nmu WHERE ProgramRequirement=$division_id OR ProgramRequirement=5 order by Decider_NMU_id";
    $result = $con->query($sql);
      if ($result->num_rows > 0) {
    echo "";
  }
  while ($row = $result->fetch_assoc()) {
    echo '<option value="'.$row["Decider_NMU_id"].'" name="Decider'.$nmuber_ofdecider.'_NMU">'.$row["Decider_NMU_name"].'</option>';
  }
  }
  
  

}


function get_governorate(){
  global $con; // Add this line to access $con variable inside the function
  $sql = "SELECT * FROM `governorate` ORDER BY `Governorate_id`";
  $result = $con->query($sql);
  if ($result->num_rows > 0) {
    echo "";
  }
  while ($row = $result->fetch_assoc()) {
    echo'<option value="'.$row["Governorate_id"].'" name="governorate">'.$row['Governorate_name'].'</option>';
  }
  
}

function handleFileUpload($fileKey, $targetDir, &$msg) {
    $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif'];
    $file = $_FILES[$fileKey];
    $fileName = basename($file['name']);
    $targetPath = $targetDir . $fileName;
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    // Check file type
    if (!in_array(strtolower($fileExtension), $allowedFileTypes)) {
        $msg = "Invalid file type.";
        return false;
    }

    // Move the file to the target directory
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        $msg = "File uploaded successfully.";
        return $targetPath;
    } else {
        $msg = "Failed to upload file.";
        return false;
    }
}

if(isset($_GET['page'])){
  $page=$_GET['page'];
}

if($page=="all"){


?>


   <div id="main1" class="main">
       <!-- <p>Main1 div</p> -->
       <main>
        <br>
        <div class="main-container">
            <h1>طلب التحاق للطلاب الجدد (العام الدراسي 2023-2024)</h1>
            <p>تعلن جامعة المنصورة عن الفتح الإلكتروني للطلبات للتسجيل للطلاب الجدد من خريجي الثانوية العامة وخريجي الثانوية الأزهرية لخريجي هذا العام ٢٠٢٣ والعام الماضي ٢٠٢٢، وذلك في الفترة من 31 يوليو 2023, وحتى إعلان الحدود الدنيا وضوابط القبول من المجلس الأعلى للجامعات الخاصة والاهلية لبدء عملية التنسيق والقبول.</p>
            <p>سيتم عمل تنسيق داخلي وترشيح العدد المحدد وفقا للأعلى في مجموع الدرجات بالثانوية العامة فقط.</p>
            <p>لا يوجد اختبارات قبول أخرى للجامعة مما كان معمولًا به في السنوات السابقة.</p>
            <p>سيتم غلق استمارة التقديم يوم الأربعاء الموافق 9 أغسطس 2023 الساعة 11:00 مساءً.</p>
            <ul>
              <li>**ملاحظة 1:** لا يوجد أي وسيط بين الطلاب أو أولياء أمورهم والجامعة في عملية التقديم. الجامعة لا تسمح بأي وسيط بين الطالب والجامعة.</li>
              <li>**ملاحظة 2:** تتم تقديمات الالتحاق بالجامعة فقط من خلال الاستمارة الإلكترونية المتاحة على موقع الجامعة.</li>
            </ul>
        </div>
        <!--  -->

     
            <div class="container">
                <h2>تعليمات هامة</h2>
                <p>1. تحذر جامعة المنصورة الجديدة الآباء والطلاب من أنه لا توجد وساطة مطلقًا بين الطلاب أو أولياء أمورهم والجامعة في عملية التقديم. لا توجد مكاتب أو أشخاص داخل الجامعة أو خارجها مخولون بالحديث نيابة عن جامعة المنصورة الجديدة.</p>
                <p>الجامعة لا تسمح بأي وسيط بين الطالب والجامعة.</p>
                <p>2. تؤكد جامعة المنصورة الجديدة أن تقديم طلبات الالتحاق بالجامعة يتم فقط من خلال هذا النموذج. على الطلاب الذين سيتم إخطارهم بالموافقة الأولية عبر البريد الإلكتروني للطالب المسجل في نموذج التقديم دفع الرسوم المقررة ثم التوجه فورًا إلى الجامعة لاستكمال أوراقهم.</p>
                <p>3. يُنصح الطلاب بأن يكونوا دقيقين عند تسجيل بياناتهم في هذا النموذج ، خاصةً إجمالي درجات المرحلة الثانوية العامة والإجمالي المكافئ للشهادات الأخرى.</p>
                <p>4. يتم اختيار الطالب بناءً على البيانات المدخلة في موقع التسجيل. في حالة إدخال بيانات غير صحيحة ، يتم إلغاء الترشيح.</p>
                <p>5. يُنصح الطلاب بمراجعة بيانات وبرامج الكلية التي يرغبون في الالتحاق بها ، ومتطلبات القبول ، والحدود الدنيا ، وفرص العمل المستقبلية على موقع الجامعة.</p>
            </div>
       
            
    </main>
       <button onclick="moveToNext('main1')">الانتقال الى الصفحه التاليه</button>
   </div>
   <form action="?page=confirm" lang="ar" method="post" enctype="multipart/form-data">
   <!-- المعلومات الاساسيه -->
   <div id="main2" class="main" style="display: none;">
       <!-- <p>Main2 div</p> -->
       
    
        <div class="main-container">
            <h1>طلب التحاق للطلاب الجدد (العام الدراسي 2023-2024)</h1>
            <p>تعلن جامعة المنصورة عن الفتح الإلكتروني للطلبات للتسجيل للطلاب الجدد من خريجي الثانوية العامة وخريجي الثانوية الأزهرية لخريجي هذا العام ٢٠٢٣ والعام الماضي ٢٠٢٢، وذلك في الفترة من 31 يوليو 2023, وحتى إعلان الحدود الدنيا وضوابط القبول من المجلس الأعلى للجامعات الخاصة والاهلية لبدء عملية التنسيق والقبول.</p>
            <p>سيتم عمل تنسيق داخلي وترشيح العدد المحدد وفقا للأعلى في مجموع الدرجات بالثانوية العامة فقط.</p>
            <p>لا يوجد اختبارات قبول أخرى للجامعة مما كان معمولًا به في السنوات السابقة.</p>
            <p>سيتم غلق استمارة التقديم يوم الأربعاء الموافق 9 أغسطس 2023 الساعة 11:00 مساءً.</p>
            <ul>
              <li>**ملاحظة 1:** لا يوجد أي وسيط بين الطلاب أو أولياء أمورهم والجامعة في عملية التقديم. الجامعة لا تسمح بأي وسيط بين الطالب والجامعة.</li>
              <li>**ملاحظة 2:** تتم تقديمات الالتحاق بالجامعة فقط من خلال الاستمارة الإلكترونية المتاحة على موقع الجامعة.</li>
            </ul>
            <ul>
                <li>يجب ان يكون حجم البيانات لا يتعدى 20 ميجابايت</li>
                <li>*ان يكون الملف بصيغه 
                    PDF</li>
              </ul>
              <h1 style="direction: rtl; margin-top: 30px;">تنبيهات هامه :</h1>
          <h3 style="direction: rtl;">-يجب رفع الشهاده اوبيان النجاح فى ملف واحد </h3>
          <h3 style="direction: rtl;">-يجب رفع الشهاده باللغه الانجليزيه(STEM)</h3>
          <h3 style="direction: rtl;"> - ان يكون الملف بصيغة PDF</h3>
          <h3 style="direction: rtl;"> -يجب ان تكون جودة الملف عالية جدا</h3>
          <h3 style="direction: rtl;">- يجب ان يكون الحد الاقصى لحجم الملف 20 ميجابايت</h3>
        </div>
        
        

        <div class="input-box">
          <span class="details">الاسم رباعي باللغة العربية</span>
          <input type="text" name="arabic_name" required>
        </div>
        <div class="input-box">
          <span class="details">الاسم رباعي باللغة الإنجليزية</span>
          <input type="text" name="english_name" required>
        </div>
        <div class="input-box">
          <span class="details">البريد الالكتروني للطالب</span>
          <input type="text" name="student_mail" required>
        </div>
        <div class="input-box">
          <span class="details">البريد الالكتروني لولي الامر</span>
          <input type="text" name="parent_mail"required>
        </div>
        <div class="input-box">
          <span class="details">رقم موبايل الطالب</span>
          <input type="text" name="student_phone" required>
        </div>
        <div class="input-box">
          <span class="details">رقم موبايل ولي الامر</span>
          <input type="text" name="parent_phone" required>
        </div>
        <div class="input-box" aria-placeholder="Example: January 7, 2019">
          <span class="national_id">الرقم القومي</span>
          <input type="text" required name="national_id">
        </div>
        <div class="input-box" aria-placeholder="Example: January 7, 2019">
          <span class="addres">العنوان الحالي</span>
          <input type="text" required name="address">
        </div>
        <div class="input-box">
          <span class="upload_id">تحميل صورة واضحة لبطاقة الرقم القومي  </span>
          <input type="file" accept=".jpg, .jpeg, .png, .pdf" required name="Img_national_id">
        </div>
        
        <div class="input-box">
          <span class="photo">تحميل الصورة الشخصية "4*6" خلفية بيضاء</span>
          <input type="file" accept=".jpg, .jpeg, .png, .pdf" required name="Student_photo">
        </div>
        
        <div class="input-box">
          <span class="realase_date">تاريخ الإصدار </span>
          <input type="date" required name="publication_date">
        </div>
        <div class="input-box">
          <span class="dateOfBairth">تاريخ الميلاد  </span>
          <input type="date" required name="date_Bairth">
        </div>
        <div class="input-box" aria-placeholder="Example: January 7, 2019">
          <span class="card_issuing">جهة الصدور</span>
          <input type="text" required name="card_issuing">
        </div>
        
        <div class="select-box">
          <span class="number">الجنس</span>
          <select name="gender" required  >
            <option name="gender" value="">الجنس</option>
            <option name="gender" value="1">ذكر</option>
            <option name="gender" value="2">انثى</option>
          </select>
        </div>
        <div class="select-box">
          <span class="number">الجنسية</span>
          <select name="nationality" required >
            <option name="nationality" value="">الجنسيه</option>
            <option name="nationality" value="Egyptian">المصريه</option>
            
          </select>
          <div class="input-box">
               <span class="number">رقم الجلوس </span>
               <input type="text" required name="seat_num">
            </div>
     </div>
    
             
      <div class="select-box">
        <span class="number">محافظة الميلاد </span>
        <select name="governorate" required>
            <option name="governorate" value="">اختر المحافظة</option>
            <?php get_governorate();?>
        </select>
      </div>
    
       <button onclick="moveToNext('main2')">الأنتقال الي صفحة الرغبات</button>
   </div>
   <!-- الشهادات -->
   <div id="main3" class="main" style="display: none;">
       <!-- <p>main3 div</p> -->
    <!-- <main> -->
       

   
        <div class="select-box">
          <span class="number">الشهادة الثانوية الخاصل عليها </span>
          <select name="high_school" required>
              <option name="high_school" value="">اختر الشهادة الثانوية</option>
              <option name="high_school" value="1">الثانوية العامة</option>
              <option name="high_school" value="2">الثانوية الازهرية</option>
              <option name="high_school" value="3">STEM</option>
          </select>
        </div>
         <div class="select-box">
            <span class="number"> الشعبة المسجل بها</span>
            <select name="Division" >
                <option name="Division" value="">الشعبة الحاية </option>
                <option name="Division" value="1">علمى علوم</option>
                <option name="Division" value="2">علمى رياضة</option>
                <option name="Division" value="4">علمى (علمى علوم ورياضة) </option>
                <option name="Division" value="3">ادبي</option>
            </select>
          </div>
        <div class="select-box">
          <span class="number">سنةالحصول عليها </span>
          <select name="year_graduated" required>
              <option name="year_graduated" value="">سنةالحصول علي الشهادة الثانوية</option>
              <option name="year_graduated" value="2024">2024</option>
              <option name="year_graduated" value="2023">2023</option>
          </select>
        </div>
        <div class="select-box">
          <span class="number">هل أنت مسجل في جامعة حالياً</span>
          <select name="currently_registered" required id="currently_registered">
              <option name="currently_registered" value="">اختر إجابه واحدة</option>
              <option name="currently_registered" value="1">نعم</option>
              <option name="currently_registered" value="2">لا</option>
              
          </select>
        </div>
        <div class="input-box" aria-placeholder="Example: January 7, 2019" id="curent_university" style="display: none;">
            <span class="curent_university">في حالة كنت مسجل في جامعة حالياَ ادخل اسم الجامعة </span>
            <input type="text"  name="name_university" id ="university_input_box">
          </div>
         
           <div class="input-box" aria-placeholder="Example: January 7, 2019">
            <span class="card_issuing">مجموع الدرجات الحاصل  عليها  </span>
            <input type="text"  name="grades">
          </div>
        
        <div class="input-box" aria-placeholder="Example: January 7, 2019">
          <span class="gpa_persentage">النسبة المئوية % </span>
          <input type="text"  name="gpa_percentage">
        </div>
        <input type="submit" value="الأنتقال الي صفحة الرغبات">
        <!-- <button type="submit">الأنتقال الي صفحة الرغبات</button> -->
   </div>
   </form>
   <?php }elseif($page=="confirm"){
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $_SESSION['arabic_name'] = sanitizeInput($_POST['arabic_name']);
      $_SESSION['english_name'] = sanitizeInput($_POST['english_name']);
      $_SESSION['student_mail'] = filter_var($_POST['student_mail'], FILTER_VALIDATE_EMAIL);
      $_SESSION['parent_mail']  = filter_var($_POST['parent_mail'], FILTER_VALIDATE_EMAIL);
      $_SESSION['student_phone'] = sanitizeInput($_POST['student_phone']);
      $_SESSION['parent_phone'] = sanitizeInput($_POST['parent_phone']);
      $_SESSION['gender_id'] = sanitizeInput($_POST['gender']);
      $_SESSION['nationality']= sanitizeInput($_POST['nationality']);
      $_SESSION['seat_num'] = sanitizeInput($_POST['seat_num']);
      $_SESSION['governorate_id'] = sanitizeInput($_POST['governorate']);
      $_SESSION['date_Bairth'] = date('d-m-y', strtotime($_POST['date_Bairth']));
      $_SESSION['national_id'] = sanitizeInput($_POST['national_id']);
      $_SESSION['publication_date'] = date('d-m-y', strtotime($_POST['publication_date']));
      $_SESSION['card_issuing'] = sanitizeInput($_POST['card_issuing']);
      $_SESSION['adress'] = sanitizeInput($_POST['address']);
      $_SESSION['high_school_id'] = sanitizeInput($_POST['high_school']);
      $_SESSION['year_graduated'] = sanitizeInput($_POST['year_graduated']);
      $_SESSION['currently_registered_id'] = sanitizeInput($_POST['currently_registered']);
      $_SESSION['name_university'] = sanitizeInput($_POST['name_university']);
      $_SESSION['Division_id'] = sanitizeInput($_POST['Division']);
      $_SESSION['grades'] = sanitizeInput($_POST['grades']);
      $_SESSION['gpa_percentage'] = sanitizeInput($_POST['gpa_percentage']);
      $_SESSION['Student_photo']=handleFileUpload('Student_photo', 'Student_photo/', $msg_student_photo);
      $_SESSION['Img_national_id']=handleFileUpload('Img_national_id', 'Img_national_id/', $msg_natl_id);


    }
  
   ?>

   <!-- div mani4 -->
   <form action="insert.php" method="post">
   <div id="main4" class="main">
          
        <div class="select-box1">
            <span class="Decider-NMU">االرغبة الاولى</span> 
            <div class="select-desider">
            <select class="Decider-NMU-select" name="Decider1_NMU" id="Decider1_NMU" onchange="toggleOptions(1)">
              <option value="" name="Decider1_NMU">الرغبة الأولى المراد القبول بها في الجامعة</option>
            <?php get_NMUDecider(1);?>
            </select>
          </div>
  
          
          
      </div>
         
      <div class="select-box2">
        <span class="Decider-NMU">الرغبة الثانيه</span> 
        <div class="select-desider">
        <select class="Decider-NMU-select" name="Decider2_NMU" id="Decider2_NMU" onchange="toggleOptions(2)">
          <option value="" name="Decider2_NMU" >الرغبه الثانيه المراد القبول بها فى الجامعه</option>
          <?php get_NMUDecider(2);?>
                </select>
      </div>
  
      
      
  </div> 
  <div class="select-box3">
    <span class="Decider-NMU">الرغبة الثالثه</span> 
    <div class="select-desider">
      <select class="Decider-NMU-select" name="Decider3_NMU" id="Decider3_NMU" onchange="toggleOptions(3)">
      <option value="" name="Decider3_NMU" >الرغبه الثالثه المراد القبول بها فى الجامعه</option>
      <?php get_NMUDecider(3);?>
</select>
    </div>

  </div> 
  <div class="select-box4">
    <span class="Decider-NMU">الرغبة الرابعه</span> 
    <div class="select-desider">
      <select class="Decider-NMU-select" name="Decider4_NMU" id="Decider4_NMU" onchange="toggleOptions(4)">
        <option value="" name="Decider4_NMU" >الرغبه الرابعه المراد القبول بها فى الجامعه</option>
      <?php get_NMUDecider(4);?>
</select>
    </div>
  </div> 
  <div class="select-box5">
    <span class="Decider-NMU">الرغبة الخامسه</span> 
    <div class="select-desider">
      <select class="Decider-NMU-select" name="Decider5_NMU" id="Decider5_NMU" onchange="toggleOptions(5)">
        <option value="" name="Decider5_NMU" >الرغبه الخامسه المراد القبول بها فى الجامعه</option>
        <?php get_NMUDecider(5);?>
      </select>
    </div>
      <div class="button">
          <input type="submit" name="submit" value="أرسال">
        </div>
   </div>
   </div>
    </form> 
<?php }
include("./include/temp/footer.php");
?>
