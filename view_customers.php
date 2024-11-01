<?php
include './core/dbconfig.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>
</head>
<body>
    <h3>Customer List</h3>
    <ul>
        <?php
        $query = "SELECT Customers.customer_id, Customers.customer_name, Customers.email, SaaS_Products.product_name, 
                         Customers.subscription_start_date, Customers.subscription_end_date
                  FROM Customers
                  JOIN SaaS_Products ON Customers.product_id = SaaS_Products.product_id";
        $stmt = $pdo->query($query);
        while ($row = $stmt->fetch()) {
            echo "<li>" . htmlspecialchars($row['customer_name']) . " (" . htmlspecialchars($row['email']) . ") - " .
                 "Subscribed to: " . htmlspecialchars($row['product_name']) .
                 " from " . $row['subscription_start_date'] . " to " . $row['subscription_end_date'] .
                 " | <a href='update_customer.php?customer_id=" . $row['customer_id'] . "'>Edit</a>" .
                 " | <a href='delete_customer.php?customer_id=" . $row['customer_id'] . "' onclick=\"return confirm('Are you sure you want to delete this customer?');\">Delete</a>" .
                 "</li>";
        }
        ?>
    </ul>
</body>
</html>
