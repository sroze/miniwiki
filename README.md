MiniWiki project
================

MiniWiki est un projet développé lors des 24h de l'informatique 2012 à Montreuil. 
Le but était, en 8h, de développer une application Web permettant de mettre en place un système
de wiki simple.
Ce projet est basé sur Symfony2, et tous les objets sont gérés via Doctrine.

1) Téléchargement et installation
---------------------------------

Vous pouvez télécharger une archive du projet ou bien faire un ''checkout'' de ce dépôt Git.
Pour installer MiniWiki, il vous suffit de modifier le fichier ''parameters.ini'' pour que 
l'application puisse avoir accès à une base de données, puis lancez le fichier ''refresh.sh''.

Celui-ci va générer les objets et mettre à jour la base de données. Vous pourrez ensuite accèder
à l'application en pointant vers le fichier ''web/app_dev.php''.

Enjoy!