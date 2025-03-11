<?php
// store_data.php

$servername = "localhost";
$username = "root"; // change this to your MySQL username
$password = ""; // change this to your MySQL password
$dbname = "fitfocus"; // change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name'])) {
        // Handle signup data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $first_time = $_POST['first_time'];

        $sql = "INSERT INTO users (name, email, username, password, age, gender, weight, height, first_time)
                VALUES ('$name', '$email', '$username', '$password', '$age', '$gender', '$weight', '$height', '$first_time')";

        if ($conn->query($sql) === TRUE) {
            echo "Sign up data stored successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Handle login data
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "INSERT INTO login_attempts (username, password)
                VALUES ('$username', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Login data stored successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
