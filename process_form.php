<?php
try {
    // Connexion à la base de données
    $conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification si tous les champs sont remplis
    if (isset($_POST['email']) && !empty($_POST['email']) && 
        isset($_POST['firstname']) && !empty($_POST['firstname']) &&
        isset($_POST['lastname']) && !empty($_POST['lastname']) &&
        isset($_POST['age']) && !empty($_POST['age'])) {

        // Récupération des données du formulaire
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];

        // Préparation de la requête d'insertion
        $sql = "INSERT INTO users (email, firstname, lastname, age) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$email, $firstname, $lastname, $age]);

        echo "Vous avez réussi";
    } else {
        echo "Vous avez échoué. Veuillez remplir tous les champs.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>