<?php
require_once ROOT . "/resources/views/templates/header.php";

$reviews = [
  ['name' => 'Jean Dupont', 'review' => 'Excellente expérience! Le service client est au top et la qualité des véhicules est incroyable. Je recommande vivement.'],
  ['name' => 'Martine Durand', 'review' => 'Super contente de ma nouvelle voiture. L\'équipe a été très attentive à mes besoins. Merci encore!'],
  ['name' => 'Philippe Moreau', 'review' => 'Honnête, rapide et professionnel. Rien à redire, je reviendrai pour mon prochain achat de voiture.']
];

$vehicles = [
  ['brand' => 'Renault', 'model' => 'Megane', 'image' => 'https://images.caradisiac.com/logos/3/4/4/9/273449/S7-maxi-fiche-fiabilite-renault-megane-4-un-modele-a-risque-198261.jpg'],
  ['brand' => 'Peugeot', 'model' => '308', 'image' => 'https://upload.wikimedia.org/wikipedia/commons/9/9b/2022_-_Peugeot_308_III_%28C%29_-_196.jpg'],
  ['brand' => 'Citroen', 'model' => 'C3', 'image' => 'https://i0.wp.com/kupiiline.com/wp-content/uploads/2022/10/capture-20.jpg?fit=1440%2C1080&ssl=1']
]
?>
<div class="container-fluid gv-brand">
  <div class="gv-brand-text">
    <h2 class="titresection text-white"> BIENVENUE SUR GARAGE V. PARROT</h2>
    <h3 class="s_titresection">NOTRE PRIORITE : LES BESOINS DE NOTRE CLIENTELE</h3>
    <div class="d-flex justify-content-center">
      <div class="baton"></div>
    </div>
  </div>
</div>

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

<section class="container">
  <div class="mt-5 pt-5 text-center">
    <h2 class="titresection" style="letter-spacing:1px;">LES AVIS DE NOS CLIENTS</h2>
    <div class="d-flex justify-content-center">
    <div class="baton"></div>
      </div>
    </div>

    <div class="mt-5">
      <?php foreach ($reviews as $review) : ?>
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="card-title gv-color gv-fw-700"><?php echo $review['name']; ?></h5>
            <p class="card-text"><?php echo $review['review']; ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
require_once ROOT . "/resources/views/templates/footer.php";
?>