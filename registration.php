<?php
// Include the database configuration file
include('db_config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password']; // Hash the password

    // Insert data into the database
    $insert_query = "INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone`, `username`, `password`) VALUES (NULL, '$fname', '$lname', '$email', '$phone', '$username', '$password');";

    if ($mysqli->query($insert_query) === TRUE) {
        // Registration successful, you can redirect to a success page or login page
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $insert_query . "<br>" . $mysqli->error;
    }
}

// Close the database connection
$mysqli->close();
?>

