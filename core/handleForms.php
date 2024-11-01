<?php
require_once '../config/dbconfig.php';

if (isset($_POST['insertCustomer'])) {
    // Handle customer registration
    $customerName = $_POST['customerName'];
    $email = $_POST['email'];
    $product_id = $_POST['product_id'];
    $start_date = $_POST['subscription_start_date'];
    $end_date = $_POST['subscription_end_date'];

    $query = "INSERT INTO Customers (customer_name, email, product_id, subscription_start_date, subscription_end_date)
              VALUES (:customer_name, :email, :product_id, :start_date, :end_date)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':customer_name', $customerName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':start_date', $start_date);
    $stmt->bindParam(':end_date', $end_date);

    if ($stmt->execute()) {
        echo "Customer registered successfully!";
    } else {
        echo "Error registering customer.";
    }
}

if (isset($_POST['insertProduct'])) {
    // Handle product addition
    $productName = $_POST['product_name'];
    $companyName = $_POST['company_name'];

    $query = "INSERT INTO SaaS_Products (product_name, company_name)
              VALUES (:product_name, :company_name)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':product_name', $productName);
    $stmt->bindParam(':company_name', $companyName);

    if ($stmt->execute()) {
        echo "Product added successfully!";
    } else {
        echo "Error adding product.";
    }
}
?>
