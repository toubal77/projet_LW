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
    <?php if ($_SESSION['role']!='admin') : ?>
<li style="margin-right: 20px;">
                    <a style="text-decoration: none; color: #007bff;" href="/project_LW/posts/create">Create Post</a>
                </li>
<?php endif; ?>
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



<div style="margin-left: auto; margin-right: auto;margin-top: 50px;background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); width: 300px; text-align: center;">

<h2 style="margin-bottom: 20px; color: #333; font-size: 24px;">Connexion</h2>

<form action="" method="post">
    <input type="text" name="username" placeholder="Nom d'utilisateur" style="width: 100%; padding: 10px; margin-bottom: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;" required>
    <input type="email" name="email" placeholder="toubal@gmail.com" style="width: 100%; padding: 10px; margin-bottom: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;" required>
    <input type="password" name="password" placeholder="Mot de passe" style="width: 100%; padding: 10px; margin-bottom: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;" required>
    <input type="submit" name="submitForm" value="login"  style="background-color: #007BFF; color: #fff; padding: 10px; border: none; width: 100%; cursor: pointer; border-radius: 4px; font-size: 16px;" >
    <p style="margin-top: 10px;">Vous avez un compte? <a href="/project_LW/auth/index">Connecter vous</a></p>
</form>

</div>

<footer style="background-color: #333; color: #fff; text-align: center; padding: 10px; position: fixed; bottom: 0; width: 100%; margin-top: 20px;">
    <div>
        <p style="margin: 0; font-size: 14px;">&copy; 2023 Université de Rouen Normandie. All rights reserved. | Website by TOUBAL Zine-Eddine SOUALMI Majda</p>
    </div>
</footer>
    </body>
</html>