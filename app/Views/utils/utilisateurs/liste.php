<?= $this->extend('layouts/ui'); ?>
<?= $this->section('titre'); ?>
Liste des utilisateurs
<?= $this->endSection(); ?>
<?= $this->section('contenu'); ?>

<script>

  $(document).ready(function () {
    
    $('#recherche').keyup(function() {
      searchTable('tableau', 'recherche');
    });
    paginateTable('tableau', 15);
  });
</script>

<div class="container-fluid p-0">

  <h1 class="h3 mb-3"><strong>Gestion</strong> Utitlisateurs</h1>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Créer un compte utilisateur</h5>

      <form class="row" action="<?= base_url(session()->root . '/utilisateurs/') ?>" method="post">
        <div class="mb-3 col-sm-6 col-lg-4">
          <select class="form-select " name="profil" id="profil" required>
            <option disabled selected>Choisir un profil</option>
            <option value="SUPER ADMIN">Super Administrateur</option>
            <option value="OPS FLOTTER">Opérateur flotte</option>
            <option value="OPS RECEPTION">Opérateur réception</option>
            <option value="OPS MVT">Opérateur mouvement</option>
          </select>
        </div>
        <div class="mb-3 col-sm-6 col-lg-4">
          <input type="text" class="form-control" required name="prenom" id="prenom" aria-describedby="helpId" placeholder="Prénom de l'utilisateur">
        </div>
        <div class="mb-3 col-sm-6 col-lg-4">
          <input type="text" class="form-control" required name="nom" id="nom" aria-describedby="helpId" placeholder="Nom de l'utilisateur">
        </div>
        <div class="mb-3 col-sm-6 col-lg-4">
          <input type="email" class="form-control" required name="email" id="email" aria-describedby="helpId" placeholder="email @poly-trans.sn">
        </div>
        <div class="mb-3 col-sm-6 col-lg-4">
          <input type="text" class="form-control" required name="telephone" id="telephone" aria-describedby="helpId" placeholder="Numéro téléphone de l'utilisateur">
        </div>
        <div class="mb-3 col-sm-6 col-lg-4">
          <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center gap-2">
            <i class="align-middle" data-feather="user-plus"></i>
            Créer le compte
          </button>
        </div>
        <?= csrf_field() ?>
      </form>
      <h6 class="card-subtitle mb-2 text-muted"><span class="badge bg-primary">NB:</span> Une fois le compte créé, un lien d'activation sera envoyé sur l'email <code class=" badge bg-light text-primary">@polytrans.sn</code> de l'utilisateur concerné.</h6>
    </div>
  </div>

  <div class="card flex-fill">
    <div class="card-header">
      <div class="d-grid gap-3 d-sm-flex justify-content-between align-items-center">
        <h5 class="card-title">Liste de utilisateurs <span class="text-primary">(<?= sizeof($liste) ?>)</span></h5>
        <input type="search" class=" form-control flex-grow-0" style="max-width: 250px;" id="recherche" placeholder="Rechercher un utilisateur">
      </div>

      <div class="d-none d-xl-flex gap-2 align-items-center">Action groupée<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#groupdelete" class="btn btn-primary">Supprimer</button></div>
      <!-- Modal -->
      <div class="modal fade" id="groupdelete" tabindex="-1" aria-labelledby="groupdeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title fs-5" id="groupdeleteLabel">Supprimer profil</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Confirmez-vous la suppression groupée des utilisateurs cochés?
            </div>
            <div class="modal-footer">
              <form id="group" action="<?= base_url(session()->root . '/utilisateurs/supprimer_groupe/') ?>" class="d-flex gap-3" method="post">
                <?= csrf_field() ?>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non, annuler</button>
                <button type="submit" class="btn btn-primary">Oui, supprimer!</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <table id="tableau" class="table table-hover my-0">
      <thead>
        <tr>
          <th class="d-none d-xl-table-cell"></th>
          <th class="d-table-cell d-xl-none">Nom</th>
          <th class="d-none d-xl-table-cell">Profil</th>
          <th class="d-none d-xl-table-cell">Prénom</th>
          <th class="d-none d-xl-table-cell">Nom</th>
          <th class="d-none d-sm-table-cell">Email</th>
          <th class="d-none d-lg-table-cell">Téléphone</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($liste as $ligne) : ?>

          <tr class=" align-items-center">
            <td class="d-none d-xl-table-cell"><input class="form-check-input" form="group" name="liste[]" id="id-<?= $ligne['id'] ?>" type="checkbox" value="<?= $ligne['id'] ?>"></td>
            <td class="d-table-cell d-xl-none "><?= $ligne['prenom'] . ' ' . $ligne['nom'] ?></td>
            <td class="d-none d-xl-table-cell"><?= $ligne['profil'] ?></td>
            <td class="d-none d-xl-table-cell"><?= $ligne['prenom'] ?></td>
            <td class="d-none d-xl-table-cell"><?= $ligne['nom'] ?></td>
            <td class="d-none d-sm-table-cell"><a href="mailto:<?= $ligne['email'] ?>" title="Envoyer un mail"><?= $ligne['email'] ?></a></td>
            <td class="d-none d-lg-table-cell"><a href="tel:<?= $ligne['telephone'] ?>" title="Appeller"><?= $ligne['telephone'] ?></a></td>
            <td class="d-flex gap-3 ">
              <a class=" flex-grow-0 px-0 btn" href="<?= base_url(session()->root . '/profil/' . $ligne['id']) ?>" role="button" title="Voir le profil"><i class="align-middle" data-feather="folder"></i></a>
              <button type="button" class=" flex-grow-0 px-0 btn " data-bs-toggle="modal" data-bs-target="#SupprimerProfil<?= $ligne['id'] ?>" title="Supprimer"><i class="align-middle" data-feather="user-minus"></i></button>
              <button type="button" class=" flex-grow-0 px-0 btn <?= ($ligne['compte_actif'] == 'non') ? 'text-primary' : 'text-muted border-0 disabled' ?>" data-bs-toggle="modal" data-bs-target="#ActiverProfil<?= $ligne['id'] ?>" role="button" title="Activer le compte"><i class="align-middle" data-feather="power"></i></button>
            </td>
          </tr>
          <!-- Modal -->
          <div class="modal fade" id="SupprimerProfil<?= $ligne['id'] ?>" tabindex="-1" aria-labelledby="SupprimerProfil<?= $ligne['id'] ?>Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title fs-5" id="SupprimerProfil<?= $ligne['id'] ?>Label">Supprimer profil</h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Supprimer le compte de l'utilisateur:</p>
                  <h6 class="text-primary"><?= $ligne['prenom'] . ' ' . $ligne['nom'] ?></h6>
                </div>
                <div class="modal-footer">
                  <form action="<?= base_url(session()->root . '/utilisateurs/supprimer/') ?>" class="d-flex gap-3" method="post">
                    <?= csrf_field() ?>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non, annuler</button>
                    <button type="submit" name="id" value="<?= $ligne['id'] ?>" class="btn btn-primary">Oui, supprimer!</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="ActiverProfil<?= $ligne['id'] ?>" tabindex="-1" aria-labelledby="ActiverProfil<?= $ligne['id'] ?>Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title fs-5" id="ActiverProfil<?= $ligne['id'] ?>Label">Activation</h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Activer le compte de l'utilisateur:</p>
                  <h6 class="text-primary"><?= $ligne['prenom'] . ' ' . $ligne['nom'] ?></h6>
                </div>
                <div class="modal-footer">
                  <form action="<?= base_url(session()->root . '/utilisateurs/activer/') ?>" class="d-flex gap-3" method="post">
                    <?= csrf_field() ?>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non, annuler</button>
                    <button type="submit" name="id" value="<?= $ligne['id'] ?>" class="btn btn-primary">Oui, activer le compte!</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach ?>
      </tbody>
    </table>

    <div id="footer" class="card-footer text-muted">

    </div>




  </div>
</div>


<?= $this->endSection(); ?>