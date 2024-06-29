<?php
include("./include/db/db.php");



// Escape user inputs for security
$name = $con->real_escape_string($_REQUEST['name']);
$username = $con->real_escape_string($_REQUEST['username']);
$password = $con->real_escape_string($_REQUEST['password']);

// Check if the username already exists in the database
$check_query = "SELECT * FROM Users WHERE username = '$username'";
$result = $con->query($check_query);

if ($result->num_rows > 0) {
    echo( "<script>
    alert( 'Username already exists. Please choose a different username.' ) ;
    window. location. href= 'index.html' ;
    </script>");
} else {
    // Hash the password - IMPORTANT
    $password_hashed = password_hash($password, PASSWORD_BCRYPT);

    // Insert the new user into the database with isadmin set to 0 (default)
    $sql = "INSERT INTO Users (name, username, password) VALUES ('$name', '$username', '$password_hashed')";

    if ($con->query($sql) === TRUE) {
        header("location:index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

// Close the connection
$con->close();
?>
