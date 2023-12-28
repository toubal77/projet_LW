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
                        <li style="margin-right: 20px;">
                            <a style="text-decoration: none; color: #007bff;" href="<?php echo defined('website') ? '/' . website . '/admin/consulteUser' : '/admin/consulteUser'; ?>">Consulte utilisateurs</a>
                        </li>
                    <li style='margin-right: 20px;'>
                        <a style="text-decoration: none; color: #007bff;" href="<?php echo defined('website') ? '/' . website . '/auth/logout' : '/auth/logout'; ?>">Se déconnecter</a>
                    </li>
            </ul>
        </div>
    </div>
</nav>





<h1 style="background-color: #333; color: #fff; padding: 20px; text-align: center;">Admin page</h1>


<h2 style="text-align: center; color: #333;">Posts</h2>
<table style="width: 100%; border-collapse: collapse; margin: 20px 0; text-align: left;">
    <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Title</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Image</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Langue par defaut</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Description</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($illustrations as $illustration) : ?>
            <tr>
                <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $illustration['titre']; ?></td>
                <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $illustration['image']; ?></td>
                <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $illustration['langueParDefaut']; ?></td>
                <td style="border: 1px solid #ddd; padding: 8px;"><?php echo $illustration['description'] ?></td>
                <td style="border: 1px solid #ddd; padding: 8px;">
                <form method="post" action="/project_LW/admin/show">
                    <input type="hidden" name="illId" value="<?php echo $user['idIllustration']; ?>">
                    <button type="submit" name="submitFormShow" style="padding: 5px 10px; cursor: pointer;">Show</button>
                </form>
                <form method="post" action="">
                    <input type="hidden" name="illId" value="<?php echo $user['idIllustration']; ?>">
                    <button type="submit" name="submitFormDelete" style="padding: 5px 10px; cursor: pointer;" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet illustration ?')">Delete</button>
                </form>
            </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<footer style="background-color: #333; color: #fff; text-align: center; padding: 10px; position: fixed; bottom: 0; width: 100%; margin-top: 20px;">
    <div>
        <p style="margin: 0; font-size: 14px;">&copy; 2023 Université de Rouen Normandie. All rights reserved. | Website by TOUBAL Zine-Eddine SOUALMI Majda</p>
    </div>
</footer>
    </body>
</html>