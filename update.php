<?php
require_once 'core/dbconfig.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $database = new Database();
    $db = $database->getConnection();
    
    $query = "SELECT * FROM software_engineers WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['updateSoftwareEngBtn'])) {
    $fullName = $_POST['FullName'];
    $email = $_POST['email'];
    $techStack = ($_POST['TechStack'] == 'Other') ? $_POST['OtherTechStack'] : $_POST['TechStack'];
    $yearsExp = $_POST['YearsExp'];
    $education = $_POST['Education'];
    $portfolioUrl = $_POST['Portfolio'];

    $query = "UPDATE software_engineers SET fullname = :fullname, email = :email, tech_stack = :tech_stack, 
              years_of_exp = :years_of_exp, highest_education = :highest_education, portfolio_url = :portfolio_url 
              WHERE id = :id";
    $stmt = $db->prepare($query);
    
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':fullname', $fullName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tech_stack', $techStack);
    $stmt->bindParam(':years_of_exp', $yearsExp);
    $stmt->bindParam(':highest_education', $education);
    $stmt->bindParam(':portfolio_url', $portfolioUrl);

    if ($stmt->execute()) {
        echo "Record updated successfully!";
    } else {
        echo "Failed to update record.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Software Engineer</title>
</head>
<body>
    <h3>Update Software Engineer</h3>
    <form action="" method="POST">
        <p>
            <label for="FullName">Full Name: </label>
            <input type="text" name="FullName" value="<?php echo htmlspecialchars($record['fullname']); ?>" required>
        </p>
        <p>
            <label for="Email">Email: </label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($record['email']); ?>" required>
        </p>
        <p>
            <label for="TechStack">Tech Stack: </label>
            <select name="TechStack" id="TechStack" onchange="showOtherTechStack(this)">
                <option value="JavaScript" <?php echo ($record['tech_stack'] == 'JavaScript') ? 'selected' : ''; ?>>JavaScript</option>
                <option value="Python" <?php echo ($record['tech_stack'] == 'Python') ? 'selected' : ''; ?>>Python</option>
                <option value="Java" <?php echo ($record['tech_stack'] == 'Java') ? 'selected' : ''; ?>>Java</option>
                <option value="C#" <?php echo ($record['tech_stack'] == 'C#') ? 'selected' : ''; ?>>C#</option>
                <option value="PHP" <?php echo ($record['tech_stack'] == 'PHP') ? 'selected' : ''; ?>>PHP</option>
                <option value="Ruby" <?php echo ($record['tech_stack'] == 'Ruby') ? 'selected' : ''; ?>>Ruby</option>
                <option value="Go" <?php echo ($record['tech_stack'] == 'Go') ? 'selected' : ''; ?>>Go</option>
                <option value="Rust" <?php echo ($record['tech_stack'] == 'Rust') ? 'selected' : ''; ?>>Rust</option>
                <option value="Other" <?php echo ($record['tech_stack'] == 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>
        </p>

        <p id="otherTechStackField" style="display:none;">
            <label for="OtherTechStack">Please specify: </label>
            <input type="text" name="OtherTechStack" id="OtherTechStack" placeholder="Enter your tech stack" value="<?php echo ($record['tech_stack'] == 'Other') ? htmlspecialchars($record['tech_stack']) : ''; ?>">
        </p>

        <p>
            <label for="YearsExp">Years of Experience: </label>
            <input type="number" name="YearsExp" min="0" value="<?php echo htmlspecialchars($record['years_of_exp']); ?>" required>
        </p>
        <p>
            <label for="Education">Highest Education: </label>
            <input type="text" name="Education" value="<?php echo htmlspecialchars($record['highest_education']); ?>" required>
        </p>
        <p>
            <label for="Portfolio">Portfolio URL: </label>
            <input type="url" name="Portfolio" value="<?php echo htmlspecialchars($record['portfolio_url']); ?>" placeholder="https://example.com" required>
        </p>
        <p>
            <input type="submit" name="updateSoftwareEngBtn" value="Update">
        </p>
    </form>

    <script src="js/updateScripts.js"></script>
</body>
</html>
