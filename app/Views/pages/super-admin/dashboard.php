<?= $this->extend('layouts/ui'); ?>
<?= $this->section('titre'); ?>
Dashboard
<?= $this->endSection(); ?>
<?= $this->section('contenu'); ?>

<div class="container-fluid p-0">

  <h1 class="h3 mb-3"><strong>Statistiques</strong> Dashboard</h1>

  <div class="row">
    <div class="col-xl-6 col-xxl-5 d-flex">
      <div class="w-100">
        <div class="row">
          <div class="col-sm-6">
            <div class="card flex-grow-1">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <h5 class="card-title">Livraisons</h5>
                  </div>
                  <div class="col-auto">
                    <div class="stat text-primary">
                      <svg class=" align-middle" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M33 120v127.648c5.023 1.863 9.31 5.103 12.68 8.682 5.238 5.562 9.034 12.113 12.498 18.242 3.463 6.13 6.61 11.886 9.343 15.446C70.257 293.578 71.618 294 72 294c.59 0 .78.075 2.36-1.8 1.583-1.877 3.57-5.405 5.683-9.405 2.114-4 4.356-8.472 7.832-12.596 3.476-4.125 9.172-8.2 16.125-8.2 6.953 0 12.65 4.075 16.125 8.2 3.476 4.123 5.718 8.595 7.832 12.595s4.1 7.528 5.682 9.404c1.58 1.875 1.77 1.8 2.36 1.8.59 0 .78.075 2.36-1.8 1.583-1.877 3.57-5.405 5.683-9.405 2.114-4 4.356-8.472 7.832-12.596 3.476-4.125 9.172-8.2 16.125-8.2 6.953 0 12.65 4.075 16.125 8.2 3.476 4.123 5.718 8.595 7.832 12.595s4.1 7.528 5.682 9.404c1.58 1.875 1.77 1.8 2.36 1.8.59 0 .78.075 2.36-1.8 1.583-1.877 3.57-5.405 5.683-9.405 2.114-4 4.356-8.472 7.832-12.596 3.476-4.125 9.172-8.2 16.125-8.2 6.953 0 12.65 4.075 16.125 8.2 3.476 4.123 5.718 8.595 7.832 12.595s4.1 7.528 5.682 9.404c1.58 1.875 1.77 1.8 2.36 1.8.59 0 .78.075 2.36-1.8 1.583-1.877 3.57-5.405 5.683-9.405 2.114-4 4.356-8.472 7.832-12.596 3.476-4.125 9.172-8.2 16.125-8.2 6.953 0 12.448 3.3 17.025 7.004 2.142 1.733 4.125 3.638 5.975 5.617V120H33zm320 49.377v140.27l8-.026V326h3.81c9.298-18.914 28.774-32 51.19-32 19.463 0 36.707 9.867 47 24.846V262h16v-36.275l-28.256-42.385L353 169.377zm18.543 19.516l64.77 7.726 24.8 35.51v16.735h-89.57v-59.972zM33 269.148V294h15.537c-2.12-3.493-4.065-7.096-6.03-10.572-3.173-5.617-6.4-10.827-9.507-14.28zM104 280c-.59 0-.78-.075-2.36 1.8-1.583 1.877-3.57 5.405-5.683 9.405-.48.91-.972 1.847-1.478 2.795h19.04c-.505-.948-.997-1.886-1.477-2.795-2.114-4-4.1-7.528-5.682-9.404-1.58-1.875-1.77-1.8-2.36-1.8zm64 0c-.59 0-.78-.075-2.36 1.8-1.583 1.877-3.57 5.405-5.683 9.405-.48.91-.972 1.847-1.478 2.795h19.04c-.505-.948-.997-1.886-1.477-2.795-2.114-4-4.1-7.528-5.682-9.404-1.58-1.875-1.77-1.8-2.36-1.8zm64 0c-.59 0-.78-.075-2.36 1.8-1.583 1.877-3.57 5.405-5.683 9.405-.48.91-.972 1.847-1.478 2.795h19.04c-.505-.948-.997-1.886-1.477-2.795-2.114-4-4.1-7.528-5.682-9.404-1.58-1.875-1.77-1.8-2.36-1.8zm64 0c-.59 0-.78-.075-2.36 1.8-1.583 1.877-3.57 5.405-5.683 9.405-.48.91-.972 1.847-1.478 2.795h25.157c-.376-.512-.74-1.022-1.13-1.535-2.787-3.646-5.967-7.173-8.804-9.47C298.866 280.7 296.59 280 296 280zm185 0v46h14v-46h-14zM72 310c-22.537 0-41 18.463-41 41s18.463 41 41 41 41-18.463 41-41-18.463-41-41-41zm104 0c-22.537 0-41 18.463-41 41s18.463 41 41 41 41-18.463 41-41-18.463-41-41-41zm240 0c-22.537 0-41 18.463-41 41s18.463 41 41 41 41-18.463 41-41-18.463-41-41-41zm-399 2v14h3.81c2.532-5.15 5.824-9.86 9.72-14H17zm96.47 0c3.896 4.14 7.188 8.85 9.72 14h1.62c2.532-5.15 5.824-9.86 9.72-14h-21.06zm104 0c3.896 4.14 7.188 8.85 9.72 14H231v-14h-13.53zM343 327.678l-94 .295v30l94-.295v-30zM72 328c12.81 0 23 10.19 23 23s-10.19 23-23 23-23-10.19-23-23 10.19-23 23-23zm104 0c12.81 0 23 10.19 23 23s-10.19 23-23 23-23-10.19-23-23 10.19-23 23-23zm240 0c12.81 0 23 10.19 23 23s-10.19 23-23 23-23-10.19-23-23 10.19-23 23-23z"></path>
                      </svg>
                    </div>
                  </div>
                </div>
                <h2 class="mt-1 mb-3"><?= $livraisons ?></h2>

              </div>
            </div>
            <div class="card flex-grow-1">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <h5 class="card-title">Transferts</h5>
                  </div>

                  <div class="col-auto">
                    <div class="stat text-primary">
                      <svg class=" align-middle" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M50.2 375.6c2.3 8.5 11.1 13.6 19.6 11.3l216.4-58c8.5-2.3 13.6-11.1 11.3-19.6l-49.7-185.5c-2.3-8.5-11.1-13.6-19.6-11.3L151 133.3l24.8 92.7-61.8 16.5-24.8-92.7-77.3 20.7C3.4 172.8-1.7 181.6.6 190.1l49.6 185.5zM384 0c-17.7 0-32 14.3-32 32v323.6L5.9 450c-4.3 1.2-6.8 5.6-5.6 9.8l12.6 46.3c1.2 4.3 5.6 6.8 9.8 5.6l393.7-107.4C418.8 464.1 467.6 512 528 512c61.9 0 112-50.1 112-112V0H384zm144 448c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48z"></path>
                      </svg>
                    </div>
                  </div>
                </div>
                <h2 class="mt-1 mb-3">[undefined]</h2>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card flex-grow-1">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <h5 class="card-title">Carburant</h5>
                  </div>

                  <div class="col-auto">
                    <div class="stat text-primary">
                      <svg class=" align-middle" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path d="M433.46 165.94l101.2-111.87C554.61 34.12 540.48 0 512.26 0H31.74C3.52 0-10.61 34.12 9.34 54.07L192 256v155.92c0 12.59 5.93 24.44 16 32l79.99 60c20.86 15.64 48.47 6.97 59.22-13.57C310.8 455.38 288 406.35 288 352c0-89.79 62.05-165.17 145.46-186.06zM480 192c-88.37 0-160 71.63-160 160s71.63 160 160 160 160-71.63 160-160-71.63-160-160-160zm16 239.88V448c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8v-16.29c-11.29-.58-22.27-4.52-31.37-11.35-3.9-2.93-4.1-8.77-.57-12.14l11.75-11.21c2.77-2.64 6.89-2.76 10.13-.73 3.87 2.42 8.26 3.72 12.82 3.72h28.11c6.5 0 11.8-5.92 11.8-13.19 0-5.95-3.61-11.19-8.77-12.73l-45-13.5c-18.59-5.58-31.58-23.42-31.58-43.39 0-24.52 19.05-44.44 42.67-45.07V256c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v16.29c11.29.58 22.27 4.51 31.37 11.35 3.9 2.93 4.1 8.77.57 12.14l-11.75 11.21c-2.77 2.64-6.89 2.76-10.13.73-3.87-2.43-8.26-3.72-12.82-3.72h-28.11c-6.5 0-11.8 5.92-11.8 13.19 0 5.95 3.61 11.19 8.77 12.73l45 13.5c18.59 5.58 31.58 23.42 31.58 43.39 0 24.53-19.04 44.44-42.67 45.07z"></path>
                      </svg>
                    </div>
                  </div>
                </div>
                <h2 class="mt-1 mb-3">[undefined]</h2>
              </div>
            </div>
            <div class="card flex-grow-1">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <h5 class="card-title">Camions</h5>
                  </div>

                  <div class="col-auto">
                    <div class="stat text-primary">
                    <svg class=" align-middle" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48v320c0 26.5 21.5 48 48 48h16c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z"></path></svg>
                    </div>
                  </div>
                </div>
                <h2 class="mt-1 mb-3"><?= $camions ?></h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6 col-xxl-7">
      <div class="card flex-fill w-100">
        <div class="card-header">

          <h5 class="card-title mb-0">Mouvements</h5>
        </div>
        <div class="card-body py-3">
          <div class="chart chart-sm">
            <canvas id="chartjs-dashboard-line"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
      <div class="card flex-fill w-100">
        <div class="card-header">

          <h5 class="card-title mb-0">Volume de mouvements</h5>
        </div>
        <div class="card-body d-flex">
          <div class="align-self-center w-100">
            <div class="py-3">
              <div class="chart chart-xs">
                <canvas id="chartjs-dashboard-pie"></canvas>
              </div>
            </div>

            <table class="table mb-0">
              <tbody>
                <tr>
                  <td>Livraisons</td>
                  <td class="text-end"><?= $livraisons ?></td>
                </tr>
                <tr>
                  <td>Transferts</td>
                  <td class="text-end">(données simulées)</td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
      <div class="card flex-fill w-100">
        <div class="card-header">

          <h5 class="card-title mb-0">Tracking</h5>
        </div>
        <div class="card-body px-4">
          <div id="world_map" style="height:350px;"></div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
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

  <div class="row">
    <div class="col-12 d-flex">
      <div class="card flex-fill">
        <div class="card-header">

          <h5 class="card-title mb-0">En attente de paiement</h5>
        </div>
        <table class="table table-hover my-0">
          <thead>
            <tr>
              <th>Conteneur</th>
              <th class="d-none d-xl-table-cell">Enregistrement</th>
              <th class="d-none d-xl-table-cell">Montant (FCFA)</th>
              <th>Statut</th>
              <th class="d-none d-md-table-cell">Client</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>MBG038CJE5</td>
              <td class="d-none d-xl-table-cell">01/01/2021</td>
              <td class="d-none d-xl-table-cell">2 600 000</td>
              <td><span class="badge bg-danger">Non payé</span></td>
              <td class="d-none d-md-table-cell">Modou Modou</td>
            </tr>
            <tr>
              <td>MBG038CJE5</td>
              <td class="d-none d-xl-table-cell">01/01/2021</td>
              <td class="d-none d-xl-table-cell">2 600 000</td>
              <td><span class="badge bg-danger">Non payé</span></td>
              <td class="d-none d-md-table-cell">Modou Modou</td>
            </tr>
            <tr>
              <td>MBG038CJE5</td>
              <td class="d-none d-xl-table-cell">01/01/2021</td>
              <td class="d-none d-xl-table-cell">2 600 000</td>
              <td><span class="badge bg-danger">Non payé</span></td>
              <td class="d-none d-md-table-cell">Modou Modou</td>
            </tr>
            <tr>
              <td>MBG038CJE5</td>
              <td class="d-none d-xl-table-cell">01/01/2021</td>
              <td class="d-none d-xl-table-cell">2 600 000</td>
              <td><span class="badge bg-danger">Non payé</span></td>
              <td class="d-none d-md-table-cell">Modou Modou</td>
            </tr>
            <tr>
              <td>MBG038CJE5</td>
              <td class="d-none d-xl-table-cell">01/01/2021</td>
              <td class="d-none d-xl-table-cell">2 600 000</td>
              <td><span class="badge bg-danger">Non payé</span></td>
              <td class="d-none d-md-table-cell">Modou Modou</td>
            </tr>
            <tr>
              <td>MBG038CJE5</td>
              <td class="d-none d-xl-table-cell">01/01/2021</td>
              <td class="d-none d-xl-table-cell">2 600 000</td>
              <td><span class="badge bg-danger">Non payé</span></td>
              <td class="d-none d-md-table-cell">Modou Modou</td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
    <!-- <div class="col-12 col-lg-4 col-xxl-3 d-flex">
      <div class="card flex-fill w-100">
        <div class="card-header">

          <h5 class="card-title mb-0">Dépenses et Gains mensuels</h5>
        </div>
        <div class="card-body d-flex w-100">
          <div class="align-self-center chart chart-lg">
            <canvas id="chartjs-dashboard-bar"></canvas>
          </div>
        </div>
      </div>
    </div> -->
  </div>

