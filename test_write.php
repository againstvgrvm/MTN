<?php
$file = __DIR__ . '/test_file.txt';
$content = "Test de permission d'écriture réussi!";
if (file_put_contents($file, $content)) {
    echo "Le fichier a été créé avec succès!";
} else {
    echo "Impossible de créer le fichier.";
}
?>
