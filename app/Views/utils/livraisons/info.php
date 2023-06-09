<?= $this->extend('layouts/ui'); ?>
<?= $this->section('titre'); ?>
Information conteneur
<?= $this->endSection(); ?>
<?= $this->section('contenu'); ?>


<div class="container-fluid p-0">

  <h1 class="h3 mb-3"><strong>Livraison</strong> <span class="text-primary"><?= $l['conteneur'] ?></span></h1>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Informations</h5>
      <div class="row">
        <div class="col-md">
          <h6 class="text-primary fw-bold">informations sur le conteneur</h6>
          <p class="d-grid">
            <span class="text-sm">Numéro</span>
            <span class="text-primary"><?= (!empty($l['conteneur'])) ? $l['conteneur'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">Type</span>
            <span class="text-primary"><?= (!empty($l['type'])) ? $l['type'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?>'</span>
          </p>
          <p class="d-grid">
            <span class="text-sm">Compagnie</span>
            <span class="text-primary"><?= (!empty($l['compagnie'])) ? $l['compagnie'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">B.L.</span>
            <span class="text-primary"><?= (!empty($l['bl'])) ? $l['bl'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">D.O.</span>
            <span class="text-primary"><?= (!empty($l['do'])) ? $l['do'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">E.I.R.</span>
            <span class="text-primary"><?= (!empty($l['eir'])) ? $l['eir'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">Date PREGATE:</span>
            <span class="text-primary"><?= (!empty($l['deadline'])) ? $l['deadline'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
        </div>
        <div class="col-md">
          <h6 class="text-primary fw-bold">informations sur le client</h6>
          <p class="d-grid">
            <span class="text-sm">Client</span>
            <span class="text-primary"><?= (!empty($l['client'])) ? $l['client'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">Contact</span>
            <span class="text-primary"><?= (!empty($l['nom_contact'])) ? $l['nom_contact'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">Téléphone du contact</span>
            <span class="text-primary"><?= (!empty($l['tel_contact'])) ? $l['tel_contact'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">Amendement</span>
            <span class="text-primary"><?= (!empty($l['amendement'])) ? $l['amendement'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">Enregistré le:</span>
            <span class="text-primary"><?= (!empty($l['auteur'])) ? $l['created_at'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
        </div>
        <div class="col-md">
          <h6 class="text-primary fw-bold">informations sur le transport</h6>
          <p class="d-grid">
            <span class="text-sm">Chauffeur</span>
            <span class="text-primary"><?= (!empty($l['chauffeur'])) ? $l['prenom_chauffeur'] . ' ' . $l['nom_chauffeur'] : '<span class="badge bg-warning me-1 my-1">Indéfini</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">Camion</span>
            <span class="text-primary"><?= (!empty($l['camion'])) ? $l['camion'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">Litres de carburant</span>
            <span class="text-primary"><?= (!empty($l['litre_carburant'])) ? $l['litre_carburant'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">Zone</span>
            <span class="text-primary"><?= (!empty($l['zone'])) ? $l['zone'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">Date aller</span>
            <span class="text-primary"><?= (!empty($l['date_sortie'])) ? $l['date_sortie'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">Date retour</span>
            <span class="text-primary"><?= (!empty($l['date_retour'])) ? $l['date_retour'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">Commentaire</span>
            <span class="text-primary"><?= (!empty($l['commentaire'])) ? $l['commentaire'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
        </div>
        <div class="col-md">
          <h6 class="text-primary fw-bold">informations sur le paiement</h6>
          <p class="d-grid">
            <span class="text-sm">Payé ?</span>
            <span class="text-primary"><?= (!empty($l['paiement'])) ? $l['paiement'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">Réglement</span>
            <span class="text-primary"><?= (!empty($l['reglement'])) ? $l['reglement'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>
          <p class="d-grid">
            <span class="text-sm">Date de paiement</span>
            <span class="text-primary"><?= (!empty($l['date_paiement'])) ? $l['date_paiement'] : '<span class="badge bg-warning me-1 my-1">Indéfini(e)</span>' ?></span>
          </p>

        </div>
      </div>
      <hr>
      <div class="d-grid d-sm-flex flex-column flex-sm-row justify-content-center align-items-center gap-3">
        <a href="<?= base_url(session()->root . '/livraisons/modifier/' . $l['id']) ?>" class="btn btn-warning d-flex align-items-center justify-content-center gap-2"><i class="align-middle" data-feather="edit"></i>Modifier</a>
        <button class="btn btn-primary d-flex align-items-center justify-content-center gap-2" data-bs-toggle="modal" data-bs-target="#modalId"><i class="align-middle" data-feather="trash"></i>Supprimer</button>

        <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Vous souhaitez supprimer la livraison <span class="text-primary"><?= $l['conteneur'] ?></span> du <span class="text-primary"><?= $l['created_at'] ?></span>?
              </div>
              <form method="post" action="<?= base_url(session()->root . '/livraisons/supprimer/' . $l['id']) ?>" class="modal-footer">
                <?= csrf_field() ?>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non! Annuler</button>
                <button type="submit" class="btn btn-primary">Oui! Supprimer</button>
              </form>
            </div>
          </div>
        </div>


        <!-- Optional: Place to the bottom of scripts -->
        <script>
          const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
        </script>
      </div>
    </div>
  </div>



</div>


<?= $this->endSection(); ?>