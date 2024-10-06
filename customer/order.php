<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZeeStore - Orders</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #333; /* Dark gray background */
            margin: 0;
            padding: 0;
            color: #e0e0e0; /* Light gray text */
        }

        /* Header Bar Styles */
        header {
            background-color: #444; /* Medium dark gray header */
            padding: 10px 0;
        }

        header nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            color: #e0e0e0; /* Light gray title */
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
            color: #e0e0e0; /* Light gray links */
            text-decoration: none;
        }

        /* Container */
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #444; /* Medium gray background */
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
        }

        h2 {
            text-align: center;
            color: #bbb; /* Lighter gray for headings */
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 600;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #555; /* Table background - medium gray */
            border-radius: 8px;
        }

        table th, table td {
            padding: 14px;
            text-align: left;
            color: #e0e0e0; /* Light gray text */
            border-bottom: 1px solid #666; /* Border between rows - darker gray */
        }

        table th {
            background-color: #666; /* Dark gray table header */
            color: #e0e0e0;
            font-weight: 500;
            font-size: 16px;
        }

        table tr:nth-child(even) {
            background-color: #4d4d4d; /* Lighter gray for even rows */
        }

        table tr:hover {
            background-color: #3d3d3d; /* Darker gray on hover */
        }

        /* Status Badge Styles */
        .status {
            padding: 8px 12px;
            border-radius: 5px;
            color: #fff;
            text-align: center;
            font-size: 14px;
        }

        .status.processing {
            background-color: #b3b300; /* Soft yellow for processing */
        }

        .status.shipped {
            background-color: #5da2b8; /* Grayish blue for shipped */
        }

        .status.delivered {
            background-color: #5da47b; /* Muted green for delivered */
        }

        .status.cancelled {
            background-color: #b85d5d; /* Muted red for cancelled */
        }

        /* Responsive Design */
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
                    <th>Customer ID</th>
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
            $dbname = "zee_store"; // Replace with your database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve user ID from cookies
            if (isset($_COOKIE['user_data'])) {
                $cookie_exampleData = stripslashes($_COOKIE['user_data']);
                $arr = json_decode($_COOKIE['user_data'], true);
                $customer_id = $arr['user_id'];
            } 

            // SQL query to fetch orders for a specific customer
            $sql = "SELECT order_id, customer_id, total_amount, order_date, status FROM orders WHERE customer_id = $customer_id";
            
            $result = $conn->query($sql);
            if ($result -> num_rows > 0) {
                // Output data for each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['order_id'] . "</td>";
                    echo "<td>" . $row['customer_id'] . "</td>";
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
