<?php
require_once './core/dbconfig.php';

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
    $teamName = $_POST['team_name'];

    $query = "INSERT INTO SaaS_Products (product_name, team_name)
              VALUES (:product_name, :team_name)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':product_name', $productName);
    $stmt->bindParam(':team_name', $teamName);

    if ($stmt->execute()) {
        echo "Product added successfully!";
    } else {
        echo "Error adding product.";
    }
}

if (isset($_POST['updateCustomer'])) {
    // Handle customer update
    $customer_id = $_POST['customer_id'];
    $customerName = $_POST['customerName'];
    $email = $_POST['email'];
    $product_id = $_POST['product_id'];
    $start_date = $_POST['subscription_start_date'];
    $end_date = $_POST['subscription_end_date'];

    $query = "UPDATE Customers 
              SET customer_name = :customer_name, email = :email, product_id = :product_id, 
                  subscription_start_date = :start_date, subscription_end_date = :end_date
              WHERE customer_id = :customer_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':customer_id', $customer_id);
    $stmt->bindParam(':customer_name', $customerName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':start_date', $start_date);
    $stmt->bindParam(':end_date', $end_date);

    if ($stmt->execute()) {
        echo "Customer updated successfully!";
    } else {
        echo "Error updating customer.";
    }
}

?>
