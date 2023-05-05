<?= $this->extend('layouts/ui'); ?>
<?= $this->section('titre'); ?>
Liste des chauffeurs
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

  <h1 class="h3 mb-3"><strong>Gestion</strong> Chauffeurs</h1>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Ajouter un chauffeur</h5>
      <?php if (session()->has('operation')) : ?>
        <?php if (!session()->operation) : ?>

          <div class="mb-3 notif">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-primary">Erreur 400</h5>
                <p class="card-text">Echec de la création, identifiants incorrects ou en doublon.</p>
              </div>
            </div>
          </div>
        <?php else : ?>
          <!-- FALSE -->
          <div class="mb-3 notif">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-success">Succès 201</h5>
                <p class="card-text">Création réussie</p>
              </div>
            </div>
          </div>
        <?php endif ?>
      <?php endif ?>

      <form class="row" action="<?= base_url(session()->root . '/chauffeurs/') ?>" method="post">
        <div class="mb-3 col-sm-6 col-lg-3">
          <input type="text" class="form-control" required name="prenom" id="prenom" aria-describedby="helpId" placeholder="Prénom du chauffeur">
        </div>
        <div class="mb-3 col-sm-6 col-lg-3">
          <input type="text" class="form-control" required name="nom" id="nom" aria-describedby="helpId" placeholder="Nom du chauffeur">
        </div>
        <div class="mb-3 col-sm-6 col-lg-3">
          <input type="text" class="form-control" required name="permis" id="permis" aria-describedby="helpId" placeholder="Numéro du permis de conduire">
        </div>
        <div class="mb-3 col-sm-6 col-lg-3">
          <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center gap-2">
            <i class="align-middle" data-feather="user-plus"></i>
            Ajouter le chauffeur
          </button>
        </div>
        <?= csrf_field() ?>
      </form>
    </div>
  </div>

  <div class="card flex-fill">
    <div class="card-header">
      <div class="d-grid gap-3 d-sm-flex justify-content-between align-items-center">
        <h5 class="card-title">Liste de chauffeurs <span class="text-primary">(<?= sizeof($liste) ?>)</span></h5>
        <input type="search" class=" form-control flex-grow-0" style="max-width: 250px;" id="recherche" placeholder="Rechercher un chauffeur">
      </div>

      <div class="d-none d-xl-flex gap-2 align-items-center">Action groupée<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#groupdelete" class="btn btn-primary">Supprimer</button></div>
      <!-- Modal -->
      <div class="modal fade" id="groupdelete" tabindex="-1" aria-labelledby="groupdeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title fs-5" id="groupdeleteLabel">Supprimer chauffeur</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Confirmez-vous la suppression groupée des chauffeurs cochés?
            </div>
            <div class="modal-footer">
              <form id="group" action="<?= base_url(session()->root . '/chauffeurs/supprimer_groupe/') ?>" class="d-flex gap-3" method="post">
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
          <th class="d-none d-xl-table-cell">Prénom</th>
          <th class="d-none d-xl-table-cell">Nom</th>
          <th class="d-none d-sm-table-cell">Numéros de permis</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($liste as $ligne) : ?>

          <tr class=" align-items-center">
            <td class="d-none d-xl-table-cell"><input class="form-check-input" form="group" name="liste[]" id="id-<?= $ligne['permis'] ?>" type="checkbox" value="<?= $ligne['permis'] ?>"></td>
            <td class="d-table-cell d-xl-none "><?= $ligne['prenom'] . ' ' . $ligne['nom'] ?></td>
            <td class="d-none d-xl-table-cell"><?= $ligne['prenom'] ?></td>
            <td class="d-none d-xl-table-cell"><?= $ligne['nom'] ?></td>
            <td class="d-none d-xl-table-cell"><?= $ligne['permis'] ?></td>
            <td class="d-flex gap-3 ">
              <a class=" flex-grow-0 px-0 btn" href="<?= base_url(session()->root . '/chauffeurs/' . $ligne['permis']) ?>" role="button" title="Modifier les informations"><i class="align-middle" data-feather="edit"></i></a>
              <button type="button" class=" flex-grow-0 px-0 btn " data-bs-toggle="modal" data-bs-target="#Supprimerchauffeur<?= $ligne['permis'] ?>" title="Supprimer"><i class="align-middle" data-feather="user-minus"></i></button>
            </td>
          </tr>
          <!-- Modal -->
          <div class="modal fade" id="Supprimerchauffeur<?= $ligne['permis'] ?>" tabindex="-1" aria-labelledby="Supprimerchauffeur<?= $ligne['permis'] ?>Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title fs-5" id="Supprimerchauffeur<?= $ligne['permis'] ?>Label">Supprimer chauffeur</h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Supprimer le chauffeur:</p>
                  <h6 class="text-primary"><?= $ligne['prenom'] . ' ' . $ligne['nom'] ?></h6>
                </div>
                <div class="modal-footer">
                  <form action="<?= base_url(session()->root . '/chauffeurs/supprimer/') ?>" class="d-flex gap-3" method="post">
                    <?= csrf_field() ?>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non, annuler</button>
                    <button type="submit" name="id" value="<?= $ligne['permis'] ?>" class="btn btn-primary">Oui, supprimer!</button>
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