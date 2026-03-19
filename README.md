TP : Gestion de Commandes Laravel
Description

Ce projet est un système de gestion des commandes construit avec Laravel et MySQL.
Il permet de gérer les clients, les produits, et les commandes avec leurs détails.

Fonctionnalités principales

Gestion des Clients (CRUD)

Gestion des Produits (CRUD)

Gestion des Commandes (CRUD) avec ajout de produits

Relations entre les tables (Commandes ↔ Clients, Commandes ↔ Produits via Détails_Commandes)

Validation des formulaires avec Laravel

Pagination (10 commandes par page)

Statistiques sur les commandes (nombre de commandes par client, chiffre d'affaires par produit)

Historique des modifications avec Events (enregistrement des changements de commandes)

Structure de la Base de Données

Clients : Contient les informations des clients.

Commandes : Enregistre les informations sur chaque commande.

Produits : Répertorie les produits disponibles.

DetailCommandes : Table pivot pour les produits d'une commande.

Modèles

Client : Représente un client.

Commande : Modèle pour gérer les commandes.

Produit : Modèle pour les produits.

DetailCommande : Gère les produits attachés à une commande.

Contrôleurs

CommandeController : Gère toutes les opérations CRUD pour les commandes.

ClientController : Gère les opérations sur les clients (optionnel selon TP).

ProduitController : Gère les opérations sur les produits (optionnel selon TP).

Routes principales

GET /commandes : Affiche toutes les commandes.

GET /commandes/create : Formulaire pour créer une nouvelle commande.

POST /commandes : Crée une nouvelle commande.

GET /commandes/{id}/edit : Formulaire pour modifier une commande.

PUT /commandes/{id} : Met à jour une commande existante.

DELETE /commandes/{id} : Supprime une commande.

GET /statistiques : Affiche les statistiques sur les commandes.

Vues

index.blade.php : Liste des commandes avec pagination.

create.blade.php : Formulaire pour ajouter une nouvelle commande.

edit.blade.php : Formulaire pour modifier une commande existante.

show.blade.php : Détails d’une commande.

stats.blade.php : Vue pour afficher les statistiques.

layouts/app.blade.php : Layout principal utilisé par toutes les vues.

Validation

Utilisation de la validation Laravel pour vérifier les champs des formulaires :

Nom client obligatoire

Email valide

Produit existant et quantité > 0

Migrations

Pour créer les tables dans la base de données :

php artisan migrate

Pour réinitialiser la base de données et re-seeder :

php artisan migrate:fresh --seed
Seeders

ClientSeeder → Crée des clients fictifs

ProduitSeeder → Crée des produits fictifs

CommandeSeeder → Crée des commandes avec produits attachés

Exécution :

php artisan db:seed
Installation / Exécution

Cloner le repository

git clone https://github.com/Soukainakania/gestionCommandes-.git
cd gestion_commandes

Installer les dépendances

composer install
npm install
npm run dev

Configurer la base de données

Copier .env.example en .env

Modifier les informations de connexion MySQL :

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=gestion_commandes
DB_USERNAME=root
DB_PASSWORD=

Migrer et seed la base

php artisan migrate:fresh --seed

Lancer le serveur

php artisan serve

Accéder à l'application

http://127.0.0.1:8000/commandes

Auteur

Soukaina Kania
TP Laravel - Gestion de commandes
Année de formation : 2025/2026
