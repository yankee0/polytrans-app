<?= $this->extend('layouts/ui'); ?>
<?= $this->section('titre'); ?>
Liste des chauffeurs
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

  <h1 class="h3 mb-3"><strong>Gestion</strong> Chauffeurs</h1>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Modifer les informations du chauffeur</h5>

      <form class="row" action="<?= base_url(session()->root . '/chauffeurs/modifier') ?>" method="post">
        <div class="mb-3 col-md-6">
          <input type="text" class="form-control" required value="<?= set_value('prenom', $chauffeur['prenom']) ?>" name="prenom" id="prenom" aria-describedby="helpId" placeholder="Prénom du chauffeur">
        </div>
        <div class="mb-3 col-md-6">
          <input type="text" class="form-control" required value="<?= set_value('nom', $chauffeur['nom']) ?>" name="nom" id="nom" aria-describedby="helpId" placeholder="Nom du chauffeur">
        </div>
        <div class="mb-3 col-md-6">
          <input type="tel" class="form-control" required value="<?= set_value('tel', $chauffeur['tel']) ?>" name="tel" id="tel" aria-describedby="helpId" placeholder="Numéro du tel de conduire">
        </div>
        <div class="mb-3 col-sm-6  ">
          <select class="form-select " name="camion" id="">
            <option hidden>Camions</option>
            <option value="">Laisser vide</option>
            <?php foreach ($camions as $camion) : ?>
              <option value="<?= $camion['immatriculation'] ?>" <?= ($chauffeur['camion'] == $camion['immatriculation']) ? 'selected' : '' ?>><?= $camion['immatriculation'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="mb-3 col-12">
          <button type="submit" name="last_tel" value="<?= $chauffeur['tel'] ?>" class="m-auto btn btn-primary d-flex justify-content-center align-items-center gap-2">
            <i class="align-middle" data-feather="user-check"></i>
            Enregistrer
          </button>
        </div>
        <?= csrf_field() ?>
      </form>
    </div>
  </div>


</div>


<?= $this->endSection(); ?>