<?php
$nom_utilisateur = $u['prenom'] . ' ' . $u['nom'];
?>
<?= $this->extend('layouts/ui'); ?>
<?= $this->section('titre'); ?>
Profil
<?= $this->endSection(); ?>
<?= $this->section('contenu'); ?>
<div class="container-fluid p-0">

  <div class="row">
    <div class="col-md-4 col-xl-3">
      <div class="card mb-3">
        <div class="card-header">
          <h5 class="card-title mb-0">Détails du profil</h5>
        </div>
        <div class="card-body text-center">
          <img src="<?= base_url('img/avatars/' . $u['pp_url']) ?>" alt="<?= $nom_utilisateur ?>" class="img-fluid rounded-circle mb-2" width="128" height="128" />
          <h5 class="card-title mb-0"><?= $nom_utilisateur ?></h5>
          <div class="text-muted mb-2"><?= $u['profil'] ?></div>
          <?php if ($u['id'] == session()->donnee_utilisateur['id']) : ?>
            <!-- TRUE -->
            <div class="d-grid">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary d-flex align-items-center gap-2 justify-content-center" data-bs-toggle="modal" data-bs-target="#modifierProfil">
                <i class="align-middle" data-feather="edit"></i>
                Modifier mon profil
              </button>
            </div>
          <?php endif ?>

        </div>
        <hr class="my-0" />
        <div class="card-body">
          <h5 class="h6 card-title">Services</h5>
          <span class="badge bg-primary me-1 my-1">Transit</span>
          <span class="badge bg-primary me-1 my-1">Transport</span>
          <span class="badge bg-primary me-1 my-1">Finance</span>
        </div>
        <hr class="my-0" />
        <div class="card-body">
          <h5 class="h6 card-title">Contact</h5>
          <ul class="list-unstyled mb-0">
            <li class="mb-1"><span data-feather="mail" class="feather-sm me-1"></span> Email <a href="mailto:<?= $u['email'] ?>"><?= $u['email'] ?></a></li>
            <li class="mb-1"><span data-feather="phone" class="feather-sm me-1"></span> Téléphone <a href="tel:<?= $u['telephone'] ?>"><?= $u['telephone'] ?></a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="col-md-8 col-xl-9">
      <div class="card">
        <div class="card-header">

          <h5 class="card-title mb-0">Activités récentes</h5>
        </div>
        <div class="card-body h-100">

          <!-- notif -->
          <div class="d-flex align-items-start">
            <div class="stat text-primary">
              <i class="align-middle" data-feather="truck"></i>
            </div>
            <div class="p-1"></div>
            <div class="flex-grow-1">
              <small class="float-end text-navy">[temps passé depuis l'action]</small>
              <strong>[Titre de l'activité]</strong> [petite description de l'activité]<br />
              <small class="text-muted">[date et heure]</small><br />
            </div>
          </div>
          <hr />
          <!-- notif -->
          <div class="d-flex align-items-start">
            <div class="stat text-primary">
              <i class="align-middle" data-feather="truck"></i>
            </div>
            <div class="p-1"></div>
            <div class="flex-grow-1">
              <small class="float-end text-navy">[temps passé depuis l'action]</small>
              <strong>[Titre de l'activité]</strong> [petite description de l'activité]<br />
              <small class="text-muted">[date et heure]</small><br />
            </div>
          </div>
          <hr />
          <!-- notif -->
          <div class="d-flex align-items-start">
            <div class="stat text-primary">
              <i class="align-middle" data-feather="truck"></i>
            </div>
            <div class="p-1"></div>
            <div class="flex-grow-1">
              <small class="float-end text-navy">[temps passé depuis l'action]</small>
              <strong>[Titre de l'activité]</strong> [petite description de l'activité]<br />
              <small class="text-muted">[date et heure]</small><br />
            </div>
          </div>
          <hr />
          <!-- notif -->
          <div class="d-flex align-items-start">
            <div class="stat text-primary">
              <i class="align-middle" data-feather="truck"></i>
            </div>
            <div class="p-1"></div>
            <div class="flex-grow-1">
              <small class="float-end text-navy">[temps passé depuis l'action]</small>
              <strong>[Titre de l'activité]</strong> [petite description de l'activité]<br />
              <small class="text-muted">[date et heure]</small><br />
            </div>
          </div>
          <hr />



          <div class="d-grid">
            <a href="#" class="btn btn-primary">Charger plus</a>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="modifierProfil" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modifierProfilLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modifierProfilLabel">Modifier le profil</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-primary">Enregister</button>
        </div>
      </div>
    </div>
  </div>


</div>


<?= $this->endSection(); ?>