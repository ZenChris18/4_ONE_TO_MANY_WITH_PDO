<?php
require_once 'core/dbconfig.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $database = new Database();
    $db = $database->getConnection();

    $query = "DELETE FROM software_engineers WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: read.php');
        exit();
    } else {
        echo "Error deleting the record.";
    }
} else {
    echo "No ID provided.";
}
?>
