<?php

session_start();
require 'inc/config.php';
require 'inc/Todolist.php';


/**
 * Instanciation de la todolist
 */
$todolist = new Todolist($dbConfig);

// On ajoute en BDD
$id = $todolist->addTask($_POST['label']);

// Je retourne l'id au front
echo $id;
