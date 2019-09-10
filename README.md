# recrutement-test-Fahd-SosseyAlaoui

Le temps en heures que vous estimez encore nécessaire pour chacune des taches suivantes
	• Fournir à l’application toutes les fonctionnalités indiquées:
		- [BONUS] : Une api REST pour accéder à toutes ces informations (24h)
	• Réaliser le design et vérifier que tout fonctionne, autant en termes de fonctionnalité que de sécurité (48h)

Ressenti sur le test:
- Le test était d'un niveau moyen. Un développeur avec des notions de PHP, Laravel et JavaScript peut le réaliser.
- Difficultés rencontrées était au niveau du graphique.
- L'intérêts du test est de tester votre niveau en programmation avec la technologie PHP

Afin de réaliser le test j'ai utilisé le framework 'Laravel':
1. Telecharger 'WAMP/XAMP',
2. Installer le 'Composer' depuis le lien : https://getcomposer.org/download/,
3. Selectionner lors de l'installation du 'Composer' la répertoire ou vous avez installer PHP sur WAMP/XAMP
(pour moi : C:\wamp64\bin\php) et sélectionner la dernière version du PHP (pour moi : php 7.3.5)
4. Installer le framework laravel depuis le CLI (Commande Line Interface) avec la commande : 'composer global require "laravel/intaller"
5. Changer dans le fichier .env la line 'DB_CONNECTION=MySql' vers 'DB_CONNECTION=sqlite' et supprimer tout le reste pour
faire marche le test avec sqlite database

Annexes:
Pour faire marcher mon test sur votre server:
- Telecharger le test depuis le github: https://github.com/fahdalaoui/recrutement-test-Fahd-SosseyAlaoui
- Depuis le CLI (Commande Line Interface) lancez les commandes suivantes:
	- composer update //pour mettre à jour votre composer
	- copy .env.example .env // pour avoir le fichier .env dans votre répertoire
	- php artisan key:generate //pour générer la cle d'application
	- php artisan storage:link //pour lié le stockage sur la répertoire 'storage' avec le disque public


Compte pour tester: 
- Admin :
Email: fahd.sossey.alaoui@gmail.com
Mot de passe : 123456789

- Gestionnaires : 
Email :test3@gmail.com
Mot de passe : 123456789

- Techniciens 1:
- Email : test@gmail.com
Mot de passe : 123456789

- Techniciens 2:
- Email : test2@gmail.com
Mot de passe : 123456789
