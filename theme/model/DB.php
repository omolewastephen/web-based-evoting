<?php
class DB{
  protected $conn;
  protected $query;
  protected $rowcount;
  protected $stmt;
  protected $result;

  function __construct(){
    require_once 'config.php';
    extract(dbConfig());
    try {
      $this->conn = new PDO("mysql:host=".$db_host.";dbname=".$db_name,$db_user,$db_pass);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e) {
      die( $e->getMessage() );
    }
  }

  function query($sql){
     $this->stmt = $this->conn->query($sql);
    if ($this->stmt)
      return true;
    else
      return false;

     return $this->stmt;
  }

  function single($sql){
    $this->stmt = $this->conn->query($sql);
    $this->result = $this->stmt->fetch(PDO::FETCH_OBJ);
    return $this->result;
  }

  function single_assoc($sql){
    $this->stmt = $this->conn->query($sql);
    $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
    return $this->result;
  }

  function resultset($sql){
    $this->stmt = $this->conn->query($sql);
    $this->result = $this->stmt->fetchAll(PDO::FETCH_OBJ);
    return $this->result;
  }

  function resultset_array($sql){
    $this->stmt = $this->conn->query($sql);
    $this->result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    return $this->result;
  }

  function getUsedLocation(){
    $this->stmt = $this->resultset("SELECT DISTINCT location FROM logs");
    return $this->stmt;
  }

  function sms_global_controller($status,$type){
    switch ($type) {
      case 'g':
        $this->stmt = $this->conn->query("UPDATE admin SET sms_status = '{$status}' ");
        return true;
        break;
      case 'das':
        $this->stmt = $this->conn->query("UPDATE admin SET day_arrival_sms = '{$status}' ");
        return true;
        break;
      case 'dds':
        $this->stmt = $this->conn->query("UPDATE admin SET day_departure_sms = '{$status}' ");
        return true;
        break;
      case 'bas':
        $this->stmt = $this->conn->query("UPDATE admin SET board_arrival_sms = '{$status}' ");
        return true;
        break;
      case 'bds':
        $this->stmt = $this->conn->query("UPDATE admin SET board_dept_sms = '{$status}' ");
        return true;
        break;
    }
   
  }

  function sms_status($type){
     switch ($type) {
      case 'g':
        $this->stmt = $this->single("SELECT sms_status FROM admin  ");
        return $this->stmt->sms_status;
        break;
      case 'das':
        $this->stmt = $this->single("SELECT day_arrival_sms FROM admin  ");
        return $this->stmt->day_arrival_sms;
        break;
      case 'dds':
        $this->stmt = $this->single("SELECT day_departure_sms FROM admin  ");
        return $this->stmt->day_departure_sms;
        break;
      case 'bas':
        $this->stmt = $this->single("SELECT board_arrival_sms FROM admin  ");
        return $this->stmt->board_arrival_sms;
        break;
      case 'bds':
        $this->stmt = $this->single("SELECT board_dept_sms FROM admin  ");
        return $this->stmt->board_dept_sms;
        break;
    }
  }

  function insert($table,$data){
    foreach( array_keys($data) as $key ) {
        $fields[] = "`$key`";
        $values[] = "'" . $data[$key] . "'";
    }
    $fields = implode(",", $fields);
    $values = implode(",", $values);
    if( $this->conn->query("INSERT INTO `$table`( $fields)VALUES($values)") ) {
    	return true;
    }else{
    	return false;
    }

 }

function update($table,$data,$field,$id){
	$query = sprintf('UPDATE %s SET ', $table);
	foreach($data as $key=>$value)
	    $query .= "$key='$value', ";
	$query = rtrim($query,", ");

	$query .= sprintf('WHERE '.$field.' = %s', $id);
	$update = $this->conn->query($query);
	return($update)?true:false;

}

function delete($table,$col,$value){
  $this->stmt = $this->conn->query("DELETE FROM $table WHERE $col = '{$value}' ");
  return ($this->stmt) ? true : false;
}

function rowcount(){
  return $this->stmt->rowCount();
}

function create_tx()
{
  return substr(md5(time()),0,10);
}


}
?>
