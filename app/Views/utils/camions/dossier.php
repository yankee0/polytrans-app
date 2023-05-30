<?= $this->extend('layouts/ui'); ?>
<?= $this->section('titre'); ?>
Dossier <?= $camion['immatriculation'] ?>
<?= $this->endSection(); ?>
<?= $this->section('contenu'); ?>
<h1 class="h3 mb-3 d-flex align-items-center justify-content-between">
  <span>
    <strong>Dossier</strong> <?= $camion['immatriculation'] ?>
  </span>
  <span>
    <a class="btn btn-primary d-flex align-items-center justify-content-center gap-2" href="<?= base_url(session()->root . '/camions/modifier/' . $camion['immatriculation']) ?>" role="button" title="Modifier les informations">
      <span>Modifier</span>
    </a>
  </span>
</h1>

<div class="row">
  <div class="col-md-5 d-block">
    <div>
      <div class="card flex-grow-1">
        <div class="card-body">
          <div class="row">
            <div class="col mt-0">
              <h5 class="card-title text-primary">Visite technique</h5>
            </div>

            <div class="col-auto">
              <div class="stat text-primary">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                  <path d="M512.5 390.6c-29.9 0-57.9 11.6-79.1 32.8-21.1 21.2-32.8 49.2-32.8 79.1 0 29.9 11.7 57.9 32.8 79.1 21.2 21.1 49.2 32.8 79.1 32.8 29.9 0 57.9-11.7 79.1-32.8 21.1-21.2 32.8-49.2 32.8-79.1 0-29.9-11.7-57.9-32.8-79.1a110.96 110.96 0 0 0-79.1-32.8zm412.3 235.5l-65.4-55.9c3.1-19 4.7-38.4 4.7-57.7s-1.6-38.8-4.7-57.7l65.4-55.9a32.03 32.03 0 0 0 9.3-35.2l-.9-2.6a442.5 442.5 0 0 0-79.6-137.7l-1.8-2.1a32.12 32.12 0 0 0-35.1-9.5l-81.2 28.9c-30-24.6-63.4-44-99.6-57.5l-15.7-84.9a32.05 32.05 0 0 0-25.8-25.7l-2.7-.5c-52-9.4-106.8-9.4-158.8 0l-2.7.5a32.05 32.05 0 0 0-25.8 25.7l-15.8 85.3a353.44 353.44 0 0 0-98.9 57.3l-81.8-29.1a32 32 0 0 0-35.1 9.5l-1.8 2.1a445.93 445.93 0 0 0-79.6 137.7l-.9 2.6c-4.5 12.5-.8 26.5 9.3 35.2l66.2 56.5c-3.1 18.8-4.6 38-4.6 57 0 19.2 1.5 38.4 4.6 57l-66 56.5a32.03 32.03 0 0 0-9.3 35.2l.9 2.6c18.1 50.3 44.8 96.8 79.6 137.7l1.8 2.1a32.12 32.12 0 0 0 35.1 9.5l81.8-29.1c29.8 24.5 63 43.9 98.9 57.3l15.8 85.3a32.05 32.05 0 0 0 25.8 25.7l2.7.5a448.27 448.27 0 0 0 158.8 0l2.7-.5a32.05 32.05 0 0 0 25.8-25.7l15.7-84.9c36.2-13.6 69.6-32.9 99.6-57.5l81.2 28.9a32 32 0 0 0 35.1-9.5l1.8-2.1c34.8-41.1 61.5-87.4 79.6-137.7l.9-2.6c4.3-12.4.6-26.3-9.5-35zm-412.3 52.2c-97.1 0-175.8-78.7-175.8-175.8s78.7-175.8 175.8-175.8 175.8 78.7 175.8 175.8-78.7 175.8-175.8 175.8z"></path>
                </svg>
              </div>
            </div>
          </div>
          <h4 class="mt-1 mb-3">
            <div>Fin: <span class="text-primary"><?= (empty($camion['vt_fin']) ? 'Non défini' : $camion['vt_fin']) ?></span></div>
          </h4>
          <div class="d-flex justify-content-end">
            <button type="button" value="<?= $camion['id'] ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalIdvt">
              Modifier
            </button>
            <div class="modal fade" id="modalIdvt" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleIdvt" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleIdvt">Modifier les informations de la visite technique</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?= form_open(base_url(session()->root . '/camions/modifier/vt')) ?>
                    <?= csrf_field() ?>
                    <div class="mb-3">
                      <label for="vt_fin" class="form-label">Date de fin</label>
                      <input type="date" class="form-control" value="<?= set_value('vt_fin', $camion['vt_fin']) ?>" name="vt_fin" id="vt_fin" aria-describedby="helpId" placeholder="Date de fin de la visite technique">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" name="immatriculation" value="<?= $camion['immatriculation'] ?>" class="btn btn-primary">Enregistrer</button>
                    <?= form_close() ?>
                  </div>
                </div>
              </div>
            </div>
            <script>
              const myModalVT = new bootstrap.Modal(document.getElementById('modalIdvt'), options)
            </script>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="card flex-grow-1">
        <div class="card-body">
          <div class="row">
            <div class="col mt-0">
              <h5 class="card-title text-primary">Assurance</h5>
            </div>

            <div class="col-auto">
              <div class="stat text-primary">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                  <path d="M466.5 83.7l-192-80a48.15 48.15 0 0 0-36.9 0l-192 80C27.7 91.1 16 108.6 16 128c0 198.5 114.5 335.7 221.5 380.3 11.8 4.9 25.1 4.9 36.9 0C360.1 472.6 496 349.3 496 128c0-19.4-11.7-36.9-29.5-44.3zM256.1 446.3l-.1-381 175.9 73.3c-3.3 151.4-82.1 261.1-175.8 307.7z"></path>
                </svg>
              </div>
            </div>
          </div>
          <h4 class="mt-1 mb-3">
            <div>Fin: <span class="text-primary"><?= (empty($camion['as_fin']) ? 'Non défini' : $camion['as_fin']) ?></span></div>
          </h4>
          <div class="d-flex justify-content-end">
            <button type="button" name="id" value="<?= $camion['id'] ?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalIdass">
              Modifier
            </button>
            <div class="modal fade" id="modalIdass" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleIdass" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleIdass">Modifier les informations de l'assurance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <?= form_open(base_url(session()->root . '/camions/modifier/as')) ?>
                    <?= csrf_field() ?>
                    <div class="mb-3">
                      <label for="as_fin" class="form-label">Date de fin</label>
                      <input type="date" class="form-control" value="<?= set_value('as_fin', $camion['as_fin']) ?>" name="as_fin" id="vt_fin" aria-describedby="helpId" placeholder="Date de fin de l'assurance">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" name="immatriculation" value="<?= $camion['immatriculation'] ?>" class="btn btn-primary">Enregistrer</button>
                    <?= form_close() ?>
                  </div>
                </div>
              </div>
            </div>
            <script>
              const myModalASS = new bootstrap.Modal(document.getElementById('modalIdass'), options)
            </script>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title text-primary">Informations</h4>
      </div>
      <div class="card-body">
        <h5 class="text-secondary">Chauffeurs</h3>
          <?php if (empty($chauffeurs)) : ?>
            <div class="alert alert-warning" role="alert">
              Aucun chauffeur n'a été affecté dans ce camion.
            </div>
          <?php else : ?>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Téléphone</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($chauffeurs as $ch) : ?>
                    <tr class="">
                      <td scope="row">
                        <?= $ch['prenom'] . ' ' . $ch['nom'] ?>
                      </td>
                      <td>
                        <?= $ch['tel'] ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          <?php endif ?>

      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>