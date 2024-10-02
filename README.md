### Projet: Gestionnaire d'Étudiants en PHP

Ce projet est un **gestionnaire d'étudiants** développé en PHP, visant à fournir une interface pour gérer les informations des étudiants avec un système d'authentification et de réinitialisation de mot de passe. Il inclut plusieurs fonctionnalités et adopte une structure MVC (Modèle-Vue-Contrôleur) pour une meilleure organisation du code.

### Fonctionnalités :
1. **Système d'authentification des utilisateurs** :
   - Les utilisateurs peuvent s'inscrire, se connecter et gérer leurs informations de compte via les fichiers situés dans `classes/user.php` et gérés par `controllers/userController.php`.
   
2. **Gestion des étudiants** :
   - L'application permet d'ajouter, de mettre à jour, de visualiser et de supprimer les informations des étudiants, stockées dans une base de données MySQL. Ces fonctionnalités sont gérées via `etudiantController.php` et les fichiers associés dans `display/etudiants`.
   
3. **Réinitialisation de mot de passe** :
   - Une fonctionnalité de réinitialisation de mot de passe est mise en place, permettant aux utilisateurs de réinitialiser leur mot de passe à l'aide d'un lien envoyé par e-mail. Le processus est géré par `passwordController.php` et les fichiers d'affichage dans `display/users`.
   
4. **Gestion des tokens pour réinitialisation** :
   - Les jetons pour la réinitialisation des mots de passe sont générés et stockés en base de données pour assurer la sécurité de l'utilisateur. L'utilisateur reçoit un lien de réinitialisation avec une durée d'expiration via un e-mail.

### Structure des fichiers :
- **Classes** :
   - `db.php` : Gestion de la connexion à la base de données MySQL.
   - `etudiants.php` : Modèle pour la gestion des étudiants.
   - `password.php` : Gestion de la réinitialisation des mots de passe.
   - `user.php` : Modèle pour la gestion des utilisateurs.
   
- **Contrôleurs** :
   - `etudiantController.php` : Gère les actions liées aux étudiants (ajout, suppression, modification).
   - `passwordController.php` : Gère le processus de réinitialisation du mot de passe.
   - `userController.php` : Gère l'inscription et la connexion des utilisateurs.

- **Affichage** :
   - `display/etudiants/detail.php` : Affichage des détails d'un étudiant spécifique.
   - `display/etudiants/etudiants.php` : Liste des étudiants.
   - `display/etudiants/update.php` : Formulaire de mise à jour des informations d'un étudiant.
   - `display/users/createUser.php` : Formulaire d'inscription d'un utilisateur.
   - `display/users/password_reset_request.php` : Formulaire pour demander la réinitialisation du mot de passe.
   - `display/users/reset_password.php` : Formulaire de réinitialisation du mot de passe avec le token.

- **Scripts SQL** :
   - `data.sql` : Contient le script pour la création des tables dans la base de données.
   - `save.sql` : Sauvegarde ou restauration de la base de données.

- **Fichiers divers** :
   - `index.php` : Page d'accueil de l'application.
   - `script.js` : Script JavaScript pour les interactions côté client.

### Technologies utilisées :
- **Back-end** : PHP avec la structure MVC.
- **Base de données** : MySQL pour le stockage des informations des utilisateurs et des étudiants.
- **Front-end** : HTML, CSS, et JavaScript pour la gestion des interfaces utilisateur.
- **Envoi d'e-mails** : Utilisation de la fonction `mail()` de PHP pour l'envoi des liens de réinitialisation des mots de passe.

