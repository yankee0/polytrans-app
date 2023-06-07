<?= $this->extend('layouts/simple'); ?>
<?= $this->section('titre'); ?>
<?= $filename ?>
<?= $this->endSection(); ?>
<?= $this->section('contenu'); ?>
<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script>
  function exportTableToExcel(tableID, filename = 'Rapport') {
    // Récupérer le tableau par son ID
    var table = document.getElementById(tableID);

    // Créer un classeur Excel
    var workbook = XLSX.utils.book_new();

    // Convertir le tableau en feuille de calcul
    var worksheet = XLSX.utils.table_to_sheet(table);

    // Ajouter la feuille de calcul au classeur
    XLSX.utils.book_append_sheet(workbook, worksheet, 'Feuille1');

    // Générer le binaire du fichier Excel
    var excelBinary = XLSX.write(workbook, {
      bookType: 'xlsx',
      type: 'binary'
    });

    // Convertir le binaire en tableau de bytes
    var excelBytes = new Uint8Array(excelBinary.length);
    for (var i = 0; i < excelBinary.length; i++) {
      excelBytes[i] = excelBinary.charCodeAt(i) & 0xff;
    }

    // Créer un objet Blob avec le tableau de bytes
    var blob = new Blob([excelBytes], {
      type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    });

    // Créer un lien de téléchargement
    var link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = filename + '.xlsx';

    // Simuler un clic sur le lien pour démarrer le téléchargement
    link.click();
  }
</script>

<nav class="navbar navbar-expand-sm navbar-light bg-white sticky-top p-2">
  <a class="navbar-brand" href="<?= base_url(session()->root . '/livraisons') ?>">
    <img src="<?= base_url('img/logo.png') ?>" alt="POLY-TRANS SUARL" height="50px">
  </a>
  <button class="navbar-toggler d-lg-none border-0 d-flex align-items-center justify-content-center gap-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
    <i class="align-middle" data-feather="download"></i>
    <span>Télécharger</span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavId">
    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
    </ul>
    <div class="d-grid d-sm-flex my-1 my-lg-0 gap-2">
      <button onclick="exportTableToExcel('tableau', '<?= $filename ?>')" type="button" class="btn btn-success d-flex align-items-center justify-content-center gap-2">
        <i class="align-middle" data-feather="download"></i>
        <span>Télécharger en Excel</span>
      </button>
    </div>
  </div>
</nav>
<div class="container-xl pt-3">
  <div class="card flex-fill" style="overflow-x: scroll;">
    <div class="card-header">

      <h4 class="card-title text-primary"><?= $filename ?></h4>
    </div>

    <table id="tableau" class="table table-hover my-0">
      <thead>
        <!-- <tr>
          <th class="table-cell">CONTENEURS</th>
          <th class="table-cell">VEHICULES</th>
          <th class="table-cell">CIE</th>
          <th class="table-cell">ZONE/DESTINATION</th>
          <th class="table-cell">CLIENTS</th>
          <th class="table-cell">TYPES</th>
          <th class="table-cell">LITRES</th>
          <th class="table-cell">DEPART</th>
          <th class="table-cell">RETOUR</th>
          <th class="table-cell">OBSERVATION</th>
        </tr> -->
        <tr>
          <th class="table-cell">CONTENEURS</th>
          <th class="table-cell">TYPE</th>
          <th class="table-cell">CLIENT</th>
          <th class="table-cell">CONTACTS</th>
          <th class="table-cell">BL</th>
          <th class="table-cell">DO</th>
          <th class="table-cell">EIRs</th>
          <th class="table-cell">CAMION</th>
          <th class="table-cell">COMMENTAIRE</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $d) : ?>
          <!-- <tr>
            <td class="table-cell"><?= $d['CONTENEURS'] ?></td>
            <td class="table-cell"><?= $d['VEHICULES'] ?></td>
            <td class="table-cell"><?= $d['CIE'] ?></td>
            <td class="table-cell"><?= $d['ZONE/DESTIN'] ?></td>
            <td class="table-cell"><?= $d['CLIENTS'] ?></td>
            <td class="table-cell"><?= $d['TYPES'] ?></td>
            <td class="table-cell"><?= $d['LITRES'] ?></td>
            <td class="table-cell"><?= $d['DEPART'] ?></td>
            <td class="table-cell"><?= $d['RETOUR'] ?></td>
            <td class="table-cell"><?= $d['OBSERVATION'] ?></td>
          </tr> -->
          <tr>
            <td class="table-cell"><?= $g['conteneur'] ?></td>
            <td class="table-cell"><?= $g['type'] ?></td>
            <td class="table-cell"><?= $g['client'] ?></td>
            <td class="table-cell"><?= $g['nom_contact'] ?></td>
            <td class="table-cell"><?= $g['bl'] ?></td>
            <td class="table-cell"><?= $g['do'] ?></td>
            <td class="table-cell"><?= $g['eir'] ?></td>
            <td class="table-cell"><?= $g['camion'] ?></td>
            <td class="table-cell"><?= $g['commentaire'] ?></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection(); ?>