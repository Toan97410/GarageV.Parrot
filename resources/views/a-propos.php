<?php
require_once ROOT . "/resources/views/templates/header.php";
?>

<section class="container">
  <div class="mt-5 pt-5 text-center">
    <h2 class="titresection" style="letter-spacing:1px;">A PROPOS DE NOUS</h2>
    <div class="d-flex justify-content-center">
      <div class="baton"></div>
    </div>
  </div>
</section>

<section class="container mt-5 text-center">

  <h3 class="s_titresection">NOS HORAIRES</h3>
  <div class="d-flex justify-content-center">
    <div class="baton"></div>
  </div>

  <div class="border border-dark rounded mt-5 p-1">
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th scope="col">Jour</th>
          <th scope="col">Matin</th>
          <th scope="col">Après-midi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Lundi</th>
          <td>08:45 - 12:00</td>
          <td>14:00 - 18:00</td>
        </tr>
        <tr>
          <th scope="row">Mardi</th>
          <td>08:45 - 12:00</td>
          <td>14:00 - 18:00</td>
        </tr>
        <tr>
          <th scope="row">Mercredi</th>
          <td>08:45 - 12:00</td>
          <td>14:00 - 18:00</td>
        </tr>
        <tr>
          <th scope="row">Jeudi</th>
          <td>08:45 - 12:00</td>
          <td>14:00 - 18:00</td>
        </tr>
        <tr>
          <th scope="row">Vendredi</th>
          <td>08:45 - 12:00</td>
          <td>14:00 - 18:00</td>
        </tr>
        <tr>
          <th scope="row">Samedi</th>
          <td>08:45 - 12:00</td>
          <td>Fermé</td>
        </tr>
        <tr>
          <th scope="row">Dimanche</th>
          <td>Fermé</td>
          <td>Fermé</td>
        </tr>
      </tbody>
    </table>
  </div>

</section>

<section class="container mt-5 text-center">

  <h3 class="s_titresection">DESCRIPTION</h3>
  <div class="d-flex justify-content-center">
    <div class="baton"></div>
  </div>

  <div class="border border-dark rounded mt-5 p-3">
    <p class="description">
      Depuis 2021, Garage V.Parrot propose une large gamme de services à ses clients :
      Réparation de la carrosserie et de la mécanique des voitures ainsi que leur
      entretien régulier afin de garantir leur performance et leur sécurité.
      Nous mettons en vente des véhicules d'occasion afin de proposer à notre clientèle
      une multitude de services.
      Nous offrons à notre clientèle un service de qualité et personnalisé.
      Chez Garage V.Parrot, nous sommes votre partenaire de confiance pour tous vos besoins automobiles
    </p>
  </div>

</section>

<section class="container mt-5 text-center">

  <h3 class="s_titresection">NOUS CONTACTER</h3>
  <div class="d-flex justify-content-center">
    <div class="baton"></div>
  </div>

  <div class="border border-dark rounded mt-5 p-3 row contact d-flex align-items-center row-cols-sm">

    <div class="col-md-4">
      <a href="#" class="icon-link icon-link-hover text-decoration-none text-white d-block">
        <i><img src="image/phone-line.png" alt="phone"></i>
        <p class="contact_contenu">
          0123 45 67 89
        </p>
      </a>
    </div>

    <div class="col-md-4 map">
      <a href="#" class="icon-link icon-link-hover text-decoration-none text-white d-block">
        <i><img src="image/map-line.png" alt="adresse"></i>
        <p class="contact_contenu map">
          1 rue du Paradis,<br>
          56000 Vannes
        </p>
      </a>
    </div>

    <div class="col-md-4">
      <a href="#" class="icon-link icon-link-hover text-decoration-none text-white d-block">
        <i><img src="image/mail-line.png" alt="mail"></i>
        <p class="contact_contenu">
          garagevparrot@parrot.com
        </p>
      </a>



    </div>

  </div>

</section>

<?php
require_once ROOT . "/resources/views/templates/footer.php";
?>