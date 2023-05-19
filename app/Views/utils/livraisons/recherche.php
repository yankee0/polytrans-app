<?= $this->extend('layouts/ui'); ?>
<?= $this->section('titre'); ?>
Liste des livraisons
<?= $this->endSection(); ?>
<?= $this->section('contenu'); ?>


<div class="container-fluid p-0">

  <h1 class="h3 mb-3"><strong>Recherche</strong> livraisons</h1>

  <div class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Rechercher une livraison</h5>
          <form action="<?= base_url(session()->root . '/livraisons/recherche/') ?>" class="d-flex gap-2">
            <input type="search" class="form-control" value="<?= $recherche ?>" name="recherche" id="recherche" placeholder="Numéro du conteneur">
            <button type="submit" class="btn btn-primary d-flex align-items-center justify-content-center gap-2"><i class="align-middle" data-feather="search"></i><span class="d-none d-md-flex">Rechercher</span></button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-3">Résultat de la recherche (<?= sizeof($resultat) ?>)</h5>
          <?php foreach ($resultat as $r) : ?>

            <div class="d-grid">
              <a href="<?= base_url(session()->root . '/livraisons/info/') . $r['conteneur'] ?>" class="link fs-3"><span>Conteneur <span class="text-primary fw-bold"><?= $r['conteneur'] ?></span> pour le client <span class="text-primary fw-bold"><?= $r['client'] ?></span></span></a>
              <span class="text-sm text-secondary">Date de création: <?= $r['created_at'] ?></span>
              <hr>
            </div>
          <?php endforeach ?>
        </div>
      </div>

    </div>
    <div class=" col-md-12 d-flex align-items-center justify-content-center">
      <?= $page->links() ?>
    </div>

  </div>



</div>


<?= $this->endSection(); ?>