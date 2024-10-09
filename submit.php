<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $telephone = htmlspecialchars($_POST['telephone']); // Ajout de la ligne pour le téléphone

    // Stockage dans un fichier texte
    $data = "Nom: $nom, Prénom: $prenom, Email: $email, Téléphone: $telephone\n"; // Ajout du téléphone
    file_put_contents('utilisateurs.txt', $data, FILE_APPEND);

    echo "Inscription réussie !";
} else {
    echo "Méthode de requête non valide.";
}
?>
