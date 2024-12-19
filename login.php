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

        // Check if user exists
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Verify the hashed password
            if (password_verify($password, $row['password'])) {
                echo "Login successful!";
                header("Location: ai.html");
                exit();
                // Start a session here, redirect, etc.
            } else {
                echo "Invalid password!";
            }
        } else {
            echo "No user found with this email!";
        }
    }

    mysqli_close($con);
?>
