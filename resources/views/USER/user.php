<?php require ROOT . "/resources/views/admin/templates/header.php"; ?>

<div class="container mt-5 pt-5">


    <?php if (isset($_SESSION['message'])) : ?>
        <div class="my-5 alert alert-info">
            <?= $_SESSION['message'] ?>
        </div>
    <?php unset($_SESSION['message']);
    endif; ?>

<div class="text-center">
<p class="titresection" style="letter-spacing:1px;">AJOUTER UN UTILISATEUR</p>
    <div class="d-flex justify-content-center">
        <div class="baton"></div>
    </div>

</div>

    <form class="mt-5" action="/user" method="POST" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="username" name="username" required>
            <div class="invalid-feedback">
                Veuillez entrer un nom d'utilisateur.
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="invalid-feedback">
                Veuillez entrer un mot de passe.
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
            <div class="invalid-feedback">
                Veuillez entrer un email.
            </div>
        </div>

        <button type="submit" class="mt-3 gv-bg-color text-white" style="border: 0; padding: 10px; border-radius: 5px;">Ajouter un utilisateur</button>
    </form>


<div class="text-center">
<p class="titresection">LISTE DES UTILISATEURS</p>
    <div class="d-flex justify-content-center">
        <div class="baton"></div>
    </div>
</div>

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom d'utilisateur</th>
                <th scope="col">Email</th>
                <th scope="col">Editer</th>
                <th scope="col">Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <th scope="row"><?= $user['id']; ?></th>
                    <td><?= $user['username']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><a href="/user/edit/<?= $user['id'] ?>">Editer</a></td>
                    <td><a class="gv-color" href="/user/delete/<?= $user['id'] ?>">Supprimer</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>

<?php //require ROOT . "/resources/views/templates/footer.php"; ?>