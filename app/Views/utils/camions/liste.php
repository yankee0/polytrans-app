<?= $this->extend('layouts/ui'); ?>
<?= $this->section('titre'); ?>
Liste des camions
<?= $this->endSection(); ?>
<?= $this->section('contenu'); ?>

<script>
  $(document).ready(function() {

    $('#recherche').keyup(function() {
      searchTable('tableau', 'recherche');
    });
    paginateTable('tableau', 15);
  });
</script>

<div class="container-fluid p-0">

  <h1 class="h3 mb-3"><strong>Gestion</strong> camions</h1>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Ajouter un camion</h5>

      <form class="row" action="<?= base_url(session()->root . '/camions/') ?>" method="post">
        <div class="mb-3 col-sm-6 col-xl-3 col-lg-3">
          <input type="text" class="form-control" required name="immatriculation" aria-describedby="helpId" placeholder="Immatriculation du camion">
        </div>
        <div class="mb-3 col-sm-6 col-xl-3 col-lg-3">
          <input type="date" class="form-control" name="vt_fin" aria-describedby="helpId" placeholder="Immatriculation du camion">
          <p class="form-text text-muted">
            Date de fin visite technique ( À laisser vide si elle n'est pas disponible. )
          </p>
        </div>
        <div class="mb-3 col-sm-6 col-xl-3 col-lg-3">
          <input type="date" class="form-control" name="as_fin" aria-describedby="helpId" placeholder="Immatriculation du camion">
          <p class="form-text text-muted">
            Date de fin assurance ( À laisser vide si elle n'est pas disponible. )
          </p>
        </div>
        <div class="mb-3 col-sm-6 col-xl-3 col-lg-3">
          <button type="submit" class="btn btn-primary d-flex justify-content-center align-items-center gap-2">
            <i class="align-middle" data-feather="plus"></i>
            Ajouter le camion
          </button>
        </div>
        <?= csrf_field() ?>
      </form>
    </div>
  </div>

  <div class="card flex-fill">
    <div class="card-header">
      <div class="d-grid gap-3 d-sm-flex justify-content-between align-items-center">
        <h5 class="card-title">Liste de camions <span class="text-primary">(<?= sizeof($liste) ?>)</span></h5>
        <input type="search" class=" form-control flex-grow-0" style="max-width: 250px;" id="recherche" placeholder="Rechercher un camion">
      </div>

      <div class="d-none d-xl-flex gap-2 align-items-center">Action groupée<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#groupdelete" class="btn btn-primary">Supprimer</button></div>
      <!-- Modal -->
      <div class="modal fade" id="groupdelete" tabindex="-1" aria-labelledby="groupdeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title fs-5" id="groupdeleteLabel">Supprimer camion</h3>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Confirmez-vous la suppression groupée des camions cochés?
            </div>
            <div class="modal-footer">
              <form id="group" action="<?= base_url(session()->root . '/camions/supprimer_groupe/') ?>" class="d-flex gap-3" method="post">
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
          <!-- <th class="d-table-cell ">Status</th> -->
          <th class="d-table-cell ">Immatriculation</th>
          <!-- <th class="d-none d-xl-table-cell">VT début</th> -->
          <th class="d-none d-xl-table-cell">VT fin</th>
          <!-- <th class="d-none d-xl-table-cell">AS début</th> -->
          <th class="d-none d-xl-table-cell">AS fin</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($liste as $ligne) : ?>

          <tr class=" align-items-center">
            <td class="d-none d-xl-table-cell"><input class="form-check-input" form="group" name="liste[]" id="id-<?= $ligne['immatriculation'] ?>" type="checkbox" value="<?= $ligne['immatriculation'] ?>"></td>
            <!-- <td class="d-table-cell "><span class="badge bg-primary me-1 my-1">yankee</span></td> -->
            <td class="d-table-cell "><?= $ligne['immatriculation'] ?></td>
            <!-- <td class="d-none d-xl-table-cell"><?= (!empty($ligne['vt_debut'])) ? $ligne['vt_debut'] : '<span class="badge bg-warning me-1 my-1">indéfinie</span>' ?></td> -->
            <td class="d-none d-xl-table-cell"><?= (!empty($ligne['vt_fin'])) ? $ligne['vt_fin'] : '<span class="badge bg-warning me-1 my-1">indéfinie</span>' ?></td>
            <!-- <td class="d-none d-xl-table-cell"><?= (!empty($ligne['as_debut'])) ? $ligne['as_debut'] : '<span class="badge bg-warning me-1 my-1">indéfinie</span>' ?></td> -->
            <td class="d-none d-xl-table-cell"><?= (!empty($ligne['as_fin'])) ? $ligne['as_fin'] : '<span class="badge bg-warning me-1 my-1">indéfinie</span>' ?></td>
            <td class="d-flex gap-3 ">
              <a class=" flex-grow-0 px-0 btn" href="<?= base_url(session()->root . '/camions/modifier/' . $ligne['immatriculation']) ?>" role="button" title="Modifier les informations"><i class="align-middle" data-feather="edit"></i></a>
              <a class=" flex-grow-0 px-0 btn" href="<?= base_url(session()->root . '/camions/dossier/' . $ligne['immatriculation']) ?>" role="button" title="Voir le dossier"><i class="align-middle" data-feather="folder"></i></a>
              <button type="button" class=" flex-grow-0 px-0 btn " data-bs-toggle="modal" data-bs-target="#Supprimercamion<?= str_replace(' ','-',$ligne['immatriculation']) ?>" title="Supprimer"><i class="align-middle" data-feather="trash"></i></button>
            </td>
          </tr>
          <!-- Modal -->
          <div class="modal fade" id="Supprimercamion<?= str_replace(' ','-',$ligne['immatriculation']) ?>" tabindex="-1" aria-labelledby="Supprimercamion<?= str_replace(' ','-',$ligne['immatriculation']) ?>Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title fs-5" id="Supprimercamion<?= $ligne['immatriculation'] ?>Label">Supprimer camion</h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Supprimer le camion:</p>
                  <h6 class="text-primary"><?= $ligne['immatriculation'] ?></h6>
                </div>
                <div class="modal-footer">
                  <form action="<?= base_url(session()->root . '/camions/supprimer/') ?>" class="d-flex gap-3" method="post">
                    <?= csrf_field() ?>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non, annuler</button>
                    <button type="submit" name="id" value="<?= $ligne['immatriculation'] ?>" class="btn btn-primary">Oui, supprimer!</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

        <?php endforeach; ?>
      </tbody>
    </table>

    <div id="footer" class="card-footer text-muted">

    </div>




  </div>
</div>


<?= $this->endSection(); ?>