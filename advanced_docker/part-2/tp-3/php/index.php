<?php
// Configuration de la base de données
$host = "mysql"; // Le nom du service du conteneur MySQL dans Docker Compose
$database = "library";
$username = "admin";
$password = "admin";

try {
    $db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour sélectionner tous les livres
    $query = "SELECT * FROM BOOK";
    $result = $db->query($query);

    // Affichage des livres sous forme de tableau
    echo "<h1>Liste des Livres (BOOK)</h1>";
    echo "<table border='1'>
          <tr>
          <th>ID</th>
          <th>Titre</th>
          <th>Auteur</th>
          <th>Année de publication</th>
          <th>ID de l'utilisateur</th>
          </tr>";

    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['author'] . "</td>";
        echo "<td>" . $row['publication_year'] . "</td>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$db = null;
?>
