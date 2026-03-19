# Gestion de Commandes

## Système de Gestion de Commandes
Ce projet est un système de gestion de commandes construit avec Laravel et MySQL.

### Structure de la Base de Données
- **Utilisateurs** : Contient des données sur les utilisateurs du système.
- **Commandes** : Enregistre les informations sur chaque commande.
- **Produits** : Répertorie les produits disponibles.

![Structure de la base de données](lien_vers_la_diagramme)

### Modèles
- **User** : Modèle représentant un utilisateur.
- **Order** : Modèle pour gérer les commandes.
- **Product** : Modèle pour les produits.

### Contrôleurs
- **UserController** : Gère les opérations CRUD pour les utilisateurs.
- **OrderController** : Gère le traitement des commandes.
- **ProductController** : Gère les opérations liées aux produits.

### Routes
- **GET /orders** : Affiche toutes les commandes.
- **POST /orders** : Crée une nouvelle commande.
- **GET /products** : Affiche tous les produits disponibles.

### Vues
- **index.blade.php** : Vue principale pour afficher la liste des commandes.
- **create.blade.php** : Formulaire de création d'une commande.

### Validation
- Utilisation de la validation intégrée de Laravel pour s'assurer que les données d'entrée sont correctes et sécurisées.

### Migrations
- Les migrations sont utilisées pour gérer et versionner la base de données.
  - Exemple : `php artisan migrate` pour appliquer les migrations.

### Seeders
- Des seeders sont fournis pour remplir la base de données avec des données d'exemple.
  - Exemple : `php artisan db:seed` pour exécuter les seeders.

### Statistiques
- Fonctionnalités statistiques pour visualiser les performances des ventes et des produits.

### Journalisation des Événements
- Utilisation du système de journalisation de Laravel pour conserver une trace des événements critiques du système.