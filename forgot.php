<?php
    // Database connection details
    $username = "root";
    $password = "";
    $server = 'localhost';
    $db = 'accounting';

    // Create a connection
    $con = mysqli_connect($server, $username, $password, $db);

    // Check if connection is successful
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the email entered by the user
        $email = mysqli_real_escape_string($con, $_POST['email']);

        // Check if the user exists in the database
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($con, $sql);

        // If the user is found, retrieve the password
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "Your password: " . $row['password'];
            // Optionally, you can send the password to the user's email instead of displaying it
            // mail($email, "Your Password", "Your password is: " . $row['password']);
        } else {
            echo "No user found with this email!";
        }
    }

    // Close the database connection
    mysqli_close($con);
?>
