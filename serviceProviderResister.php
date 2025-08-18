<?php
// ================= Database Connection =================
$servername = "localhost";  // change if needed
$username   = "root";       // change if you set DB username
$password   = "";           // change if you set DB password
$dbname     = "bachelorpoint";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ================= Handle Form Submission =================
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize inputs
    $name            = mysqli_real_escape_string($conn, $_POST['name']);
    $shopName        = mysqli_real_escape_string($conn, $_POST['shopName']);
    $contact         = mysqli_real_escape_string($conn, $_POST['contact']);
    $email           = mysqli_real_escape_string($conn, $_POST['email']);
    $location        = mysqli_real_escape_string($conn, $_POST['location']);
    $password        = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    // Password check
    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!'); window.history.back();</script>";
        exit();
    }

    // Generate combine (name + current year, since no Birthday field in form)
    $birthYear = date("Y"); 
    $combine   = $name . $birthYear;

    // Secure password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into serviceproviders table
    $sql = "INSERT INTO serviceprovidersregistration (name, shopName, contact, email, location, password, combine) 
            VALUES ('$name', '$shopName', '$contact', '$email', '$location', '$hashedPassword', '$combine')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Service Provider registered successfully! Please login now.'); window.location.href='serviceProviderlog.html';</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Bachelor's Point</title>
    <link rel="stylesheet" href="style/serviceProviderResister.css">
</head>

<body>
    <!-- Background  -->
    <div class="bg"></div>
    <!-- Floating Bubbles -->
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="register-container">
            <!-- Header -->
            <div class="header">
                <!-- Back Button -->
                <div class="back-nav">
                    <a href="start.html" class="back-link">
                        <svg class="back-icon" viewBox="0 0 24 24">
                            <path d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                </div>

                <!-- Logo and Title -->
                <div class="logo-section">
                    <svg class="logo-icon" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M18,2.01L6,2C4.89,2 4,2.89 4,4V20C4,21.11 4.89,22 6,22H18C19.11,22 20,21.11 20,20V4C20,2.89 19.11,2.01 18,2.01M18,20H6V4H18V20M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16M10.5,11A1.5,1.5 0 0,0 12,12.5A1.5,1.5 0 0,0 13.5,11A1.5,1.5 0 0,0 12,9.5A1.5,1.5 0 0,0 10.5,11Z" />
                    </svg>
                    <h1 class="logo-title">Bachelor's Point</h1>
                </div>

                <p class="subtitle">Want to be a Service Provider!</p>
                <h2 class="main-title">Register</h2>
            </div>

            <!-- Registration Form -->
            <form class="form" id="registrationForm" method="POST" action="">
                <!-- Name Input -->
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-input"
                        placeholder="Enter your full name" required>
                </div>

                <!-- Shop Name Input -->
                <div class="form-group">
                    <label for="shopName" class="form-label">Shop Name</label>
                    <input type="text" id="shopName" name="shopName" class="form-input"
                        placeholder="Enter your shop name" required>
                </div>

                <!-- Contact Number Input -->
                <div class="form-group">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="tel" id="contact" name="contact" class="form-input"
                        placeholder="Enter your contact number" required>
                </div>

                <!-- Email Input -->
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email" required>
                </div>

                <!-- Location/Address Input -->
                <div class="form-group">
                    <label for="location" class="form-label">Location/Address</label>
                    <textarea id="location" name="location" class="form-input form-textarea"
                        placeholder="Enter your location/address" required></textarea>
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-input"
                        placeholder="Create a password" required>
                </div>

                <!-- Confirm Password Input -->
                <div class="form-group">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-input"
                        placeholder="Confirm your password" required>
                    <div id="passwordError" class="password-mismatch" style="display: none;">
                        Passwords do not match
                    </div>
                </div>

                <!-- Already have account -->
                <div class="login-link-section">
                    Already have an Account? <a href="ServiceProviderlog.html" class="login-link">Login</a>
                </div>


                <!-- Register Button -->
                <button type="submit" class="register-button" id="registerBtn">
                    Register
                </button>

            </form>
        </div>
    </div>

    <script>
        // Password validation
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const passwordError = document.getElementById('passwordError');
        const registerBtn = document.getElementById('registerBtn');

        function validatePasswords() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            if (confirmPassword && password !== confirmPassword) {
                passwordError.style.display = 'block';
                registerBtn.disabled = true;
                return false;
            } else {
                passwordError.style.display = 'none';
                registerBtn.disabled = false;
                return true;
            }
        }

        confirmPasswordInput.addEventListener('input', validatePasswords);
        passwordInput.addEventListener('input', validatePasswords);
    </script>
</body>
</html>
