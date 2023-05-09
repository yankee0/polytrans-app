<?= $this->extend('layouts/ui'); ?>
<?= $this->section('titre'); ?>
Liste des livraisons
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

  <h1 class="h3 mb-3"><strong>Gestion</strong> Livraison</h1>

  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Rechercher une livraison</h5>
          <form action="#">
            <input type="search" class="form-control" name="recherche" id="recherche" placeholder="Numéro du conteneur">
          </form>

        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
        <form class="card-body">
          <h5 class="card-title">Enregistrer une nouvelle livraison</h5>
          <?= csrf_field() ?>
          <div class="row">
            <div class="col-sm-6">

              <h6 class=" mt-3 text-primary">Informations sur le conteneur</h6>
              <label class="form-label d-grid">
                <span class="text-sm">Numéro du conteneur <span class="text-primary">*</span></span>
                <input type="text" name="conteneur" class="form-control " placeholder="Numéro du conteneur" required>
              </label>

              <label class="form-label d-grid">
                <span class="text-sm">Type de conteneur <span class="text-primary">*</span></span>
                <select name="type" class="form-select " id="" required>
                  <option disabled selected>Selectionnez le type</option>
                  <option value="20">20'</option>
                  <option value="40">40'</option>
                </select>
              </label>

              <label class="form-label d-grid">
                <span class="text-sm">Nom de la compagnie <span class="text-primary">*</span></span>
                <input type="text" name="compagnie" class="form-control " placeholder="Compagnie" required>
              </label>

              <h6 class=" mt-3 text-primary">Informations sur le B.L.</h6>
              <label class="form-label d-grid">
                <span class="text-sm">B.L.</span>
                <input type="text" name="bl" class="form-control " placeholder="B.L.">
              </label>

              <label class="form-label d-grid">
                <span class="text-sm">Deadline</span>
                <input type="datetime-local" name="deadline" class="form-control ">
              </label>

              <h6 class=" mt-3 text-primary">Informations sur le E.I.R.</h6>
              <label class="form-label d-grid">
                <span class="text-sm">Numéro E.I.R.</span>
                <input type="text" name="eir" class="form-control " placeholder="E.I.R">
              </label>

            </div>
            <div class="col-sm-6">
              <h6 class=" mt-3 text-primary">Information sur le client</h6>
              <label class="form-label d-grid">
                <span class="text-sm">Client <span class="text-primary">*</span></span>
                <input type="text" name="client" class="form-control " placeholder="Numéro du client" required>
              </label>
              <label class="form-label d-grid">
                <span class="text-sm">Nom du contact </span>
                <input type="text" name="nom_contact" class="form-control " placeholder=" Nom du contact">
              </label>
              <label class="form-label d-grid">
                <span class="text-sm">Téléphone du contact</span>
                <input type="tel" name="tel_contact" class="form-control " placeholder="Téléphone du contact">
              </label>
              <label class="form-label d-grid">
                <span class="text-sm">Email du contact</span>
                <input type="email" name="email_contact" class="form-control " placeholder="Email du contact">
              </label>
              <h6 class=" mt-3 text-primary">Paiement</h6>
              <label class="form-label d-grid">
                <span class="text-sm">Règlement <span class="text-primary">*</span></span>
                <select name="reglement" class="form-select " id="reglement">
                  <option disabled selected>Choisir le type de règlement</option>
                  <option value="COMPTANT">COMPTANT</option>
                  <option value="À CRÉDIT">À CRÉDIT</option>
                </select>
              </label>

              <div class="paye" style="display: none;">
                <label class="form-label d-grid">
                  <span class="text-sm">La livraison a-t-elle été payée?</span>
                  <div class="d-flex gap-3">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" name="paiement" type="radio" id="oui" value="oui" aria-label="Text for screen reader"> Oui
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" name="paiement" type="radio" id="non" value="non" aria-label="Text for screen reader"> Non
                      </label>
                    </div>
                  </div>
                </label>
                <label class="form-label d-grid payeDate" style="display: none;">
                  <span class="text-sm">Date de paiement</span>
                  <input type="date" name="date_paiment" class="form-control" placeholder="Téléphone du contact">
                </label>
              </div>
              <h6 class=" mt-3 text-primary">Documents</h6>
              <div class="alert alert-warning" role="alert">
                <span>En conception</span>
              </div>
              

            </div>
            <div class="col-sm-6">
              <h6 class=" mt-3 text-primary">Transport</h6>
              <label class="form-label d-grid">
                <span class="text-sm">Nom du chauffeur</span>
                <select name="chauffeur" class="form-select ">
                  <option disabled selected>Sélectionnez le chauffeur</option>
                  <?php foreach ($liste_chauffeur as $ligne) : ?>
                    <option value="<?= $ligne['permis'] ?>"><?= $ligne['permis'] .' - '. $ligne['prenom'] . ' ' . $ligne['nom'] ?></option>
                  <?php endforeach ?>
                </select>
              </label>
              <label class="form-label d-grid">
                <span class="text-sm">Immatriculation du camion</span>
                <select name="camion" class="form-select ">
                  <option disabled selected>Sélectionnez le camion</option>
                  <?php foreach ($liste_camion as $ligne) : ?>
                    <option value="<?= $ligne['immatriculation'] ?>"><?= $ligne['immatriculation'] ?></option>
                  <?php endforeach ?>
                </select>
              </label>
              <label class="form-label d-grid">
                <span class="text-sm">Zone de livraison</span>
                <input type="text" name="zone" id="" class="form-control" placeholder="Nom de la zone">
              </label>
              <label class=" form-label d-grid">
                <span class="text-sm">Remarque</span>
                <textarea class="form-control" name="" id="" rows="3"></textarea>
              </label>

            </div>

            <div class="col-md-12 mt-3 text-center md-flex justify-content-center ">
              <button type="submit" class="btn btn-primary">Enregister</button>
              <button type="reset" class="btn btn-secondary">Effacer</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-6">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Enregistrement du (<span class="text-primary"><?= date('m-d-Y') ?></span>)</h5>

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Livraisons en attente de paiement</h5>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Générer un rapport</h5>
          <p>Télécharger le rapport des enregistrements effectués aujourd'hui:</p>
          <a class="btn btn-primary mb-3" href="#" role="button">Télécharger le rapport d'aujourd'hui</a>
          <p>Ou Télécharger un rapport personnalisé:</p>
          <form method="post" class="d-grid gap-1">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" name="rapport" type="radio" value="checkedValue" aria-label="Text for screen reader"> Hebdomadaire
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" name="rapport" type="radio" value="checkedValue" aria-label="Text for screen reader"> Mensuel
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" name="rapport" type="radio" value="checkedValue" aria-label="Text for screen reader"> Annuel
              </label>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card flex-fill">
        <div class="card-header">

          <h5 class="card-title mb-0">Calendrier</h5>
        </div>
        <div class="card-body d-flex">
          <div class="align-self-center w-100">
            <div class="chart">
              <div id="datetimepicker-dashboard"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
    var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
    document.getElementById("datetimepicker-dashboard").flatpickr({
      inline: true,
      prevArrow: "<span title=\"Mois précédant\">&laquo;</span>",
      nextArrow: "<span title=\"Mois suivant\">&raquo;</span>",
      defaultDate: defaultDate
    });
  });

  $(document).ready(function () {
    $('#reglement').on('change', function () {
      let value = $(this).val();
      (value == "COMPTANT") ? $('.paye').fadeIn() : $('.paye').fadeOut()
    });

    $('#non').on('click', function () {
      $('.payeDate').addClass('d-none');
    });
    $('#oui').on('click', function () {
      $('.payeDate').removeClass('d-none');
    });
  });
</script>

<?= $this->endSection(); ?>