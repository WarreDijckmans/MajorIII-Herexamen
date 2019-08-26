<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/actsDAO.php';

class HomeController extends Controller {

    private $actsDAO;

  function __construct() {
    $this->actsDAO = new ActsDAO();
  }

  public function index() {
    $acts = $this->actsDAO->selectAllActs();
    $this->set('acts',$acts);

    $locations = $this->actsDAO->selectAllLocations();
    $this->set('locations',$locations); 

    $spotlightActs = $this->actsDAO->selectSpotlightActs();
    $this->set('spotlightActs',$spotlightActs);
  }

}
