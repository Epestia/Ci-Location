<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
<?= view('navbar'); ?>
<h2>Liste des Utilisateurs</h2>
<table border="1">
    <thead>
    <tr>
        <th>Nom d'utilisateur</th>
        <th>Rôle</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= esc($user['username']) ?></td>
            <td><?= esc($user['role']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
