<?php
require_once 'core/dbconfig.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM software_engineers";
$stmt = $db->prepare($query);
$stmt->execute();

$softwareEngineers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Software Engineers</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h3>Registered Software Engineers</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Tech Stack</th>
                <th>Years of Experience</th>
                <th>Highest Education</th>
                <th>Portfolio</th>
                <th>Date Added</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($softwareEngineers as $engineer): ?>
                <tr>
                    <td><?php echo $engineer['id']; ?></td>
                    <td><?php echo $engineer['fullname']; ?></td>
                    <td><?php echo $engineer['email']; ?></td>
                    <td><?php echo $engineer['tech_stack']; ?></td>
                    <td><?php echo $engineer['years_of_exp']; ?></td>
                    <td><?php echo $engineer['highest_education']; ?></td>
                    <td><a href="<?php echo $engineer['portfolio_url']; ?>" target="_blank">View Portfolio</a></td>
                    <td><?php echo $engineer['date_added']; ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $engineer['id']; ?>">Update</a> |
                        <a href="delete.php?id=<?php echo $engineer['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
