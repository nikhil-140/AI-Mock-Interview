<?php
    // Database connection details
    $username = "root";
    $password = "";
    $server = 'localhost';
    $db = 'accounting';

    $con = mysqli_connect($server, $username, $password, $db);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Fetch data from the form
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

        // Check if passwords match
        if ($password != $confirm_password) {
            echo "Passwords do not match!";
        } else {
            // Hash password for security
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Insert user data into the database
            $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

            if (mysqli_query($con, $sql)) {
                echo "Signup successful!";
            } else {
                echo "Error: " . mysqli_error($con);
            }
        }
    }

    mysqli_close($con);
?>
