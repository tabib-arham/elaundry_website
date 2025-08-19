<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: serviceProviderlog.html");
    exit();
}

// Get user data from session
$user_name = $_SESSION['name'];
$user_location = $_SESSION['location'];
$user_email = $_SESSION['email'];
$user_contact = $_SESSION['contact'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-Service provider</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style/serviceProviderHome.css">
    <style>
        .btn-hover {
            transition: all 0.3s ease;
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        .notification-dot {
            position: absolute;
            top: -1px;
            right: -8px;
            width: 15px;
            height: 15px;
            background: #de350f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            color: white;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M18,2.01L6,2C4.89,2 4,2.89 4,4V20C4,21.11 4.89,22 6,22H18C19.11,22 20,21.11 20,20V4C20,2.89 19.11,2.01 18,2.01M18,20H6V4H18V20M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16M10.5,11A1.5,1.5 0 0,0 12,12.5A1.5,1.5 0 0,0 13.5,11A1.5,1.5 0 0,0 12,9.5A1.5,1.5 0 0,0 10.5,11Z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-xl font-bold text-gray-900">Bachelor's Point</h1>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button href="#" class="text-blue-600 px-3 py-2 text-sm font-medium">Home</button>
                        <a href="serviceManagement.php" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Manage Service</a>
                        <a href="orderManagement.php" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Orders</a>
                    </div>
                    <a href="logout.php" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Log Out</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Service Provider Profile Section -->
    <section class="wave-bg py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <h1 class="text-3xl font-bold mb-2">Welcome to Bachelor's point</h1>
                <p class="text-blue-100 text-lg">Your Professional Laundry Service Partner</p>
            </div>
        </div>
    </section>

    <!-- Business Info Card -->
    <section class="py-8 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                <div class="flex items-center gap-6 mb-6">
                    <div
                        class="w-20 h-20 bg-gradient-to-r from-blue-400 to-purple-400 rounded-2xl flex items-center justify-center">
                        <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M18,2.01L6,2C4.89,2 4,2.89 4,4V20C4,21.11 4.89,22 6,22H18C19.11,22 20,21.11 20,20V4C20,2.89 19.11,2.01 18,2.01M18,20H6V4H18V20M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16Z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-1"><?php echo htmlspecialchars($user_name); ?></h3>
                        <p class="text-gray-600 mb-1"><?php echo date('l, F j, Y'); ?></p>
                        <div class="flex items-center text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                            </svg>
                            <?php echo htmlspecialchars($user_location); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

  <!-- Services Section -->
  <section id="services" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-16">
        <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">We provide comprehensive laundry solutions tailored to your
          needs</p>
      </div>
      <div class="grid md:grid-cols-3 gap-8">
        <!-- Wash & Fold -->
        <div class="bg-gray-50 rounded-xl p-8 text-center hover:shadow-lg transition-shadow">
          <!--icon-->
          <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path
                d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zm0 2v2H5V5h14zm0 14H5V9h14v10zm-7-2a3 3 0 0 1-3-3h2a1 1 0 1 0 2 0h2a3 3 0 0 1-3 3zm-4-7a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm4 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm4 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0z" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-2">Wash & Fold</h3>
          <p class="text-gray-600">Professional washing and folding service with attention to detail</p>
        </div>

        <!-- Dry Cleaning -->
        <div class="bg-gray-50 rounded-xl p-8 text-center hover:shadow-lg transition-shadow">
          <!--icon-->
          <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 21h18M5 21V7a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v14M9 7V3h6v4" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M8 11h8M8 15h8" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-2">Dry Cleaning</h3>
          <p class="text-gray-600">Expert dry cleaning for delicate fabrics and special garments</p>
        </div>



        <!-- Pickup & Delivery -->
        <div class="bg-gray-50 rounded-xl p-8 text-center hover:shadow-lg transition-shadow">
          <!--icon-->
          <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2Z" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-2">Pickup & Delivery</h3>
          <p class="text-gray-600">Convenient pickup and delivery service right to your doorstep</p>
        </div>
      </div>
    </div>
  </section>

    <!-- Customer Reviews -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Customers' Reviews</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Review 1 -->
                <div class="card-hover bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <div class="text-yellow-400 text-xl mb-4">⭐⭐⭐⭐⭐</div>
                    <p class="text-gray-700 mb-4 leading-relaxed">
                        Excellent service! My clothes came back perfectly clean and folded.
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-900">Sarah Fahrin</span>
                        <span class="text-sm text-gray-500">1 days ago</span>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="card-hover bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <div class="text-yellow-400 text-xl mb-4">⭐⭐⭐⭐⭐</div>
                    <p class="text-gray-700 mb-4 leading-relaxed">
                        Very professional and punctual. Will definitely use again!
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-900">Rifat Sheikh</span>
                        <span class="text-sm text-gray-500">3 days ago</span>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="card-hover bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <div class="text-yellow-400 text-xl mb-4">⭐⭐⭐⭐⭐</div>
                    <p class="text-gray-700 mb-4 leading-relaxed">
                        Great service and friendly staff. Highly recommended!
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-900">Jannatul Shreya </span>
                        <span class="text-sm text-gray-500">1 weeks ago</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white

 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="col-span-1">
                    <div class="flex items-center mb-4">
                        <svg class="h-8 w-8 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M18,2.01L6,2C4.89,2 4,2.89 4,4V20C4,21.11 4.89,22 6,22H18C19.11,22 20,21.11 20,20V4C20,2.89 19.11,2.01 18,2.01M18,20H6V4H18V20M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16M10.5,11A1.5,1.5 0 0,0 12,12.5A1.5,1.5 0 0,0 13.5,11A1.5,1.5 0 0,0 12,9.5A1.5,1.5 0 0,0 10.5,11Z" />
                        </svg>
                        <span class="ml-3 text-xl font-bold">Bachelor's Point</span>
                    </div>
                    <p class="text-gray-400">Making laundry feel like home<br> with professional care and <br>attention to detail.</p>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Services</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Wash & Fold</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Dry Cleaning</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Pickup & Delivery</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Commercial Services</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Company</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="aboutUs.html" class="hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>📍 123 Main Street, City, State 12345</li>
                        <li>📞 (555) 123-4567</li>
                        <li>✉️ info@bachelorspoint.com</li>
                        <li>🕒 Mon-Fri: 7AM-9PM</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>