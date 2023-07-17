<?php require ROOT . "/resources/views/admin/layout/header.php"; ?>

<div class="container mt-5 pt-5">

    <?php if (isset($_SESSION['message'])) : ?>
        <div class="my-5 alert alert-info">
            <?= $_SESSION['message'] ?>
        </div>
    <?php unset($_SESSION['message']);
    endif; ?>

    <div class="text-center">
        <p class="gv-fs-80 gv-fw-700 text-black gv-margin gv-lh" style="letter-spacing:1px;">EDITER UN UTILISATEUR</p>
        <div class="d-flex justify-content-center">
            <div style="margin-top:45px; width: 96px; height: 8px; background-color: rgba(207,26,26,1);"></div>
        </div>

    </div>

    <form class="mt-5" action="/user/edit/<?= $user['id'] ?>" method="POST" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" required>
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
            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
            <div class="invalid-feedback">
                Veuillez entrer un email.
            </div>
        </div>

        <button type="submit" class="mt-3 gv-bg-color text-white" style="border: 0; padding: 10px; border-radius: 5px;">Mettre à jour l'utilisateur</button>
    </form>

</div>

<?php require ROOT . "/resources/views/layout/footer-stickyBottom.php"; ?>