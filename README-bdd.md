# Todolist : Ajout de fonctionnalités

Le client qui a commandé l'outil de todolist souhaiterait ajouter des fonctionnalités sur l'outil actuel.

Les nouvelles fonctionnalités demandées devront être structurée en objet.

## Demandes

### Récupérer les tâches depuis une Base de données

Le client ayant appris que vous aviez réussi à vous connecter à une base de données, il souhaiterait que le listing des tâches soit fait par une récupération de données et non plus par la lecture d'un fichier php.

> Que devons-nous en déduire ?

L'usage d'une requête SQL via `query()` pourrait-être une bonne piste, surtout avec l'usage de  `fetchAll()`

### Persistence du filtre

Il souhaiterait rendre le système de filtre `All|Completed|Todo` persistant. En effet, le client voudrait que lorsque l'on revient sur l'outil, le filtre soit conservé.

> Que devons-nous en déduire ?

L'usage de sessions pour stocker l'état du filtre serait une solution idéale

### BONUS : Ajout de nouvelles tâches

Le client souhaiterait pouvoir ajouter de nouvelles tâches depuis l'interface principale (formulaire prévu lors de l'intégration). Il souhairetait que lors de l'ajout d'une nouvelle tâche l'utilisateur soit redirigé automatiquement vers la page d'accueil en cas de succès.

Si l'enregistrement venait à échouer, l'utilisateur devrait en être informé.

> Que devons-nous en déduire ?

- Une page dédiée à la procédure d'ajout
- La redirection nous indique un usage de `header('Location:...')`
- l'affichage d'erreur nous indique que le résultat de la transaction avec la BDD doit être vérifié
