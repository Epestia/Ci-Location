<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Création de compte</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
  <script src="<?= base_url('public/js/script.js') ?>" defer></script>

</head>
<body>

  <?= view('navbar', ['class' => 'fixed-top']); ?>

  <div class="container mt-5 pt-5">
    <h1 class="text-center mb-4">Créer un compte</h1>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
      <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
      </div>
    <?php endif; ?>

    <form action="/Location/user/create" method="POST" enctype="multipart/form-data" class="mx-auto p-4 border rounded shadow-sm" style="max-width: 400px; background: #f8f9fa;">
      <div class="mb-3">
        <label for="username" class="form-label">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email :</label>
        <input type="email" id="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
  <label for="passwordHash" class="form-label">Mot de passe :</label>
  <div class="input-group">
    <input type="password" id="passwordHash" name="passwordHash" class="form-control" required>
    <button type="button" id="togglePassword" class="btn btn-outline-secondary">
      <i class="bi bi-eye"></i> 
    </button>
  </div>
</div>

      <div class="mb-3">
        <label for="photo" class="form-label">Photo de profil :</label>
        <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
      </div>

      <button type="submit" class="btn btn-primary w-100">Créer mon compte</button>
    </form>
  </div>
  
</body>
</html>
