<?php
 class flights_list{
    public $id;
    public $flyingFrom;
    public $flyingTo;
    public $departingDate;
    public $returningDate;
    public $seats ;
    public $id_users;

    public function __construct(){}

    public function readFlying(){
    $query = "SELECT DISTINCT flyingFrom, flyingTo from flights_list";
    $result=request($query);
    return $result;
  }
public function showFlights($flyingFrom,$flyingTo){
$query = "SELECT * FROM flights_list WHERE flyingFrom='$flyingFrom' AND flyingTo='$flyingTo' AND seats>0 AND id NOT IN (SELECT id_cancel FROM cancel)";
    $result=request($query) or die("request ne pas valid tester request");
   return $result;
}
}