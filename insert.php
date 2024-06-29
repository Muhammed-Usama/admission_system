<?php
include("./include/db/db.php");
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Function to sanitize and validate input
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

// Function to handle file uploads securely


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Sanitize and validate user input
    $arabic_name = $_SESSION['arabic_name'];
    $english_name = $_SESSION['english_name'];
    $student_mail = $_SESSION['student_mail'];
    $parent_mail = $_SESSION['parent_mail'];
    $student_phone = $_SESSION['student_phone'];
    $parent_phone = $_SESSION['parent_phone'];
    $gender_id = $_SESSION['gender_id'];
    $nationality = $_SESSION['nationality'];
    $seat_num = $_SESSION['seat_num'];
    $governorate_id = $_SESSION['governorate_id'];
    $date_Bairth = $_SESSION['date_Bairth'];
    $national_id = $_SESSION['national_id'];
    $publication_date = $_SESSION['publication_date'];
    $card_issuing = $_SESSION['card_issuing'];
    $adress = $_SESSION['adress'];
    $high_school_id = $_SESSION['high_school_id'];
    $year_graduated = $_SESSION['year_graduated'];
    $currently_registered_id = $_SESSION['currently_registered_id'];
    $name_university = $_SESSION['name_university'];
    $Division_id = $_SESSION['Division_id'];
    $grades = $_SESSION['grades'];
    $gpa_percentage = $_SESSION['gpa_percentage'];
    $Decider1_NMU_id = sanitizeInput($_POST['Decider1_NMU']);
    $Decider2_NMU_id = sanitizeInput($_POST['Decider2_NMU']);
    $Decider3_NMU_id = sanitizeInput($_POST['Decider3_NMU']);
    $Decider4_NMU_id = sanitizeInput($_POST['Decider4_NMU']);
    $Decider5_NMU_id = sanitizeInput($_POST['Decider5_NMU']);

    // Handle file uploads securely
    $msg_student_photo = "";
    $Student_photo =$_SESSION['Student_photo'];

    $msg_national_id = "";
    $Img_national_id=$_SESSION['Img_national_id'];


    // Check if file uploads were successful before proceeding with database insert
    if ($Student_photo !== false && $Img_national_id !== false) {
        // Insert data into the database using prepared statement
        $stmt = $con->prepare("INSERT INTO student_information (arabic_name, english_name, student_mail, parent_mail, student_phone, parent_phone, gender_id, nationality, seat_num, governorate_id, date_Bairth, national_id, publication_date, card_issuing, adress, high_school_id, year_graduated, currently_registered_id, name_university, Division_id, grades, gpa_percentage, Decider1_NMU_id, Decider2_NMU_id, Decider3_NMU_id, Decider4_NMU_id,Decider5_NMU_id, Student_photo, Img_national_id,	User_ID) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");

        $stmt->bind_param("ssssssssssssssssssssssssssssss", $arabic_name, $english_name, $student_mail, $parent_mail, $student_phone, $parent_phone, $gender_id, $nationality, $seat_num, $governorate_id, $date_Bairth, $national_id, $publication_date, $card_issuing, $adress, $high_school_id, $year_graduated, $currently_registered_id, $name_university, $Division_id, $grades, $gpa_percentage, $Decider1_NMU_id, $Decider2_NMU_id, $Decider3_NMU_id, $Decider4_NMU_id,$Decider5_NMU_id, $Student_photo, $Img_national_id,$_SESSION['id']);

         // Retrieve username from session
        $username = $_SESSION["username"];

        // Insert data into the users table for the specific user
        $stmt_users = $con->prepare("UPDATE users SET already_registered = 1 WHERE username = ?");
        $stmt_users->bind_param("s", $username);
        $stmt_users->execute();
        if ($stmt->execute()) {
            header("location:profile.php");

            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "File upload failed. Please check file types and try again.";
    }
}

// Close connection
$con->close();
?>
