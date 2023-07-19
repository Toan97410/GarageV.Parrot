<?php
require_once ROOT . "/resources/views/templates/header.php";

$vehicles = [
  ['brand' => 'Renault', 'model' => 'Megane', 'image' => 'https://images.caradisiac.com/logos/3/4/4/9/273449/S7-maxi-fiche-fiabilite-renault-megane-4-un-modele-a-risque-198261.jpg'],
  ['brand' => 'Peugeot', 'model' => '308', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/9/9b/2022_-_Peugeot_308_III_%28C%29_-_196.jpg'],
  ['brand' => 'Citroen', 'model' => 'C3', 'image' => 'https://i0.wp.com/kupiiline.com/wp-content/uploads/2022/10/capture-20.jpg?fit=1440%2C1080&ssl=1'],
  ['brand' => 'Renault', 'model' => 'Megane', 'image' => 'https://images.caradisiac.com/logos/3/4/4/9/273449/S7-maxi-fiche-fiabilite-renault-megane-4-un-modele-a-risque-198261.jpg'],
  ['brand' => 'Peugeot', 'model' => '308', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/9/9b/2022_-_Peugeot_308_III_%28C%29_-_196.jpg'],
  ['brand' => 'Citroen', 'model' => 'C3', 'image' => 'https://i0.wp.com/kupiiline.com/wp-content/uploads/2022/10/capture-20.jpg?fit=1440%2C1080&ssl=1']
]
?>

<section class="container">
  <div class="mt-5 pt-5 text-center">
    <h2 class="titresection" style="letter-spacing:1px;">LES DERNIERES OFFRES</h2>
    <h3 class="s_titresection">DE NOUVELLES VOITURES A DES PRIX INCROYABLES</h3>
    <div class="d-flex justify-content-center">
    <div class="baton"></div>
    </div>

    <div class="row mt-5 pt-5">
      <?php foreach ($vehicles as $vehicle) : ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" style="max-height: 240px;" src="<?php echo $vehicle['image']; ?>" alt="<?php echo $vehicle['brand'] . ' ' . $vehicle['model']; ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo $vehicle['brand'] . ' ' . $vehicle['model']; ?></h5>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
require_once ROOT . "/resources/views/templates/footer.php";
?>