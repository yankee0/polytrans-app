<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="POLY-TRANS APP">
  <meta name="author" content="POLY-TRANS DEV TEAM">
  <meta name="keywords" content="polytrans , poly-trans">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="shortcut icon" href="<?= base_url('img/logo.png') ?>" />
  <link rel="canonical" href="https://demo-basic.adminkit.io/" />
  <title>POLYTRANS <?= $this->renderSection('titre'); ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link href="<?= base_url('css/app.css') ?>" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <script src="<?= base_url('js/table.js') ?>"></script>
</head>

<body class="position-relative">
  <script>
    $('#tableau').on({
      ajaxStart: function() {
        // $("#loadingModal").modal("show");
        console.log('load');
      },
      ajaxStop: function() {
        // $("#loadingModal").modal("hide");
        console.log('end');
      }
    });
  </script>

  <div class="wrapper">

    <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="<?= base_url(session()->root) ?>">
          <span class="align-middle">POLY-TRANS APP</span>
        </a>

        <ul class="sidebar-nav">

          <li class="sidebar-item <?= (session()->position == 'dashboard') ? 'active' : '' ?>">
            <a class="sidebar-link" href="<?= base_url(session()->root) ?>">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
          </li>

          <?php if (session()->root == '/super-admin') : ?>
            <li class="sidebar-header">
              Administration
            </li>
            <li class="sidebar-item <?= (session()->position == 'utilisateurs') ? 'active' : '' ?>">
              <a class="sidebar-link" href="<?= base_url(session()->root . '/utilisateurs') ?>">
                <i class="align-middle" data-feather="user"></i> <span class="align-middle">Utilisateurs</span>
              </a>
            </li>
          <?php endif ?>
          <?php if (
            session()->root == '/ops-flotte'
            or session()->root == '/super-admin'
          ) : ?>

            <li class="sidebar-header">
              Flotte
            </li>

            <li class="sidebar-item <?= (session()->position == 'chauffeurs') ? 'active' : '' ?>">
              <a class="sidebar-link" href="<?= base_url(session()->root . '/chauffeurs') ?>">
                <i class="align-middle" data-feather="users"></i> <span class="align-middle">Chauffeurs</span>
              </a>
            </li>


            <li class="sidebar-item <?= (session()->position == 'camions') ? 'active' : '' ?>">
              <a class="sidebar-link" href="<?= base_url(session()->root . '/camions') ?>">
                <i class="align-middle" data-feather="truck"></i> <span class="align-middle">Camions</span>
              </a>
            </li>
            <li class="sidebar-item <?= (session()->position == 'remorques') ? 'active' : '' ?>">
              <a class="sidebar-link" href="<?= base_url(session()->root . '/remorques') ?>">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                  <path d="M624,320H544V80a16,16,0,0,0-16-16H16A16,16,0,0,0,0,80V368a16,16,0,0,0,16,16H65.61c7.83-54.21,54-96,110.39-96s102.56,41.79,110.39,96H624a16,16,0,0,0,16-16V336A16,16,0,0,0,624,320ZM96,243.68a176.29,176.29,0,0,0-32,20.71V136a8,8,0,0,1,8-8H88a8,8,0,0,1,8,8Zm96-18.54c-5.31-.49-10.57-1.14-16-1.14s-10.69.65-16,1.14V136a8,8,0,0,1,8-8h16a8,8,0,0,1,8,8Zm96,39.25a176.29,176.29,0,0,0-32-20.71V136a8,8,0,0,1,8-8h16a8,8,0,0,1,8,8ZM384,320H352V136a8,8,0,0,1,8-8h16a8,8,0,0,1,8,8Zm96,0H448V136a8,8,0,0,1,8-8h16a8,8,0,0,1,8,8Zm-304,0a80,80,0,1,0,80,80A80,80,0,0,0,176,320Zm0,112a32,32,0,1,1,32-32A32,32,0,0,1,176,432Z"></path>
                </svg>
                <span class="align-middle">Remorques</span>
              </a>
            </li>
          <?php endif; ?>

          <?php if (
            session()->root == '/super-admin'
            or session()->root == '/ops-reception'
            // or session()->root == '/ops-mvt'
            or session()->root == '/ops-transport'
            or session()->root == '/ops-finance'
          ) : ?>
            <li class="sidebar-header">
              Opérations
            </li>
            <li class="sidebar-item <?= (session()->position == 'livraisons') ? 'active' : '' ?>">
              <a class="sidebar-link" href="<?= base_url(session()->root . '/livraisons') ?>">
                <i class="align-middle" data-feather="truck"></i> <span class="align-middle">Livraisons</span>
              </a>
            </li>

          <?php endif; ?>
          <?php if (
            session()->root == '/ops-finance'
            or session()->root == '/super-admin'
          ) : ?>
            <li class="sidebar-header">
              Rapports
            </li>
            <li class="sidebar-item <?= (session()->position == 'rapports') ? 'active' : '' ?>">
              <a class="sidebar-link" href="<?= base_url(session()->root . '/rapports') ?>">
                <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Rapports</span>
              </a>
            </li>

          <?php endif; ?>

        </ul>

      </div>
    </nav>

    <div class="main">
      <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
          <ul class="navbar-nav navbar-align">
            <!-- notifs -->
            <!-- <li class="nav-item dropdown">
              <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                <div class="position-relative">
                  <i class="align-middle" data-feather="bell"></i>
                  <span class="indicator">4</span>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                <div class="dropdown-menu-header">
                  4 New Notifications
                </div>
                <div class="list-group">
                  <a href="#" class="list-group-item">
                    <div class="row g-0 align-items-center">
                      <div class="col-2">
                        <i class="text-danger" data-feather="alert-circle"></i>
                      </div>
                      <div class="col-10">
                        <div class="text-dark">Update completed</div>
                        <div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
                        <div class="text-muted small mt-1">30m ago</div>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="list-group-item">
                    <div class="row g-0 align-items-center">
                      <div class="col-2">
                        <i class="text-warning" data-feather="bell"></i>
                      </div>
                      <div class="col-10">
                        <div class="text-dark">Lorem ipsum</div>
                        <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
                        <div class="text-muted small mt-1">2h ago</div>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="list-group-item">
                    <div class="row g-0 align-items-center">
                      <div class="col-2">
                        <i class="text-primary" data-feather="home"></i>
                      </div>
                      <div class="col-10">
                        <div class="text-dark">Login from 192.186.1.8</div>
                        <div class="text-muted small mt-1">5h ago</div>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="list-group-item">
                    <div class="row g-0 align-items-center">
                      <div class="col-2">
                        <i class="text-success" data-feather="user-plus"></i>
                      </div>
                      <div class="col-10">
                        <div class="text-dark">New connection</div>
                        <div class="text-muted small mt-1">Christina accepted your request.</div>
                        <div class="text-muted small mt-1">14h ago</div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="dropdown-menu-footer">
                  <a href="#" class="text-muted">Show all notifications</a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                <div class="position-relative">
                  <i class="align-middle" data-feather="message-square"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
                <div class="dropdown-menu-header">
                  <div class="position-relative">
                    4 New Messages
                  </div>
                </div>
                <div class="list-group">
                  <a href="#" class="list-group-item">
                    <div class="row g-0 align-items-center">
                      <div class="col-2">
                        <img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
                      </div>
                      <div class="col-10 ps-2">
                        <div class="text-dark">Vanessa Tucker</div>
                        <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
                        <div class="text-muted small mt-1">15m ago</div>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="list-group-item">
                    <div class="row g-0 align-items-center">
                      <div class="col-2">
                        <img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
                      </div>
                      <div class="col-10 ps-2">
                        <div class="text-dark">William Harris</div>
                        <div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
                        <div class="text-muted small mt-1">2h ago</div>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="list-group-item">
                    <div class="row g-0 align-items-center">
                      <div class="col-2">
                        <img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
                      </div>
                      <div class="col-10 ps-2">
                        <div class="text-dark">Christina Mason</div>
                        <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
                        <div class="text-muted small mt-1">4h ago</div>
                      </div>
                    </div>
                  </a>
                  <a href="#" class="list-group-item">
                    <div class="row g-0 align-items-center">
                      <div class="col-2">
                        <img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
                      </div>
                      <div class="col-10 ps-2">
                        <div class="text-dark">Sharon Lessman</div>
                        <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
                        <div class="text-muted small mt-1">5h ago</div>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="dropdown-menu-footer">
                  <a href="#" class="text-muted">Show all messages</a>
                </div>
              </div>
            </li> -->
            <li class="nav-item dropdown">
              <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

              <a class="nav-link dropdown-toggle d-none d-sm-flex gap-2 align-items-center" href="#" data-bs-toggle="dropdown">
                <!-- <img src="<?= base_url('img/avatars/' . session()->donnee_utilisateur['pp_url']) ?>" class="avatar img-fluid rounded me-1" alt="<?= session()->donnee_utilisateur['prenom'] . ' ' . session()->donnee_utilisateur['nom'] ?>" /> -->
                <i class="align-middle me-1 text-dark" data-feather="user"></i>
                <span class="text-dark"><?= session()->donnee_utilisateur['prenom'] . ' ' . session()->donnee_utilisateur['nom'] ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item disabled text-primary" href="<?= base_url(session()->root . '/profil/') . session()->donnee_utilisateur['id'] ?>"><i class="align-middle me-1" data-feather="user"></i> <?= session()->donnee_utilisateur['profil'] ?> </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item disabled" href="<?= base_url(session()->root . '/profil/') . session()->donnee_utilisateur['id'] ?>"><i class="align-middle me-1" data-feather="settings"></i> Mon profil </a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#pwd"><i class="align-middle me-1" data-feather="lock"></i> Modifier mot de passe </a>
                <a class="dropdown-item disabled" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Centre d'aide</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item link-primary" href="<?= base_url('/se_deconnecter') ?>"><i class="align-middle me-1 " data-feather="log-out"></i> Se déconnecter</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <main class="content">
        <?= $this->renderSection('contenu'); ?>

      </main>

      <footer class="footer">
        <div class="container-fluid">
          <div class="row text-muted">
            <div class="col-6 text-start">
              <p class="mb-0">
                <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>POLY-TRANS APP</strong></a> - <a class="text-muted" href="https://github.com/yankee0" target="_blank"><strong>by POLY-TRANS DEV TEAM</strong></a>
              </p>
            </div>
            <div class="col-6 text-end">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a class="text-muted" href="<?= base_url('/support') ?>" target="_blank">Centre d'aide</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Politique de confidentialités</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>

    </div>
  </div>



  <!-- Modal Body -->
  <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
  <div class="modal fade" id="pwd" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bolder text-primary" id="modalTitleId">Modifier mon mot de passe</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <?= form_open(base_url(session()->root . '/mot-de-passe')) ?>
          <?= csrf_field() ?>
          <div class="mb-3">
            <input type="password" required class="form-control" name="mot_de_passe" placeholder="Ancien mot de passe">
          </div>
          <div class="mb-3">
            <input type="password" required class="form-control" name="mdpn" placeholder="Nouveau mot de passe">
          </div>
          <div class="mb-3">
            <input type="password" required class="form-control" name="mdpc" placeholder="Confirmez le mot de passe">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" value="<?= session()->donnee_utilisateur['id'] ?>" name="id" class="btn btn-primary">Modifier</button>
          <?= form_close() ?>
        </div>
      </div>
    </div>
  </div>


  <!-- Optional: Place to the bottom of scripts -->
  <script>
    const myModal = new bootstrap.Modal(document.getElementById('pwd'), options)
  </script>

  <?php if (session()->has('notif')) : ?>

    <div class="p-3 position-fixed bottom-0 start-0 notif">
      <div class="card w-100" style="max-width:300px;">
        <div class="card-body">
          <h5 class="card-title text-<?= (session()->notif) ? 'success' : 'danger' ?>"><?= (session()->notif) ? 'Succés' : 'Echec' ?></h5>
          <p class="card-text"><?= session('message') ?></p>
        </div>
      </div>
    </div>
  <?php endif ?>



  <script src="<?= base_url('js/app.js') ?>"></script>


  <script>
    $('.notif').fadeIn();
  </script>

</body>

</html>