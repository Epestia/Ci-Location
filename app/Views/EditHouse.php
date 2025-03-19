<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une maison</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>

<?= view('navbar'); ?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Modifier la maison</h2>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger"> <?= session()->getFlashdata('error'); ?> </div>
    <?php endif; ?>

    <div class="card p-4 shadow">
        <form action="<?= base_url('house/update/' . $maison['id']); ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Adresse :</label>
                <input type="text" name="nom" class="form-control" value="<?= esc($maison['nom']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description :</label>
                <textarea name="description" class="form-control" rows="3" required><?= esc($maison['description']); ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Village :</label>
                <input type="text" name="village" class="form-control" value="<?= esc($maison['village']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Pays :</label>
                <input type="text" name="pays" class="form-control" value="<?= esc($maison['pays']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Photo actuelle :</label><br>
                <?php if (!empty($maison['photo'])) : ?>
                    <img src="<?= base_url($maison['photo']); ?>" class="img-thumbnail mb-2" width="100"><br>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label class="form-label">Changer la photo :</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Modifier</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>