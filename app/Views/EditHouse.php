<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une maison</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>

<?= view('navbar'); ?>

<h2>Modifier la maison</h2>

<?php if (session()->getFlashdata('error')) : ?>
    <p style="color: red;"><?= session()->getFlashdata('error'); ?></p>
<?php endif; ?>

<form action="<?= base_url('house/update/' . $maison['id']); ?>" method="post" enctype="multipart/form-data">
    <label>Nom :</label>
    <input type="text" name="nom" value="<?= esc($maison['nom']); ?>" required><br>

    <label>Description :</label>
    <textarea name="description" required><?= esc($maison['description']); ?></textarea><br>

    <label>Village :</label>
    <input type="text" name="village" value="<?= esc($maison['village']); ?>" required><br>

    <label>Pays :</label>
    <input type="text" name="pays" value="<?= esc($maison['pays']); ?>" required><br>

    <label>Photo actuelle :</label><br>
    <?php if (!empty($maison['photo'])) : ?>
        <img src="<?= base_url($maison['photo']); ?>" width="100"><br>
    <?php endif; ?>

    <label>Changer la photo :</label>
    <input type="file" name="photo"><br>

    <button type="submit">Modifier</button>
</form>

</body>
</html>
