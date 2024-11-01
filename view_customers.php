<?php
include './core/dbconfig.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h3>Customer List</h3>
    <table>
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Product Name</th>
                <th>Subscription Start Date</th>
                <th>Subscription End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT Customers.customer_id, Customers.customer_name, Customers.email, 
                             SaaS_Products.product_name, 
                             Customers.subscription_start_date, Customers.subscription_end_date
                      FROM Customers
                      JOIN SaaS_Products ON Customers.product_id = SaaS_Products.product_id";
            $stmt = $pdo->query($query);
            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['customer_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['subscription_start_date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['subscription_end_date']) . "</td>";
                echo "<td>
                        <a href='update_customer.php?customer_id=" . $row['customer_id'] . "'>Edit</a> | 
                        <a href='delete_customer.php?customer_id=" . $row['customer_id'] . "' onclick=\"return confirm('Are you sure you want to delete this customer?');\">Delete</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <p><a href="index.php">Register a Customer</a></p>
    <p><a href="add_product.php">Add New SaaS Product</a></p>
</body>
</html>
