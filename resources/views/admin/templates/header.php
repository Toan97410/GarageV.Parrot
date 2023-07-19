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
      <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="/">
          <img src="/image/logof.png" alt="Logo" width="150" height="60">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ms-auto align-items-center">
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

            <?php if (isset($_SESSION['user'])) : ?>
              <li class="nav-item">

                <form class="nav-link" method="POST" action="/logout">
                  <button class="btn btn-outline-light" type="submit">Déconnexion</button>
                </form>

              <?php else : ?>
              <li class="nav-item">
                <a href="/connexion" id="espaceReserve">
                <button class="btn btn-outline-light" type="submit">Connexion</button>
                </a>
                
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <nav class="py-2 border-bottom">
    <div class="container d-flex flex-wrap">
      <ul class="nav me-auto">
        <li class="nav-item"><a href="/user" class="nav-link text-black px-2 active" aria-current="page">Gestion des utilisateurs</a></li>
        <li class="nav-item"><a href="/car" class="nav-link text-black px-2">Gestion des voitures</a></li>
      </ul>
    </div>
  </nav>
  <main>