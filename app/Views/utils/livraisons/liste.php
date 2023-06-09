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

  <h1 class="h3 mb-3"><strong>Gestion</strong> livraisons</h1>

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
    <div class="col-md-12">
      <div class="card">
        <form class="card-body" action="<?= base_url(session()->root . '/livraisons/ajout') ?>" method="post">
          <h5 class="card-title">Enregistrer une nouvelle livraison</h5>
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
                  <input type="text" name="conteneur" value="<?= set_value('conteneur', '') ?>" class="form-control " placeholder="Numéro du conteneur" required>
                </label>

                <label class="form-label d-grid">
                  <span class="text-sm">Type de conteneur <span class="text-primary">*</span></span>
                  <select name="type" class="form-select " id="" required>
                    <option hidden>Selectionnez le type</option>
                    <option value="20">20'</option>
                    <option value="40">40'</option>
                  </select>
                </label>

                <label class="form-label d-grid">
                  <span class="text-sm">Nom de la compagnie <span class="text-primary">*</span></span>
                  <input value="<?= set_value('compagnie', '') ?>" type="text" name="compagnie" class="form-control " placeholder="Compagnie" required>
                </label>

                <h6 class=" mt-3 text-primary">Information sur le client</h6>
                <label class="form-label d-grid">
                  <span class="text-sm">Client <span class="text-primary">*</span></span>
                  <input value="<?= set_value('client', '') ?>" type="text" name="client" class="form-control " placeholder="Nom du client" required>
                </label>
                <label class="form-label d-grid">
                  <span class="text-sm">Nom du contact </span>
                  <input value="<?= set_value('nom_contact', '') ?>" type="text" name="nom_contact" class="form-control " placeholder=" Nom du contact">
                </label>
                <label class="form-label d-grid">
                  <span class="text-sm">Téléphone du contact</span>
                  <input value="<?= set_value('tel_contact', '') ?>" type="tel" name="tel_contact" class="form-control " placeholder="Téléphone du contact">
                </label>
                <div class=" form-label">
                  <span class="text-sm">Amendement</span>
                  <div class="d-flex gap-2">
                    <div class="form-check">
                      <input <?= set_radio('amendement', 'oui') ?> class="form-check-input" value="oui" type="radio" name="amendement" id="amendement">
                      <label class="form-check-label" for="amendement">
                        Oui
                      </label>
                    </div>
                    <div class="form-check">
                      <input <?= set_radio('amendement', 'non') ?> class="form-check-input" value="non" type="radio" name="amendement" id="non-amendement" checked>
                      <label class="form-check-label" for="non-amendement">
                        Non
                      </label>
                    </div>
                  </div>
                </div>

                <h6 class=" mt-3 text-primary">Informations sur le B.L.</h6>
                <label class="form-label d-grid">
                  <span class="text-sm">B.L.</span>
                  <input value="<?= set_value('bl', '') ?>" type="text" name="bl" class="form-control " placeholder="B.L.">
                </label>
                <label class="form-label d-grid">
                  <span class="text-sm">Date PREGATE</span>
                  <input value="<?= set_value('deadline', '') ?>" type="datetime-local" name="deadline" class="form-control ">
                </label>
                <h6 class=" mt-3 text-primary">Réception des EIRs</h6>
                <div class="mb-3">
                  <label class="form-label">EIRs</label>
                  <div class="form-check">
                    <input value="OK" class="form-check-input" type="radio" name="eir" id="OK">
                    <label class="form-check-label" for="OK">
                      OK
                    </label>
                  </div>
                  <div class="form-check">
                    <input value="NON OK" class="form-check-input" type="radio" name="eir" id="NOOK" checked>
                    <label class="form-check-label" for="NOOK">
                      NON OK
                    </label>
                  </div>
                </div>
              </div>
              <?php if (
                session()->root != '/ops-reception'
                and session()->root != '/ops-mvt'
              ) : ?>
                <div class="col-sm">
                  <h6 class=" mt-3 text-primary">Transport</h6>
                  <label class="form-label d-grid">
                    <span class="text-sm">Date ALLER</span>
                    <input type="date" name="date_sortie" class="form-control" placeholder="Date de sortie">
                  </label>
                  <label class="form-label d-grid">
                    <span class="text-sm">Date de RETOUR</span>
                    <input type="date" name="date_retour" class="form-control" placeholder="Date de retour">
                  </label>
                  <label class="form-label d-grid">
                    <span class="text-sm">Nom du chauffeur</span>
                    <select name="chauffeur" class="form-select ">
                      <option value="" hidden selected>Sélectionnez le chauffeur</option>
                      <?php foreach ($liste_chauffeur as $ligne) : ?>
                        <option value="<?= $ligne['tel'] ?>"><?= $ligne['tel'] . ' - ' . $ligne['prenom'] . ' ' . $ligne['nom'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </label>
                  <label class="form-label d-grid">
                    <span class="text-sm">Immatriculation du camion</span>
                    <select name="camion" class="form-select ">
                      <option value="" hidden selected>Sélectionnez le camion</option>
                      <?php foreach ($liste_camion as $ligne) : ?>
                        <option value="<?= $ligne['immatriculation'] ?>"><?= $ligne['immatriculation'] ?></option>
                      <?php endforeach ?>
                    </select>
                  </label>
                  <label class="form-label d-grid">
                    <span class="text-sm">Litres de carburant</span>
                    <input type="number" min="0" max="1000" name="litre_carburant" class="form-control" placeholder="En litre">
                  </label>
                  <label class="form-label d-grid">
                    <span class="text-sm">Zone de livraison</span>
                    <input value="<?= set_value('zone', '') ?>" type="text" name="zone" id="" class="form-control" placeholder="Nom de la zone">
                  </label>
                  <label class=" form-label d-grid">
                    <span class="text-sm">Commentaire</span>
                    <textarea value="<?= set_value('commentaire', '') ?>" class="form-control" name="commentaire" id="" rows="3"></textarea>
                  </label>
                  <?php if (
                    session()->root != '/ops-transport'
                  ) : ?>
                    <h6 class=" mt-3 text-primary">Paiement</h6>
                    <label class="form-label d-grid">
                      <span class="text-sm">Règlement <span class="text-primary">*</span></span>
                      <select name="reglement" class="form-select " id="reglement" required>
                        <option hidden selected value="NON PAYÉ">Choisir le type de règlement</option>
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
                              <input class="form-check-input" name="paiement" type="radio" id="non" value="non" aria-label="Text for screen reader" checked> Non
                            </label>
                          </div>
                        </div>
                      </label>
                      <label class="form-label d-grid payeDate" style="display: none;">
                        <span class="text-sm">Date de paiement</span>
                        <input type="date" name="date_paiement" class="form-control" placeholder="Téléphone du contact">
                      </label>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif ?>

              <div class="col-md-12 mt-3 text-center md-flex justify-content-center ">
                <button type="submit" class="btn btn-primary">Enregister</button>
                <button type="reset" class="btn btn-secondary">Effacer</button>
              </div>
            </div>
          <?php endif ?>
        </form>
      </div>
    </div>

    <div class="col-md">
      <div class="card flex-fill">
        <div class="card-header">
          <h5 class="card-title">Livraisons en attente de paiement</h5>
        </div>
        <table id="tableau" class="table table-hover my-0">
          <thead>
            <tr>
              <th class="d-table-cell">Conteneur</th>
              <th class="d-table-cell">Client</th>
              <!-- <th class="d-table-cell d-none d-lg-table-cell">Date Prégate</th> -->
              <th class="d-table-cell d-none d-md-table-cell">Date d'enregistrement</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($liste_non_paye as $ligne) : ?>
              <tr>
                <td class="d-table-cell"><?= $ligne['conteneur'] ?></td>
                <td class="d-none d-sm-table-cell"><?= $ligne['client'] ?></td>
                <!-- <td class="d-none d-sm-table-cell"><?= (empty($ligne['deadline'])) ? '<span class="badge bg-warning">Indéfini</span>' : $ligne['deadline'] ?></td> -->
                <td class="d-none d-sm-table-cell"><?= $ligne['created_at'] ?></td>
                <td><a class="btn btn-primary d-flex align-items-center justify-content-center btn-sm" href="<?= base_url(session()->root . '/livraisons/info/' . $ligne['id']) ?>" role="button">Consulter</a></td>
              </tr>
            <?php endforeach ?>

          </tbody>
        </table>
      </div>
    </div>
    <!-- <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Générer un rapport</h5>
          <p>Générer un rapport</p>
          <form method="post" action="<?= base_url(session()->root . '/rapports/livraison') ?>" class="d-grid gap-1">
            <?= csrf_field() ?>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" name="rapport" type="radio" required value="j"> Journalier
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" name="rapport" type="radio" required value="h"> Hebdomadaire
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" name="rapport" type="radio" required value="m"> Mensuel
              </label>
            </div>
            <?= csrf_field() ?>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" name="rapport" type="radio" required value="a"> Annuel
              </label>
            </div>
            <div class="form-label d-grid gap-2">
              <input type="date" name="date" id="" class="form-control" required>
              <button type="submit" class="d-flex gap-2 align-items-center justify-content-center btn btn-primary "><i class="align-middle" data-feather="download"></i> Télécharger</button>
            </div>
          </form>
        </div>
      </div>
    </div> -->
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