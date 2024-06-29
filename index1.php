<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "admission";
     
   // connect the database with the server
   $conn = new mysqli($servername,$username,$password,$dbname);
     
    // if error occurs 
    if ($conn -> connect_errno)
    {
       echo "Failed to connect to MySQL: " . $conn -> connect_error;
       exit();
    }
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	
	// بيانات الطلاب مرتبة حسب النسبة تنازلي
    $sql = "select SeatNO,NID, StudentName, Thanwia_Category,Official_Score,Official_Ratio,First_desire, Second_desire, Third_desire, Fourth_desire, Fifth_desire, Candidate_Desire from thanwya_to_systems where Official_Score <>'' ORDER BY Official_Score DESC";
    $result = ($conn->query($sql));
    $row = [];
	echo "<br>The student Total is :" . $result->num_rows . "<br>";
  
    if ($result->num_rows > 0) {
 		// بيانات الطلاب مرتبة حسب النسبة تنازلي
		while($row = $result->fetch_assoc()) {
			echo "=======Student name: " . $row["StudentName"] . "==========<br>";
			if(empty($row["Candidate_Desire"])){ // فحص هل الرغبة المقترحة غير موجودة للطالب
			
			//-----------------------------------الرغبة الأولى------------------------------------------
			echo "----- The First desire --------------------<br>";
			echo "Ratio: " . $row["Official_Ratio"] . " - Thanwia Category: " . $row["Thanwia_Category"] . " - First_desire:  " . $row["First_desire"]. "<br>";
			
			// الحصول على الحد الادنى للبرنامج/الرغبة الاولى - الحد الادنى للوزارة - متطلب الرغبة الاولى 
			$sql1 = "select ProgramID, FacultyID, MinistryMinLimit,ProgramRequirement from program WHERE ProgramID=". $row["First_desire"]. "";
			$result1 = ($conn->query($sql1));
			$row1 = $result1->fetch_assoc();
			echo "ProgramID: " . $row1["ProgramID"]. " - Ministry Min Limit: " . $row1["MinistryMinLimit"]. " - Program Requirement:  " . $row1["ProgramRequirement"]. "<br>";
						
			// الحصول على الحد الادنى للكلية
			$sql2 = "select FacultyID, AvailableNO, UnivMinRatio from faculty WHERE FacultyID=". $row1["FacultyID"]. "";
			$result2 = ($conn->query($sql2));
			$row2 = $result2->fetch_assoc();
			echo "FacultyID : " . $row2["FacultyID"]. " - Available NO: " . $row2["AvailableNO"]. " - Univ Min NO:  " . $row2["UnivMinRatio"]. "<br>";
			
			//===================== فحص تحقق الرغبة الاولى
			// الحد الادنى للعدد الخاص بالرغبة داخل الكلية
			if ($row2["AvailableNO"] >= 1) {
				echo "<font color=blue> Accepted in this desire </font><br>";
				
				// 1- المتطلب - علمي علوم - رياضة - ادبي
				$ProgramReq = $row1["ProgramRequirement"]; 
				$ThanwiaCat = $row["Thanwia_Category"]; 
				if (($ProgramReq=1 && $ThanwiaCat=1) || ($ProgramReq=2 && $ThanwiaCat=2) || ($ProgramReq=4 && ($ThanwiaCat=1 || $ThanwiaCat=2)) || ($ProgramReq=5 && ($ThanwiaCat=1 || $ThanwiaCat=2 || $ThanwiaCat=3))) {
					echo "Student category is suitable";
					
					// الحد الادنى للوزارة
					if ($row1["MinistryMinLimit"] <= $row["Official_Ratio"]) {
						// تحديد الرغبة الاولى للطالب
						$sqlupdate = "UPDATE thanwya_to_systems SET Candidate_Desire = " . $row["First_desire"] . ", Candidate_Desire_NO = 1 WHERE NID = " . $row["NID"] . "" ;
						$RowUpdate = $conn->prepare($sqlupdate);
						$RowUpdate->execute();
						
						//Decrease Available no
						$NewAvailableNO = $row2["AvailableNO"] -1;
						$sqlupdate1 = "UPDATE faculty SET AvailableNO = " . $NewAvailableNO . " WHERE FacultyID = " . $row2["FacultyID"] . "" ;
						$RowUpdate1 = $conn->prepare($sqlupdate1);
						$RowUpdate1->execute();
						
						//Decrease Univ Min Ratio
						$NewUnivMinRatio = $row["Official_Ratio"];
						$sqlupdate2 = "UPDATE faculty SET UnivMinRatio = " . $NewUnivMinRatio . " WHERE FacultyID = " . $row2["FacultyID"] . "" ;
						$RowUpdate2 = $conn->prepare($sqlupdate2);
						$RowUpdate2->execute();
						
						}
				//ELSE الحد الادنى للوزارة
				else {
					echo "<font color=Red>Ministry Min Limit is not matched </font><br><br>";
					}
				}
			// ELSE 1- المتطلب - علمي علوم - رياضة - ادبي
			else {
					echo "<font color=Red>Requirement is not matched</font><br><br>";
				}
			}
			// ELSE الحد الادنى للعدد الخاص بالرغبة داخل الكلية
			else {
				echo "<font color=Red><br>Available NO is not matched </font><br><br>";
				}
			}
			//====================نهاية فحص تحقق الرغبة الاولى
			
			//-----------------------------------الرغبة الثانية------------------------------------------
			if(empty($row["Candidate_Desire"])){ // فحص هل الرغبة المقترحة غير موجودة للطالب
			echo "<br>----- The Second desire --------------------<br>";
			echo "Ratio: " . $row["Official_Ratio"]. " - Thanwia Category: " . $row["Thanwia_Category"]. " - Second desire:  " . $row["Second_desire"]. "<br>";
			// الحصول على الحد الادنى للبرنامج/الرغبة الثانية - الحد الادنى للوزارة - متطلب الرغبة الثانية
			$sql21 = "select ProgramID, FacultyID, MinistryMinLimit,ProgramRequirement from program WHERE ProgramID=". $row["Second_desire"];
			$result21 = ($conn->query($sql21));
			$row21 = $result21->fetch_assoc();
			echo "ProgramID: " . $row21["ProgramID"]. " - Ministry Min Limit: " . $row21["MinistryMinLimit"]. " - Program Requirement:  " . $row21["ProgramRequirement"]. "<br>";
						
			// الحصول على الحد الادنى للكلية
			$sql22 = "select FacultyID, AvailableNO, UnivMinRatio from faculty WHERE FacultyID=". $row21["FacultyID"]. "";
			$result22 = ($conn->query($sql22));
			$row22 = $result22->fetch_assoc();
			echo "FacultyID : " . $row22["FacultyID"]. " - Available NO: " . $row22["AvailableNO"]. " - Univ Min NO:  " . $row22["UnivMinRatio"]. "<br>";
			
			//===================== فحص تحقق الرغبة الثانية
			// الحد الادنى للعدد الخاص بالرغبة داخل الكلية
			if ($row22["AvailableNO"] >= 1) {
				echo "<font color=blue> Accepted in second desire </font><br>";
				
				// 1- المتطلب - علمي علوم - رياضة - ادبي
				$ProgramReq = $row21["ProgramRequirement"]; 
				$ThanwiaCat = $row["Thanwia_Category"]; 
				if (($ProgramReq=1 && $ThanwiaCat=1) || ($ProgramReq=2 && $ThanwiaCat=2) || ($ProgramReq=4 && ($ThanwiaCat=1 || $ThanwiaCat=2)) || ($ProgramReq=5 && ($ThanwiaCat=1 || $ThanwiaCat=2 || $ThanwiaCat=3))) {
					echo "Student category is suitable";
					
					// الحد الادنى للوزارة
					if ($row21["MinistryMinLimit"] <= $row["Official_Ratio"]) {
						// تحديد الرغبة الثانية للطالب
						$sqlupdate21 = "UPDATE thanwya_to_systems SET Candidate_Desire = " . $row["Second_desire"] . ", Candidate_Desire_NO = 2 WHERE NID = " . $row["NID"] . "" ;
						$RowUpdate21 = $conn->prepare($sqlupdate21);
						$RowUpdate21->execute();
						
						//Decrease Available no
						$NewAvailableNO = $row22["AvailableNO"] -1;
						$sqlupdate22 = "UPDATE faculty SET AvailableNO = " . $NewAvailableNO . " WHERE FacultyID = " . $row22["FacultyID"] . "" ;
						$RowUpdate22 = $conn->prepare($sqlupdate22);
						$RowUpdate22->execute();
						
						//Decrease Univ Min Ratio
						$NewUnivMinRatio = $row["Official_Ratio"];
						$sqlupdate23 = "UPDATE faculty SET UnivMinRatio = " . $NewUnivMinRatio . " WHERE FacultyID = " . $row22["FacultyID"] . "" ;
						$RowUpdate23 = $conn->prepare($sqlupdate23);
						$RowUpdate23->execute();
						
						}
					}
				}
			}
			//====================نهاية فحص تحقق الرغبة الثانية
			
			//-----------------------------------الرغبة الثالثة------------------------------------------
			if(empty($row["Candidate_Desire"])){ // فحص هل الرغبة المقترحة غير موجودة للطالب
			echo "<br>----- The Third desire --------------------<br>";
			echo "Ratio: " . $row["Official_Ratio"]. " - Thanwia Category: " . $row["Thanwia_Category"]. " - Third desire:  " . $row["Third_desire"]. "<br>";
			// الحصول على الحد الادنى للبرنامج/الرغبة الثالثة - الحد الادنى للوزارة - متطلب الرغبة الثالثة
			$sql31 = "select ProgramID, FacultyID, MinistryMinLimit,ProgramRequirement from program WHERE ProgramID=". $row["Third_desire"];
			$result31 = ($conn->query($sql31));
			$row31 = $result31->fetch_assoc();
			echo "ProgramID: " . $row31["ProgramID"]. " - Ministry Min Limit: " . $row31["MinistryMinLimit"]. " - Program Requirement:  " . $row31["ProgramRequirement"]. "<br>";
						
			// الحصول على الحد الادنى للكلية
			$sql32 = "select FacultyID, AvailableNO, UnivMinRatio from faculty WHERE FacultyID=". $row31["FacultyID"]. "";
			$result32 = ($conn->query($sql32));
			$row32 = $result32->fetch_assoc();
			echo "FacultyID : " . $row32["FacultyID"]. " - Available NO: " . $row32["AvailableNO"]. " - Univ Min NO:  " . $row32["UnivMinRatio"]. "<br>";
			
			//===================== فحص تحقق الرغبة الثالثة
			// الحد الادنى للعدد الخاص بالرغبة داخل الكلية
			if ($row32["AvailableNO"] >= 1) {
				echo "<font color=blue> Accepted in second desire </font><br>";
				
				// 1- المتطلب - علمي علوم - رياضة - ادبي
				$ProgramReq = $row31["ProgramRequirement"]; 
				$ThanwiaCat = $row["Thanwia_Category"]; 
				if (($ProgramReq=1 && $ThanwiaCat=1) || ($ProgramReq=2 && $ThanwiaCat=2) || ($ProgramReq=4 && ($ThanwiaCat=1 || $ThanwiaCat=2)) || ($ProgramReq=5 && ($ThanwiaCat=1 || $ThanwiaCat=2 || $ThanwiaCat=3))) {
					echo "Student category is suitable";
					
					// الحد الادنى للوزارة
					if ($row31["MinistryMinLimit"] <= $row["Official_Ratio"]) {
						// تحديد الرغبة الثالثة للطالب
						$sqlupdate31 = "UPDATE thanwya_to_systems SET Candidate_Desire = " . $row["Third_desire"] . " , Candidate_Desire_NO = 3 WHERE NID = " . $row["NID"] . "" ;
						$RowUpdate31 = $conn->prepare($sqlupdate31);
						$RowUpdate31->execute();
						
						//Decrease Available no
						$NewAvailableNO = $row32["AvailableNO"] -1;
						$sqlupdate32 = "UPDATE faculty SET AvailableNO = " . $NewAvailableNO . " WHERE FacultyID = " . $row32["FacultyID"] . "" ;
						$RowUpdate32 = $conn->prepare($sqlupdate32);
						$RowUpdate32->execute();
						
						//Decrease Univ Min Ratio
						$NewUnivMinRatio = $row["Official_Ratio"];
						$sqlupdate33 = "UPDATE faculty SET UnivMinRatio = " . $NewUnivMinRatio . " WHERE FacultyID = " . $row32["FacultyID"] . "" ;
						$RowUpdate33 = $conn->prepare($sqlupdate33);
						$RowUpdate33->execute();
						
						}
					}
				}
			}
			//====================نهاية فحص تحقق الرغبة الثالثة
			
			//-----------------------------------الرغبة الرابعة------------------------------------------
			if(empty($row["Candidate_Desire"])){ // فحص هل الرغبة المقترحة غير موجودة للطالب
			echo "<br>----- The Forth desire --------------------<br>";
			echo "Ratio: " . $row["Official_Ratio"]. " - Thanwia Category: " . $row["Thanwia_Category"]. " - Forth desire:  " . $row["Fourth_desire"]. "<br>";
			//الحصول على الحد الادنى للبرنامج/الرغبة الرابعة - الحد الادنى للوزارة - متطلب الرغبة الرابعة
			$sql41 = "select ProgramID, FacultyID, MinistryMinLimit, ProgramRequirement from program WHERE ProgramID=". $row["Fourth_desire"]. "";
			$result41 = ($conn->query($sql41));
			$row41 = $result41->fetch_assoc();
			echo "ProgramID: " . $row41["ProgramID"]. " - Ministry Min Limit: " . $row41["MinistryMinLimit"]. " - Program Requirement:  " . $row41["ProgramRequirement"]. "<br>";
						
			// الحصول على الحد الادنى للكلية
			$sql42 = "select FacultyID, AvailableNO, UnivMinRatio from faculty WHERE FacultyID=". $row1["FacultyID"]. "";
			$result42 = ($conn->query($sql42));
			$row42 = $result42->fetch_assoc();
			echo "FacultyID : " . $row42["FacultyID"]. " - Available NO: " . $row42["AvailableNO"]. " - Univ Min NO:  " . $row42["UnivMinRatio"]. "<br>";
			
			//===================== فحص تحقق الرغبة الرابعة
			// الحد الادنى للعدد الخاص بالرغبة داخل الكلية
			if ($row42["AvailableNO"] >= 1) {
				echo "<font color=blue> Accepted in second desire </font><br>";
				
				// 1- المتطلب - علمي علوم - رياضة - ادبي
				$ProgramReq = $row41["ProgramRequirement"]; 
				$ThanwiaCat = $row["Thanwia_Category"]; 
				if (($ProgramReq=1 && $ThanwiaCat=1) || ($ProgramReq=2 && $ThanwiaCat=2) || ($ProgramReq=4 && ($ThanwiaCat=1 || $ThanwiaCat=2)) || ($ProgramReq=5 && ($ThanwiaCat=1 || $ThanwiaCat=2 || $ThanwiaCat=3))) {
					echo "Student category is suitable";
					
					// الحد الادنى للوزارة
					if ($row41["MinistryMinLimit"] <= $row["Official_Ratio"]) {
						// تحديد الرغبة الرابعة للطالب
						$sqlupdate41 = "UPDATE thanwya_to_systems SET Candidate_Desire = " . $row["Fourth_desire"] . " , Candidate_Desire_NO = 4 WHERE NID = " . $row["NID"] . "" ;
						$RowUpdate41 = $conn->prepare($sqlupdate41);
						$RowUpdate41->execute();
						
						//Decrease Available no
						$NewAvailableNO = $row2["AvailableNO"] -1;
						$sqlupdate42 = "UPDATE faculty SET AvailableNO = " . $NewAvailableNO . " WHERE FacultyID = " . $row42["FacultyID"] . "" ;
						$RowUpdate42 = $conn->prepare($sqlupdate42);
						$RowUpdate42->execute();
						
						//Decrease Univ Min Ratio
						$NewUnivMinRatio = $row["Official_Ratio"];
						$sqlupdate43 = "UPDATE faculty SET UnivMinRatio = " . $NewUnivMinRatio . " WHERE FacultyID = " . $row42["FacultyID"] . "" ;
						$RowUpdate43 = $conn->prepare($sqlupdate43);
						$RowUpdate43->execute();
						
						}
					}
				}
			}
			//====================نهاية فحص تحقق الرغبة الخامسة
			
			//-----------------------------------الرغبة الخامسة------------------------------------------
			if(empty($row["Candidate_Desire"])){ // فحص هل الرغبة المقترحة غير موجودة للطالب
			echo "<br>----- The Fifth desire --------------------<br>";
			echo "Ratio: " . $row["Official_Ratio"]. " - Thanwia Category: " . $row["Thanwia_Category"]. " - Fifth desire:  " . $row["Fifth_desire"]. "<br>";
			// الحصول على الحد الادنى للبرنامج/الرغبة الخامسة - الحد الادنى للوزارة - متطلب الرغبة الخامسة
			$sql51 = "select ProgramID, FacultyID, MinistryMinLimit, ProgramRequirement from program WHERE ProgramID=". $row["Fifth_desire"]. "";
			$result51 = ($conn->query($sql51));
			$row51 = $result51->fetch_assoc();
			echo "ProgramID: " . $row51["ProgramID"]. " - Ministry Min Limit: " . $row51["MinistryMinLimit"]. " - Program Requirement:  " . $row51["ProgramRequirement"]. "<br>";
						
			// الحصول على الحد الادنى للكلية
			$sql52 = "select FacultyID, AvailableNO, UnivMinRatio from faculty WHERE FacultyID=". $row1["FacultyID"]. "";
			$result52 = ($conn->query($sql52));
			$row52 = $result52->fetch_assoc();
			echo "FacultyID : " . $row52["FacultyID"]. " - Available NO: " . $row52["AvailableNO"]. " - Univ Min NO:  " . $row52["UnivMinRatio"]. "<br>";
			
			//===================== فحص تحقق الرغبة الخامسة
			// الحد الادنى للعدد الخاص بالرغبة داخل الكلية
			if ($row52["AvailableNO"] >= 1) {
				echo "<font color=blue> Accepted in second desire </font><br>";
				
				// 1- المتطلب - علمي علوم - رياضة - ادبي
				$ProgramReq = $row51["ProgramRequirement"]; 
				$ThanwiaCat = $row["Thanwia_Category"]; 
				if (($ProgramReq=1 && $ThanwiaCat=1) || ($ProgramReq=2 && $ThanwiaCat=2) || ($ProgramReq=4 && ($ThanwiaCat=1 || $ThanwiaCat=2)) || ($ProgramReq=5 && ($ThanwiaCat=1 || $ThanwiaCat=2 || $ThanwiaCat=3))) {
					echo "Student category is suitable";
					
					// الحد الادنى للوزارة
					if ($row51["MinistryMinLimit"] <= $row["Official_Ratio"]) {
						// تحديد الرغبة الخامسة للطالب
						$sqlupdate51 = "UPDATE thanwya_to_systems SET Candidate_Desire = " . $row["Fifth_desire"] . ", Candidate_Desire_NO = 5 WHERE NID = " . $row["NID"] . "" ;
						$RowUpdate51 = $conn->prepare($sqlupdate51);
						$RowUpdate51->execute();
						
						//Decrease Available no
						$NewAvailableNO = $row2["AvailableNO"] -1;
						$sqlupdate52 = "UPDATE faculty SET AvailableNO = " . $NewAvailableNO . " WHERE FacultyID = " . $row52["FacultyID"] . "" ;
						$RowUpdate52 = $conn->prepare($sqlupdate52);
						$RowUpdate52->execute();
						
						//Decrease Univ Min Ratio
						$NewUnivMinRatio = $row["Official_Ratio"];
						$sqlupdate53 = "UPDATE faculty SET UnivMinRatio = " . $NewUnivMinRatio . " WHERE FacultyID = " . $row52["FacultyID"] . "" ;
						$RowUpdate53 = $conn->prepare($sqlupdate53);
						$RowUpdate53->execute();
						
						}
					}
				}
			}
			//====================نهاية فحص تحقق الرغبة الخامسة
			
			//==================== استنفاذ الرغبات
			if($row["Candidate_Desire"] =''){ // فحص هل الرغبة المقترحة غير موجودة للطالب
				echo "<br>----- The case without desire --------------------<br>";
				$sqlupdate6 = "UPDATE thanwya_to_systems SET Candidate_Desire = -1, Candidate_Desire_NO = -1 WHERE NID = " . $row["NID"] . "" ;
				$RowUpdate6 = $conn->prepare($sqlupdate6);
				$RowUpdate6->execute();
			}
			
			}// end of While
		}
		else {
			echo "<font color=red> No of student = 0</font><br>";
		}
    mysqli_close($conn);
?>