<?= $this->extend('layouts/ui'); ?>
<?= $this->section('titre'); ?>
Rapports
<?= $this->endSection(); ?>
<?= $this->section('contenu'); ?>
<h1 class="h3 mb-3"><strong>Rapport</strong> Dashboard</h1>
<div class="row">
  <div class="col-md">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Télécharger un rapport</h5>
        <?= form_open(
          base_url(session()->root . '/rapports/livraisons'),
          [
            'id' => 'rapportForm'
          ]
          ) ?>
        <?= csrf_field() ?>
        <div class="row">
          <div class="col-md mb-3">
            <label for="rapport" class="form-label">Rapport </label>
            <select class="form-select" name="rapport" id="rapport" required>
            <option selected value="" hidden>Sélectionnez un type</option>
              <option value="livraisons">Livraisons</option>
            </select>
          </div>
          <div class="col-md mb-3">
            <label for="type" class="form-label">Type </label>
            <select class="form-select" name="type" id="type" required>
              <option hidden>Sélectionnez un type</option>
              <option value="j">Journalier</option>
              <option value="h">Hebdomadaire</option>
              <option value="m">Mensuel</option>
              <option value="a">Annuel</option>
            </select>
          </div>
          <div class="col-md mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" required id="date" placeholder="Sélectionnez la date">
          </div>
          <div class="col-md mb-3 d-flex flex-column justify-content-end">
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
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="<?= base_url('js/rapport.js') ?>"></script>
<script>
  

  

  var jsonData = [{
      nom: "John",
      age: 25,
      pays: "USA"
    },
    {
      nom: "Alice",
      age: 30,
      pays: "France"
    },
    {
      nom: "Bob",
      age: 35,
      pays: "Canada"
    }
  ];

  // generateExcelFile(jsonData, "donnees.xlsx");
</script>




<?= $this->endSection(); ?>