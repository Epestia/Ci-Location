<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Informations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?= view('navbar'); ?> 

<div class="container mt-5">
    <h1 class="text-center mb-4">Mes Informations :</h1>

    <?php if (session()->has('user_id')): ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <form action="<?= base_url('update-information') ?>" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="username" class="form-label">Nom d'utilisateur :</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= esc($user['username']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email :</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= esc($user['email']); ?>" required>
                        </div>

                        <div class="mb-3 text-center">
                            <label class="form-label">Photo de profil :</label>
                            <?php if (!empty($user['photo'])): ?>
                                <br>
                                <img src="<?= base_url($user['photo']); ?>" alt="Photo de profil" class="rounded-circle img-thumbnail" width="120">
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label">Changer la photo :</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Nouveau mot de passe (laisser vide pour ne pas changer) :</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php else: ?>
        <p class="text-center text-danger">Vous devez être connecté pour voir vos informations.</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
