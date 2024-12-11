<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>

    <h2>Formulaire d'enregistrement</h2>
    <form method="POST" action="process_form.php">
        <label for="email">Email:</label>
        <input type="email"  name="email" required><br><br>

        <label for="firstname">First Name:</label>
        <input type="text"  name="firstname" required><br><br>

        <label for="lastname">Last Name:</label>
        <input type="text"  name="lastname" required><br><br>

        <label for="age">Age:</label>
        <input type="number"  name="age" required><br><br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>
