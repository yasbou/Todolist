var app = {
  /**
   * Chargement du dom
   */
  init: function() {
    // Je récupère mon formulaire, et j'écoute la soumission
    $('#form-todo').on('submit', app.handleSubmit);

    // On écoute le clic sur la poubelle
    $('#todolist').on('click', '.btn--delete', app.deleteTask);
  },


  /**
   * Handler de la soumission du formulaire
   * @param {Event} evt l'objet d'évènement
   */
  handleSubmit: function(evt) {
    // On empêcher la requête d'être envoyée
    evt.preventDefault();

    // Je récupère le contenu de l'input
    var value = $('#input-todo').val();

    // Et j'envoie une requete POST au serveur
    var xhr = $.ajax({
      url: 'add.php',
      method: 'POST',
      data: {
        label: value,
      },
    });

    // Quand la requête s'est bien terminée
    xhr.done(function(res) {
      // Ce que retourne le serveur, c'est l'id de la tache
      var idTask = res;

      // On veut créer du html
      var html = '<li class="status--todo">'
        + '<div class="item tag--work">' + value + '</div>'
        + '<div class="actions">'
          + '<a href="" class="btn btn--delete" data-id="'
          + idTask
          + '"><i class="fa fa-trash"></i></a>'
        + '</div>'
      + '</li>';

      // On rajoute à la fin notre <li>
      $('#todolist').append(html);
    });
  },


  /**
   * Handler du clic sur la poubelle : supprime la tâche
   */
  deleteTask: function(evt) {
    evt.preventDefault();
    console.info('deleteTask');

    // // this = celui qui appelle la fonction
    // console.log(this);
    // // currentTarget = celui qui a été cliqué = this
    // console.log(evt.currentTarget);
    // // target = élément qui a été cliqué /!\ peut être un enfant /!\
    // console.log(evt.target);

    // Je récupère le <a> qui a été cliqué
    // Et je le transforme en objet jQuery
    var $button = $(this);

    // On prend l'id de la tâche
    var idTask = $button.data('id');

    // Requête ajax
    var xhr = $.ajax({
      url: 'delete.php',
      method: 'POST',
      data: {
        id: idTask,
      },
    });

    // Si la requete ajax est réussie
    xhr.done(function() {
      // On récupère la ligne
      var $li = $button.closest('li');

      // On la supprime
      $li.remove();
    });

    // S'il y a eu une erreur
    xhr.fail(function(error) {
      $('#message').addClass('error').text(error.responseText);
    });
  },
};


$(app.init);
