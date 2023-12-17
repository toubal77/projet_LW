<h2>Illustration Form</h2>

<form action="process_illustration.php" method="post" enctype="multipart/form-data">
    <label for="titre">Titre:</label>
    <input type="text" id="titre" name="titre" required><br>

    <label for="format">Format:</label>
    <input type="text" id="format" name="format" required><br>

    <label for="langueParDefaut">Langue par Défaut:</label>
    <input type="text" id="langueParDefaut" name="langueParDefaut" required><br>

    <label for="idUtilisateurs">ID Utilisateurs:</label>
    <input type="text" id="idUtilisateurs" name="idUtilisateurs" required><br>

    <label for="svgImage">SVG Image:</label>
    <input type="file" id="svgImage" name="svgImage" accept=".svg" required><br>

    <input type="submit" value="Submit">
</form>