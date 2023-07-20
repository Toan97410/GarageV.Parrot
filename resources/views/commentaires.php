<?php
require_once ROOT . "/resources/views/templates/header.php";
?>

<section class="container">
  <div class="mt-5 pt-5 text-center">
    <h2 class="titresection" style="letter-spacing:1px;">AVIS CLIENT</h2>
    <div class="d-flex justify-content-center">
      <div class="baton"></div>
    </div>
  </div>
</section>

<section class="container mt-5 text-center">

  <h3 class="s_titresection">DERNIERS AVIS</h3>
  <div class="d-flex justify-content-center">
    <div class="baton"></div>
  </div>

  <div class="mt-5">
    <?php 
    usort($commentaires, function($a, $b) {
      return strtotime($b['update_time']) - strtotime($a['update_time']);
    });
    foreach ($commentaires as $commentaire) : ?>
    <div class="card mb-4">
      <div class="card-body">
        <h5 class="card-title gv-color gv-fw-700"><?= $commentaire['nom'] ?></h5>
        <p class="card-text"><?= $commentaire['commentaire'] ?></p>
      </div>
    </div>
    <?php endforeach; ?>
  </div>


  <!-- FORMULAIRE D'ENVOI COMMENTAIRE -->

  <form class="mt-5 mx-auto commentaire" action="/commentaires" method="POST" class="needs-validation" novalidate>
    <label for="username" class="form-label">Expéditeur</label>
    <input type="text" class="form-control" id="username" name="username">
    <label for="message">Message</label>
    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
    <button class="btn btn-sm btn-secondary mt-3" type="submit">
      Laisser un avis
    </button>
  </form>

    <?php
    require_once ROOT . "/resources/views/templates/footer.php";
    ?>