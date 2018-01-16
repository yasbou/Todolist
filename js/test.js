var app = {
  init: function() {
    console.log('je lance ma requete ajax');

    // Ajax
    var xhr = $.ajax({
      url: 'ajax.php',
    });
    // Si on a mal tapé l'adresse, ça lancera .fail()
    // var xhr = $.ajax({
    //   url: 'ajax2.php',
    // });

    // Promesse : quand l'ajax s'est terminée
    xhr.always(function() {
      console.log('ma requete est finie !');
    });

    // 2e promesse : quand le serveur renvoie OK
    // result = ce que renvoie le serveur
    xhr.done(function(result) {
      console.log('Le serveur renvoie : ' + result);
    });

    // 3e promesse : quand le serveur renvoie une erreur
    xhr.fail(function(error) {
      alert('Ooops, une erreur est survenue : ' + error.status);
    });

    console.log('OK, j’ai lancé ma requete');
  }
};

$(app.init);
