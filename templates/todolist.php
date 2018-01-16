<?php

// On récupère les tâches
$tasks = $todolist->getTasks();

// On récupère le filtre
$filter = $todolist->getFilter();

?>
<ul id="todolist">
  <?php foreach ($tasks as $task): ?>
  <?php
  // Vérification de la valeur du filtre en comparaison avec la valeur status de chaque tache
  if ($filter == 'all' || $filter == $task['status']): ?>

  <li class="status--<?= getStatusText($task['status']) ?>">
    <div class="item tag--<?= $task['tag'] ?>"><?= $task['label'] ?></div>
    <div class="actions">
      
      <a href="" class="btn btn--delete" data-id="<?= $task['id']; ?>"><i class="fa fa-trash"></i></a>
    </div>
  </li>

  <?php endif; ?>
  <?php endforeach; ?>
</ul>

<div id="message"></div>
