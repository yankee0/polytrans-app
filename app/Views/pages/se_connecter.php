<?= $this->extend('layouts/simple'); ?>
<?= $this->section('titre'); ?>
Se connecter
<?= $this->endSection(); ?>

<?= $this->section('contenu'); ?>

<main class="d-flex w-100">
  <div class="container d-flex flex-column">
    <div class="row vh-100">
      <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
        <div class="d-table-cell align-middle">

          <div class="text-center mt-4">
            <h1 class="h2">Bienvenue</h1>
            <p class="lead">
              Veuillez vous connecter pour continuer.
            </p>
          </div>

          <div class="card">
            <div class="card-body">
              <div class="m-sm-4">
                <div class="text-center mb-3">
                  <img src="" alt="Logo poly-trans" class="img-fluid " width="132" height="132" />
                </div>

                <?php if (session()->has('erreurs')) : ?>
                  <div data-aos="fade-up" class="mb-3">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title text-primary">Erreur 403</h5>
                        <p class="card-text">les identifiants saisies sont incorrects.</p>
                      </div>
                    </div>
                  </div>
                <?php endif ?>

                <?php if (session()->has('erreur_session')) : ?>
                  <?php session()->remove('erreur_session') ?>
                  <div data-aos="fade-up" class="mb-3">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title text-warning">Erreur 500</h5>
                        <p class="card-text">Session expirée, veuillez vous reconnecter.</p>
                      </div>
                    </div>
                  </div>
                <?php endif ?>

                <form action="<?= base_url('/') ?>" method="post">
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input class="form-control form-control-lg" type="email" name="email" placeholder=" exemple@poly-trans.sn" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Mot de passe</label>
                    <input class="form-control form-control-lg" type="password" name="mot_de_passe" placeholder="Votre mot de passe" />
                    <small>
                      <a href="index.html">Mot de pase oublié?</a>
                    </small>
                  </div>

                  <div class="text-center mt-3">
                    <button type="submit" class="btn btn-lg btn-primary d-flex align-items-center gap-3 justify-content-center">
                      <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="24px" width="24px" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 16L18 12 13 8 13 11 4 11 4 13 13 13z"></path>
                        <path d="M20,3h-9C9.897,3,9,3.897,9,5v4h2V5h9v14h-9v-4H9v4c0,1.103,0.897,2,2,2h9c1.103,0,2-0.897,2-2V5C22,3.897,21.103,3,20,3z"></path>
                      </svg>
                      Se connecter
                    </button>
                  </div>
                </form>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</main>

<?= $this->endSection(); ?>