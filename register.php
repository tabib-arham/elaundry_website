<?php
// ================= Database Connection =================
$servername = "localhost";   // Change if needed
$username   = "root";        // Change if you set DB username
$password   = "";            // Change if you set DB password
$dbname     = "bachelorpoint"; // Change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ================= Handle Form Submission =================
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize inputs
    $name            = mysqli_real_escape_string($conn, $_POST['name']);
    $contact         = mysqli_real_escape_string($conn, $_POST['contact']);
    $email           = mysqli_real_escape_string($conn, $_POST['email']);
    $location        = mysqli_real_escape_string($conn, $_POST['location']);
    $birthday        = mysqli_real_escape_string($conn, $_POST['Birthday']);
    $password        = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    // Password check
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit();
    }

    // Extract birth year from Birthday
    $birthYear = date("Y", strtotime($birthday));

    // Create combine column value
    $combine = $name . $birthYear;

    // Secure password (hashing)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into userregister table
    $sql = "INSERT INTO userregister (name, contact, email, location, Birthday, password, combine) 
            VALUES ('$name', '$contact', '$email', '$location', '$birthday', '$hashedPassword', '$combine')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful! Please login now.'); window.location.href='log.html';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
