<?php
require_once ROOT . "/resources/views/templates/header.php";

?>

<section class="container">
  <div class="mt-5 pt-5 text-center">
    <h2 class="titresection" style="letter-spacing:1px;">LES DERNIERES OFFRES</h2>
    <h3 class="s_titresection">DE NOUVELLES VOITURES A DES PRIX INCROYABLES</h3>
    <div class="d-flex justify-content-center">
      <div class="baton"></div>
    </div>
    <div class="row mt-5 pt-5 d-flex">

      <?php
      usort($cars, function($a, $b) {
        return strtotime($b['updated_at']) - strtotime($a['updated_at']);
      });
      foreach ($cars as $car) : ?>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="card">
            <img src="..." alt="<?= $car['marque'] . ' ' . $car['modele']; ?>" style="max-height: 240px;" class="card-img-top" alt="Photo">
            <div class="card-body">
              <h5 class="card-title"><?= $car['marque'] . ' ' . $car['modele']; ?></h5>
              <p class="card-text">
                Vend <?= $car['marque'] . ' ' . $car['modele'] . ' ' . $car['couleur']; ?>.
                Elle a <?= $car['kilometrage'] ?>km au compteur. <br>
              </p>
              <buttom class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#contactModal<?= $car['id'] ?>" type="button">En savoir +</buttom>
            </div>
          </div>
        </div>

          <div class="modal fade" id="contactModal<?= $car['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="contactModalLabel"><?= $car['marque'] . ' ' . $car['modele']; ?></h5>
                  <button type="buttom" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-bodytext-center">
                  <p>Vend <?= $car['marque'] . ' ' . $car['modele'] . ' ' . $car['couleur']; ?>.
                    Elle a <?= $car['kilometrage'] ?>km au compteur. <br>
                    Il s'agit ici d'un véhicule <?= $car['carburant'] ?>,
                    avec une boite <?= $car['boite_de_vitesse'] ?>, et <?= $car['chevaux_fiscaux'] ?>. <br>
                    Elle pocède <?= $car['nombre_de_porte'] ?> portes ainsi que <?= $car['nombre_de_place'] ?> places. <br>
                    Le véhicule a était mis en circulation en <?= $car['annee_du_vehicule'] ?>
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
          </div>


        <?php endforeach; ?>

        </div>
    </div>
  </div>


</section>

<?php
require_once ROOT . "/resources/views/templates/footer.php";
?>