<?= $this->extend('layouts/ui'); ?>
<?= $this->section('titre'); ?>
Dashboard
<?= $this->endSection(); ?>
<?= $this->section('contenu'); ?>
<h1 class="h3 mb-3"><strong>Statistiques</strong> Dashboard</h1>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Rechercher une livraison</h5>
        <form action="<?= base_url(session()->root . '/livraisons/recherche/') ?>" class="d-flex gap-2">
          <input type="search" class="form-control" name="recherche" id="recherche" placeholder="Numéro du conteneur">
          <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center gap-2"><i class="align-middle" data-feather="search"></i><span class="d-none d-md-flex">Rechercher</span></button>
        </form>

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

  });
</script>
<?= $this->endSection(); ?>