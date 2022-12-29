<?php
  require_once 'Controleur/controleurAccueil.php';
  require_once 'Controleur/controleurBillet.php';
  require_once 'Vue/vue.php';
  class Routeur {
    private $ctrlAccueil;
    private $ctrlBillet;
    public function __construct() {
      $this->ctrlAccueil = new ControleurAccueil();
      $this->ctrlBillet = new ControleurBillet();
    }
    //public function routerRequete() { ... }
    private function erreur($msgErreur) {
      $vue = new Vue("Erreur");
      $vue->generer(array('msgErreur' => $msgErreur));
    }
    private function getParametre($tableau, $nom) {
      if (isset($tableau[$nom])) { return $tableau[$nom]; }
      else throw new Exception("Paramètre '$nom' absent");
    }

    public function routerRequete() {
              try {
                if (isset($_GET['action'])) {
                  if ($_GET['action'] == 'billet') {
                    $idBillet = intval($this->getParametre($_GET, 'id'));
                    if ($idBillet != 0) { $this->ctrlBillet->billet($idBillet); }
                    else throw new Exception("Identifiant de billet non valide");
                  }
                  else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
                  }
                  else throw new Exception("Action non valide");
                }
                else { $this->ctrlAccueil->accueil();}
              }
              catch (Exception $e) { $this->erreur($e->getMessage()); }
            }
    
  }
