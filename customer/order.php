<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Statuses</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1a1a1a; /* Dark background */
            margin: 0;
            padding: 0;
            color: #f5f5f5;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #2c2c2c; /* Darker container background */
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
        }

        h2 {
            text-align: center;
            color: #ffa500; /* Orange color for headers */
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #333; /* Table background */
            border-radius: 8px;
        }

        table th, table td {
            padding: 14px;
            text-align: left;
            color: #f5f5f5;
            border-bottom: 1px solid #444; /* Border between rows */
        }

        table th {
            background-color: #444; /* Dark header background */
            color: #ffa500;
            font-weight: 500;
            font-size: 16px;
        }

        table tr:nth-child(even) {
            background-color: #2c2c2c;
        }

        table tr:hover {
            background-color: #3d3d3d;
        }

        .status {
            padding: 8px 12px;
            border-radius: 5px;
            color: #fff;
            text-align: center;
            font-size: 14px;
        }

        .status.processing {
            background-color: #ffb200;
        }

        .status.shipped {
            background-color: #17a2b8;
        }

        .status.delivered {
            background-color: #28a745;
        }

        .status.cancelled {
            background-color: #dc3545;
        }

        @media (max-width: 600px) {
            .container {
                width: 90%;
                padding: 20px;
            }

            table th, table td {
                padding: 10px;
            }

            h2 {
                font-size: 24px;
            }
        }

        /* Header Bar Styles */
        header {
            background-color: #1a1a1a; 
            padding: 10px 0;
        }

        header nav {
            display: flex; 
            justify-content: space-between; 
            align-items: center;
        }

        header h1 {
            color: #ffa500; 
            margin: 0; 
            font-size: 24px;
        }

        header ul {
            list-style: none; 
            padding: 0; 
            margin: 0; 
            display: flex; 
            gap: 20px;
        }

        header ul li a {
            color: #f5f5f5; 
            text-decoration: none;
        }
    </style>
</head>

<body>

    <!-- Header Bar -->
    <header>
        <div class="container">
            <nav>
                <h1>ZeeStore</h1>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="order.php">Orders</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="../index.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- End Header Bar -->

    <div class="container">
        <h2>Your Order Status</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Order Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

            <?php
            // Database connection settings
            $servername = "localhost"; // Replace with your server name
            $username = "root"; // Replace with your database username
            $password = ""; // Replace with your database password
            $dbname = "zeestore"; // Replace with your database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Replace 'customer_id' with the session or request identifier for logged-in customer
            $customer_id = 1; // For example, static value for testing

            // SQL query to fetch orders for a specific customer
            $sql = "SELECT id, product_name, order_date, status FROM orders WHERE customer_id = $customer_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data for each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['product_name'] . "</td>";
                    echo "<td>" . $row['order_date'] . "</td>";
                    echo "<td><span class='status " . strtolower($row['status']) . "'>" . $row['status'] . "</span></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No orders found.</td></tr>";
            }

            $conn->close();
            ?>

            </tbody>
        </table>
    </div>

</body>

</html>
