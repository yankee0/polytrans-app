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

  <h1 class="h3 mb-3"><strong>Livraison</strong> Conteneur <span class="text-primary"><?= $l['conteneur'] ?></span></h1>

  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <form class="card-body" action="<?= base_url(session()->root . '/livraisons/modifier') ?>" method="post">
          <h5 class="card-title">Modifications</h5>
          <?= csrf_field() ?>
          <?php if (empty($liste_camion) or empty($liste_chauffeur)) : ?>
            <div class="alert alert-warning" role="alert">
              <strong>Urgent!</strong> Aucun véhicule ou chauffeur n'a été enregistré dans la base de donnée. Merci de vous reférer à l'utilisateur disposant des droits de gestion de la flotte, sinon contacter <a href="<?= base_url('/support') ?>" class=" alert-link">le support.</a>
            </div>
          <?php else : ?>
            <div class="row">
              <div class="col-sm">

                <h6 class=" mt-3 text-primary">Informations sur le conteneur</h6>
                <label class="form-label d-grid">
                  <span class="text-sm">Numéro du conteneur <span class="text-primary">*</span></span>
                  <input type="text" name="conteneur" value="<?= set_value('conteneur', $l['conteneur']) ?>" class="form-control " placeholder="Numéro du conteneur" required>
                </label>

                <label class="form-label d-grid">
                  <span class="text-sm">Type de conteneur <span class="text-primary">*</span></span>
                  <select name="type" class="form-select " id="" required>
                    <option <?= ($l['type'] == '') ? 'selected' : ''  ?> hidden>Selectionnez le type</option>
                    <option <?= ($l['type'] == 20) ? 'selected' : ''  ?> value="20">20'</option>
                    <option <?= ($l['type'] == 40) ? 'selected' : ''  ?> value="40">40'</option>
                  </select>
                </label>

                <label class="form-label d-grid">
                  <span class="text-sm">Nom de la compagnie <span class="text-primary">*</span></span>
                  <input value="<?= set_value('compagnie', $l['compagnie']) ?>" type="text" name="compagnie" class="form-control " placeholder="Compagnie" required>
                </label>

                <h6 class=" mt-3 text-primary">Information sur le client</h6>
                <label class="form-label d-grid">
                  <span class="text-sm">Client <span class="text-primary">*</span></span>
                  <input value="<?= set_value('client', $l['client']) ?>" type="text" name="client" class="form-control " placeholder="Nom du client" required>
                </label>
                <label class="form-label d-grid">
                  <span class="text-sm">Nom du contact </span>
                  <input value="<?= set_value('nom_contact', $l['nom_contact']) ?>" type="text" name="nom_contact" class="form-control " placeholder=" Nom du contact">
                </label>
                <label class="form-label d-grid">
                  <span class="text-sm">Téléphone du contact</span>
                  <input value="<?= set_value('tel_contact', $l['tel_contact']) ?>" type="tel" name="tel_contact" class="form-control " placeholder="Téléphone du contact">
                </label>
                <label class="form-label d-grid">
                  <span class="text-sm">Email du contact</span>
                  <input value="<?= set_value('email_contact', $l['email_contact']) ?>" type="email" name="email_contact" class="form-control " placeholder="Email du contact">
                </label>

                <h6 class=" mt-3 text-primary">Informations sur le B.L.</h6>
                <label class="form-label d-grid">
                  <span class="text-sm">B.L.</span>
                  <input value="<?= set_value('bl', $l['bl']) ?>" type="text" name="bl" class="form-control " placeholder="B.L.">
                </label>
                <label class="form-label d-grid">
                  <span class="text-sm">Deadline</span>
                  <input value="<?= set_value('deadline', $l['deadline']) ?>" type="datetime-local" name="deadline" class="form-control ">
                </label>
                <h6 class=" mt-3 text-primary">Informations sur le E.I.R.</h6>
                <label class="form-label d-grid">
                  <span class="text-sm">Numéro E.I.R.</span>
                  <input value="<?= set_value('eir', $l['eir']) ?>" type="text" name="eir" class="form-control " placeholder="E.I.R">
                </label>
              </div>
              <?php if (
                session()->root != '/ops-reception'
                and session()->root != '/ops-mvt'
              ) : ?>
                <div class="col-sm">
                  <h6 class=" mt-3 text-primary">Transport</h6>
                  <label class="form-label d-grid">
                    <span class="text-sm">Date ALLER</span>
                    <input value="<?= set_value('date_sortie',$l['date_sortie']) ?>" type="date" name="date_sortie" class="form-control" placeholder="Téléphone du contact">
                  </label>
                  <label class="form-label d-grid">
                    <span class="text-sm">Date de RETOUR</span>
                    <input value="<?= set_value('date_retour',$l['date_retour']) ?>" type="date" name="date_retour" class="form-control" placeholder="Téléphone du contact">
                  </label>
                  <label class="form-label d-grid">
                    <span class="text-sm">Nom du chauffeur</span>
                    <select name="chauffeur" class="form-select ">
                      <option value="" selected hidden>Sélectionnez le chauffeur</option>
                      <?php foreach ($liste_chauffeur as $ligne) : ?>
                        <option <?= ($l['chauffeur'] == $ligne['tel']) ? 'selected' : '' ?> value="<?= $ligne['tel'] ?>"><?= $ligne['tel'] . ' - ' . $ligne['prenom'] . ' ' . $ligne['nom'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </label>
                  <label class="form-label d-grid">
                    <span class="text-sm">Immatriculation du camion</span>
                    <select name="camion" class="form-select ">
                      <option value="" hidden selected>Sélectionnez le camion</option>
                      <?php foreach ($liste_camion as $ligne) : ?>
                        <option <?= ($l['camion'] == $ligne['immatriculation']) ? 'selected' : '' ?> value="<?= $ligne['immatriculation'] ?>"><?= $ligne['immatriculation'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </label>
                  <label class="form-label d-grid">
                    <span class="text-sm">Litres de carburant</span>
                    <input type="number" value="<?= set_value('litre_carburant',$l['litre_carburant']) ?>" min="0" max="1000" name="litre_carburant" class="form-control" placeholder="En litre">
                  </label>
                  <label class="form-label d-grid">
                    <span class="text-sm">Zone de livraison</span>
                    <input value="<?= set_value('zone', $l['zone']) ?>" type="text" name="zone" id="" class="form-control" placeholder="Nom de la zone">
                  </label>
                  <label class=" form-label d-grid">
                    <span class="text-sm">Commentaire</span>
                    <textarea value="<?= set_value('commentaire', $l['commentaire']) ?>" class="form-control" name="commentaire" id="" rows="3"></textarea>
                  </label>
                  <h6 class=" mt-3 text-primary">Paiement</h6>
                  <label class="form-label d-grid">
                    <span class="text-sm">Règlement <span class="text-primary">*</span></span>
                    <select name="reglement" class="form-select " id="reglement" required>
                      <option hidden selected value="NON PAYÉ">Choisir le type de règlement</option>
                      <option <?= ($l['reglement'] == 'COMPTANT') ? 'selected' : '' ?> value="COMPTANT">COMPTANT</option>
                      <option <?= ($l['reglement'] == 'À CRÉDIT') ? 'selected' : '' ?> value="À CRÉDIT">À CRÉDIT</option>
                    </select>
                  </label>
                  <div class="paye" style="display: none;">
                    <label class="form-label d-grid">
                      <span class="text-sm">La livraison a-t-elle été payée?</span>
                      <div class="d-flex gap-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" <?= ($l['paiement'] == 'oui') ? 'checked' : '' ?> name="paiement" type="radio" id="oui" value="oui" aria-label="Text for screen reader"> Oui
                          </label>
                        </div>
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" <?= ($l['paiement'] == 'non') ? 'checked' : '' ?> name="paiement" type="radio" id="non" value="non" aria-label="Text for screen reader"> Non
                          </label>
                        </div>
                      </div>
                    </label>
                    <label class="form-label d-grid payeDate" style="display: none;">
                      <span class="text-sm">Date de paiement</span>
                      <input type="date" value="<?= set_value('date_paiement', $l['date_paiement']) ?>" name="date_paiement" class="form-control" placeholder="Téléphone du contact">
                    </label>
                  </div>
                </div>
              <?php endif ?>

              <div class="col-md-12 mt-3 text-center md-flex justify-content-center ">
                <button type="submit" name="id" value="<?= $l['id'] ?>" class="btn btn-warning">Modifier</button>
                <a href="<?= base_url(session()->root . '/livraisons/info/' . $l['id']) ?>" class="btn btn-secondary">Annuler</a>
              </div>
            </div>
          <?php endif ?>
        </form>
      </div>
    </div>


  </div>



</div>
<script>
  $(document).ready(function() {
    $('#reglement').on('change', function() {
      let value = $(this).val();
      (value == "COMPTANT") ? $('.paye').fadeIn(): $('.paye').fadeOut()
    });

    $('#non').on('click', function() {
      $('.payeDate').addClass('d-none');
    });
    $('#oui').on('click', function() {
      $('.payeDate').removeClass('d-none');
    });
  });
</script>

<?= $this->endSection(); ?>