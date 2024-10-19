<?php 
require_once 'dbconfig.php';

if (isset($_POST['insertNewSoftwareEngBtn'])) {
    $fullName = $_POST['FullName'];
    $email = $_POST['email'];
    $techStack = $_POST['TechStack'];
    $yearsExp = $_POST['YearsExp'];
    $education = $_POST['Education'];
    $portfolioUrl = $_POST['Portfolio'];

    if (empty($fullName) || empty($email) || empty($techStack) || empty($yearsExp) || empty($education) || empty($portfolioUrl)) {
        echo "All fields are required.";
        exit;
    }

    $query = "INSERT INTO software_engineers (fullname, email, tech_stack, years_of_exp, highest_education, portfolio_url) 
              VALUES (:fullname, :email, :tech_stack, :years_of_exp, :highest_education, :portfolio_url)";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':fullname', $fullName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tech_stack', $techStack);
    $stmt->bindParam(':years_of_exp', $yearsExp);
    $stmt->bindParam(':highest_education', $education);
    $stmt->bindParam(':portfolio_url', $portfolioUrl);

    if ($stmt->execute()) {
        echo "Record added successfully!";
    } else {
        echo "Unable to add record.";
    }
}
?>
