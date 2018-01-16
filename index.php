<?php

// Sessions
session_start();

// Classe todolist et configuration pour BDD
require 'inc/config.php';
require 'inc/Todolist.php';

// fonctions utilitaires
require 'inc/functions.php';


/**
 * Instanciation de la todolist
 */
$todolist = new Todolist($dbConfig);


// templates / vues
include 'templates/header.php';
include 'templates/todolist.php';
include 'templates/add_task.php';
include 'templates/footer.php';
