<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Terminologio</title>
        <link rel="stylesheet" href="views/auth/styles/auth.css">
</head>

<body style="font-family: Arial, sans-serif; background-color: #f5f5f5;">
<nav style="background-color: #f8f9fa; padding: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center;"> 
        <a style="text-decoration: none; color: #007bff; font-size: 24px; font-weight: bold;" href="<?php echo defined('website') ? '/' . website . '/posts/index' : '/posts/index'; ?>"href="/project_LW/posts/index">
            <i> Terminologio</i>
        </a>

        <div style="flex-grow: 1;">
            <ul style="list-style: none; padding: 0; display: flex; justify-content: flex-end; align-items: center;">
                <?php if (isset($_SESSION['user'])) : ?>
                    <li style='margin-right: 20px;'>
                        <a style="text-decoration: none; color: #007bff;" href="<?php echo defined('website') ? '/' . website . '/posts/index' : '/posts/index'; ?>">Post</a>
                    </li>

                    <?php if ($_SESSION['role'] != 'admin') : ?>
                        <li style="margin-right: 20px;">
                            <a style="text-decoration: none; color: #007bff;" href="<?php echo defined('website') ? '/' . website . '/posts/create' : '/posts/create'; ?>">Create Post</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if (!isset($_SESSION['user'])) : ?>
                    <li style='margin-right: 20px;'>
                        <a style="text-decoration: none; color: #007bff;" href="<?php echo defined('website') ? '/' . website . '/auth/index' : '/auth/index'; ?>">Se connecter</a>
                    </li>
                <?php else : ?>
                    <li style='margin-right: 20px;'>
                        <a style="text-decoration: none; color: #007bff;" href="<?php echo defined('website') ? '/' . website . '/auth/logout' : '/auth/logout'; ?>">Se déconnecter</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>


<h1 style="background-color: #333; color: #fff; padding: 20px; text-align: center;">Illustration Form</h1>

<form action="" method="post" enctype="multipart/form-data" style="max-width: 400px; margin: 20px auto; padding: 15px; border: 1px solid #ddd; border-radius: 5px;">

    <label for="titre" style="display: block; margin-bottom: 5px; color: #333;">Titre:</label>
    <input type="text" id="titre" name="titre" required style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box;">

    <label for="format" style="display: block; margin-bottom: 5px; color: #333;">Format:</label>
    <select name="format" style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box;"required>
        <option value="PNG">PNG</option>
        <option value="JPG">JPG</option>
        <option value="JPEG">JPEG</option>
        <option value="SVG">SVG</option>
    </select>

    <label for="format" style="display: block; margin-bottom: 5px; color: #333;">La langue de illustration:</label>
    <select name="langueParDefaut" style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box;"required>
        <option value="Francais">Francais</option>
        <option value="Anglais">Anglais</option>
        <option value="Anglais">Chinois</option>
    </select>
    <label for="svgImage" style="display: block; margin-bottom: 5px; color: #333;">Image:</label>
    <input type="file" id="svgImage" name="svgImage" required style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box;">

    <label for="description" style="display: block; margin-bottom: 5px; color: #333;">Description:</label>
    <textarea id="description" name="description" rows="4" cols="50" required style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box;"></textarea>

    <input type="submit" value="Submit" name="submitForm" style="background-color: #007bff; color: #fff; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">
</form>

<footer style="background-color: #333; color: #fff; text-align: center; padding: 10px; position: fixed; bottom: 0; width: 100%; margin-top: 20px;">
    <div>
        <p style="margin: 0; font-size: 14px;">&copy; 2023 Université de Rouen Normandie. All rights reserved. | Website by TOUBAL Zine-Eddine SOUALMI Majda</p>
    </div>
</footer>
    </body>
</html>