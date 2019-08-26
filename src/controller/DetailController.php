<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/actsDAO.php';

class DetailController extends Controller {

    private $actsDAO;

  function __construct() {
    $this->actsDAO = new ActsDAO();
  }

  public function index() {

    $act = $this->actsDAO->selectById($_GET['id']);
    $this->set('act',$act);

    $locations = $this->actsDAO->selectAllLocations();
    $this->set('locations',$locations); 

    $days = $this->actsDAO->selectDayByActId($_GET['id']);
    $this->set('days',$days);

    $suggestionActs = $this->actsDAO->selectSuggestionsActs($act['category'],$_GET['id']);
    $this->set('suggestionActs',$suggestionActs);

  }

}