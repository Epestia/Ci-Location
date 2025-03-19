<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une maison</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
<?= view('navbar'); ?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Ajouter une maison</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success"> <?= session()->getFlashdata('success'); ?> </div>
    <?php endif; ?>

    <div class="card p-4 shadow">
        <form action="<?= site_url('house/store') ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="admin_id" class="form-label">ID Admin :</label>
                <input type="number" name="admin_id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Adresse :</label>
                <input type="text" name="nom" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description :</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label for="village" class="form-label">Village :</label>
                <input type="text" name="village" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="pays" class="form-label">Pays :</label>
                <select name="pays" class="form-select" required>
                    <option value="Belgique">Belgique</option>
                    <option value="France">France</option>
                    <option value="Italie">Italie</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo :</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Ajouter</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
