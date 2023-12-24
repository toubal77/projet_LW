<h1 style="background-color: #333; color: #fff; padding: 20px; text-align: center;">Illustration Form</h1>

<form action="process_illustration.php" method="post" enctype="multipart/form-data" style="max-width: 400px; margin: 20px auto; padding: 15px; border: 1px solid #ddd; border-radius: 5px;">

    <label for="titre" style="display: block; margin-bottom: 5px; color: #333;">Titre:</label>
    <input type="text" id="titre" name="titre" required style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box;">

    <label for="format" style="display: block; margin-bottom: 5px; color: #333;">Format:</label>
    <input type="text" id="format" name="format" required style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box;">

    <label for="langueParDefaut" style="display: block; margin-bottom: 5px; color: #333;">Langue par Défaut:</label>
    <input type="text" id="langueParDefaut" name="langueParDefaut" required style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box;">

    <label for="idUtilisateurs" style="display: block; margin-bottom: 5px; color: #333;">ID Utilisateurs:</label>
    <input type="text" id="idUtilisateurs" name="idUtilisateurs" required style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box;">

    <label for="svgImage" style="display: block; margin-bottom: 5px; color: #333;">SVG Image:</label>
    <input type="file" id="svgImage" name="svgImage" accept=".svg" required style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box;">

    <input type="submit" value="Submit" style="background-color: #007bff; color: #fff; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">
</form>
