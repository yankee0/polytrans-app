<?= $this->extend('layouts/ui'); ?>
<?= $this->section('titre'); ?>
Dashboard
<?= $this->endSection(); ?>
<?= $this->section('contenu'); ?>
<h1 class="h3 mb-3"><strong>OPS MVT</strong> Dashboard</h1>

<div class="row">

  <div class="col-12">
    <div class="card flex-fill">
      <div class="card-body">
        <h5 class="card-title">En attente complément EIR et BL (<span class="text-primary"><?= sizeof($non_eir_bl) ?></span>)</h5>
        <div class="d-flex justify-content-end">
          <div class="flex-grow-0">
            <input type="search" class="form-control" id="search" placeholder="Rechercher">
          </div>
        </div>
      </div>
      <table id="tableau" class="table table-hover my-0">
        <thead>
          <tr>
            <th class="d-table-cell">Conteneur</th>
            <th class=" d-none d-md-table-cell">Client</th>
            <th class="d-table-cell d-none d-md-table-cell">Date d'enregistrement</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($non_eir_bl as $ligne) : ?>
            <tr>
              <td class="d-table-cell"><?= $ligne['conteneur'] ?></td>
              <td class=" d-none d-md-table-cell"><?= $ligne['client'] ?></td>
              <td class="d-table-cell d-none d-md-table-cell"><?= $ligne['created_at'] ?></td>
              <td>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalId<?= $ligne['conteneur'] ?>">
                  Complèter
                </button>
                <div class="modal fade" id="modalId<?= $ligne['conteneur'] ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Complément <span class="text-primary"><?= $ligne['conteneur'] ?></span></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <?= form_open(base_url(session()->root . '/livraisons/modifier')) ?>
                      <div class="modal-body">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                          <label class="form-label">EIRs</label>
                          <div class="form-check">
                            <input value="OK" class="form-check-input" type="radio" name="eir" id="OK">
                            <label class="form-check-label" for="OK">
                              OK
                            </label>
                          </div>
                          <div class="form-check">
                            <input value="NON OK" class="form-check-input" type="radio" name="eir" id="NOOK" checked>
                            <label class="form-check-label" for="NOOK">
                              NON OK
                            </label>
                          </div>
                        </div>
                        <label class="form-label d-grid">
                          <span class="text-sm">Date ALLER</span>
                          <input type="date" name="date_sortie" class="form-control" placeholder="Date de sortie">
                        </label>
                        <label class="form-label d-grid">
                          <span class="text-sm">Date de RETOUR</span>
                          <input type="date" name="date_retour" class="form-control" placeholder="Date de retour">
                        </label>
                        <label class="form-label d-grid">
                          <span class="text-sm">Nom du chauffeur</span>
                          <select name="chauffeur" class="form-select ">
                            <option value="" hidden selected>Sélectionnez le chauffeur</option>
                            <?php foreach ($liste_chauffeur as $line) : ?>
                              <option value="<?= $line['tel'] ?>"><?= $line['tel'] . ' - ' . $line['prenom'] . ' ' . $line['nom'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </label>
                        <label class="form-label d-grid">
                          <span class="text-sm">Immatriculation du camion</span>
                          <select name="camion" class="form-select ">
                            <option value="" hidden selected>Sélectionnez le camion</option>
                            <?php foreach ($liste_camion as $line) : ?>
                              <option value="<?= $line['immatriculation'] ?>"><?= $line['immatriculation'] ?></option>
                            <?php endforeach ?>
                          </select>
                        </label>
                        <label class="form-label d-grid">
                          <span class="text-sm">Zone de livraison</span>
                          <input value="<?= set_value('zone', '') ?>" type="text" name="zone" id="" class="form-control" placeholder="Nom de la zone">
                        </label>
                        <label class=" form-label d-grid">
                          <span class="text-sm">Commentaire</span>
                          <textarea value="<?= set_value('commentaire', '') ?>" class="form-control" name="commentaire" id="" rows="3"></textarea>
                        </label>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" name="id" value="<?= $ligne['id'] ?>" class="btn btn-primary">Enregistrer</button>
                      </div>
                      <?= form_close() ?>
                    </div>
                  </div>
                </div>
                <script>
                  const myModal = new bootstrap.Modal(document.getElementById('modalId<?= $ligne['conteneur'] ?>'), options)
                </script>
              </td>
            </tr>
          <?php endforeach ?>

        </tbody>
      </table>
      <div id="footer" class=" card-footer d-flex justify-content-center">

      </div>
    </div>
  </div>
  <div class="col">
    <div class="card flex-fill w-100">
      <div class="card-header">

        <h5 class="card-title mb-0">Statistique annuelle</h5>
      </div>
      <div class="card-body py-3">
        <div class="chart chart-sm">
          <canvas id="chartjs-dashboard-line"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url('js/graph.js') ?>"></script>
<script>
  $(document).ready(function() {
    drawLineChart("<?= base_url('graphs/line') ?>");
    $('#search').keyup(function() {
      searchTable('tableau', 'search');
    });
    paginateTable('tableau', 10);
  });
</script>
<?= $this->endSection(); ?>