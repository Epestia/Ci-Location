<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des maisons</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
<?= view('navbar'); ?>

<h2>Liste des maisons</h2>

<?php if (session()->getFlashdata('success')) : ?>
    <p style="color: green;"><?= session()->getFlashdata('success'); ?></p>
<?php endif; ?>
<?php if (session()->getFlashdata('error')) : ?>
    <p style="color: red;"><?= session()->getFlashdata('error'); ?></p>
<?php endif; ?>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Village</th>
            <th>Pays</th>
            <th>Photo</th>
            <?php if (session()->get('role') === 'ADMIN') : ?>
                <th>Actions</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($maisons as $maison) : ?>
            <tr>
                <td><?= esc($maison['id']); ?></td>
                <td><?= esc($maison['nom']); ?></td>
                <td><?= esc($maison['description']); ?></td>
                <td><?= esc($maison['village']); ?></td>
                <td><?= esc($maison['pays']); ?></td>
                <td>
                    <?php if (!empty($maison['photo'])) : ?>
                        <img src="<?= base_url($maison['photo']); ?>" alt="Photo de la maison" width="100">
                    <?php else : ?>
                        Pas d'image
                    <?php endif; ?>
                </td>
                <?php if (session()->get('role') === 'ADMIN') : ?>
                    <td>
                        <a href="<?= base_url('house/edit/' . $maison['id']); ?>" class="btn btn-warning">Modifier</a>
                        <a href="<?= base_url('house/delete/' . $maison['id']); ?>" 
                           class="btn btn-danger" 
                           onclick="return confirm('Voulez-vous vraiment supprimer cette maison ?');">
                            Supprimer
                        </a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
