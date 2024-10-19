<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Engineer Registration</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h3>Welcome to the SaaS Company. Input your details here to register</h3>   
    <form action="core/handleForms.php" method="POST">
        <p><label for="FullName">Full Name </label><input type="text" name="FullName" required></p>
        <p><label for="Email">Email </label><input type="email" name="email" required></p>
        <p><label for="SaaS">Saas Products </label>
            <select name="SaaS" id="SaaS" onchange="showOtherTechStack(this)">
                <option value="JavaScript">SaaS 1</option>
                <option value="Python">SaaS 2</option>
                <option value="Java">SaaS 3</option>
                <option value="C#">SaaS 4</option>
                <option value="PHP">SaaS 5</option>
                <option value="Ruby">SaaS 6</option>
                <option value="Go">SaaS 7</option>
                <option value="Rust">SaaS 8</option>
                <option value="Other">Other</option>
            </select>
        </p>
        <p id="otherTechStackField" style="display:none;">
            <label for="OtherTechStack">Please specify: </label>
            <input type="text" name="OtherTechStack" id="OtherTechStack" placeholder="Enter your tech stack">
        </p>
        <p><label for="YearsExp">Years of Experience </label><input type="number" name="YearsExp" min="0" required></p>
        <p><label for="Education">Highest Education </label><input type="text" name="Education" required></p>
        <p><label for="Portfolio">Portfolio URL </label><input type="url" name="Portfolio" placeholder="https://example.com" required></p>
        <p><input type="submit" name="insertNewSoftwareEngBtn" value="Register"></p>
    </form>
    <script src="js/scripts.js"></script>
</body>
</html>
