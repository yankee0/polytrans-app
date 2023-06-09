<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
$routes->post('/', 'Auth::se_connecter');
$routes->get('/dispatcher', 'Auth::dispatcher');
$routes->get('/se_deconnecter', 'Auth::se_deconnecter');
$routes->get('/activer/(:segment)', 'Utilisateurs::lien_activation/$1');

//il faudra s'authentifier pour acceder à ces routes
$routes->group('', ['filter' => 'authentifie'], function ($routes) {
    //graphs
    $routes->group('graphs', function ($routes) {
        $routes->add('line', 'Graph::line');
        $routes->add('pie', 'Graph::pie');
    });

    //routes du super admins
    $routes->group('/super-admin', ['filter' => 'superAdmin'], function ($routes) {
        $routes->get('/', 'SuperAdmin::index');
        $routes->get('profil/(:segment)', 'Utilisateurs::profil/$1');
        $routes->add('mot-de-passe','Utilisateurs::modifier_mdp');

        $routes->group('utilisateurs', function ($routes) {
            $routes->get('/', 'Utilisateurs::liste');
            $routes->post('/', 'Utilisateurs::ajout');
            $routes->post('supprimer', 'Utilisateurs::supprimer');
            $routes->post('supprimer_groupe', 'Utilisateurs::supprimer_groupe');
            $routes->post('activer', 'Utilisateurs::activer_compte');
        });

        $routes->group('chauffeurs', function ($routes) {
            $routes->get('/', 'Chauffeurs::liste');
            $routes->post('/', 'Chauffeurs::ajout');
            $routes->post('supprimer', 'Chauffeurs::supprimer');
            $routes->post('supprimer_groupe', 'Chauffeurs::supprimer_groupe');
            $routes->get('modifier/(:segment)', 'Chauffeurs::modifier/$1');
            $routes->post('modifier', 'Chauffeurs::enregistrer');
        });

        $routes->group('camions', function ($routes) {
            $routes->get('/', 'Camions::liste');
            $routes->post('/', 'Camions::ajout');
            $routes->post('supprimer', 'Camions::supprimer');
            $routes->post('supprimer_groupe', 'Camions::supprimer_groupe');
            $routes->get('modifier/(:segment)', 'Camions::modifier/$1');
            $routes->post('modifier', 'Camions::enregistrer');
            $routes->post('modifier/vt', 'Camions::enregistrer_vt');
            $routes->post('modifier/as', 'Camions::enregistrer_as');
            $routes->get('dossier/(:segment)', 'Camions::dossier/$1');
        });

        $routes->group('remorques', function ($routes) {
            $routes->get('/', 'Remorques::liste');
            $routes->post('/', 'Remorques::ajout');
            $routes->post('supprimer', 'Remorques::supprimer');
            $routes->post('supprimer_groupe', 'Remorques::supprimer_groupe');
            $routes->get('modifier/(:segment)', 'Remorques::modifier/$1');
            $routes->post('modifier', 'Remorques::enregistrer');
            $routes->get('dossier/(:segment)', 'Remorques::dossier/$1');
        });

        $routes->group('livraisons', function ($routes) {
            $routes->get('/', 'Livraisons::liste');
            $routes->post('ajout', 'Livraisons::ajout');
            $routes->post('supprimer/(:segment)', 'Livraisons::supprimer/$1');
            $routes->post('supprimer_groupe', 'Livraisons::supprimer_groupe');
            $routes->get('modifier/(:segment)', 'Livraisons::modifier/$1');
            $routes->post('modifier', 'Livraisons::enregistrer');
            $routes->get('info/(:segment)', 'Livraisons::info/$1');
            $routes->get('recherche', 'Livraisons::recherche');
        });

        $routes->group('rapports', function ($routes) {
            $routes->get('/','Rapports::index');
            $routes->post('livraisons', 'Rapports::livraison');
        });
    });

    //ops flotte
    $routes->group('ops-flotte', ['filter' => 'opsFlotte'], function ($routes) {
        $routes->get('/', 'OpsFlotte::index');
        $routes->get('profil/(:segment)', 'Utilisateurs::profil/$1');
        $routes->add('mot-de-passe','Utilisateurs::modifier_mdp');


        $routes->group('chauffeurs', function ($routes) {
            $routes->get('/', 'Chauffeurs::liste');
            $routes->post('/', 'Chauffeurs::ajout');
            $routes->post('supprimer', 'Chauffeurs::supprimer');
            $routes->post('supprimer_groupe', 'Chauffeurs::supprimer_groupe');
            $routes->get('modifier/(:segment)', 'Chauffeurs::modifier/$1');
            $routes->post('modifier/vt', 'Camions::enregistrer_vt');
            $routes->post('modifier/as', 'Camions::enregistrer_as');
            $routes->post('modifier', 'Chauffeurs::enregistrer');
        });

        $routes->group('camions', function ($routes) {
            $routes->get('/', 'Camions::liste');
            $routes->post('/', 'Camions::ajout');
            $routes->post('supprimer', 'Camions::supprimer');
            $routes->post('supprimer_groupe', 'Camions::supprimer_groupe');
            $routes->get('modifier/(:segment)', 'Camions::modifier/$1');
            $routes->post('modifier', 'Camions::enregistrer');
            $routes->get('dossier/(:segment)', 'Camions::dossier/$1');
        });
    });

    //ops reception
    $routes->group('ops-reception', ['filter' => 'opsReception'], function ($routes) {
        $routes->get('/', 'OpsReception::index');
        $routes->get('profil/(:segment)', 'Utilisateurs::profil/$1');
        $routes->add('mot-de-passe','Utilisateurs::modifier_mdp');

        $routes->group('livraisons', function ($routes) {
            $routes->get('/', 'Livraisons::liste');
            $routes->post('ajout', 'Livraisons::ajout');
            $routes->post('supprimer/(:segment)', 'Livraisons::supprimer/$1');
            $routes->post('supprimer_groupe', 'Livraisons::supprimer_groupe');
            $routes->get('modifier/(:segment)', 'Livraisons::modifier/$1');
            $routes->post('modifier', 'Livraisons::enregistrer');
            $routes->get('info/(:segment)', 'Livraisons::info/$1');
            $routes->get('recherche', 'Livraisons::recherche');
        });
    });

    //ops mvt
    $routes->group('ops-mvt', ['filter' => 'opsMvt'], function ($routes) {
        $routes->get('/', 'OpsMvt::index');
        $routes->get('profil/(:segment)', 'Utilisateurs::profil/$1');
        $routes->add('mot-de-passe','Utilisateurs::modifier_mdp');

        $routes->group('livraisons', function ($routes) {
            $routes->get('/', 'Livraisons::liste');
            // $routes->post('ajout', 'Livraisons::ajout');
            // $routes->post('supprimer/(:segment)', 'Livraisons::supprimer/$1');
            // $routes->post('supprimer_groupe', 'Livraisons::supprimer_groupe');
            $routes->get('modifier/(:segment)', 'Livraisons::modifier/$1');
            $routes->post('modifier', 'Livraisons::enregistrer');
            $routes->get('info/(:segment)', 'Livraisons::info/$1');
            $routes->get('recherche', 'Livraisons::recherche');
        });
    });

    //ops finance
    $routes->group('ops-finance', ['filter' => 'opsFinance'], function ($routes) {
        $routes->get('/', 'OpsFinance::index');
        $routes->get('profil/(:segment)', 'Utilisateurs::profil/$1');
        $routes->add('mot-de-passe','Utilisateurs::modifier_mdp');


        $routes->group('livraisons', function ($routes) {
            $routes->get('/', 'Livraisons::liste');
            $routes->post('ajout', 'Livraisons::ajout');
            $routes->post('supprimer/(:segment)', 'Livraisons::supprimer/$1');
            $routes->post('supprimer_groupe', 'Livraisons::supprimer_groupe');
            $routes->get('modifier/(:segment)', 'Livraisons::modifier/$1');
            $routes->post('modifier', 'Livraisons::enregistrer');
            $routes->get('info/(:segment)', 'Livraisons::info/$1');
            $routes->get('recherche', 'Livraisons::recherche');
        });

        $routes->group('rapports', function ($routes) {
            $routes->get('/','Rapports::index');
            $routes->add('livraisons', 'Rapports::livraison');
        });
    });

    //ops transport
    $routes->group('ops-transport', ['filter' => 'opsTransport'], function ($routes) {
        $routes->get('/', 'OpsTransport::index');
        $routes->get('profil/(:segment)', 'Utilisateurs::profil/$1');
        $routes->add('mot-de-passe','Utilisateurs::modifier_mdp');

        $routes->group('livraisons', function ($routes) {
            $routes->get('/', 'Livraisons::liste');
            $routes->post('ajout', 'Livraisons::ajout');
            $routes->post('supprimer/(:segment)', 'Livraisons::supprimer/$1');
            $routes->post('supprimer_groupe', 'Livraisons::supprimer_groupe');
            $routes->get('modifier/(:segment)', 'Livraisons::modifier/$1');
            $routes->post('modifier', 'Livraisons::enregistrer');
            $routes->get('info/(:segment)', 'Livraisons::info/$1');
            $routes->get('recherche', 'Livraisons::recherche');
        });
    });

    //routes communs

});


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
