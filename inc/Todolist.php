<?php

/**
 * Classe Todolist
 *
 * Se connecter à une BDD (donnees sont stockées dans une BDD)
 * Récupérer des taches dans une table
 * Generation d'elements HTML (boutons de filtre)
 * Gestion d'utilitaire de formatage (function de conversion du statut d'une tache)
 */

class Todolist
{
    /**
     * Database Handler (objet PDO)
     */
    private $dbh;


    /**
     * Construct
     *
     * Connexion à la base de donnees
     * Stocker la connexion à la BDD dans l'objet
     */
    public function __construct($dbConfig)
    {
        // Connexion à la base de données
        $this->dbConnect($dbConfig);

        // Gestion des sessions
        $this->sessionManager();
    }


    /**
     * Connexion à la Base de données
     *
     */
    private function dbConnect($dbConfig)
    {
        // On essaye de se connecter à la base
        try
        {
            // dbh = database handler // Gestion de la base de données
            $this->dbh = new PDO('mysql:dbname='.$dbConfig['dbname'].';host='.$dbConfig['dbhost'].';charset=utf8', $dbConfig['dbuser'], $dbConfig['dbpass']);
        }
        // on attrape les potentielles erreurs
        catch (PDOException $e)
        {
            echo 'Connexion échouée : ' . $e->getMessage();
            die();
        }
    }

    /**
     * Sessions
     */
    private function sessionManager() {
        // Y a-t-il un filtre ?
        if (isset($_GET['filter'])) {
            $_SESSION['filter'] = $_GET['filter'];
        }
        // S'il n'y a rien en session
        if (!isset($_SESSION['filter'])) {
            $_SESSION['filter'] = 'all';
        }
    }


    /**
     * Get Tasks
     */
    public function getTasks() {
        /*** On fait une requête à la base de données ***/
        // SQL Query
        // Requete SQL
        $sql = 'SELECT * FROM tasks';

        // Statement handler
        // Gestionnaire de requete
        $sth = $this->dbh->query($sql);

        // Fetch all results into associative array
        // On récupère tous les résultats dans un array associatif
        $tasks = $sth->fetchAll(PDO::FETCH_ASSOC);

        /*** On retourne les données ***/
        return $tasks;
    }


    /**
     * Get Filter
     */
    public function getFilter() {
        return $_SESSION['filter'];
    }


    /**
     * Ajoute en base de données une nouvelle tâche
     * @param [string] $label - le label d'une nouvelle tâche à créer
     */
    public function addTask($label) {
        /*** On fait une requête à la base de données ***/
        // Requete SQL
        $sql = 'INSERT INTO tasks (label, tag, status) VALUES (:label, "work", 0)';

        // Prepare query
        $sth = $this->dbh->prepare($sql);

        // Bind value : on remplace les étiquettes par les valeurs
        $sth->bindValue(':label', $label);

        // Execute query
        $sth->execute();

        // Return lastInsertId : on retourne l'id de la tache qui vient d'être créée
        return $this->dbh->lastInsertId();
    }


    /**
     * Supprime en base de données une tâche
     * @param [int] $id - l'id tâche qu'on veut supprimer
     */
    public function deleteTask($id) {
        // Requete SQL
        $sql = 'DELETE FROM tasks WHERE id = :id';

        // Prepare query
        $sth = $this->dbh->prepare($sql);

        // Bind value
        $sth->bindValue(':id', $id, PDO::PARAM_INT);

        // Execute query
        $sth->execute();

        // Retourne true s'il y a des lignes supprimées
        return $sth->rowCount() > 0;
    }
}
