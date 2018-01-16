<?php

// getStatusText attend un chiffre (0 ou 1) pour renvoyer un terme completed ou todo pour l'affichage d'une tâche
function getStatusText($status)
{
    // return SI $status == 1 ALORS 'completed' SINON 'todo'
    return $status == 1 ? 'completed' : 'todo';
}
