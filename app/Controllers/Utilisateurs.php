<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Utilisateurs as ModelsUtilisateurs;

use function PHPSTORM_META\type;

class Utilisateurs extends BaseController
{

    public function envoyer_email(array $donnee)
    {
        $email = \Config\Services::email();
        $email->setTo($donnee['email']);
        $email->setSubject($donnee['objet']);
        $email->setMessage($donnee['message']);
        return $email->send();
    }

    public function profil(int $id)
    {
        $utilisateur = (new ModelsUtilisateurs())->find($id);
        if ($utilisateur) {

            $donnee = [
                'u' => (new ModelsUtilisateurs())->find($id)
            ];
            return view('utils/utilisateurs/profil', $donnee);
        } else {
            return view('errors/html/error_404', [
                'message' => 'Cette utilisateur n\'existe pas',
            ]);
        }
    }

    public function liste()
    {
        session()->set('position', 'utilisateurs');
        $donnee = [
            'liste' => (new ModelsUtilisateurs())->orderBy('nom','ASC')->findAll(),
        ];
        return view('utils/utilisateurs/liste', $donnee);
    }

    public function ajout()
    {
        $donnee = $this->request->getVar();

        // filter
        $teste = explode('@', $donnee['email']);
        // $resultat = in_array('poly-trans.sn',$teste);
        // dd($resultat);

        $donnee['prenom'] = ucwords($donnee['prenom']);
        $donnee['nom'] = ucwords($donnee['nom']);

        $rules = [
            'email' => [
                'rules' => 'is_unique[utilisateurs.email]'
            ],
            'telephone' => [
                'rules' =>  'is_unique[utilisateurs.telephone]|min_length[9]'
            ],
            'profil' => [
                'rules' => 'min_length[3]'
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('operation', false);
        } else {
            $donnee['mot_de_passe'] = DEFAULT_PWD;
            if ((new ModelsUtilisateurs())->insert($donnee)) {
                $courriel = [
                    'email' => $donnee['email'],
                    'objet' => 'Activation de compte',
                    'message' => base_url('/activer/' . $donnee['email']),
                ];
                if ($this->envoyer_email($courriel)) {
                    return redirect()->back()->with('operation', true)->with('email', true);
                } else {
                    return redirect()->back()->with('operation', true)->with('email', false);
                }
            } else {
                return redirect()->back()->with('operation', false);
            }
        }
    }


    public function supprimer()
    {
        $id = $this->request->getPost('id');
        if ((new ModelsUtilisateurs())->where('id', $id)->delete()) {
            if ($id == session()->donnee_utilisateur['id']) {
                session()->remove('donnee_utilisateur');
            }
            return redirect()->back()->with('notif', true)->with('message', 'Suppression réussie.');
        } else {
            return redirect()->back()->with('notif', false)->with('message', 'Echec de la suppression.');
        }
    }

    public function supprimer_groupe()
    {
        $ids = $this->request->getPost();
        $modele = new ModelsUtilisateurs();
        foreach ($ids as $id) {
            try {
                $modele->delete($id);
                if ($id == session()->donnee_utilisateur['id']) {
                    session()->remove('donnee_utilisateur');
                }
            } catch (\Throwable $th) {
                continue;
            }
        }

        return redirect()->back()->with('notif', true)->with('message', ' Suppressions réussies.');
    }

    public function activer_compte()
    {
        $id = $this->request->getPost('id');
        $db = \Config\Database::connect();
        $requete = $db->query('UPDATE utilisateurs SET compte_actif = ? WHERE id = ?', ['oui', $id]);
        if ($requete) {
            return redirect()->back()->with('notif', true)->with('message', 'Activation réussie.');
        } else {
            return redirect()->back()->with('notif', false)->with('message', 'Echec de l\'activation.');
        }
    }

    public function lien_activation(string $email)
    {
        $db = \Config\Database::connect();
        $requete = $db->query('UPDATE utilisateurs SET compte_actif = ? WHERE email = ?', ['oui', $email]);
        if ($requete) {
            return redirect()->to('/')->with('notif', true)->with('message', 'Activation réussie.');
        } else {
            return redirect()->to('/')->with('notif', false)->with('message', 'Echec de l\'activation.');
        }
    }
}
