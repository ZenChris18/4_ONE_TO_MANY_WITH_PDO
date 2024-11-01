<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add SaaS Product</title>
</head>
<body>
    <h3>Add New SaaS Product</h3>
    <form action="core/handleForms.php" method="POST">
        <p><label for="product_name">Product Name </label><input type="text" name="product_name" required></p>
        <p><label for="team_name">Team Name </label><input type="text" name="team_name" required></p>
        <p><input type="submit" name="insertProduct" value="Add Product"></p>
    </form>
</body>
</html>
