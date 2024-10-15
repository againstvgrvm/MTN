<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions aléatoires</title>
    <link rel="stylesheet" href="file.css">
    <style>
        .question-container {
            margin-bottom: 20px;
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
        }
        .question-container h2 {
            margin-bottom: 10px;
        }
        .question-container ul {
            list-style-type: none;
            padding: 0;
        }
        .question-container li {
            margin-bottom: 10px;
        }
        .question-container input[type="radio"] {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Questions aléatoires</h1>
    <form action="submit_answers.php" method="POST">
    <?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root"; // Nom d'utilisateur par défaut de MAMP
    $password = "root"; // Mot de passe par défaut de MAMP
    $dbname = "nom_de_la_base_de_donnees"; // Remplace par le nom de ta base de données

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    // Récupérer des questions aléatoires
    $sql = "SELECT * FROM questions ORDER BY RAND() LIMIT 10";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Afficher les questions
        while ($row = $result->fetch_assoc()) {
            echo '<div class="question-container">';
            echo '<h2>' . $row['question_no'] . '. ' . $row['question'] . '</h2>';
            echo '<ul>';
            echo '<li><input type="radio" name="question' . $row['id'] . '" value="' . $row['opt1'] . '">' . $row['opt1'] . '</li>';
            echo '<li><input type="radio" name="question' . $row['id'] . '" value="' . $row['opt2'] . '">' . $row['opt2'] . '</li>';
            echo '</ul>';
            echo '</div>';
        }
    } else {
        echo "Aucune question trouvée.";
    }

    $conn->close();
    ?>
    <input type="submit" value="Soumettre">
    </form>
</body>
</html>
