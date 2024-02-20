# Projet de développement Web - EAFC 2023/2024 - Hanut Audric

## Déploiement

### Serveur Wamp64

1) Placer le code source du site web dans le dossier suivant :

    ```
    C:\wamp64\www\*NomDuProjet*
    ```
   
2) Création d'un virtual host sur Wamp64

    ![img.png](ReadMe/VirtualHost.png)

3) Création de la Database

## Documentation

### Création de la database

Utilisation de l'outil de migration de Laravel pour la création de la DB.

- Fichiers sources migration
  - *database/migrations/2014_10_12_000000_create_users_table.php*
  - *database/migrations/2014_10_12_000000_create_class_table.php*
  - *database/migrations/2014_10_12_000000_create_etuds_table.php*
  - *database/migrations/2014_10_12_000000_create_eprs_table.php*
  - *database/migrations/2014_10_12_000000_create_inscrs_table.php*
- Configuration de la DB dans le projet
  - *.env*
    - Configuration de l'accès a la DB
  - *app/Providers/AppServiceProvider.php*
    - Définition de la longueur par défaut des chaînes de caractères dans la base de données
  - *config/database.php*
    - Définition de moteur de stockage InnoDB

### Schéma de la database

![img.png](ReadMe/Database.png)

Tout le code source du projet est documenté. Voici la liste des fichiers créé et modifié lors du développement du site web.

### Création des Models

#### Users

Représentation d'un utilisateur de notre Site Web.

- *app/Models/User.php*

#### Clas

Ce modèle représente une classe dans l'application.

- *app/Models/Clas.php*

#### Etud

Ce modèle représente un étudiant dans l'application.

- *app/Models/Etud.php*

#### Epr

Représente une épreuve.

- *app/Models/Epr.php*

#### Inscr

Représente le modèle d'une inscription à une épreuve pour un étudiant.

- *app/Models/Inscr.php*

### Création des Controllers

#### AdminController

Ce contrôleur gère la création et le stockage de nouveaux administrateurs.

- *app/Http/Controllers/AdminController.php*

#### SessionController

Ce contrôleur gère les opérations de gestion de session utilisateur, telles que la connexion, la déconnexion, etc.

- *app/Http/Controllers/SessionController.php*

#### ClasController

Ce contrôleur gère les opérations liées aux classes dans l'application.

- *app/Http/Controllers/ClasController.php*

#### EtudController

Contrôleur pour la gestion des étudiants.

- *app/Http/Controllers/EtudController.php*

#### EprController

Gère les opérations liées aux épreuves.

- *app/Http/Controllers/EprController.php*

#### InscrController

Contrôleur pour la gestion des inscriptions aux épreuves.

- *app/Http/Controllers/InscrController.php*

#### ArrivController

Contrôleur gérant les arrivées des étudiants aux épreuves.

- *app/Http/Controllers/ArrivController.php*

### Création des Requests

#### AdminRequest

Représente une requête pour un administrateur

- *app/Http/Requests/AdminRequest.php*

#### SessionRequest

Cette classe représente une requête de session utilisateur. Elle valide les données entrées par l'utilisateur lors de la connexion

- *app/Http/Requests/SessionRequest.php*

#### ClasRequest

Requête de validation pour la création ou la mise à jour d'une classe.

- *app/Http/Requests/ClasRequest.php*

#### EtudRequest

Valide les requêtes de création ou de mise à jour d'un étudiant.

- *app/Http/Requests/EtudRequest.php*

#### EprRequest

Valide les données de la requête pour la création ou la mise à jour d'une épreuve.

- *app/Http/Requests/EprRequest.php*

#### InscrRequest

Valide les requêtes de création ou de mise à jour d'une inscription à une épreuve.

- *app/Http/Requests/InscrRequest.php*

### Création des vues

#### Layouts

Layout de base de ma page HTML 
- *resources/views/Layouts/default.blade.php*

#### Components

Composant utilisé pour afficher un message éphémère à l'utilisateur. Il peut être utilisé pour afficher des messages d'alerte, de succès, etc.
- *resources/views/components/flash-message.blade.php*
- *app/View/Components/FlashMessage.php*

Composant utilisé pour afficher une barre de navigation en utilisant des éléments de navigation spécifiés.
- *resources/views/components/breadcrumb.blade.php*
- *app/View/Components/Breadcrumb.php*

Composant Blade pour afficher une table de classes.
- *resources/views/components/clas-table.blade.php*
- *app/View/Components/ClasTable.php*

Composant Blade pour une barre de recherche.
- *resources/views/components/search.blade.php*
- *app/View/Components/Search.php*

Composant Blade pour afficher un formulaire de classe.
- *resources/views/components/clas-form.blade.php*
- *app/View/Components/ClasForm.php*

Composant Blade pour afficher un formulaire de suppression.
- *resources/views/components/delete-form.blade.php*
- *app/View/Components/DeleteForm.php*

Composant Blade pour afficher un tableau d'étudiants.
- *resources/views/components/etud-table.blade.php*
- *app/View/Components/EtudTable.php*

Composant Blade qui représente un formulaire pour la création ou la modification d'un étudiant.
- *resources/views/components/etud-form.blade.php*
- *app/View/Components/EtudForm.php*

Composant Blade pour représenter un tableau d'affichage des épreuves.
- *resources/views/components/epr-table.blade.php*
- *app/View/Components/EprTable.php*

Composant Blade pour représenter un formulaire pour les épreuves.
- *resources/views/components/epr-form.blade.php*
- *app/View/Components/EprForm.php*

Composant Blade pour afficher le formulaire d'arrivée des étudiants à une épreuve.
- *resources/views/components/arriv-form.blade.php*t
- *app/View/Components/ArrivForm.php*

Composant Blade pour afficher le formulaire de modification des inscriptions à une épreuve.
- *resources/views/components/edit-inscr-form.blade.php*
- *app/View/Components/EditInscrForm.php*

Composant pour afficher le formulaire de détails d'une inscription à une épreuve.
- *resources/views/components/show-inscr-form.blade.php*
- *app/View/Components/ShowInscrForm.php*

### Création des middlewares

#### FirstTimeSetup

Ce middleware vérifie si c'est la première fois que le setup est effectué dans l'application. S'il n'y a aucun utilisateur enregistré dans la base de données, il redirige l'utilisateur vers la page d'inscription de l'administrateur.

- *app/Http/Middleware/FirstTimeSetup.php*
- *app/Http/Kernel.php*

#### AdminCreated

Ce middleware vérifie si un administrateur a déjà été créé dans l'application. Si un utilisateur est enregistré dans la base de données, il redirige l'utilisateur vers la page d'accueil.

- *app/Http/Middleware/AdminCreated.php*
- *app/Http/Kernel.php*

### Création des Policy

Politique d'accès pour les classes.

- *app/Policies/ClasPolicy.php*

Politique d'accès pour les étudiants.

- *app/Policies/EtudPolicy.php*

Politique d'accès pour les épreuves.

- *app/Policies/EprPolicy.php*

Politique d'accès pour les inscriptions.

- *app/Policies/InscrPolicy.php*
