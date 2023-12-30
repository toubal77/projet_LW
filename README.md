Pour le déploiement, veuillez suivre ces informations :

1. Vous avez un dossier zippé, veuillez le dézipper dans le serveur
2. Exécutez le script config.sh qui se trouve dans le dossier dézippé afin de configurer la base de données et de suivre les informations demandées
    - Pour l'exécuter, ouvrez le terminal et positionnez-vous dans le dossier du projet
    - Tapez dans le terminal la commande suivante : `sudo ./config.sh`
        - Si le fichier ne veut pas s'exécuter, tapez dans le terminal : `sudo chmod u+x config.sh`
        - Si le problème persiste, tapez dans le terminal les deux commandes suivantes : `sudo chown root:root config.sh; sudo chmod u+x config.sh`
        - À la fin, exécutez le script avec `sudo ./config.sh`

3. Vous pouvez maintenant utiliser le site.
4. Lors de la manipulation du site et si vous rencontrez un problème en changeant les pages, veuillez suivre ces instructions :
    - Ouvrez le terminal et connectez-vous en SSH au serveur avec la commande : 'ssh urouen@192.168.76.76', mot de passe : 'madrillet'
    - Connectez-vous en tant qu'administrateur avec la commande suivante : 'su -', mot de passe : 'rotomagus'
    - Exécutez la commande 'nano etc/apache2/apache2.conf'. Un éditeur s'ouvrira et vers la fin, vous trouverez un bout de code comme dans la figure ci-dessous. Changez 'AllowOverride None' en 'AllowOverride All' comme indiqué dans la figure.

![bug_deploiement](init/bug%20deploiement.png)

5. Vous pouvez maintenant utiliser le site.