<?php
// Start a PHP session
session_start();

// Include the database configuration file


// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION["username"]) && !isset($_SESSION["password"])) {
    header("Location: login.html");
    exit(); // Ensure script stops executing after redirection
}


include('db_config.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $flowerbouquet = $_POST['flowerbouquet'];
    $message = $_POST['text'];

    // Insert data into the database
    $insert_query = "INSERT INTO `contactus` (`id`, `fname`, `lname`, `email`, `phone`, `flowerbouquet`, `message`) VALUES (NULL, '$fname', '$lname', '$email', '$phone', '$flowerbouquet', '$message');";

    if (mysqli_query($insert_query) == TRUE) {
        header("Location: thankyou.html");
        
    } 
}

// Close the database connection
mysqli_close();

?>
