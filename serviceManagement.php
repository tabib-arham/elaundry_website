<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$dbname = "bachelorpoint";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$conn->query($sql);

// Select the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Create services table if not exists
$sql = "CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(255) NOT NULL,
    service_type VARCHAR(255) NOT NULL,
    charge DECIMAL(10,2) NOT NULL
)";
$conn->query($sql);

// Create locations table if not exists
$sql = "CREATE TABLE IF NOT EXISTS locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    location_name VARCHAR(255) NOT NULL,
    delivery_charge DECIMAL(10,2) NOT NULL
)";
$conn->query($sql);

// Handle service actions
$service_edit = false;
$service_item_val = '';
$service_type_val = '';
$service_charge_val = '';
$service_id = '';

if (isset($_GET['edit_service'])) {
    $service_id = $_GET['edit_service'];
    $result = $conn->query("SELECT * FROM services WHERE id = $service_id");
    if ($row = $result->fetch_assoc()) {
        $service_edit = true;
        $service_item_val = $row['item_name'];
        $service_type_val = $row['service_type'];
        $service_charge_val = $row['charge'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_service'])) {
        $item = $_POST['item'];
        $type = $_POST['type'];
        $charge = $_POST['charge'];
        $sql = "INSERT INTO services (item_name, service_type, charge) VALUES ('$item', '$type', $charge)";
        $conn->query($sql);
        header("Location: serviceManagement.php");
        exit();
    } elseif (isset($_POST['update_service'])) {
        $id = $_POST['id'];
        $item = $_POST['item'];
        $type = $_POST['type'];
        $charge = $_POST['charge'];
        $sql = "UPDATE services SET item_name='$item', service_type='$type', charge=$charge WHERE id=$id";
        $conn->query($sql);
        header("Location: serviceManagement.php");
        exit();
    }
}

if (isset($_GET['delete_service'])) {
    $id = $_GET['delete_service'];
    $sql = "DELETE FROM services WHERE id=$id";
    $conn->query($sql);
    header("Location: serviceManagement.php");
    exit();
}

// Handle location actions
$location_edit = false;
$location_name_val = '';
$location_charge_val = '';
$location_id = '';

if (isset($_GET['edit_location'])) {
    $location_id = $_GET['edit_location'];
    $result = $conn->query("SELECT * FROM locations WHERE id = $location_id");
    if ($row = $result->fetch_assoc()) {
        $location_edit = true;
        $location_name_val = $row['location_name'];
        $location_charge_val = $row['delivery_charge'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_location'])) {
        $name = $_POST['location_name'];
        $charge = $_POST['delivery_charge'];
        $sql = "INSERT INTO locations (location_name, delivery_charge) VALUES ('$name', $charge)";
        $conn->query($sql);
        header("Location: serviceManagement.php");
        exit();
    } elseif (isset($_POST['update_location'])) {
        $id = $_POST['id'];
        $name = $_POST['location_name'];
        $charge = $_POST['delivery_charge'];
        $sql = "UPDATE locations SET location_name='$name', delivery_charge=$charge WHERE id=$id";
        $conn->query($sql);
        header("Location: serviceManagement.php");
        exit();
    }
}

if (isset($_GET['delete_location'])) {
    $id = $_GET['delete_location'];
    $sql = "DELETE FROM locations WHERE id=$id";
    $conn->query($sql);
    header("Location: serviceManagement.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style/serviceManagement.css">
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
                    <a href="serviceProviderHome.html" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Home</a>
                    <a href="#" class="text-blue-600 hover:text-blue-600 px-3 py-2 text-sm font-medium">Manage
                        Service</a>
                    <div class="relative">
                        <button class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">
                           <a href="orderManagement.html"> Orders </a>
                        </button>
                        
                    </div>
                    <a href="serviceProviderlog.html" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Log Out</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Header -->
    <section class="wave-bg py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center text-white">
                <h2 class="text-3xl font-bold mb-2">Service Management</h2>
                <p class="text-blue-100 text-lg">Manage your services and locations</p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Manage Services Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Manage Services</h3>

            <!-- Add/Update Service Form -->
            <form method="post">
                <?php if ($service_edit) { ?>
                    <input type="hidden" name="id" value="<?php echo $service_id; ?>">
                <?php } ?>
                <div class="grid md:grid-cols-3 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Service Item</label>
                        <select name="item"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option>Select Item Type</option>
                            <option <?php if ($service_item_val == 'Shirt') echo 'selected'; ?>>Shirt</option>
                            <option <?php if ($service_item_val == 'Pant') echo 'selected'; ?>>Pant</option>
                            <option <?php if ($service_item_val == 'Jacket') echo 'selected'; ?>>Jacket</option>
                            <option <?php if ($service_item_val == 'Dress') echo 'selected'; ?>>Dress</option>
                            <option <?php if ($service_item_val == 'Bedsheet') echo 'selected'; ?>>Bedsheet</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Service Type</label>
                        <select name="type"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option>Select Service</option>
                            <option <?php if ($service_type_val == 'Wash') echo 'selected'; ?>>Wash</option>
                            <option <?php if ($service_type_val == 'Iron') echo 'selected'; ?>>Iron</option>
                            <option <?php if ($service_type_val == 'Dry Clean') echo 'selected'; ?>>Dry Clean</option>
                            <option <?php if ($service_type_val == 'Wash & Iron') echo 'selected'; ?>>Wash & Iron</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Service Charge</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">৳</span>
                            <input type="number" name="charge" placeholder="0.00" value="<?php echo $service_charge_val; ?>"
                                class="w-full pl-8 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <button type="submit" name="<?php echo $service_edit ? 'update_service' : 'add_service'; ?>" class="btn-hover bg-blue-500 text-white px-6 py-3 rounded-lg font-medium mb-8">
                    <?php echo $service_edit ? 'Update Service' : 'Add Service'; ?>
                </button>
            </form>

            <!-- Services Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Item Name</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Service Type</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Charge</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <?php
                        $result = $conn->query("SELECT * FROM services");
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-4 px-4"><?php echo $row['item_name']; ?></td>
                                <td class="py-4 px-4"><?php echo $row['service_type']; ?></td>
                                <td class="py-4 px-4">৳<?php echo $row['charge']; ?></td>
                                <td class="py-4 px-4">
                                    <a href="?edit_service=<?php echo $row['id']; ?>" class="text-blue-500 hover:text-blue-700 mr-3" aria-label="Edit">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="?delete_service=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this service?');" class="text-red-500 hover:text-red-700" aria-label="Delete">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Location & Delivery Charges Section -->
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <h3 class="text-xl font-bold text-gray-900 mb-6">Location & Delivery Charges</h3>

            <!-- Add/Update Location Form -->
            <form method="post">
                <?php if ($location_edit) { ?>
                    <input type="hidden" name="id" value="<?php echo $location_id; ?>">
                <?php } ?>
                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Location Name</label>
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <input type="text" name="location_name" placeholder="Enter location name" value="<?php echo $location_name_val; ?>"
                                class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Delivery Charge</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">৳</span>
                            <input type="number" name="delivery_charge" placeholder="0.00" value="<?php echo $location_charge_val; ?>"
                                class="w-full pl-8 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <button type="submit" name="<?php echo $location_edit ? 'update_location' : 'add_location'; ?>" class="btn-hover bg-blue-500 text-white px-6 py-3 rounded-lg font-medium mb-8">
                    <?php echo $location_edit ? 'Update Location' : 'Add Location'; ?>
                </button>
            </form>

            <!-- Locations Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-200">
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Location</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Delivery Charge</th>
                            <th class="text-left py-3 px-4 font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        <?php
                        $result = $conn->query("SELECT * FROM locations");
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="py-4 px-4"><?php echo $row['location_name']; ?></td>
                                <td class="py-4 px-4">৳<?php echo $row['delivery_charge']; ?></td>
                                <td class="py-4 px-4">
                                    <a href="?edit_location=<?php echo $row['id']; ?>" class="text-blue-500 hover:text-blue-700 mr-3" aria-label="Edit">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a href="?delete_location=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this location?');" class="text-red-500 hover:text-red-700" aria-label="Delete">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
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
<?php $conn->close(); ?>