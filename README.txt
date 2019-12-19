Objectif : passer à un architecture MVC (non objet)

1. Reprendre VROUM
- gestion de l'erreur à la connexion :
try {
$link = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME, DB_USER,DB_PWD);
} catch(Exception $e) {
$link = new PDO("mysql:host=".DB_SERVER, DB_USER,DB_PWD);
}
Ainsi l'application peut s'installer toute seule.

Les principes du motif MVC :
- Passage à une organisation qui factorise la structure générale d'une page HTML : notion de gabarit.
- le bout de code HTML spécifique à chaque page s'appelle une vue.
- Regroupement des pages par module : une page correspond à un module et une action, à chaque action correspond une vue (ou rien si pas d'affichage).
- Controleur principal : tous les liens sont de la forme "index.php?module=xxxx&action=yyyy
- Les accès à la base de données sont regroupés dans des fichiers-dépots.

Mise en pratique : étape 1
--------------------------
- créer le gabarit : gabarit.php avec un appel à la vue à travers a variable $vue
- créer la vue de chaque page : vue_module_action.php
- ajouter dans chaque page $vue=... et require "gabarit.php"
(traiter "lecon", "moniteur", "database")

Mise en pratique : étape 2
--------------------------
Contrôleur principale : index.php?module=xxx&action=yyy
- Toute page peut être appelée en donnant le nom du module et l'action : convertir tous les liens sous cette forme.
=> on crée une fonction hlien($module, $action,$para="") qui génère une url.
- transformer la page index.php en conséquence : récupère les paramètres et fait un require de la page "module_action.php".

Mise en pratique : étape 3
--------------------------
Regrouper les fichiers d'un module dans un même répertoire (pour mieux organiser les fichiers et les isoler)
- créer un répertoire "_module" au dessus de "www" et créer les sous répertoires "lecon" et "moniteur" etc..., y ranger les fichiers.
- ajuster les "require" en chemins relatifs.

Mise en pratique : étape 4
--------------------------
Regrouper tout accès direct à la base de données dans des fichiers, par entités (tables principales).
- créer un répertoire "_entite" au dessus de "www" et créer un fichier par table-entité "lecon.php" et "moniteur.php" etc..., y ranger les requêtes à la base de données sous forme de fonction
- ajuster les "require" en chemins relatifs.
