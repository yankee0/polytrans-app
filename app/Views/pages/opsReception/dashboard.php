<?= $this->extend('layouts/ui'); ?>
<?= $this->section('titre'); ?>
Dashboard
<?= $this->endSection(); ?>
<?= $this->section('contenu'); ?>
<h1 class="h3 mb-3"><strong>Statistiques</strong> Dashboard</h1>

<div class="row">
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