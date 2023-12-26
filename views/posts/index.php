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
        <a style="text-decoration: none; color: #007bff; font-size: 24px; font-weight: bold;" href="/project_LW/posts/index">
            <i></i> Terminologio
        </a>

        <div  style="flex-grow: 1;">
            <ul style="list-style: none; padding: 0; display: flex; justify-content: flex-end; align-items: center;">
            <?php if (isset($_SESSION['user'])) : ?>
    <li style='margin-right: 20px;'>
        <a style='text-decoration: none; color: #007bff;' href='/project_LW/posts/index'>Post</a>
    </li>
<?php endif; ?>

<?php if (isset($_SESSION['user'])) : ?>
             
<li style="margin-right: 20px;">
                    <a style="text-decoration: none; color: #007bff;" href="/project_LW/posts/create">Create Post</a>
                </li>
<?php endif; ?>

<?php if (!isset($_SESSION['user'])) : ?>
    <li style="margin-right: 20px;">
        <a style="text-decoration: none; color: #007bff;" href="/project_LW/auth/index">Se connecter</a>
    </li>
<?php else : ?>
    <li style="margin-right: 20px;">
        <a style="text-decoration: none; color: #007bff;" href="/project_LW/auth/logout">Se déconnecter</a>
    </li>
<?php endif; ?>
            </ul>
        </div>
    </div>
</nav>



    <h1 style="background-color: #333; color: #fff; padding: 20px; text-align: center;">Bienvenue sur la Page d'Accueil</h1>

    <div style="display: flex; flex-direction: column; align-items: center; margin: 20px;">
        <!-- Afficher tous les posts -->
        <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; max-width: 600px; width: 100%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <img src="https://th.bing.com/th/id/OIG.ey_KYrwhZnirAkSgDhmg" alt="Photo du post 1" style="max-width: 100%; height: auto; margin-bottom: 10px;">
            <h2 style="color: #333; margin-bottom: 10px;">Nom de l'auteur - david</h2>
            <p style="color: #666; line-height: 1.6;">Description du post - Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.</p>
        </div>

        <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; max-width: 600px; width: 100%; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <img src="https://th.bing.com/th/id/OIG.ey_KYrwhZnirAkSgDhmg" alt="Photo du post 2" style="max-width: 100%; height: auto; margin-bottom: 10px;">
            <h2 style="color: #333; margin-bottom: 10px;">Nom de l'auteur - thomas</h2>
            <p style="color: #666; line-height: 1.6;">Description du post - Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte.</p>
        </div>

    </div>


    <footer style="background-color: #333; color: #fff; text-align: center; padding: 10px; position: fixed; bottom: 0; width: 100%; margin-top: 20px;">
    <div>
        <p style="margin: 0; font-size: 14px;">&copy; 2023 Université de Rouen Normandie. All rights reserved. | Website by TOUBAL Zine-Eddine SOUALMI Majda</p>
    </div>
</footer>
    </body>
</html>