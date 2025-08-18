
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Book your laundry service with <?php echo htmlspecialchars($shopName); ?> and view pricing details." />
    <title>User Order Place</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .wave-bg {
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            position: relative;
            overflow: hidden;
        }

        .notification-dot {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #ef4444;
            color: white;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: bold;
        }

        .bubble {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle at 35% 30%, rgba(255, 255, 255, 0.55) 55%, rgba(180, 210, 255, 0.12) 100%);
            box-shadow: 0 6px 32px 4px rgba(255, 255, 255, 0.22), 0 2px 12px 0 rgba(59, 130, 246, 0.10), inset 0 1px 8px 0 rgba(255, 255, 255, 0.18);
            opacity: 0.85;
            pointer-events: none;
            filter: blur(0.5px) saturate(1.15);
        }

        .bubble::after,
        .bubble::before {
            content: '';
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .bubble::after {
            top: 14%;
            left: 20%;
            width: 38%;
            height: 30%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.85) 65%, transparent 100%);
            opacity: 0.8;
            filter: blur(1.2px);
        }

        .bubble::before {
            bottom: 12%;
            right: 18%;
            width: 18%;
            height: 14%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.35) 80%, transparent 100%);
            opacity: 0.6;
            filter: blur(0.8px);
        }

        .bubble:nth-child(1) {
            left: 17%;
            width: 38px;
            height: 38px;
            bottom: -60px;
            animation: bubble-float 6s linear infinite;
        }

        .bubble:nth-child(2) {
            left: 50%;
            width: 26px;
            height: 26px;
            bottom: 0%;
            animation: bubble-float 10s linear infinite;
        }

        .bubble:nth-child(3) {
            right: 1%;
            width: 48px;
            height: 48px;
            bottom: 0%;
            animation: bubble-float 8s linear infinite;
        }

        @keyframes bubble-float {
            0% {
                transform: translateY(0) scale(0.9);
                opacity: 0;
            }

            10% {
                opacity: 0.7;
            }

            80% {
                opacity: 0.7;
                transform: translateY(-80vh) scale(1.1);
            }

            95% {
                opacity: 1;
                transform: translateY(-95vh) scale(1.6);
            }

            100% {
                transform: translateY(-100vh) scale(2.5);
                opacity: 0;
            }
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

        .pricing-section {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .pricing-section.open {
            max-height: 800px;
        }

        .selected-items {
            background: white;
            border-radius: 16px;
            padding: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
            margin-top: 20px;
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
                    <a href="userHome.php" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Home</a>
                    <a href="trackOrder.html" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium relative">
                        Track Order
                    </a>
                    <a href="log.html" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium">Log Out</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="wave-bg py-20 flex items-center justify-center relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4"><?php echo htmlspecialchars($shopName); ?></h1>
            <p class="text-xl text-white mb-4"><?php echo htmlspecialchars($location); ?>, Less than 1 KM away</p>
            <p class="text-lg text-blue-100 mb-6">Delivery: 24-72 Hours</p>
            <!-- Floating Bubbles -->
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
        </div>
    </section>

    <?php if (isset($error_message)): ?>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <?php echo htmlspecialchars($error_message); ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- Service Selection Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-lg p-8 card-hover text-center mx-auto max-w-2xl">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">Select Your Items</h2>
                <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4 mb-6">
                    <select id="serviceSelect" class="border border-gray-300 rounded-lg p-2 w-full sm:w-1/4">
                        <option value="">Select Service</option>
                        <option value="iron">Iron</option>
                        <option value="dryClean">Dry Clean</option>
                        <option value="onlyWash">Only Wash</option>
                    </select>
                    <select id="itemSelect" class="border border-gray-300 rounded-lg p-2 w-full sm:w-1/4">
                        <option value="">Select Item</option>
                        <?php foreach ($pricing_data as $item): ?>
                        <option value="<?php echo strtolower(str_replace(' ', '', $item['item_name'])); ?>">
                            <?php echo htmlspecialchars($item['item_name']); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="flex items-center space-x-2">
                        <button id="decrease" class="bg-gray-200 text-gray-700 px-2 py-1 rounded">-</button>
                        <span id="quantity">0</span>
                        <button id="increase" class="bg-gray-200 text-gray-700 px-2 py-1 rounded">+</button>
                        <button id="addItem" class="btn-hover bg-blue-500 text-white px-4 py-1 rounded-full">Add Item</button>
                    </div>
                </div>
                <div class="text-right">
                    <button id="seePricing"
                        class="btn-hover bg-blue-500 text-white px-6 py-3 rounded-full font-medium">See Pricing</button>
                </div>
            </div>

            <!-- Pricing Section -->
            <div id="pricingSection" class="pricing-section mt-4 mx-auto max-w-2xl">
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Pricing Details</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="p-2">Item</th>
                                    <th class="p-2">Iron</th>
                                    <th class="p-2">Dry Clean</th>
                                    <th class="p-2">Only Wash</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pricing_data as $item): ?>
                                <tr class="border-b">
                                    <td class="p-2"><?php echo htmlspecialchars($item['item_name']); ?></td>
                                    <td class="p-2"><?php echo $item['iron_price'] > 0 ? $item['iron_price'] : '-'; ?></td>
                                    <td class="p-2"><?php echo $item['dry_clean_price']; ?></td>
                                    <td class="p-2"><?php echo $item['only_wash_price']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Selected Items Section -->
            <div id="selectedItemsSection" class="selected-items mx-auto max-w-2xl">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Selected Items</h2>
                <ul id="selectedItemsList" class="space-y-2"></ul>
                <p id="totalCost" class="mt-4 text-gray-900 font-medium">Total Cost: 0 BDT</p>
            </div>
            
            <!-- Place Order Form -->
            <form id="orderForm" method="POST" class="text-center mt-6">
                <input type="hidden" name="place_order" value="1">
                <input type="hidden" name="order_items" id="orderItems">
                <input type="hidden" name="total_amount" id="totalAmount">
                <button type="submit" id="placeOrder"
                    class="btn-hover bg-green-500 text-white px-6 py-3 rounded-full font-medium">Place Order</button>
            </form>
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

    <!-- JavaScript -->
    <script>
        // Pricing data from PHP
        const pricingData = <?php echo json_encode($pricing_data); ?>;
        
        // Create pricing lookup object
        const prices = {};
        pricingData.forEach(item => {
            const key = item.item_name.toLowerCase().replace(/\s+/g, '');
            prices[key] = {
                iron: parseFloat(item.iron_price),
                dryClean: parseFloat(item.dry_clean_price),
                onlyWash: parseFloat(item.only_wash_price)
            };
        });

        // Pricing section toggle
        document.getElementById('seePricing').addEventListener('click', () => {
            const pricingSection = document.getElementById('pricingSection');
            pricingSection.classList.toggle('open');
        });

        // Quantity and item management
        let selectedItems = [];
        let quantity = 0;

        document.getElementById('increase').addEventListener('click', () => {
            quantity++;
            document.getElementById('quantity').textContent = quantity;
        });

        document.getElementById('decrease').addEventListener('click', () => {
            if (quantity > 0) {
                quantity--;
                document.getElementById('quantity').textContent = quantity;
            }
        });

        document.getElementById('addItem').addEventListener('click', () => {
            const serviceSelect = document.getElementById('serviceSelect');
            const itemSelect = document.getElementById('itemSelect');
            const selectedService = serviceSelect.value;
            const selectedItem = itemSelect.value;
            
            if (selectedService && selectedItem && quantity > 0) {
                const itemName = itemSelect.options[itemSelect.selectedIndex].text;
                const itemPrice = prices[selectedItem] ? prices[selectedItem][selectedService] : 0;
                const totalItemPrice = itemPrice * quantity;
                
                const item = { 
                    name: itemName, 
                    service: selectedService, 
                    quantity: quantity,
                    unitPrice: itemPrice,
                    amount: totalItemPrice
                };
                
                // Check if item already exists, if so update quantity
                const existingItemIndex = selectedItems.findIndex(i => i.name === item.name && i.service === item.service);
                
                if (existingItemIndex !== -1) {
                    selectedItems[existingItemIndex].quantity += item.quantity;
                    selectedItems[existingItemIndex].amount = selectedItems[existingItemIndex].unitPrice * selectedItems[existingItemIndex].quantity;
                } else {
                    selectedItems.push(item);
                }
                
                updateSelectedItems();
                quantity = 0;
                document.getElementById('quantity').textContent = quantity;
                itemSelect.value = '';
                serviceSelect.value = '';
                updateTotalCost();
            } else {
                alert('Please select a service, item, and quantity.');
            }
        });

        function updateSelectedItems() {
            const selectedItemsList = document.getElementById('selectedItemsList');
            selectedItemsList.innerHTML = '';
            selectedItems.forEach((item, index) => {
                const li = document.createElement('li');
                li.className = 'flex justify-between items-center bg-gray-50 p-2 rounded';
                li.innerHTML = `
                    <span>${item.name} - ${item.service.replace(/([A-Z])/g, ' $1').trim()} - Qty: ${item.quantity} - ${item.amount} BDT</span>
                    <button onclick="removeItem(${index})" class="text-red-500 hover:text-red-700">Remove</button>
                `;
                selectedItemsList.appendChild(li);
            });
        }

        function removeItem(index) {
            selectedItems.splice(index, 1);
            updateSelectedItems();
            updateTotalCost();
        }

        function updateTotalCost() {
            let total = 0;
            selectedItems.forEach(item => {
                total += item.amount;
            });
            document.getElementById('totalCost').textContent = `Total Cost: ${total} BDT`;
            document.getElementById('totalAmount').value = total;
        }

        // Place Order functionality
        document.getElementById('orderForm').addEventListener('submit', (e) => {
            if (selectedItems.length === 0) {
                e.preventDefault();
                alert('Please add items to your order before placing it.');
                return;
            }
            
            // Prepare order data
            document.getElementById('orderItems').value = JSON.stringify(selectedItems);
        });
    </script>
</body>

</html>