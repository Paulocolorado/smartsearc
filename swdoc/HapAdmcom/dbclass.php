<?php
include "clave.php";
class connection {
  
  var $_link;  // link to the database
  var $_query; // holds the current query
  var $_res;   // holds the current results
  var $_row;   // holds one row at a time
  


  function connection($ip,$login,$pass,$db=0) {
  //print $pass;
  //print "-db2-".$ip."-db2-";
    $this->connect($ip,$login,$pass);
    if ($db)
      mysql_select_db($db,$this->_link);
  }
    
  function select_db($db) {
    mysql_select_db($db,$this->_link);
  }
  
  // connects to the database and puts connection in $link
  function connect($ip,$login,$pass) { 
    $this->_link = mysql_connect($ip,$login,$pass);
    return (true);
  }
  
  // returns wether or not there is an active link
  function isConnected() {
    if ($this->_link)
      return true;
    else
      return false;
  }
  
  function query($query=0) {
  //print "<br>-q1-".$query."-q1-<br>";
    if ($query)
      $this->_query = $query;
    $this->_res = mysql_query($this->_query);
    //if (!$this->_res) 
     // echo "ERROR:<BR>".$this->_query."<BR>".mysql_error()."<BR>";
	  $this->_res;
  }

  // takes a query and a row (defaults to 0) returns that value 
  function result($row=0,$col=0,$query=0) {
    if ($query) {
      $this->query($query);
      return mysql_result($this->_res,$row);
    } else {
      if (!$this->_res) return;
      return mysql_result($this->_res,$row,$col);
    }
  }
  
  function fetch_array($query=0) {
    if ($query)
      $this->query($query);
    return mysql_fetch_array($this->_res);
  }
  
  function num_rows($query=0) {
    if ($query)
      $this->query($query);
    if ($this->_res)
      return mysql_num_rows($this->_res);
    else
      return 0;
  }
  
  function affected_rows() { // show how many rows were affected
    if ($this->_res)
      return mysql_affected_rows();
    else
      return 0;
  }
  
  function last_insert() { // show how many rows were affected
    if ($this->_res)
      return mysql_insert_id();
    else
      return 0;
  }
  
  
  function close() {
      return mysql_close();
	}
  
}
?>
