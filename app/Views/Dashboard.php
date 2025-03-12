<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

<?= view('navbar'); ?>

<h1>Bienvenue, <?= session()->get('username'); ?> !</h1>
<h2>Vos maisons</h2>

<a href="<?= base_url('logout') ?>">Déconnexion</a>

</body>
</html>
