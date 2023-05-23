<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
  <meta name="author" content="AdminKit">
  <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="shortcut icon" href="<?= base_url('img/logo.png') ?>" />

  <link rel="canonical" href="https://demo-basic.adminkit.io/" />

  <title>POLYTRANS <?= $this->renderSection('titre'); ?></title>
  
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link href="<?= base_url('css/app.css') ?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body style="background-image: url('https://source.unsplash.com/random/1920x1080')">

  <?= $this->renderSection('contenu'); ?>
  <?php if (session()->has('notif')) : ?>
    
    <div class="p-3 position-fixed bottom-0 start-0 notif">
      <div class="card w-100" style="max-width:300px;">
        <div class="card-body">
          <h5 class="card-title text-<?= (session()->notif) ? 'success' : 'danger' ?>"><?= (session()->notif) ? 'Succés' : 'Echec' ?></h5>
          <p class="card-text"><?=session('message')?></p>
        </div>
      </div>
    </div>
  <?php endif ?>
  <script src="<?= base_url('js/app.js') ?>"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>

</html>