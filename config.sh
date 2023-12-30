#!/bin/bash

read -p "Entrez le nom du serveur de la base de données (généralement localhost !): " DB_HOST
read -e -p $'\nEntrez le nom d\'utilisateur MySQL (généralement root !): ' DB_USER
read -e -p $'\nEntrez le mot de passe MYSQL : ' DB_PASSWORD
read -e -p $'\nEntrez le nom de la base de données : ' DB_NAME

CONFIG_FILE="config.php"

mysql -h $DB_HOST -u $DB_USER -p$DB_PASSWORD -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;"

if [ $? -eq 0 ]; then
    echo "La base de données $DB_NAME a été créée avec succes"


    SQL_FILE="projectLW.sql"
    mysql -h $DB_HOST -u $DB_USER -p$DB_PASSWORD $DB_NAME < "$SQL_FILE"

    if [ $? -eq 0 ]; then
        echo "Les tables ont été créées avec succes"
    else
        echo "Erreur lors de la création des tables"
    fi


    if [ -f "$CONFIG_FILE" ]; then
        sed -i "s/define('DB_HOST', '.*');/define('DB_HOST', '$DB_HOST');/" "$CONFIG_FILE"
        sed -i "s/define('DB_USER', '.*');/define('DB_USER', '$DB_USER');/" "$CONFIG_FILE"
        sed -i "s/define('DB_PASSWORD', '.*');/define('DB_PASSWORD', '$DB_PASSWORD');/" "$CONFIG_FILE"
        sed -i "s/define('DB_NAME', '.*');/define('DB_NAME', '$DB_NAME');/" "$CONFIG_FILE"

        echo "Les informations de la base de données dans le fichier de configuration ont été mises à jour"
        
        echo "Pour commencer à utiliser le site, vous devez créer un compte administrateur"
        echo "Veuillez saisir les informations suivantes :"

        read -p 'Entrez votre nom : ' USER_NOM
        read -p 'Entrez votre adresse e-mail : ' USER_EMAIL
        read -s -p $'\nEntrez votre mot de passe : ' USER_PASSWORD
        echo 

        mysql -h $DB_HOST -u $DB_USER -p$DB_PASSWORD $DB_NAME -e "INSERT INTO users (nom, role, email, mot_de_passe) VALUES ('$USER_NOM', 'admin', '$USER_EMAIL', '$USER_PASSWORD');"
        if [ $? -eq 0 ]; then
            echo "L'utilisateur a été ajouté avec succès à la base de données. Vous pouvez utilise le site avec les coordonnées que vous avez rentre"
        else
            echo "Erreur lors de l'ajout de l'utilisateur à la base de données"
        fi

    else
        echo "Le fichier de configuration ($CONFIG_FILE) n'existe pas. Aucune mise à jour effectuée"
    fi
else
    echo "Erreur lors de la création de la base de données $DB_NAME"
fi