<?php
require_once 'Modele/billet.php';
require_once 'Vue/vue.php';
class ControleurAccueil {
  private $billet;
  public function __construct() {
    $this->billet = new Billet();
  }
 public function accueil() {
    $billets = $this->billet->getBillets();
    $vue = new Vue("Accueil");
    $vue->generer(array('billets' => $billets));
  }
}