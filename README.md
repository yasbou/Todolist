# Todolist : On supprime !

L'objectif : rajouter la suppression en ajax des tâches :smiley:

## Instructions

1. On écoute le clic sur la poubelle

2. Sur notre poubelle, on place un id dans un attribut.  
Par exemple : `<a class="btn" data-id="12">`

3. En JS, on récupère l'id de la tâche stockée dans l'attribut.

4. On envoie une requête Ajax vers `delete.php`, avec dans les données envoyées l'id de la tâche à supprimer.

5. On crée le fichier `delete.php`, sur le format de `add.php`, qui récupère l'id.

6. On utilise dans ce fichier une méthode `deleteTask`, que l'on va ensuite créer dans la classe `Todolist`.

7. Dans cette méthode, on doit éxécuter une requête SQL préparée permettant de supprimer la tâche en question (`DELETE`).

8. Si le serveur ne renvoie pas d'erreur (= si la requête ajax est réussie), on supprime le `<li>` de la tâche avec JS.

## Bonus

1. Si l'id n'existe pas en base de donnée, le serveur doit renvoyer une erreur `'HTTP/1.0 400 Bad Request'` avec un code `400`.

2. Quand l'ajax réussit, un message de réussite doit être écrit dans la page.  
Par exemple : `<div id="message" class="success">Ajouté</div>`

3. Quand l'ajax échoue, un message d'erreur doit être écrit dans la page.  
Par exemple : `<div id="message" class="error">Une erreur est survenue</div>`

## Bonus Of The Death

1. Au clic sur le crayon, un `<form>` avec un `<input>` apparait à la place du label de la tâche.

2. Lorsqu'on soumet ce `<form>`, une requête ajax envoie le nouveau label à `update.php` ainsi que l'id de la tâche.

3. Créer la méthode `updateTask` dans la classe `TodoList`.

## Bonus Of The Pure Extreme Death With No Return

1. Supprimer `add.php`, `delete.php` et `update.php`.

2. Ajouter une méthode `postProcess()` dans la classe `Todolist`, qui gère l'ajout, la suppression, la modification en fonction de l'`action` demandée.

3. Tous les appels ajax pointent vers `index.php`, avec la donnée supplémentaire `action`.  

Par exemple :
```js
$.ajax({
	url: 'index.php',
	type: 'POST',
	data: {
		action: 'update',
		id: idTask,
		label: labelTask,
	}
})
```
