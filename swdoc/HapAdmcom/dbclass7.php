<?php
class connection{

    var $host = "127.0.0.1";
    var $conexion;
    var $bd = "haptrack_docu";
    var $usuario = "haptrack_docu";
    var $clave = "SmartApp135";
    //PRODUCCION var $clave = "*SmartApp135";
    var $tipo;


    function __construct(){
        global $bdhost;
        global $bdnombre;
        global $bdusuario;
        global $bdclave;

        $this->host=$bdhost;
        $this->bd=$bdnombre;
        $this->usuario=$bdusuario;
        $this->clave=$bdclave;
        $this->tipo="mysqli";
        $this->conexion = mysqli_connect("localhost", "haptrack_docu", "SmartApp135","haptrack_docu") or die('Error al conectarse');
        //PRODUCCION $this->conexion = mysqli_connect("localhost", "haptrack_docu", "*SmartApp135","haptrack_docu") or die('Error al conectarse');
        mysqli_set_charset($this->conexion,"utf8");
        mysqli_select_db($this->conexion,"haptrack_docu") or die('Error en la selección de la base de datos');
        //print_r($this->conexion);
    }

    /*funcion que ejecuta una sentencia sql sobre la base de dato y devuelve la consulta a dicha base*/
    function query($sql){
        $query=mysqli_query($this->conexion,$sql) or die('Error MySql: '.mysqli_error($this->conexion).' '.$sql);
        return $query;
    }//query

    /*funcion que devuelve el numero de filas cuando se le pasa una consulta generada por sql*/
    function num_rows($query){
        $num_rows=mysqli_num_rows($query);
        return $num_rows;
    }//num_rows

    /*funcion que va sacando los datos con formato de array asociativo de una consulta generada por sql
     la cual se le pasa, cada vez que se le llama avanza una fila*/
    function fetch_array($query){
        $fila=mysqli_fetch_array($query,MYSQLI_ASSOC);
        return $fila;
    }//fetch_array

    /*funcion que va sacando los datos con formato de objeto de una consulta generada por sql
     la cual se le pasa, cada vez que se le llama avanza una fila*/
    function fetch_object($query){
        $fila=mysqli_fetch_object($query);
        return $fila;
    }//fetch_object


    /*funcion que libera el buffer de la consulta generada por sql que se le pasa*/
    function free_result($query){
        mysqli_free_result($query);
    }//free_result
    
    
    function last_insert() { // show how many rows were affected
        return mysqli_insert_id($this->conexion);
    }

    /*funcion que cierra la conexion de la base de datos*/
    function cerrar(){
        mysqli_close();
    }//cerrar conexion
}
?>