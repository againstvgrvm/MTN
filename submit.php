<?php
// Connexion à la base de données (ajuste les paramètres de connexion)
$servername = "localhost";
$username = "ton_utilisateur";
$password = "ton_mot_de_passe";
$dbname = "nom_de_la_base_de_donnees";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];

// Insérer les données dans la base de données
$sql = "INSERT INTO utilisateurs (nom, prenom, email, telephone) VALUES ('$nom', '$prenom', '$email', '$telephone')";
if ($conn->query($sql) === TRUE) {
    // Récupérer toutes les données des utilisateurs
    $result = $conn->query("SELECT * FROM utilisateurs");
    if ($result->num_rows > 0) {
        $file = fopen(__DIR__ . "/utilisateurs.txt", "w");  // Utilise __DIR__ pour le chemin absolu
        if ($file) {
            while($row = $result->fetch_assoc()) {
                $data = "ID: " . $row["id"] . " - Nom: " . $row["nom"] . " - Prénom: " . $row["prenom"] . " - Email: " . $row["email"] . " - Téléphone: " . $row["telephone"] . "\n";
                fwrite($file, $data);
            }
            fclose($file);
            echo "Fichier utilisateurs.txt créé avec succès.";
        } else {
            echo "Impossible de créer le fichier utilisateurs.txt.";
        }
    }

    header("Location: page_suivante.php"); // Redirection vers la page suivante
    exit();
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
