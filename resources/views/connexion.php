<?php

require_once ROOT . "/resources/views/templates/header.php";

?>

<section class="container justify-content-center align-items-center d-flex">
  <div class="mt-5 pt-5 text-center">
    <p class="titresection">CONNEXION</p>
    <div class="d-flex justify-content-center">
      <div class="baton"></div>
    </div>

    <form action="/connexion" method="POST" class="mt-5 mx-auto connexion">
      <div class="form-group">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" class="form-control">
      </div>
      <div class="form-group text-center my-3">
        <button type="submit" class="btn btn-secondary text-white">Se connecter</button>
      </div>
    </form>

    <?php
    require_once ROOT . "/resources/views/templates/footer.php";
    ?>