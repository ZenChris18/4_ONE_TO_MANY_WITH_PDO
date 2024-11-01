<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SaaS Company Registration</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h3>Welcome to the SaaS Company. Register a Customer or Add a SaaS Product</h3>

    <!-- Link to add a new SaaS Product -->
    <p><a href="add_product.php">Add New SaaS Product</a></p>

    <!-- Customer Registration Form -->
    <h4>Register a Customer</h4>
    <form action="core/handleForms.php" method="POST">
        <p><label for="customerName">Full Name </label><input type="text" name="customerName" required></p>
        <p><label for="email">Email </label><input type="email" name="email" required></p>
        <p><label for="product_id">Select SaaS Product </label>
            <select name="product_id" required>
                <?php
                require '../config/dbconfig.php';
                $stmt = $pdo->query("SELECT product_id, product_name FROM SaaS_Products");
                while ($row = $stmt->fetch()) {
                    echo "<option value='" . $row['product_id'] . "'>" . htmlspecialchars($row['product_name']) . "</option>";
                }
                ?>
            </select>
        </p>
        <p><label for="subscription_start_date">Subscription Start Date </label><input type="date" name="subscription_start_date" required></p>
        <p><label for="subscription_end_date">Subscription End Date </label><input type="date" name="subscription_end_date" required></p>
        <p><input type="submit" name="insertCustomer" value="Register Customer"></p>
    </form>

    <!-- View Customers Link -->
    <p><a href="view_customers.php">View All Customers</a></p>

    <script src="js/scripts.js"></script>
</body>
</html>
