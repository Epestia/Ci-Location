<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une maison</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
<?= view('navbar'); ?>
<h2>Ajouter une maison</h2>

<?php if (session()->getFlashdata('success')) : ?>
    <p style="color: green;"><?= session()->getFlashdata('success'); ?></p>
<?php endif; ?>
<form action="<?= site_url('house/store') ?>" method="post" enctype="multipart/form-data">
    <label for="admin_id">ID Admin :</label>
    <input type="number" name="admin_id" required><br>

    <label for="nom">Nom :</label>
    <input type="text" name="nom" required><br>

    <label for="description">Description :</label>
    <textarea name="description" required></textarea><br>

    <label for="village">Village :</label>
    <input type="text" name="village" required><br>

    <label for="pays">Pays :</label>
    <select name="pays" required>
        <option value="Belgique">Belgique</option>
        <option value="France">France</option>
        <option value="Italie">Italie</option>
    </select><br>

    <label for="photo">Photo :</label>
    <input type="file" name="photo"><br>

    <button type="submit">Ajouter</button>
</form>

</body>
</html>
