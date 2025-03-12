<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">Location</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('houses') ?>">Toutes les maisons</a>
                </li>

                <?php if (session()->has('user_id')): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dashboard') ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('information') ?>">Mes Informations</a>
                    </li>
                    <?php if (session()->get('role') === 'ADMIN'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('allUsers') ?>">Tous les utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('createHouse') ?>">Créer une maison</a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= base_url(session()->get('photo') ?: 'default.png') ?>" alt="Profil" class="rounded-circle" width="40" height="40">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('information') ?>">Mes Informations</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Déconnexion</a></li>
                        </ul>
                    </li>

                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-primary text-white mx-1" href="<?= base_url('Home/login') ?>">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success text-white mx-1" href="<?= base_url('Home/createUsers') ?>">Inscription</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>
