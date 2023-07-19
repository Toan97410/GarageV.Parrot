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
    <?php //foreach ($reviews as $review) : ?>
      <div class="card mb-4">
        <div class="card-body">
          <h5 class="card-title gv-color gv-fw-700">BOB</h5>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sollicitudin, libero ac ornare posuere, purus nulla pharetra ante, efficitur fermentum elit orci eu lacus. Vestibulum semper nec quam quis feugiat. Maecenas luctus dictum fermentum. Phasellus massa ante, vestibulum vel pellentesque vel, tincidunt vel augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur vel velit ac tortor viverra ultrices. Suspendisse tellus eros, luctus sed auctor sit amet, accumsan sed nibh. Ut porttitor, magna non porta malesuada, mi nisi finibus orci, vitae dictum eros elit at enim. Aliquam est nisi, lobortis quis pulvinar non, scelerisque a tellus.</p>
        </div>
      </div>
    <?php //endforeach; ?>
  </div>




  <!-- FORMULAIRE D'ENVOI COMMENTAIRE -->

  <form class="d-flex">
    <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#contactModal" type="button">
      Laisser un avis
    </button>
  </form>
  <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="contactModalLabel">Laisser un commentaire</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <label for="email">Expéditeur</label>
            <input type="email" class="form-control" id="email" name="email">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="button" class="btn btn-primary">Envoyer le message</button>
        </div>
      </div>
    </div>


    <?php
    require_once ROOT . "/resources/views/templates/footer.php";
    ?>