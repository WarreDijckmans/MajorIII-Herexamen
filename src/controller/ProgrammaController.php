<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/actsDAO.php';

class ProgrammaController extends Controller {

    private $actsDAO;

  function __construct() {
    $this->actsDAO = new ActsDAO();
  }

  public function index() {
    $days = $this->actsDAO->selectAllDays();
    $this->set('days',$days);

    $childFriendlyValue = "";
    $day = "";
    $search = "";
    $type = "";
    $category = "";

    if(!empty($_GET['childFriendly'])){
      $childFriendlyValue = $_GET['childFriendly'];
    }

    if(!empty($_GET['days']) && $_GET['days'] != "alle"){
      $day = $_GET['days'] ;
    }elseif(!empty($_GET['days']) &&$_GET['days'] == "alle"){
      $day = "";
    }

    if(!empty($_GET['search'])){
      $search = $_GET['search'];
    }

    if(!empty($_GET['category'])){
      $category = $_GET['category'];
    }

    if(!empty($_GET['type'])){
      $type = $_GET['type'];
    }


    if(empty($_GET['search']) && empty($_GET['days']) && empty($_GET['childFriendly']) && empty($_GET['type']) && empty($_GET['category'])){
      $acts = $this->actsDAO->selectAllActs();
    $this->set('acts', $acts);

    }else{
    $acts = $this->actsDAO->Filter($search,$day,$childFriendlyValue,$type,$category);
    $this->set('acts', $acts);
    }
    
    $amountOfActs = count($acts);
    $this->set('amountOfActs', $amountOfActs);
    
  }

}
