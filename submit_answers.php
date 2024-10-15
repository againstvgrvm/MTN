<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root"; // Par défaut pour MAMP
$password = "root"; // Par défaut pour MAMP
$dbname = "nom_de_la_base_de_donnees"; // Remplace par le nom de ta base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Boucle pour récupérer et stocker les réponses des utilisateurs
foreach ($_POST as $question_id => $user_answer) {
    $sql = "INSERT INTO reponses (question_id, user_answer) VALUES ('$question_id', '$user_answer')";
    if (!$conn->query($sql)) {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

echo "Merci pour vos réponses !";
$conn->close();
?>
