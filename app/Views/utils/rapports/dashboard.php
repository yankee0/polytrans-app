<?= $this->extend('layouts/ui'); ?>
<?= $this->section('titre'); ?>
Rapports
<?= $this->endSection(); ?>
<?= $this->section('contenu'); ?>
<h1 class="h3 mb-3"><strong>Rapport</strong> Dashboard</h1>
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Rapport livraisons</h5>
        <?= form_open(base_url(session()->root.'/rapports/livraisons')) ?>
        <?= csrf_field() ?>
        <div class="row">
          <div class="col-md-7 mb-3">
            <label for="type" class="form-label">Type </label>
            <select class="form-select" name="type" id="type" required>
              <option hidden>Sélectionnez un type</option>
              <option value="j">Journalier</option>
              <option value="h">Hebdomadaire</option>
              <option value="m">Mensuel</option>
              <option value="a">Annuel</option>
            </select>
          </div>
          <div class="col-md-5 mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" required id="date" placeholder="Sélectionnez la date">
          </div>
          <div class="col-md-12 mb-3 d-flex flex-column justify-content-end">
            <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center gap-3">
              <i class="align-middle" data-feather="clipboard"></i>
              <span>Télécharger</span>
            </button>
          </div>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>

</div>



<?= $this->endSection(); ?>