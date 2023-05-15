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
      <h5 class="card-title">Modifier le immatriculation du camion</h5>

      <form class="row" action="<?= base_url(session()->root . '/camions/modifier') ?>" method="post">
        <div class="mb-3 col-sm-6 col-lg-3">
          <input type="text" class="form-control" value="<?=set_value('immatriculation',$camion['immatriculation'])?>" required name="immatriculation" id="immatriculation" aria-describedby="helpId" placeholder="Immatriculation du camion">
        </div>
        <div class="mb-3 col-sm-6 col-lg-3">
          <button type="submit" name="id" value="<?=$camion['id']?>" class="btn btn-primary d-flex justify-content-center align-items-center gap-2">
            <i class="align-middle" data-feather="check"></i>
            Enregistrer
          </button>
        </div>
        <?= csrf_field() ?>
      </form>
    </div>
  </div>

</div>


<?= $this->endSection(); ?>