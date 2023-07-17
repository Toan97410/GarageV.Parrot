<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garage V.PARROT</title>
  <link rel="stylesheet" href="style/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  <header>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark d-flex justify-content-around">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/occasions">Vente de véhicule</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/commentaires">Avis</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/a-propos">À propos</a>
          </li>
        </ul>
      </div>
      <a class="navbar-brand" href="#">
        <img src="/image/logof.png" alt="Logo" width="150" height="60">
      </a>
        <?php if (isset($_SESSION['user'])) : ?>
          <ul>
            <li class="nav-item username-container dropdown">
              <span class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user"></i> <?= $_SESSION['user']['username'] ?>
              </span>
              <ul class="dropdown-menu">
                <li>
                  <form class="dropdown-item" method="POST" action="/logout">
                    <button style="background:none; outline: none; border: 0;" type="submit">Déconnexion</button>
                  </form>
                </li>
              </ul>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a href="/connexion" class="nav-link text-white px-2 text-decoration-none">Se connecter</a>
            </li>
          </ul>
        <?php endif; ?>
    </nav>
    </div>
  </header>
  <main>