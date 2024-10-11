<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page HTML</title>
    <link rel="stylesheet" href="file.css">
</head>
<body>
    <h1>Bienvenue sur ma page</h1>
    <p>Ceci est un exemple de page HTML.</p>

    <?php
    // Lire le fichier JSON et le décoder
    $json = file_get_contents('questions.json');
    $questions = json_decode($json, true);

    // Mélanger les questions et en sélectionner un nombre limité
    shuffle($questions);
    $selectedQuestions = array_slice($questions, 0, 10);

    // Afficher les questions et sous-questions
    foreach ($selectedQuestions as $question) {
        echo '<div class="question-container">';
        echo '<h2>' . $question['question'] . '</h2>';
        echo '<ul>';
        foreach ($question['subquestions'] as $subquestion) {
            echo '<li>' . $subquestion . '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
    ?>
</body>
</html>
