
<?php

require_once( __DIR__ . '/DAO.php');

class ActsDAO extends DAO {

  public function selectAllActs(){
    $sql = "SELECT * FROM `acts`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllLocations(){
    $sql = "SELECT * FROM `locations`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectAllDays(){
    $sql = "SELECT * FROM `Days`";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectSpotlightActs(){
    $sql = "SELECT * FROM `Acts` WHERE `id` <= 4";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function selectSuggestionsActs($category ='',$id){
    
    $sql = "SELECT * FROM `Acts` WHERE `category` =  :category AND `id` != :id LIMIT 4";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':category', $category);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }

  public function selectById($id){
    $sql = "SELECT * FROM `Acts` WHERE `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function selectDayByActId($id){
    $sql = "SELECT * FROM `Days` WHERE `act_id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function filter($title = '', $day = '', $childFriendly= '', $type = '', $category = ''){
    $sql = "SELECT * FROM `Acts` WHERE 1";

    if (!empty($title)) {
      $sql .= " AND `title` LIKE :title OR `artist` like '%the%' ";
    }
    if (!empty($day)) {
      $sql .= " AND `day` LIKE :da";
    }

    if (!empty($childFriendly)) {
      $sql .= " AND `childFriendly` = :childFriendly";
    }

    if (!empty($type)) {
      $sql .= " AND `type` = :type";
    }


    if (!empty($category)) {
      $sql .= " AND `category` = :category";
    }

    $sql .= " ORDER BY `Acts`.`title` ASC";

    $stmt = $this->pdo->prepare($sql);
    if (!empty($title)) {
      $stmt->bindValue(':title','%'.$title.'%');
    }
    if (!empty($day)) {
      $stmt->bindValue(':da', '%'.$day.'%');
    }
    if (!empty($childFriendly)) {
      $stmt->bindValue(':childFriendly', $childFriendly);
    }
    if (!empty($type)) {
      $stmt->bindValue(':type', $type);
    }
    if (!empty($category)) {
      $stmt->bindValue(':category', '%'.$category.'%');
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }



}
