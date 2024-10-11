<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" href="file.css"> <!-- Lien vers le fichier CSS -->
</head>
<body>
    <form id="registrationForm" action="submit.php" method="POST" onsubmit="return handleSubmit();"> <!-- Ajout de l'événement onsubmit -->
        <h1>Inscription</h1>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="email">Adresse e-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="telephone">Numéro de téléphone:</label>
        <input type="tel" id="telephone" name="telephone" required>

        <input type="submit" value="S'inscrire" id="submitButton"> <!-- Ajout d'un ID pour le bouton -->
    </form>
    <script>
        function handleSubmit() {
            const submitButton = document.getElementById('submitButton');
            submitButton.classList.add('clicked'); // Ajout de la classe "clicked"
            setTimeout(() => {
                submitButton.classList.remove('clicked'); // Retrait de la classe après 1 seconde
            }, 1000);
            return true; // Permet la soumission du formulaire
        }
    </script>
</body>
</html>
