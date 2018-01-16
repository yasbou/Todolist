<?php

session_start();
require 'inc/config.php';
require 'inc/Todolist.php';


/**
 * Instanciation de la todolist
 */
$todolist = new Todolist($dbConfig);

// On supprime en BDD
$result = $todolist->deleteTask($_POST['id']);

// Ça s'est mal passé ?
if (!$result) {
    http_response_code(400);
    echo "Oops, l'ID n'existe pas !";
}
