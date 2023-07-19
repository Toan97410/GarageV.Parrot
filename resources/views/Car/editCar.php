<?php require ROOT . "/resources/views/templates/header.php"; ?>

<div class="container mt-5 pt-5">

    <?php if (isset($_SESSION['message'])) : ?>
        <div class="my-5 alert alert-info">
            <?= $_SESSION['message'] ?>
        </div>
    <?php unset($_SESSION['message']);
    endif; ?>

    <div class="text-center">
        <p class="gv-fs-80 gv-fw-700 text-black gv-margin gv-lh" style="letter-spacing:1px;">EDITER UNE VOITURE</p>
        <div class="d-flex justify-content-center">
            <div style="margin-top:45px; width: 96px; height: 8px; background-color: rgba(207,26,26,1);"></div>
        </div>

    </div>

    <form class="mt-5" action="/car/edit/<?= $car['id'] ?>" method="POST" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="marque" class="form-label">Marque</label>
            <input type="text" class="form-control" id="marque" value="<?= $car['marque'] ?>" name="marque" required>
            <div class="invalid-feedback">
                Veuillez entrer une marque.
            </div>
        </div>

        <div class="mb-3">
            <label for="modele" class="form-label">Modèle</label>
            <input type="text" class="form-control" id="modele" value="<?= $car['modele'] ?>" name="modele" required>
            <div class="invalid-feedback">
                Veuillez entrer un modèle.
            </div>
        </div>

        <div class="mb-3">
            <label for="annee_du_vehicule" class="form-label">Année</label>
            <input type="number" class="form-control" id="annee_du_vehicule" name="annee_du_vehicule" value="<?= $car['annee_du_vehicule'] ?>" min="1885" max="2099" required>
            <div class="invalid-feedback">
                Veuillez entrer une année valide.
            </div>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" class="form-control" id="prix" value="<?= $car['prix'] ?>" name="prix" min="0" step="0.01" required>
            <div class="invalid-feedback">
                Veuillez entrer un prix valide.
            </div>
        </div>

        <div class="mb-3">
            <label for="kilometrage" class="form-label">Kilométrage</label>
            <input type="number" class="form-control" id="kilometrage" value="<?= $car['kilometrage'] ?>" name="kilometrage" min="0" required>
            <div class="invalid-feedback">
                Veuillez entrer un kilométrage valide.
            </div>
        </div>

        <div class="mb-3">
            <label for="carburant" class="form-label">Carburant</label>
            <input type="text" class="form-control" id="carburant" value="<?= $car['carburant'] ?>" name="carburant" required>
            <div class="invalid-feedback">
                Veuillez entrer un type de carburant.
            </div>
        </div>

        <div class="mb-3">
            <label for="boite_de_vitesse" class="form-label">Boîte de vitesse</label>
            <input type="text" class="form-control" id="boite_de_vitesse" value="<?= $car['boite_de_vitesse'] ?>" name="boite_de_vitesse" required>
            <div class="invalid-feedback">
                Veuillez entrer un type de boîte de vitesse.
            </div>
        </div>

        <div class="mb-3">
            <label for="chevaux_fiscaux" class="form-label">Chevaux fiscaux</label>
            <input type="number" class="form-control" id="chevaux_fiscaux" value="<?= $car['chevaux_fiscaux'] ?>" name="chevaux_fiscaux" min="0" required>
            <div class="invalid-feedback">
                Veuillez entrer un nombre de chevaux fiscaux.
            </div>
        </div>

        <div class="mb-3">
            <label for="nombre_de_place" class="form-label">Nombre de places</label>
            <input type="number" class="form-control" id="nombre_de_place" value="<?= $car['nombre_de_place'] ?>" name="nombre_de_place" min="1" required>
            <div class="invalid-feedback">
                Veuillez entrer un nombre de places.
            </div>
        </div>

        <div class="mb-3">
            <label for="nombre_de_porte" class="form-label">Nombre de portes</label>
            <input type="number" class="form-control" id="nombre_de_porte" value="<?= $car['nombre_de_porte'] ?>" name="nombre_de_porte" min="1" required>
            <div class="invalid-feedback">
                Veuillez entrer un nombre de portes.
            </div>
        </div>

        <div class="mb-3">
            <label for="couleur" class="form-label">Couleur</label>
            <input type="text" class="form-control" id="couleur" value="<?= $car['couleur'] ?>" name="couleur" required>
            <div class="invalid-feedback">
                Veuillez entrer une couleur.
            </div>
        </div>

        <button type="submit" class="btn btn-outline-secondary" style="border: 0; padding: 10px; border-radius: 5px;">Ajouter une image</button>

        <button type="submit" class="btn btn-outline-secondary" style="border: 0; padding: 10px; border-radius: 5px;">Editer une voiture</button>
    </form>
</div>

<?php require ROOT . "/resources/views/templates/footer.php"; ?>