</div>

<script src="<?= base_url('js/graph.js') ?>"></script>
<script>
  $(document).ready(function() {
    drawLineChart("<?= base_url('graphs/line') ?>");
    drawPieChart("<?= base_url('graphs/pie') ?>");
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var markers = [{
        coords: [31.230391, 121.473701],
        name: "Shanghai"
      },
      {
        coords: [28.704060, 77.102493],
        name: "Delhi"
      },
      {
        coords: [6.524379, 3.379206],
        name: "Lagos"
      },
      {
        coords: [35.689487, 139.691711],
        name: "Tokyo"
      },
      {
        coords: [23.129110, 113.264381],
        name: "Guangzhou"
      },
      {
        coords: [40.7127837, -74.0059413],
        name: "New York"
      },
      {
        coords: [34.052235, -118.243683],
        name: "Los Angeles"
      },
      {
        coords: [41.878113, -87.629799],
        name: "Chicago"
      },
      {
        coords: [51.507351, -0.127758],
        name: "London"
      },
      {
        coords: [40.416775, -3.703790],
        name: "Madrid "
      }
    ];
    var map = new jsVectorMap({
      map: "world",
      selector: "#world_map",
      zoomButtons: true,
      markers: markers,
      markerStyle: {
        initial: {
          r: 9,
          strokeWidth: 7,
          stokeOpacity: .4,
          fill: window.theme.primary
        },
        hover: {
          fill: window.theme.primary,
          stroke: window.theme.primary
        }
      },
      zoomOnScroll: false
    });
    window.addEventListener("resize", () => {
      map.updateSize();
    });
  });
</script>
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
</script>
<?= $this->endSection(); ?>