<?php
// Connexion à la base de données

$conn = new PDO("mysql:host=localhost;dbname=test", "root", "");

// Vérifier si la méthode POST a été utilisée
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $_POST['email1'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];

    // Validation de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse email invalide.";
        exit; // Arrêter l'exécution si l'email est invalide
    }

    // Vérifier si l'email existe déjà dans la base de données
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo "Cet email est déjà utilisé.";
        exit; // Arrêter l'exécution si l'email existe déjà
    }

    // Insertion dans la base de données
    $sql = "INSERT INTO users (email, firstname, lastname, age) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email, $firstname, $lastname, $age]);

    echo "Les données ont été ajoutées avec succès !";
} else {
    echo "Méthode HTTP non autorisée.";
}
?>
