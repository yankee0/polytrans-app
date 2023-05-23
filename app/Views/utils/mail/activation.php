<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /* Styles */

    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      padding: 20px;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 4px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .logo {
      text-align: center;
      margin-bottom: 20px;
    }

    .logo img {
      max-width: 200px;
    }

    .content {
      text-align: center;
    }

    .content h2 {
      margin-bottom: 20px;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: red;
      color: #ffffff;
      text-decoration: none;
      border-radius: 4px;
    }

    .footer {
      text-align: center;
      margin-top: 20px;
      color: #999999;
      font-size: 12px;
    }

    a {
      color: red;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="logo">
      <img src="<?= base_url('img/logo.png') ?>" alt="Logo de POLY-TRANS SUARL">
    </div>
    <div class="content">
      <h2>Activation de compte</h2>
      <p>Bienvenue chez POLY-TRANS SUARL. Veuillez cliquer sur le lien ci-dessous pour activer votre compte :</p>
      <p><a href="<?= $link ?>">Activer mon compte</a></p>
    </div>
    <div class="footer">
      <p>Cet e-mail a été envoyé par POLY_TRANS SUARL. Veuillez ne pas répondre à cet e-mail.</p>
    </div>
  </div>
</body>

</html>