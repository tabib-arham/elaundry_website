<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bachelor's Point - User Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .wave-bg {
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            position: relative;
            overflow: hidden;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .btn-hover {
            transition: all 0.3s ease;
        }

        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        .service-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
        }

        .notification-dot {
            position: absolute;
            top: -8px;
            right: -8px;
            width: 20px;
            height: 20px;
            background: #ef4444;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: white;
            font-weight: bold;
        }

        .search-input {
            transition: all 0.3s ease;
        }

        .search-input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            border-color: #3b82f6;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
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
                    <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Home</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Services</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">About</a>
                    <a href="#" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Contact</a>
                    <div class="relative">
                        <button class="btn-hover bg-blue-500 text-white px-4 py-2 rounded-full font-medium">
                            Track Order
                        </button>
                        <div class="notification-dot">3</div>
                    </div>
                    <a href="profile.html" class="flex items-center focus:outline-none">
                        <img class="h-8 w-8 rounded-full bg-blue-500 border-2 border-gray-300 hover:border-blue-400 transition-colors"
                            src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3E%3Cpath d='M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z'/%3E%3C/svg%3E"
                            alt="Profile">
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- User Profile Section -->
    <section class="wave-bg py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <div class="flex justify-center mb-4">
                    <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center">
                        <svg class="w-12 h-12 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    </div>
                </div>
                <h2 class="text-3xl font-bold mb-2">Sabrin Liza</h2>
                <p class="text-blue-100 text-lg">RASGI, DSC, Ashulia, Savar, Dhaka</p>
            </div>
        </div>
    </section>

    <!-- Service Selection -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Welcome to Bachelor's Point!</h2>
                <p class="text-xl text-gray-600">Choose the laundry service you want today</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <!-- Dry Clean -->
                <div class="service-card card-hover text-center cursor-pointer">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M6,2C4.89,2 4,2.89 4,4V20C4,21.11 4.89,22 6,22H18C19.11,22 20,21.11 20,20V4C20,2.89 19.11,2 18,2H6M6,4H18V20H6V4M8,6V8H16V6H8M8,10V12H16V10H8M8,14V16H16V14H8Z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Dry Clean</h3>
                    <p class="text-gray-600">Professional dry cleaning for delicate fabrics</p>
                </div>

                <!-- Laundry -->
                <div class="service-card card-hover text-center cursor-pointer">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M18,2.01L6,2C4.89,2 4,2.89 4,4V20C4,21.11 4.89,22 6,22H18C19.11,22 20,21.11 20,20V4C20,2.89 19.11,2.01 18,2.01M18,20H6V4H18V20M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16Z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Laundry</h3>
                    <p class="text-gray-600">Complete wash and fold service</p>
                </div>

                <!-- Iron -->
                <div class="service-card card-hover text-center cursor-pointer">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M21,6C21,4.89 20.11,4 19,4H5C3.89,4 3,4.89 3,6V10C3,11.11 3.89,12 5,12H19C20.11,12 21,11.11 21,10V6M5,6H19V10H5V6M21,16V20C21,21.11 20.11,22 19,22H5C3.89,22 3,21.11 3,20V16H21M19,16H5V20H19V16Z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Iron</h3>
                    <p class="text-gray-600">Professional ironing and pressing</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Nearest Laundry Services -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header with Search Bar -->
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-8 gap-4">
                <h2 class="text-3xl font-bold text-gray-900">Nearest Laundry Services</h2>

                <!-- Search Bar -->
                <div class="relative flex-shrink-0 w-full sm:w-96">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                        </svg>
                    </div>
                    <input type="text"
                        class="search-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white shadow-sm"
                        placeholder="Search laundry services..." id="searchInput" onkeyup="searchLaundryServices()">
                    <button class="absolute inset-y-0 right-0 pr-3 flex items-center" onclick="clearSearch()">
                        <svg class="h-5 w-5 text-gray-400 hover:text-gray-600 cursor-pointer" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Laundry Service Cards -->
            <div id="laundryServices">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8 laundry-card"
                    data-name="lavandar laundry" data-distance="1">
                    <div class="bg-gradient-to-r from-purple-400 to-pink-400 p-8 text-white relative">
                        <div class="absolute right-8 top-8">
                            <button class="text-white hover:text-red-200 transition-colors">
                                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5 2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z" />
                                </svg>
                            </button>
                        </div>
                        <div class="floating-animation">
                            <div class="flex items-center justify-center mb-6">
                                <div class="w-24 h-24 bg-white rounded-2xl flex items-center justify-center mr-6">
                                    <svg class="w-12 h-12 text-purple-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M18,2.01L6,2C4.89,2 4,2.89 4,4V20C4,21.11 4.89,22 6,22H18C19.11,22 20,21.11 20,20V4C20,2.89 19.11,2.01 18,2.01M18,20H6V4H18V20M12,6A6,6 0 0,0 6,12A6,6 0 0,0 12,18A6,6 0 0,0 18,12A6,6 0 0,0 12,6M12,16A4,4 0 0,1 8,12A4,4 0 0,1 12,8A4,4 0 0,1 16,12A4,4 0 0,1 12,16Z" />
                                    </svg>
                                </div>
                                <div class="w-24 h-24 bg-white rounded-2xl flex items-center justify-center">
                                    <svg class="w-12 h-12 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Lavendar Laundry</h3>
                                <div class="flex items-center text-sm text-gray-500 mb-2">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                    </svg>
                                    <p>Khagan Bazar</p>
                                </div>
                                <div class="flex items-center text-sm text-gray-500 mb-2">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                        </svg>
                                        <p>Less than 1 KM away</p>

                                                                      
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z" />
                                    </svg>
                                    Delivery period 24-72 Hours
                                </div>
                            </div>
                            <button class="btn-hover bg-blue-500 text-white px-6 py-3 rounded-full font-semibold">
                                Book
                            </button>
                        </div>
                    </div>
                </div>


            </div>

        </div>

        <div class="text-center">
            <button class="text-blue-500 font-medium hover:text-blue-600 transition-colors">
                Search more
            </button>
        </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
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
                        <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
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