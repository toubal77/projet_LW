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
                    <?php if ($_SESSION['role'] != 'admin') : ?>
                    <li style='margin-right: 20px;'>
                        <a style="text-decoration: none; color: #007bff;" href="<?php echo defined('website') ? '/' . website . '/posts/index' : '/posts/index'; ?>">Post</a>
                    </li>
                    <?php endif; ?>
                    <?php if ($_SESSION['role'] == 'admin') : ?>
                        <li style="margin-right: 20px;">
                            <a style="text-decoration: none; color: #007bff;" href="<?php echo defined('website') ? '/' . website . '/admin/index' : '/admin/index'; ?>">Consulte illustrations</a>
                        </li>
                        <li style="margin-right: 20px;">
                            <a style="text-decoration: none; color: #007bff;" href="<?php echo defined('website') ? '/' . website . '/admin/consulteUser' : '/admin/consulteUser'; ?>">Consulte utilisateurs</a>
                        </li>
                        <?php endif; ?>
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


<div style="display: flex; flex-direction: column; align-items: center; margin: 20px;">
<div style="text-align: center; margin-top: 10px; margin-bottom: 10px;">Si vous voulez pas ajouter ou terminer d'ajouter des composants à l'illustration veuillez cliquer <a href="<?php echo defined('website') ? '/' . website . '/posts/index' : '/posts/index'; ?>">ici</a></div>
<?php foreach ($illustrations as $illustration) : ?>
    <?php if (isset($illustration['idIllustration'])) : ?>
    <div style="position: relative; border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; max-width: 600px; width: 100%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <img src="assets/<?php echo $illustration['image']; ?>" alt="assets/<?php echo $illustration['image']; ?>" style="max-width: 100%; height: auto; margin-bottom: 10px;">

        <?php if (isset($illustration['composants']) && !empty($illustration['composants'])) : ?>
            <?php foreach ($illustration['composants'] as $composant) : ?>
                <?php
                $left = $composant['vecteur_x'] . 'px';
                $top = $composant['vecteur_y'] . 'px';
                $description = $composant['composant'];
                $arrow = '↑';
                echo "<div style='position: absolute; left: $left; top: $top; font-size: 18px; color: red;'>$arrow</div>";
                echo "<div style='position: absolute; left: $left; top: " . ($top + 20) . "px; font-size: 14px; color: blue;'>$description</div>";
                ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <h2 style="color: #333; margin-bottom: 10px;">Titre - <?php echo $illustration['titre']; ?></h2>
        <p style="color: #666; line-height: 1.6;">Description - <?php echo $illustration['description']; ?></p>
    </div>
    <?php endif; ?>
<?php endforeach; ?>


    </div>

<footer style="background-color: #333; color: #fff; text-align: center; padding: 10px; position: fixed; bottom: 0; width: 100%; margin-top: 20px;">
    <div>
        <p style="margin: 0; font-size: 14px;">&copy; 2023 Université de Rouen Normandie. All rights reserved. | Website by TOUBAL Zine-Eddine SOUALMI Majda</p>
    </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var imagesClick = document.querySelectorAll('img');

        imagesClick.forEach(function (image) {
            image.addEventListener('click', function (event) {
                var x = event.clientX;
                var y = event.clientY;
                showformHtml(x, y);
            });
        });

        function showformHtml(x, y) {
        var divForm = document.createElement('div');
        divForm.style.position = 'fixed';
        divForm.style.top = y + 'px';
        divForm.style.left = (x + 20) + 'px';

        var formHtml = document.createElement('form');
        formHtml.action = '';
        formHtml.method = 'post';

        formHtml.innerHTML = `
            <label for="description">Description:</label>
            <input type="text" id="description" name="composant" placeholder="Quel est le nom de ce composant ?" style="width: 100%; padding: 10px; margin-bottom: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            <input type="hidden" id="position_y" name="position_y" value="${y}">
            <input type="hidden" id="position_x" name="position_x" value="${x}">
            <br>
            <input type="submit" name="submitForm" value="Submit" style="cursor: pointer;">`;

        divForm.appendChild(formHtml);
        document.body.appendChild(divForm);

        formHtml.addEventListener('submitForm', function (event) {
            var description = formHtml.querySelector('#description').value;
            var position_x = formHtml.querySelector('#position_x').value;
            var position_y = formHtml.querySelector('#position_y').value;
            formHtml.action = '/project_LW/posts/show';
            formHtml.method = 'post';
            formHtml.submit();
            divForm.remove();
        });
}

    });
</script>

    </body>
</html>