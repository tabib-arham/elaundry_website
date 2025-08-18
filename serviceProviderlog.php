<?php 
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "bachelorpoint");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailOrContact = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    
    // Check both email and contact fields
    $sql = "SELECT id, name, shopName, email, contact, password, location FROM serviceprovidersregistration 
            WHERE email='$emailOrContact' OR contact='$emailOrContact' LIMIT 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        
        // Verify password (hashed)
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['shop_name'] = $row['shopName'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['contact'] = $row['contact'];
            $_SESSION['location'] = $row['location'];
            
            header("Location: serviceProviderHome.php"); // redirect after login
            exit();
        } else {
            echo "<script>alert('Invalid password!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('User not found!'); window.history.back();</script>";
    }
}

$conn->close();
?>